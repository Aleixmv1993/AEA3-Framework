<?php 
namespace X\Sys;

	/**
	* 
	*/

	class Registry
	{
		private $data=array();
		static $instance;
			 	 // singleton instance
	 	 public static function getInstance(){
	 	 	// there is no instance?
	 	 	if (!(self::$instance instanceof self)){
	 	 		self::$instance=new self();
	 	 		return self::$instance;
	 	 	}else{
	 	 		return self::$instance;
	 	 	}
	 	 }
		//constructor del Registry
		function __construct()
		{	
			$this->data=array();
		}

		function __set($key,$value){
			//es comproba si existeix la clau, sino existeix s'afegeix
			if(!array_key_exists($key, $this->data)){
				//afeig la nova clau amb el valor
				$this->data[$key]=$value;
			}
		}

		function __get($key){
			if(array_key_exists($key, $this->data)){
				return $this->data[$key];
			}else{
				return null;
			}
		}

		//si no hi ha cap valor agregat en el unset, borrara tot el contingut del array. Sino nomes borrara el valor seleccionat
		function __unset($key=null){
			if($key!=null){
			 	if(array_key_exists($key, $this->data)){
					unset($his->data[$key]);
				}
			}else{
				unset($this->data);
			}
	}
	//agafa la configuracio del arxiu json i la treu guardanla
	 function loadConf(){
	 	 	$file= APP.'config.json';
	 	 	$jsonStr=file_get_contents($file);
	 	 	
	 	 	$arrayJson=json_decode($jsonStr);
	 	 	foreach ($arrayJson as $key => $value) {
	 	 		$this->data[$key]=$value;
	 	 	}
	 	 	
	 	 }
}