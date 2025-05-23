# site-wordpress, Danila Theodora, 1132 SIMPRE


# link video: https://youtu.be/A7g-p3SH3us

# link publicare: https://lightgoldenrodyellow-mallard-392016.hostingersite.com

# introducere:

Aplicația web de fata prezintă un magazin online care se ocupa cu comerciazilarea produselor naturale și eco.Aceasta a fost dezvoltată folosind platforma WordPress, alegerea principală fiind determinată de ușurința integrării cu diverse servicii externe și flexibilitatea oferită prin intermediul temelor și pluginurilor.
 Site-ul este structurat intuitiv și responsive, oferind o experiență prietenoasă utilizatorului. În spate, funcționarea magazinului se bazează pe o bază de date MySQL specifică platformei WordPress, care gestionează paginile, utilizatorii, comenzile și conținutul dinamic.

Pentru extinderea funcționalităților, am integrat două tehnologii cloud: Google Maps și Firebase Authentication. Harta Google Maps a fost integrată cu ajutorul pluginului WP Go Maps, folosind o cheie API generată în Google Cloud, pentru a afișa locația magazinului pe pagina de contact. Autentificarea prin OTP a fost implementată cu Firebase, configurată prin pluginul OTP Login/Signup for WooCommerce, permițând utilizatorilor să se logheze rapid cu numărul de telefon, fără a mai folosi parolă.

Întregul proiect este structurat pentru a putea fi instalat și rulat local sau pe un server, fiind inclus într-un repository Git complet, împreună cu fișierele aplicației și exportul bazei de date. Acest tip de arhitectură care foloseste servicii externe prin API, dar si o bază de date MySQL reflectă o structură reală de proiect web complet funcțional și scalabil.

# descriere problema:

Odată cu dezvoltarea tot mai rapidă a comerțului electronic, a apărut și nevoia de a crea aplicații web care să ofere nu doar funcționalitate de bază, ci și o experiență fluidă și modernă pentru utilizatori. În acest context, principala provocare a fost identificarea unei soluții care să permită construirea unui magazin online funcțional, care să poată fi implementat rapid, să fie ușor de întreținut și să permită integrarea cu servicii externe, fără a fi nevoie de dezvoltare complexă de la zero.

Problema nu a constat într-o eroare sau într-o limitare punctuală, ci mai degrabă în alegerea unei arhitecturi potrivite pentru un proiect real, scalabil, dar totodată realizabil în condiții didactice. A fost important ca soluția să răspundă unor cerințe reale: localizarea vizuală a magazinului pe hartă, autentificarea securizată fără parolă, și posibilitatea gestionării conținutului (produse, comenzi, utilizatori) într-un mod intuitiv.

Astfel, am ales WordPress ca platformă de bază, pentru flexibilitatea sa și pentru ecosistemul bogat de teme și pluginuri. De asemenea, pentru a răspunde nevoii de integrare cu servicii cloud, am optat pentru Google Maps (pentru localizare) și Firebase Authentication (pentru login cu OTP), ambele fiind servicii moderne și ușor de integrat prin pluginuri dedicate. Toate acestea au fost conectate și coordonate cu o bază de date MySQL, ceea ce permite o administrare coerentă a conținutului și a interacțiunii utilizatorilor cu site-ul.

# descriere api

Pentru extinderea funcționalităților site-ului, am integrat două servicii externe prin API: Google Maps JavaScript API și Firebase Authentication API. Ambele au fost accesate prin intermediul pluginurilor WordPress dedicate, dar fiecare integrare a presupus parcurgerea unor pași tehnici clari în consola Google Cloud și Firebase Console.

Integrarea hărții Google Maps a fost realizată cu ajutorul pluginului WP Go Maps. Am început prin crearea unui proiect nou în Google Cloud Platform, unde am activat serviciile necesare: Maps JavaScript API, Geolocation API, Geocoding API și Directions API. Apoi am generat o cheie API unică, pe care am configurat-o cu restricții de securitate, permițând doar domeniul site-ului nostru să o folosească. După introducerea acestei chei în setările pluginului, am creat o hartă nouă, în care am configurat locația fizică a magazinului și nivelul de zoom, și am adăugat un marker personalizat. Pluginul a generat un shortcode pe care l-am inserat în pagina de contact, rezultatul fiind o hartă complet funcțională, integrată vizual și tehnic în site.

În ceea ce privește autentificarea utilizatorilor, am implementat un sistem de login prin OTP (cod de verificare SMS) folosind Firebase Authentication. Procesul a început cu crearea unui proiect în Firebase Console, unde am activat metoda de autentificare prin telefon și am adăugat domeniul site-ului în lista celor autorizate. Am generat datele de configurare necesare (apiKey, authDomain etc.) și le-am introdus în pluginul OTP Login/Signup for WooCommerce. După configurare, utilizatorii pot introduce numărul de telefon în formularul de login, primesc un cod prin SMS și se autentifică imediat, fără a mai fi nevoie de parolă. Pentru testare, am folosit atât numere reale, cât și numere de test puse la dispoziție de Firebase, iar pentru securitate, reCAPTCHA a fost activat automat. De asemenea, a fost necesară activarea Billing-ului în Google Cloud, deoarece trimiterea reală de SMS-uri nu este disponibilă fără un cont de facturare activ.

Ambele API-uri au fost integrate fără a scrie cod manual, ci prin configurarea atentă a serviciilor și utilizarea pluginurilor compatibile. Această metodă a redus timpul de implementare și a permis realizarea unui proiect complet funcțional, modern și scalabil.

# flux de date
 ## exemple de request/response

Interacțiunea dintre aplicația web și serviciile externe pe care le-am integrat (Google Maps și Firebase Authentication) se bazează pe modelul clasic de comunicare request/response. În acest model, aplicația trimite o cerere (request) către un serviciu extern, iar acesta răspunde cu date sau un rezultat (response). În cadrul site-ului dezvoltat, aceste schimburi de date se produc automat, ca răspuns la anumite acțiuni ale utilizatorului.

Un prim exemplu este cel al autentificării prin OTP (cod primit prin SMS). Atunci când un utilizator introduce numărul de telefon în formularul de login și apasă pe butonul de trimitere, aplicația trimite un request către serviciul Firebase Authentication. Acest request include numărul de telefon introdus, împreună cu identificatorul reCAPTCHA generat automat. În urma acestui request, Firebase răspunde prin trimiterea unui cod OTP pe telefonul utilizatorului. După introducerea codului în câmpul corespunzător și confirmare, aplicația trimite un al doilea request pentru validarea codului. Dacă acesta este corect, Firebase răspunde cu un token de autentificare, iar utilizatorul este considerat logat în sistem.

Un al doilea exemplu este legat de afișarea hărții Google Maps în pagina de contact. Atunci când utilizatorul accesează această pagină, browserul face automat un request GET către serverele Google, folosind cheia API configurată în pluginul WP Go Maps. Răspunsul constă în date JavaScript care redau harta în pagină, împreună cu markerul și setările stabilite în panoul de configurare. Tot acest proces are loc în fundal, fără ca utilizatorul să interacționeze direct cu elementele tehnice.

În ambele cazuri, schimburile de date se bazează pe protocoale HTTP și sunt gestionate de pluginurile instalate în WordPress. Aceste exemple ilustrează cum se realizează, în practică, fluxul de date între aplicația web și serviciile externe prin intermediul mecanismului request/response.

Pentru început, atunci când utilizatorul inițiază înregistrarea cu număr de telefon, este trimisă o cerere POST către endpointul local al site-ului WordPress, mai exact /wp-admin/admin-ajax.php. Această cerere declanșează trimiterea unui cod OTP către telefonul utilizatorului, folosind serviciul Firebase în fundal.

<img width="1325" alt="Screenshot 2025-05-22 at 20 55 21" src="https://github.com/user-attachments/assets/8fce7cbb-6ae2-4249-9788-4a3870052915" />
Figura 1 – Cerere POST trimisă către serverul WordPress pentru inițierea autentificării OTP

După ce cererea este procesată, Firebase trimite un mesaj SMS către utilizator, care conține codul unic de autentificare. Acest cod este introdus ulterior pentru verificarea identității.
<img width="696" alt="Screenshot 2025-05-22 at 20 55 42" src="https://github.com/user-attachments/assets/7f47cb46-72cf-49c7-8455-0af24f7710e9" />
Figura 2 – Mesaj SMS primit de utilizator cu codul de verificare OTP

După introducerea codului în formularul de pe site, este trimisă o nouă cerere POST, de această dată către serviciul Firebase Authentication. Cererea conține codul OTP, iar răspunsul conține un token de autentificare.
<img width="1327" alt="Screenshot 2025-05-22 at 20 56 53" src="https://github.com/user-attachments/assets/4eecc0fd-86ee-4f5d-a28c-9a183243f519" />
Figura 3 – Cerere POST către Firebase pentru verificarea codului OTP introdus de utilizator

Înainte de inițierea oricărui request, utilizatorul interacționează cu interfața de înregistrare sau autentificare, unde introduce numărul de telefon.
<img width="1327" alt="Screenshot 2025-05-22 at 20 58 09" src="https://github.com/user-attachments/assets/7f841069-0f43-42c6-8ff6-19d4cbd96914" />
Figura 4 – Formularul de înregistrare cu autentificare prin OTP

După autentificare reușită, aplicația redirecționează utilizatorul către pagina de cont. Acest lucru este vizibil în cererea POST către /my-account/, urmată de un răspuns de tip 302 Found.
<img width="1327" alt="Screenshot 2025-05-22 at 20 58 59" src="https://github.com/user-attachments/assets/cc92c04c-22b5-4520-9a73-23dddb669973" />
Figura 5 – Cerere POST de redirecționare către pagina de cont după login reușit

Fluxul este similar și în cazul autentificării unui utilizator deja înregistrat. Acesta introduce din nou numărul de telefon în formularul de login.
<img width="1327" alt="Screenshot 2025-05-22 at 20 59 33" src="https://github.com/user-attachments/assets/b0193e20-1978-40e6-9ce1-97cf8ce844db" />
Figura 6 – Formularul de autentificare OTP pentru utilizatori existenți

La apăsarea butonului de trimitere cod, este trimisă o cerere POST către Firebase pentru generarea unui nou cod OTP.
<img width="1327" alt="Screenshot 2025-05-22 at 21 01 41" src="https://github.com/user-attachments/assets/341356d8-c421-4a2a-bae5-25fe5058ffb7" />
Figura 7 – Cerere POST către Firebase pentru trimiterea codului OTP

Similar ca în prima secvență, utilizatorul primește un cod de verificare nou prin SMS.
<img width="701" alt="Screenshot 2025-05-22 at 21 02 10" src="https://github.com/user-attachments/assets/a44cf4a1-5f7f-451b-b6a1-5a77442c06f7" />
Figura 8 – Cod OTP primit de utilizator pentru autentificare

După introducerea noului cod OTP, cererea de verificare este trimisă din nou către Firebase, iar răspunsul conține tokenul de autentificare.
<img width="1317" alt="Screenshot 2025-05-22 at 21 03 41" src="https://github.com/user-attachments/assets/b1033d85-cdac-4a8c-966b-650ac21db2fb" />
Figura 9 – Cerere POST către Firebase pentru confirmarea codului OTP

Pe lângă autentificare, aplicația mai trimite și cereri GET către serviciile Google Maps atunci când utilizatorul accesează pagina de contact. Răspunsul conține datele necesare pentru randarea hărții.
<img width="1317" alt="Screenshot 2025-05-22 at 21 09 20" src="https://github.com/user-attachments/assets/8a9680be-0f65-4c52-a2a7-7266691bd40e" />
Figura 10 – Încărcarea hărții Google Maps în pagina de contact a site-ului


 ## metode http
Aplicația web construită pe WordPress comunică atât cu serviciile externe, cât și cu backend-ul propriu prin intermediul protocoalelor HTTP. Aceste protocoale definesc modul în care clientul (browserul) trimite cereri către server, iar serverul răspunde cu informațiile solicitate. În cadrul proiectului, cele mai utilizate metode HTTP sunt GET și POST.

Metoda POST este folosită în toate interacțiunile care implică trimiterea de date confidențiale sau actualizarea unor informații. Un exemplu clar este autentificarea prin OTP, unde aplicația trimite date precum numărul de telefon și codul de verificare către Firebase Authentication, prin cereri POST. De asemenea, după autentificare, utilizatorul este redirecționat printr-o cerere POST către pagina de cont personal. La nivel intern, metodele POST sunt utilizate și pentru trimiterea datelor completate în formulare: trimiterea numărului de telefon în etapa de login, salvarea datelor de cont, schimbarea parolei, sau modificarea adreselor de livrare și facturare. Aceste acțiuni se realizează de obicei prin intermediul endpointului admin-ajax.php sau prin pagini WordPress specifice, configurate de pluginul WooCommerce.

Metoda GET este utilizată pentru obținerea de informații care nu implică modificarea datelor de pe server. Este folosită, de exemplu, atunci când utilizatorul accesează pagina de contact, iar browserul face o cerere GET către serviciul Google Maps pentru a încărca harta. De asemenea, accesarea paginilor statice ale site-ului sau a taburilor din pagina „My Account” (precum „Orders”, „Addresses” sau „Account details”) se face prin GET.

Metodele PUT, PATCH și DELETE nu sunt utilizate în acest proiect, deoarece site-ul nu efectuează operații directe de actualizare sau ștergere asupra resurselor externe. Totuși, unele pluginuri pot folosi metode suplimentare în fundal, dar la nivelul utilizatorului final și al aplicației prezentate, GET și POST sunt metodele esențiale care guvernează toate schimburile de date.

În concluzie, prin combinarea corectă a cererilor GET (pentru obținerea de date) și POST (pentru trimiterea și salvarea acestora), aplicația oferă un flux complet de funcționalitate — de la autentificare, până la gestionarea contului personal și integrarea cu servicii cloud precum Firebase și Google Maps.
 
 ## autentificare si autorizare servicii utilizate

 În cadrul acestui proiect, autentificarea utilizatorului în site a fost realizată exclusiv prin intermediul serviciului Firebase Authentication, folosind metoda OTP (One Time Password) prin SMS. Alegerea acestui mecanism modern a fost motivată de dorința de a oferi o experiență sigură și rapidă de login, eliminând complet utilizarea parolelor clasice. În paralel, aplicația a fost configurată să se conecteze în mod sigur la serviciile externe — Firebase și Google Maps — prin mecanisme de autorizare bazate pe chei API și restricții stricte de domeniu.

Utilizatorii care doresc să se autentifice introduc un număr de telefon valid, iar aplicația trimite o cerere către Firebase pentru generarea și trimiterea codului OTP. După introducerea acestuia, sistemul validează codul și autentifică utilizatorul. Ulterior, acesta are acces doar la datele proprii: comenzile, adresele și detaliile contului.

Pe partea de autorizare a aplicației către serviciile cloud, autentificarea s-a realizat prin chei API. Acestea au fost configurate cu restricții stricte: în Firebase au fost setate domeniile autorizate, iar în Google Cloud au fost configurate restricții de referrer pentru a preveni utilizarea frauduloasă a cheii API.

În consola Firebase, secțiunea „Authentication” a fost configurată pentru a permite autentificarea prin SMS. Această metodă a fost activată ca unic „Sign-in provider”, asigurând că aplicația poate genera și trimite coduri OTP prin infrastructura Firebase.

![WhatsApp Image 2025-05-22 at 21 50 22-5](https://github.com/user-attachments/assets/435dcc56-c1b8-4ef0-93eb-49430c578ffe)
Figura 1 – Activarea metodei de autentificare prin telefon (SMS) în Firebase Authentication

Pentru a asigura securitatea autentificării, Firebase permite trimiterea OTP-urilor doar către domenii care au fost anterior autorizate. În acest proiect, domeniul site-ului WordPress a fost adăugat explicit în lista de domenii permise, alături de cele implicite oferite de Firebase
![WhatsApp Image 2025-05-22 at 21 50 22-4](https://github.com/user-attachments/assets/17afb3f2-8e25-46c0-babf-a54c46c7fa97)
Figura 2 – Configurarea domeniilor autorizate în consola Firebase pentru activarea login-ului cu OTP

Pentru integrarea hărții Google Maps pe pagina de contact, a fost generată o cheie API dedicată în Google Cloud Platform. Aceasta a fost restricționată astfel încât să poată fi folosită doar de către site-ul proiectului, prevenind folosirea abuzivă de către alte aplicații.
![WhatsApp Image 2025-05-22 at 21 50 22-3](https://github.com/user-attachments/assets/379cd93f-d924-499d-a80a-de2d48b9ba00)
Figura 3 – Restricționarea cheii API la nivel de domeniu pentru protecția accesului la Google Maps

Pentru ca funcționalitatea Google Maps să fie completă, în consola Google Cloud au fost activate mai multe API-uri necesare, printre care: Maps JavaScript API, Geolocation API, Directions API și Geocoding API. Acestea au fost activate pentru proiectul dedicat site-ului.
![WhatsApp Image 2025-05-22 at 21 50 22-2](https://github.com/user-attachments/assets/8cc67914-db27-4545-9941-1ec9e8741248)
Figura 4 – Lista API-urilor activate pentru funcționarea integrării Google Maps în site

Maps JavaScript API a fost serviciul principal activat pentru afișarea interactivă a hărții în pagina de contact. Acest serviciu oferă funcționalități avansate de afișare, marcare locații și interacțiuni dinamice în interfața site-ului.
![WhatsApp Image 2025-05-22 at 21 50 22](https://github.com/user-attachments/assets/50d59896-041b-47ba-9ef5-12989c6f5897)
Figura 5 – Activarea serviciului Maps JavaScript API din Google Cloud pentru randarea hărții

# capturi de ecran aplicatie

Următoarele capturi de ecran ilustrează aspectul vizual al aplicației și principalele funcționalități disponibile pentru utilizator. Aplicația are o interfață prietenoasă și responsive, fiind structurată pe baza unei teme WordPress optimizate pentru comerț electronic.

<img width="1710" alt="Screenshot 2025-05-23 at 22 28 06" src="https://github.com/user-attachments/assets/efee24d6-e62f-4236-b90e-78012b556a2c" />
Figura 1 – Pagina principală a magazinului
Pagina de start oferă o prezentare vizuală clară a produselor naturale promovate de magazin, evidențiind conceptul eco-friendly al platformei.

<img width="1710" alt="Screenshot 2025-05-23 at 22 29 29" src="https://github.com/user-attachments/assets/c919950f-aee2-422b-99ce-086466842a20" />
Figura 2 – Produsele bestseller afișate pe homepage
Sunt afișate cele mai vândute produse, cu imagini, prețuri și posibilitatea de adăugare rapidă în coș. Se observă și badge-ul „Sale” pe produsele reduse.

<img width="1710" alt="Screenshot 2025-05-23 at 22 30 49" src="https://github.com/user-attachments/assets/762fbc75-bf1e-44e7-82d7-33b8d4ea6cad" />
Figura 3 – Pagina magazinului (Shop) cu filtrare
Pagina „Shop” oferă posibilitatea de filtrare a produselor după preț și categorie, fiind implementată cu funcționalități WooCommerce standard.

<img width="1710" alt="Screenshot 2025-05-23 at 22 32 18" src="https://github.com/user-attachments/assets/528331ff-eb16-4804-ac70-7cd6974c032c" />
Figura 4 – Pagina de contact cu integrarea Google Maps
În această pagină este afișată harta interactivă cu locațiile marcate, folosind Google Maps JavaScript API și un plugin WordPress dedicat.

<img width="1710" alt="Screenshot 2025-05-23 at 22 33 47" src="https://github.com/user-attachments/assets/c2665505-0828-49d3-9b26-226425799065" />
Figura 5 – Secțiunea „My Account” după autentificare
După login, utilizatorul are acces la zona personală unde poate vizualiza comenzile, gestiona adresele, modifica parola sau descărca produse.

Capturile prezentate demonstrează funcționalitatea completă a aplicației, atât din punct de vedere al interacțiunii utilizatorului cât și al integrării cu servicii externe prin API.

#referinte

- Firebase Authentication – Documentație oficială:
https://firebase.google.com/docs/auth
- Configurare OTP Authentication în Firebase:
https://firebase.google.com/docs/auth/web/phone-auth
- WordPress – Site oficial și documentație:
https://wordpress.org/support/
- WP Go Maps (fost WP Google Maps) – Plugin pentru integrarea hărților:
https://www.wpgmaps.com/
- Maps JavaScript API – Documentație oficială:
https://developers.google.com/maps/documentation/javascript/overview
- OTP Login/Signup for WooCommerce – Plugin pentru login cu număr de telefon:
https://wordpress.org/plugins/otp-login/
- Burp Suite – Instrument de testare pentru interceptare requesturi:
https://portswigger.net/burp/documentation





