# site-wordpress, Danila Theodora, 1132 SIMPRE


# link video:

# link publicare:

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

<img width="1325" alt="Screenshot 2025-05-22 at 20 55 21" src="https://github.com/user-attachments/assets/8fce7cbb-6ae2-4249-9788-4a3870052915" />
<img width="696" alt="Screenshot 2025-05-22 at 20 55 42" src="https://github.com/user-attachments/assets/7f47cb46-72cf-49c7-8455-0af24f7710e9" />
<img width="1327" alt="Screenshot 2025-05-22 at 20 56 53" src="https://github.com/user-attachments/assets/4eecc0fd-86ee-4f5d-a28c-9a183243f519" />
<img width="1327" alt="Screenshot 2025-05-22 at 20 58 09" src="https://github.com/user-attachments/assets/7f841069-0f43-42c6-8ff6-19d4cbd96914" />
<img width="1327" alt="Screenshot 2025-05-22 at 20 58 59" src="https://github.com/user-attachments/assets/cc92c04c-22b5-4520-9a73-23dddb669973" />
<img width="1327" alt="Screenshot 2025-05-22 at 20 59 33" src="https://github.com/user-attachments/assets/b0193e20-1978-40e6-9ce1-97cf8ce844db" />
<img width="1327" alt="Screenshot 2025-05-22 at 21 01 41" src="https://github.com/user-attachments/assets/341356d8-c421-4a2a-bae5-25fe5058ffb7" />
<img width="701" alt="Screenshot 2025-05-22 at 21 02 10" src="https://github.com/user-attachments/assets/a44cf4a1-5f7f-451b-b6a1-5a77442c06f7" />
<img width="1317" alt="Screenshot 2025-05-22 at 21 03 41" src="https://github.com/user-attachments/assets/b1033d85-cdac-4a8c-966b-650ac21db2fb" />
<img width="1317" alt="Screenshot 2025-05-22 at 21 09 20" src="https://github.com/user-attachments/assets/8a9680be-0f65-4c52-a2a7-7266691bd40e" />
<img width="1317" alt="Screenshot 2025-05-22 at 21 09 26" src="https://github.com/user-attachments/assets/def3dd7b-1bc1-4fe8-9596-e2c6d6ad0f93" />




 ## metode http

 
 ## autentificare si autorizare servicii utilizate

# capturi de ecran aplicatie






