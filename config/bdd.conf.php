<?php

//Connexion à la base de données
try {
    $bdd = new PDO('mysql:host=localhost;dbname=mon_blog_bdd;charset=utf8', 'root', '');
    $bdd->exec("set names utf8");
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //Affichage des messages d'erreurs
} catch (Exception $ex) {
    die('Erreur : ' . $e->getMessage());
}
