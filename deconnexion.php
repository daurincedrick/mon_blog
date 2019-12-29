<?php

//Configuration du cookie pour la déconnexion
setcookie('sid', '', -1);

/* if($connecte == FALSE){
  $_SESSION['notifications']['result'] = 'success';
  $_SESSION['notifications']['message'] = "Bien joué fréro, la déconnexion est réussite";
  }
 */

//Redirection vers l'index
header("Location: index.php");
exit();




//page courante - 1 * nb d'article par page