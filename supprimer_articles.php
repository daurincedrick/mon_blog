<?php

//Déclaration de fichier et de librairie que le fichier va appeller
require_once "config/init.conf.php";
require_once "config/bdd.conf.php";
require_once "config/connexion.conf.php";
require_once "vendor/smarty/Smarty.class.php";

/* @var $bdd PDO */

//Condition ternaire pour initialiser la variable $var_id_article 
$var_id_article = isset($_GET['p']) ? 1 : 0;

//Requête pour supprimer l'article si la variable $var_id_article est égal à 1
if ($var_id_article == 1) {
    //Requête préparé pour supprimer les données dans la BDD
    $delete_article = $bdd->prepare("DELETE articles, "
            . "commentaires "
            . "FROM articles "
            . "LEFT JOIN commentaires "
            . "ON articles.id = commentaires.id_article "
            . "WHERE articles.id = :id ");

    //Attribue les différentes valeurs
    $delete_article->bindValue(':id', $_GET['p'], PDO::PARAM_INT);
    $delete_article->execute();

    //Notification pour la suppression
    if ($delete_article == TRUE) {
        $_SESSION['notifications']['result'] = 'success';
        $_SESSION['notifications']['message'] = "L'article a bien été supprimé";
    } else {
        $_SESSION['notifications']['result'] = 'danger';
        $_SESSION['notifications']['message'] = "Il y a eu un problème dans la suppréssion de l'article";
    }

    //Redirection vers page d'acceuil 
    header("Location: index.php");
} else {
    //Redirection vers page d'acceuil 
    header("Location: index.php");
}
    