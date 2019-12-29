<?php

//Déclaration de fichier et de librairie que le fichier va appeller
require_once "config/init.conf.php";
require_once "config/bdd.conf.php";
require_once "config/connexion.conf.php";
require_once "vendor/smarty/Smarty.class.php";

/* @var $bdd PDO */

//Condition ternaire pour initialiser la variable affiche_modif 
$affiche_modif = isset($_GET['p']) ? 1 : 0;

//Requête pour afficher l'article à modifier si la variable affiche_modif est égal à 1
if ($affiche_modif == 1) {
    //Requête préparé pour sélectionner les données dans la BDD
    $select_modif = $bdd->prepare("SELECT id, "
            . "titre, "
            . "texte, "
            //Alias date_fr + forme de la date
            . "DATE_FORMAT(date, '%d,%m,%Y') AS date_fr, "
            . "publie "
            . "FROM articles "
            . "WHERE id = :id ");

    //Attribue les différentes valeurs
    $select_modif->bindValue(':id', $_GET['p'], PDO::PARAM_INT);
    $select_modif->execute();

    $tab_articles = $select_modif->fetchAll(PDO::FETCH_ASSOC);
}

//Si le formulaire a été rempli et envoyé alors les lignes suivantes s'execute 
if (isset($_POST['bouton'])) {

    //Création variables
    $titre = $_POST['titre'];
    $texte = $_POST['texte'];
    //Condition ternaire "?"=alors ":"=sinon
    $publie = isset($_POST['publie']) ? 1 : 0;
    //Fonction pour la date
    $date = date('Y-m-d');

    //Modification si la variable id_cache est paramétrée
    if (isset($_POST['id_cache'])) {
        $id_cache = $_POST['id_cache'];

        //Requête pour modifier l'article
        $update_ligne = $bdd->prepare("UPDATE articles "
                . "SET titre = :titre, "
                . "texte = :texte, "
                . "publie = :publie "
                . "WHERE id = :id");

        //Attribue les différentes valeurs
        $update_ligne->bindValue(':titre', $titre, PDO::PARAM_STR);
        $update_ligne->bindValue(':texte', $texte, PDO::PARAM_STR);
        $update_ligne->bindValue(':publie', $publie, PDO::PARAM_INT);
        $update_ligne->bindValue(':id', $id_cache, PDO::PARAM_INT);

        $result_update_ligne = $update_ligne->execute();

        //Notification pour la modification
        if ($result_update_ligne == TRUE) {
            $_SESSION['notifications']['result'] = 'success';
            $_SESSION['notifications']['message'] = "L'article a bien été modifié";
        } else {
            $_SESSION['notifications']['result'] = 'danger';
            $_SESSION['notifications']['message'] = "Il y a eu un problème dans la modification de l'article";
        }
    } else {

        //Requête préparé pour inséré les données du formulaire dans la BDD
        $sth = $bdd->prepare("INSERT INTO articles "
                . "(titre, texte, publie, date) "
                . "VALUES (:titre, :texte, :publie, :date)");

        //Attribue les différentes valeurs
        $sth->bindValue(':titre', $titre, PDO::PARAM_STR);
        $sth->bindValue(':texte', $texte, PDO::PARAM_STR);
        $sth->bindValue(':publie', $publie, PDO::PARAM_INT);
        $sth->bindValue(':date', $date, PDO::PARAM_STR);

        $result_insert_article = $sth->execute();

        $id_insert = $bdd->lastInsertId();

        //Traitement de l'image
        if ($_FILES ['img']['error'] == 0) {
            //Récupère extension
            $ext = pathinfo($_FILES ['img']['name'], PATHINFO_EXTENSION);
            //Déplacement d'image
            move_uploaded_file($_FILES ['img']['tmp_name'], 'img/' . $id_insert . '.jpg');
        }

        //Notification pour l'ajout
        if ($result_insert_article == TRUE) {
            $_SESSION['notifications']['result'] = 'success';
            $_SESSION['notifications']['message'] = "L'article a bien été ajouté";
        } else {
            $_SESSION['notifications']['result'] = 'danger';
            $_SESSION['notifications']['message'] = "Il y a eu un problème dans l'ajout de l'article";
        }
    }

    //Redirection vers page d'acceuil 
    header("Location: index.php");
} else {

    /* DEBUT SMARTY */
    $smarty = new Smarty();

    //Déclaration des répertoires
    $smarty->setTemplateDir('templates/');
    $smarty->setCompileDir('templates_c/');

    //Inclu le header et le menu dans la page
    include_once "includes/header.inc.php";
    include_once "includes/menu.inc.php";

    /* Transmission des variables au template */
    $smarty->assign('affiche_modif', $affiche_modif);
    //Transmet les variables au template si $affiche_modif est équivalent à 1
    if ($affiche_modif == 1) {
        $smarty->assign('tab_articles', $tab_articles);
    }

    //** un-comment the following line to show the debug console
    //$smarty->debugging = true;

    /* Appeler le ficher articles.tpl */
    $smarty->display('articles.tpl');

    //Inclu le footer dans la page
    include_once "includes/footer.inc.php";
}