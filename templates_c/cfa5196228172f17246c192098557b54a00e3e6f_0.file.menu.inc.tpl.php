<?php
/* Smarty version 3.1.33, created on 2019-12-29 02:51:38
  from 'C:\wamp64\www\mon_blog\templates\includes\menu.inc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e0814ba119052_69120222',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cfa5196228172f17246c192098557b54a00e3e6f' => 
    array (
      0 => 'C:\\wamp64\\www\\mon_blog\\templates\\includes\\menu.inc.tpl',
      1 => 1577587895,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e0814ba119052_69120222 (Smarty_Internal_Template $_smarty_tpl) {
?><body>

    <!-- Navigation --> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">Mon Blog</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <!-- Acceuil --> 
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Acceuil
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <!-- Recherche --> 
                        <li class="nav-item active">
                            <a class="nav-link" href="search.php">Recherche</a>
                        </li>                        
                        <!-- Condition affiche options "Article" et "Deconnexion" dans le menu si l'utilisateur est connecté --> 
                        <?php if ($_smarty_tpl->tpl_vars['connecte']->value == TRUE) {?>
                            <!-- Articles --> 
                            <li class="nav-item">
                                <a class="nav-link" href="articles.php">Articles</a>
                            </li>
                            <!-- Deconnexion --> 
                            <li class="nav-item">
                                <a class="nav-link" href="deconnexion.php">Deconnexion</a>
                            </li>
                        <!-- Condition affiche options "Utilisateurs" et "Connexion" dans le menu si l'utilisateur n'est pas connecté --> 
                        <?php } else { ?>
                            <!-- Utilisateurs --> 
                            <li class="nav-item">
                                <a class="nav-link" href="utilisateurs.php">Utilisateurs</a>
                            </li>
                            <!-- Connexion --> 
                            <li class="nav-item">
                                <a class="nav-link" href="connexion.php">Connexion</a>
                            </li>                       
                        <?php }?>
                    </ul>
                </div>
        </div>
  </nav><?php }
}
