<?php

class Xoo_Ml_Service_Custom extends Xoo_Ml_Service{

	public $apiparams, $url, $method, $format, $authType, $authInfo;

	public function __construct(){

		$this->id 			= 'custom';
		$this->url 			= xoo_ml_helper()->get_service_option('cus-url');
		$this->method 		= xoo_ml_helper()->get_service_option('cus-method');
		$this->format 		= xoo_ml_helper()->get_service_option('cus-format');
		$urlParams 			= wp_parse_args(html_entity_decode( xoo_ml_helper()->get_service_option('cus-params') ));
		$jsonData 			= json_decode( html_entity_decode( xoo_ml_helper()->get_service_option('cus-json') ), true );
		$this->apiparams 	= $this->format === 'json' ? $jsonData : $urlParams;
		$this->authType 	= xoo_ml_helper()->get_service_option('cus-auth-type');
		$this->authInfo 	= xoo_ml_helper()->get_service_option('cus-auth-info');
	}

	public function sendSMS( $phone, $message ){

		$validate = $this->validate( array( $this->url ) );

		if( is_wp_error( $validate ) ){
			return $validate;
		}

		$placeholders = array(
			'[phone_number]' 	=> $phone,
			'[message]' 		=> $message
		);

		$apiparams = json_encode( $this->apiparams );

		foreach ( $placeholders as $key => $value ) {
			$apiparams = str_replace( $key , $value, $apiparams );
		}

		$apiparams = json_decode( $apiparams, true );

		if( isset( $apiparams['username'] ) ){
			$this->username = $apiparams['username'];
		}

		if( isset( $apiparams['password'] ) ){
			$this->password = $apiparams['password'];
		}


		//Set authorization
		if( $this->authInfo && $this->authType !== 'none' ){
			if( $this->authType === 'bearer' ){
				$this->authToken = $this->authInfo;
			}
			elseif ( $this->authType === 'basic' ) {
				$authUsernamePass 	= explode(':', $this->authInfo );
				$this->username 	= $authUsernamePass[0];
				$this->password 	= isset( $authUsernamePass[1] ) ? $authUsernamePass[1] : '';
			}
		}

	

		//HTTP POST
		$args = array(	
			'method' 	=> $this->method,
	 		'body' 		=> $apiparams
	    );


	    if( $this->format === 'json' ){
			$args['headers']['Content-Type'] = 'application/json';
			$args['body'] = json_encode( $args['body'] );
	    }

		return $this->http_request( $args );

	}

}

return new Xoo_Ml_Service_Custom();

?>