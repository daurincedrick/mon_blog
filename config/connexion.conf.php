<?php

//Initialisation de la variable connecte
$connecte = FALSE;

//Vérifie si le cookie de connexion correcpond avec le SID dans la bdd
if (isset($_COOKIE['sid'])) {
    $sid = $_COOKIE['sid'];
    $sth_connexion = $bdd->prepare("SELECT * "
            . "FROM utilisateurs "
            . "WHERE sid = :sid");
    $sth_connexion->bindValue(':sid', $sid, PDO::PARAM_STR);
    $sth_connexion->execute();

    //Si oui, la connexion est établie
    if ($sth_connexion->rowCount() > 0) {
        $connecte = TRUE;
    }
}