<?php

//Déclaration de fichier et de librairie que le fichier va appeller
require_once "config/init.conf.php";
require_once "config/bdd.conf.php";
require_once "config/connexion.conf.php";
require_once "includes/function.inc.php";
require_once "vendor/smarty/Smarty.class.php";

//print_r2($_POST);
//print_r2($_SESSION);

/* @var $bdd PDO */
//print_r2($_GET);
//Initialisation de la variable
$nb_result = NULL;

//Si la varible n'est pas vide alors les lignes suivante s'execute
if (!empty($_GET['recherche'])) {


    //Variable pour la page courante, si le numéro de page est vide alors c'est le 1
    $page_courante = !empty($_GET['p']) ? $_GET['p'] : 1;
    //Variable calculant nombre de page par rapport au nombre d'article affiché par page
    $index = pagination($page_courante, _nb_art_par_page);

    //Requête préparé pour la recherche 
    $sth = $bdd->prepare("SELECT id, "
            . "titre, "
            . "texte, "
            //Alias date_fr + forme de la date
            . "DATE_FORMAT(date, '%d/%m/%Y') AS date_fr, "
            . "publie "
            . "FROM articles "
            . "WHERE publie = :publie "
            . "AND (titre LIKE :recherche OR texte LIKE :recherche) "
            //Limite d'article récupéré par page
            . "LIMIT :index, :nb_art_par_page");

    //Attribue les valeurs
    $sth->bindValue(':publie', 1, PDO::PARAM_BOOL);
    $sth->bindValue(':index', $index, PDO::PARAM_INT);
    $sth->bindValue(':recherche', '%' . $_GET['recherche'] . '%', PDO::PARAM_STR);
    $sth->bindValue(':nb_art_par_page', _nb_art_par_page, PDO::PARAM_INT);
    $sth->execute();

    $nb_result = $sth->rowCount();
    //print_r2($nb_result);
    //Si il y a des résultats alors on créé la variable tab_article 
    if ($nb_result > 0) {

        $tab_articles = $sth->fetchAll(PDO::FETCH_ASSOC);
    }


    //PAGINATION
    //Requête pour calculer le nombre total du résultat de la recherche
    $req_total_art_recherche = $bdd->prepare("SELECT COUNT(*) as total_articles_recherche "
            . "FROM articles "
            . "WHERE publie = :publie "
            . "AND (titre LIKE :recherche OR texte LIKE :recherche)");

    //Attribue les valeurs
    $req_total_art_recherche->bindValue(':publie', 1, PDO::PARAM_BOOL);
    $req_total_art_recherche->bindValue(':index', $index, PDO::PARAM_INT);
    $req_total_art_recherche->bindValue(':recherche', '%' . $_GET['recherche'] . '%', PDO::PARAM_STR);
    $req_total_art_recherche->execute();

    $result = $req_total_art_recherche->fetch(PDO::FETCH_ASSOC);

    $total_articles_recherche = $result['total_articles_recherche'];

    //Le nombre de résultat de la recherche devient le nombre d'articles totals 
    $nb_total_articles = $total_articles_recherche;
    //Variable stockant le nombre total de pages
    $nb_total_pages = ceil($nb_total_articles / _nb_art_par_page);
}

/* DEBUT SMARTY */
$smarty = new Smarty();

//Déclaration des répertoires
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');

//Inclu le header et le menu dans la page
include_once "includes/header.inc.php";
include_once "includes/menu.inc.php";

/* Transmission des variables au template */
$smarty->assign('connecte', $connecte);
$smarty->assign('nb_result', $nb_result);

//Transmet les variables au template si il y a une recherche
if (!empty($_GET['recherche'])) {
    $smarty->assign('var_recherche', $_GET['recherche']);
    //Transmet les variables au template si la recherche a au moins un résultat
    if (!empty($tab_articles)) {
        $smarty->assign('tab_articles', $tab_articles);
    }
    $smarty->assign('nb_total_pages', $nb_total_pages);
}

//** un-comment the following line to show the debug console
//$smarty->debugging = true;

/* Appeler le ficher index.tpl */
$smarty->display('search.tpl');
include_once "includes/footer.inc.php";
