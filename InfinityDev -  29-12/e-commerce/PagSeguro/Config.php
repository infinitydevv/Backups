<?php

	namespace PagSeguro;

	class Config{

		const SANDBOX = true;// True para testar, false para a conta normal

		const SANDBOX_EMAIL = "wesley@infinitydev.com.br";// Email usado no sandbox do PagSeguro para testes
		const PRODUCTION_EMAIL = "wesley@infinitydev.com.br";// Email usado no PagSeguro para para vendas autenticas

		const SANDBOX_TOKEN = "94A5F3DB743A4E65A4EB9E32830E0FED";// TOKEN usado no sandbox do PagSeguro para testes
		const PRODUCTION_TOKEN = "94A5F3DB743A4E65A4EB9E32830E0FED";// TOKEN usado no PagSeguro para para vendas autenticas

		const SANDBOX_SESSIONS = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions";
		const PRODUCTION_SESSIONS = "https://ws.pagseguro.uol.com.br/v2/sessions";

		const SANDBOX_URL_JS = "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js";
		const PRODUCTION_URL_JS = "https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js";

		const MAX_INSTALLMENT_NO_INTEREST = 6;
		const MAX_INSTALLMENT = 10;

		public static function getAuthentication():array{
			if(Config::SANDBOX === true){

				return array('email'=>Config::SANDBOX_EMAIL, 'token'=>Config::SANDBOX_TOKEN);

			}else{

				return array('email'=>Config::PRODUCTION_EMAIL, 'token'=>Config::PRODUCTION_TOKEN);

			}
		}

		public static function getUrlSessions():string{

			if(Config::SANDBOX === true){
				return Config::SANDBOX_SESSIONS;
			}else{
				return Config::PRODUCTION_SESSIONS;
			}

		}

		public static function getUrlJS(){

			if(Config::SANDBOX === true){
				return Config::SANDBOX_URL_JS;
			}else{
				return Config::PRODUCTION_URL_JS;
			}

		}

	}

?>