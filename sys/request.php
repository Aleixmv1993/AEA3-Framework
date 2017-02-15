<?php

	namespace X\Sys;
	// sempre en mayus el namespace

	/**
	*
	*	Request: translate URL
	*	to controller, action
	*	and parameters
	*   @author: Aleix <aleixmalaret@gmail.com>
	*	@package: sys
	**/

	class Request{
		static private $query=array();
		//el que realitza aquesta funcio es saber a on som accedim amb el contingut de la barra d'exploracio.
		static function exploding(){
			//explode es una funcio propia de php que corverteix un string en un array
			$array_query=explode('/',$_SERVER['REQUEST_URI']);
			//
			array_shift($array_query);//treu el que estigui buit de la esquerra
			if(end($array_query)==""){
				array_pop($array_query);// Tot el contrari de Shift
			}
			//si es base no fem res, pero sino
			//fem array_shift una altre vegada

			$dir=dirname($_SERVER['PHP_SELF']);

			if($dir=='/'.$array_query[0]){
				array_shift($array_query);
			}

			self::$query=$array_query;
			// desde dentro para acceder a un static es con el self, desde fuera la clase.
			
		}
		//agafem la variable del array
		static function getVariable(){
			return array_shift(self::$query);
		}
		//Serverix per agafar la parella de parametres i acabarlos afegint en un array asosiatiu que es el que combinem i retornem
		static function getParams(){
			if(count(self::$query)>0){
				if((count(self::$query)%2)==0)
				{
					for($i=0;$i<count(self::$query);$i++){
						if(($i%2)==0){
							$key[]=self::$query[$i];
						}else{
							$value[]=self::$query[$i];
						}
					}
					$result=array_combine($key, $value);
					return $result;
				}
			}
		}

	}