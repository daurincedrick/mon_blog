<?php

//démmarage de la session pour la conserver dans chaque page
session_start();
//Affichage des erreurs et avertissements PHP
error_reporting(E_ALL);
ini_set("display_errors", 1);

//fonction print_r2 qui organise tableau grace à prev
function print_r2($ma_variable) {
    echo '<pre>';
    print_r($ma_variable);
    echo '</pre>';

    return true;
}

//Déclaration du fuseau horraire
date_default_timezone_get('Europe/Paris');

//Déclaration de la constante _nb_art_par_page
define('_nb_art_par_page', 2);
