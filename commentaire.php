<?php

//Déclaration de fichier et de librairie que le fichier va appeller
require_once "config/init.conf.php";
require_once "config/bdd.conf.php";
require_once "config/connexion.conf.php";
require_once "vendor/smarty/Smarty.class.php";

/* @var $bdd PDO */

//Condition ternaire pour initialiser la variable $var_id_article
$var_id_article = isset($_GET['p']) ? 1 : 0;

//Requête pour afficher l'article à commenter si la variable $var_id_article est égal à 1
if ($var_id_article == 1) {
    //Requête préparé pour sélectionner les données de l'article dans la BDD
    $select_article = $bdd->prepare("SELECT id, "
            . "titre, "
            . "texte, "
            //Alias date_fr + forme de la date
            . "DATE_FORMAT(date, '%d/%m/%Y') AS date_fr, "
            . "publie "
            . "FROM articles "
            . "WHERE id = :id");

    //Attribue les différentes valeurs
    $select_article->bindValue(':id', $_GET['p'], PDO::PARAM_INT);
    $select_article->execute();

    $tab_articles = $select_article->fetchAll(PDO::FETCH_ASSOC);


    //Requête préparé pour sélectionner les commentaires de l'article dans la BDD
    $select_commentaires = $bdd->prepare("SELECT id_comm, "
            . "pseudo, "
            . "email_comm, "
            . "texte_comm "
            . "FROM articles "
            . "LEFT JOIN commentaires "
            . "ON articles.id = commentaires.id_article "
            . "WHERE id = :id ");

    //Attribue les différentes valeurs
    $select_commentaires->bindValue(':id', $_GET['p'], PDO::PARAM_INT);
    $select_commentaires->execute();

    $tab_commentaires = $select_commentaires->fetchAll(PDO::FETCH_ASSOC);
}

//Si le formulaire a été rempli et envoyé alors les lignes suivantes s'execute 
if (isset($_POST['bouton'])) {
    //Création variables
    $pseudo = $_POST['pseudo'];
    $email_comm = $_POST['email_comm'];
    $texte_comm = $_POST['texte_comm'];
    $id_cache = $_POST['id_cache'];

    //Requête préparé pour inséré les données du formulaire dans la BDD
    $sth = $bdd->prepare("INSERT INTO commentaires "
            . "(pseudo, email_comm, texte_comm, id_article) "
            . "VALUES (:pseudo, :email_comm, :texte_comm, :id_article)");

    //Attribue les différentes valeurs
    $sth->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $sth->bindValue(':email_comm', $email_comm, PDO::PARAM_STR);
    $sth->bindValue(':texte_comm', $texte_comm, PDO::PARAM_STR);
    $sth->bindValue(':id_article', $id_cache, PDO::PARAM_INT);

    $result_insert_commentaire = $sth->execute();

    //Notification pour l'ajout du commentaire
    if ($result_insert_commentaire == TRUE) {
        $_SESSION['notifications']['result'] = 'success';
        $_SESSION['notifications']['message'] = "Le commentaire a bien été ajouté";
    } else {
        $_SESSION['notifications']['result'] = 'danger';
        $_SESSION['notifications']['message'] = "Il y a eu un problème dans l'ajout du commentaire";
    }

    //Redirection vers page d'acceuil 
    header("Location: index.php");
}


/* DEBUT SMARTY */
$smarty = new Smarty();

//Déclaration des répertoires
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');

//Inclu le header et le menu dans la page
include_once "includes/header.inc.php";
include_once "includes/menu.inc.php";

//Transmet les variables au template si $var_id_article est équivalent à 1
if ($var_id_article == 1) {
    $smarty->assign('tab_articles', $tab_articles);
    $smarty->assign('tab_commentaires', $tab_commentaires);
}

//** un-comment the following line to show the debug console
//$smarty->debugging = true;

/* Appeler le ficher commentaire.tpl */
$smarty->display('commentaire.tpl');

//Inclu le footer dans la page
include_once "includes/footer.inc.php";
