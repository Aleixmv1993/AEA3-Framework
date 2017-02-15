
<?php
	// developer mode(comandos per mostrar els errors del framework)
	error_reporting(E_ALL);
	ini_set('display_errors',1);
	//config file
	//fem servir contingut de aquestes clases que es la que controllen el que es mostren.
	require_once 'x.inc.php';
	use \X\Sys\Autoload;
	use \X\Sys\Core;
	use \X\Sys\Registry;
	//creacio del autoload i de variables necesaries per a treballar amb les diferents clases.
	$loader=new Autoload();
	$loader->register();
	$loader->addNamespace('X\Sys','sys');
	$loader->addNamespace('X\App','app');
	$loader->addNamespace('X\App\Controllers','app/controllers');
	$loader->addNamespace('X\App\Models','app/models');
	$loader->addNamespace('X\App\Views','app/views');	

	//crear el registry.
	$config = new Registry();

	Core::init();

/*
	error_reporting(E_ALL);

	ini_set('display_errors', 1);

	//fitxer de configuracio
	require_once 'x.inc.php';
	
	use \X\Sys\Autoload;
	use \X\Sys\Core;

	$loader=new Autoload();
	$loader->register();

	//Registre de Namespace de ruta actual
	$loader->addNamespace('X\Sys', 'sys');

	Core::init();*/