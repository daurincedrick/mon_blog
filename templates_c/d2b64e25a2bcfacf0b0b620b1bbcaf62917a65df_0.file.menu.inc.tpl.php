<?php
/* Smarty version 3.1.33, created on 2019-12-03 01:30:42
  from 'C:\wamp64\www\mon_blog\templates\menu.inc.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de5bac2f11b69_52300486',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd2b64e25a2bcfacf0b0b620b1bbcaf62917a65df' => 
    array (
      0 => 'C:\\wamp64\\www\\mon_blog\\templates\\menu.inc.tpl',
      1 => 1575016898,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de5bac2f11b69_52300486 (Smarty_Internal_Template $_smarty_tpl) {
?><body>

    <!-- Navigation --> 
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
        <div class="container">
            <a class="navbar-brand" href="#">Start Bootstrap</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Acceuil
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <?php if ($_smarty_tpl->tpl_vars['connecte']->value == TRUE) {?>
                            <li class="nav-item">
                                <a class="nav-link" href="articles.php">Articles</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="deconnexion.php">Deconnexion</a>
                            </li>
                        <?php } else { ?>
                            <li class="nav-item">
                                <a class="nav-link" href="utilisateurs.php">Utilisateurs</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="connexion.php">Connexion</a>
                            </li>                       
                        <?php }?>
                    </ul>
                </div>
        </div>
  </nav><?php }
}
