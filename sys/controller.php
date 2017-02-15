<?php
	namespace X\Sys;

	/**
	*
	*	Controller: La base del MVC.
	*
	*
	**/

	class Controller{
		protected $model;
		protected $view;
		protected $params;
		protected $dataView;
		protected $conf;
		function __construct($params,$dataView=null){
			$this->dataView=$dataView;
			$this->params=$params;
			//comproba si esta creat sino, la crea
			$this->conf=Registry::getInstance();
		}
		function ajax($output){
			ob_clean();
			if(is_array($output)){
				echo json_encode($output);
			}
		}

	}
	}