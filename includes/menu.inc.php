<?php

//Déclaration de la librairie Smarty
require_once "vendor/smarty/Smarty.class.php";

/* DEBUT SMARTY */
$smarty = new Smarty();

//Déclaration des répertoires
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');

/* Transmission des variables au template */
$smarty->assign('connecte', $connecte);

//** un-comment the following line to show the debug console
//$smarty->debugging = true;

/* Appeler le ficher menu.inc.tpl */
$smarty->display('includes/menu.inc.tpl');
