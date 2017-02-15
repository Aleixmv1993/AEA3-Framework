<?php
	namespace X\Sys;
	/**
	*
	* @author: Aleix
	* @package: sys
	*
	**/

	use X\Sys\Request;

	class Core{
		static private $controller;
		static private $action;
		static private $params;

		public static function init(){
			Request::exploding();
			//$arrayquery preparat per extreure el controlador 

			self::$controller= Request::getVariable();
			
			self::$action= Request::getVariable();

			self::$params=Request::getParams();
			

			//fer routing
			self::router();
		}

		static function router(){
			//si no hi ha controller es busca el 'home'
			//()? condicion() del if va despues i el else es despres dels :
			self::$controller=(self::$controller!="")?self::$controller:'home';
			self::$action=(self::$action!="")?self::$action:'home';
			//trobar controladors
			//filename(nom del fitxer)
			$filename=strtolower(self::$controller).'.php';
			//APP ha estat definida amb un define al arxiu x.inc.php
			$fileroute=APP.'controllers'.DS.$filename;
			
			if(is_readable($fileroute)){
				//espai de noms
				$contr_class='\X\App\Controllers\\'.ucfirst(self::$controller);
				self::$controller=new $contr_class(self::$params);
				//cal cridar ara l'accio, pero es te que veure  si l'accio existeix amb el is_calable sino retornem un missatge de error de que la pagina no es troba, o tambe podem retorna diractament una pagina propia de error
				if(is_callable(array(self::$controller,self::$action))){
					call_user_func(array(self::$controller,self::$action));
				}else{
					echo self::$action.": Metode inexistent";
				}
			}else{
				echo self::$controller.": Controlador inexistent";
			}

		}
	}