<?php

//Déclaration de fichier et de librairie que le fichier va appeller
require_once "config/init.conf.php";
require_once "config/bdd.conf.php";
require_once "config/connexion.conf.php";
require_once "vendor/smarty/Smarty.class.php";

/* @var $bdd PDO */
if (isset($_POST['bouton'])) {

    //Création variables
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    //Requête préparé pour inséré les données du formulaire dans la BDD
    $sth = $bdd->prepare("INSERT INTO utilisateurs "
            . "(nom, prenom, email, mdp) "
            . "VALUES (:nom, :prenom, :email, :mdp)");

    $sth->bindValue(':nom', $nom, PDO::PARAM_STR);
    $sth->bindValue(':prenom', $prenom, PDO::PARAM_STR);
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->bindValue(':mdp', $mdp, PDO::PARAM_STR);

    $result_insert_utilisateurs = $sth->execute();

    $id_insert = $bdd->lastInsertId();

    //Notification
    if ($result_insert_utilisateurs == TRUE) {
        $_SESSION['notifications']['result'] = 'success';
        $_SESSION['notifications']['message'] = "Bien joué fréro, t'as réussi à rajouter le bail";
    } else {
        $_SESSION['notifications']['result'] = 'danger';
        $_SESSION['notifications']['message'] = "Wesh j'crois il y a un problème là";
    }

    //Redirection vers page d'acceuil 
    header("Location: index.php");
} else {

    /* DEBUT SMARTY */
    $smarty = new Smarty();

    $smarty->setTemplateDir('templates/');
    $smarty->setCompileDir('templates_c/');

    //** un-comment the following line to show the debug console
    //$smarty->debugging = true;

    //Inclu le header et le menu dans la page
    include_once "includes/header.inc.php";
    include_once "includes/menu.inc.php";
    
    /* Appeler le ficher utilisateur.tpl */
    $smarty->display('utilisateurs.tpl');
    
    //Inclu le footer dans la page
    include_once "includes/footer.inc.php";
}
