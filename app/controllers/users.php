<?php
   namespace X\App\Controllers;
   use X\Sys\Controller;
   
   class Users extends Controller{
   		protected $model;
   		protected $view;
   		protected $params;
   		public function __construct($params){
   			parent::__construct($params);
   			$this->model=new \X\App\Models\mUsers();
   			$this->view =new \X\App\Views\vUsers();
   		}
   		function home(){
   			echo 'HOME!!';
   		}
   }