<?php
   namespace X\App\Controllers;
   use X\Sys\Controller;

   //aquesta clase es per la pagina home. Herencia de controller
   class Home extends Controller{
   		protected $model;
   		protected $view;
   		protected $params;
         public function __construct($params){
            parent::__construct($params);
            $this->dataView=array(
               'title'=>'Home');
            //agafa el contingut del model i vista
            $this->model=new \X\App\Models\mHome();
            $this->view =new \X\App\Views\vHome($this->dataView);
            var_dump($this->view);
         }
         //per a la creacio
   		function home(){
   			echo 'HOME!!';
   		}
   }