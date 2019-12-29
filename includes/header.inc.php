<?php

//Déclaration de la librairie Smarty
require_once "vendor/smarty/Smarty.class.php";

/* DEBUT SMARTY */
$smarty = new Smarty();

//Déclaration des répertoires
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');

//** un-comment the following line to show the debug console
//$smarty->debugging = true;

/* Appeler le ficher header.inc.tpl */
$smarty->display('includes/header.inc.tpl');
