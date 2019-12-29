<?php

//Déclaration de fichier et de librairie que le fichier va appeller
require_once "config/init.conf.php";
require_once "config/bdd.conf.php";
require_once "config/connexion.conf.php";
require_once "vendor/smarty/Smarty.class.php";

/* @var $bdd PDO */

//Si le formulaire a été rempli et envoyé alors les lignes suivantes s'execute 
if (isset($_POST['bouton'])) {

    //Création variables
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    //Requête préparé pour inséré les données du formulaire dans la BDD
    $sth = $bdd->prepare("SELECT * "
            . "FROM utilisateurs "
            . "WHERE email = :email AND mdp = :mdp");

    //Attribue les différentes valeurs
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->bindValue(':mdp', $mdp, PDO::PARAM_STR);

    $sth->execute();

    //Vérification de la connexion
    if ($sth->rowCount() > 0) {
        //La connexion est OK
        $donnees = $sth->fetch(PDO::FETCH_ASSOC);
        //print_r2($donnees);
        $sid = $donnees['email'] . time();
        $sid_hache = md5($sid);
        //echo $sid_hache;
        //Configuration du cookie de connexion
        setcookie('sid', $sid_hache, time() + 3600);

        //Requête pour mettre à jour le SID de l'utilisateur pour la connexion
        $sth_update = $bdd->prepare("UPDATE utilisateurs "
                . "SET sid = :sid "
                . "WHERE id = :id");

        $sth_update->bindValue(':sid', $sid_hache, PDO::PARAM_STR);
        $sth_update->bindValue(':id', $donnees['id'], PDO::PARAM_INT);

        $result_connexion = $sth_update->execute();

        //Notification
        if ($result_connexion == TRUE) {
            $_SESSION['notifications']['result'] = 'success';
            $_SESSION['notifications']['message'] = "La connexion est établie";
        } else {
            $_SESSION['notifications']['result'] = 'danger';
            $_SESSION['notifications']['message'] = "Une erreur est survenue lors du traitement des informations";
        }

        //Redirection vers page d'acceuil 
        header("Location: index.php");
        exit();
    } else {
        //La connexion est refusée
        //Notification
        $_SESSION['notifications']['result'] = 'danger';
        $_SESSION['notifications']['message'] = "Le mot de passe/login est faux";

        //Redirection vers page d'acceuil 
        header("Location: index.php");
    }
} else {

    /* DEBUT SMARTY */
    $smarty = new Smarty();

    //Déclaration des répertoires
    $smarty->setTemplateDir('templates/');
    $smarty->setCompileDir('templates_c/');

    //** un-comment the following line to show the debug console
    //$smarty->debugging = true;
    //Inclu le header et le menu dans la page
    include_once "includes/header.inc.php";
    include_once "includes/menu.inc.php";

    /* Appeler le ficher connexion.tpl */
    $smarty->display('connexion.tpl');

    //Inclu le footer dans la page
    include_once "includes/footer.inc.php";
}
