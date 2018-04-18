<?php
/**
 * @name index.php
 * @category Dispatcher
 * @author web-Projet.com (jean-luc.aubert@web-projet.com)
 * @version 1.0
 **/
use App\appLoader as app;

if(file_exists("App/appLoader.class.php"))
	require_once("App/appLoader.class.php");
else
	die("Impossible de charger la classe : App/appLoader.class.php");

$app = new app(dirname(__FILE__));
?>