<?php

//Déclaration de fichier et de librairie que le fichier va appeller
require_once "config/init.conf.php";
require_once "config/bdd.conf.php";
require_once "config/connexion.conf.php";
require_once "includes/function.inc.php";
require_once "vendor/smarty/Smarty.class.php";

/* @var $bdd PDO */


//Variable pour la page courante, si le numéro de page est vide alors c'est le 1
$page_courante = !empty($_GET['p']) ? $_GET['p'] : 1;
//Varible du nombre total d'article
$nb_total_articles = nb_total_article($bdd);
//Variable stockant le nombre total de pages
$nb_total_pages = ceil($nb_total_articles / _nb_art_par_page);
//Variable calculant nombre de page par rapport au nombre d'article affiché par page
$index = pagination($page_courante, _nb_art_par_page);

//Préparation de la requête 
$sth = $bdd->prepare("SELECT id, "
        . "titre, "
        . "texte, "
        //Alias date_fr + forme de la date
        . "DATE_FORMAT(date, '%d/%m/%Y') AS date_fr, "
        . "publie "
        . "FROM articles "
        . "WHERE publie = :publie "
        //Limite d'article récupéré par page
        . "LIMIT :index, :nb_art_par_page");

//Attribue une valeur à :publie 
$sth->bindValue(':publie', 1, PDO::PARAM_BOOL);
$sth->bindValue(':index', $index, PDO::PARAM_INT);
$sth->bindValue(':nb_art_par_page', _nb_art_par_page, PDO::PARAM_INT);
$sth->execute();

$tab_articles = $sth->fetchAll(PDO::FETCH_ASSOC);

/* DEBUT SMARTY */
$smarty = new Smarty();

//Déclaration des répertoires
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');

//Inclu le header et le menu dans la page
include_once "includes/header.inc.php";
include_once "includes/menu.inc.php";

/* Transmission des variables au template */
$smarty->assign('tab_articles', $tab_articles);
$smarty->assign('nb_total_pages', $nb_total_pages);
$smarty->assign('connecte', $connecte);

//** un-comment the following line to show the debug console
//$smarty->debugging = true;

/* Appeler le ficher index.tpl */
$smarty->display('index.tpl');

//Inclu le footer dans la page
include_once "includes/footer.inc.php";

/* Supprime la session */
unset($_SESSION['notifications']);


