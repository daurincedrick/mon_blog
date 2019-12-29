<?php

//Fonction pour la pagination
function pagination($page_courante, $nb_articles_par_page) {
    $index = ($page_courante - 1) * $nb_articles_par_page;
    return $index;
}

//Fonction pour calculer le nombre total d'article
function nb_total_article($bdd) {
    //Requête préparée contant le nombre d'article dans la bdd
    $sth = $bdd->prepare("SELECT COUNT(*) as total_articles "
            . "FROM articles "
            . "WHERE publie = :publie");
    $sth->bindValue('publie', 1, PDO::PARAM_BOOL);
    $sth->execute();

    $result = $sth->fetch(PDO::FETCH_ASSOC);

    $total_articles = $result['total_articles'];

    //Résultat dans la variable total_articles sera retourné
    return $total_articles;
}
