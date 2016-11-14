<?php
	//Incluir archivos de cualquier S.O
	define("DS", DIRECTORY_SEPARATOR);
	define("ROOT", realpath(dirname(__FILE__)).DS);
	define("APP_PATH", ROOT."aplication".DS);

	/*echo DS;
	echo "<br>";
	echo ROOT;
	echo "<br>";
	echo APP_PATH;*/

	require_once(APP_PATH."config.php");
    require_once(APP_PATH."autoload.php");
	require_once(APP_PATH."database.php");
	require_once(APP_PATH."request.php");
	require_once(APP_PATH."bootstrap.php");
	require_once(APP_PATH."controller.php");
	require_once(APP_PATH."model.php");
require_once(APP_PATH."Helper.php");
	require_once(APP_PATH."view.php");

  try{
    Bootstrap::run (new request);
  }catch (Exception $e){
    echo $e->getMessage();
  }

	//Forma para incluir archivos
/*	echo "<pre>";
	print_r(get_required_files());*/
/*
	$r = new request();
  echo $r->getController();
  echo "<br>";
  echo $r->getMethod();
  echo "<br>";
  print_r($r->getArgs());
  exit;
*/

/*

  */

?>
