<?php

//serveix per a definir el nameespace del site
	namespace X;
	//necesita el autoload per a poder treballar, aquest es un modul descarregat de internet.
	require_once __DIR__.'/sys/autoload.php';
	/**
	* definicio de variables per a poder accedir a elles desde cualsevol lloc del sistema,
	* per exemple al fer servir DS donara igual si es una / o \
	**/
	define('DS',DIRECTORY_SEPARATOR);
	define('ROOT',realpath(__DIR__).DS);
	// to acces to filesystem
	define('APP',ROOT.'app'.DS);