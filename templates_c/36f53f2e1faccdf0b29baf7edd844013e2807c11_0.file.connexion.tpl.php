<?php
/* Smarty version 3.1.33, created on 2019-12-29 02:51:02
  from 'C:\wamp64\www\mon_blog\templates\connexion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e081496a012f7_93763033',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36f53f2e1faccdf0b29baf7edd844013e2807c11' => 
    array (
      0 => 'C:\\wamp64\\www\\mon_blog\\templates\\connexion.tpl',
      1 => 1577587837,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e081496a012f7_93763033 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="mt-5">Connexion</h2>
            <br/>
        </div>
    </div>

    <!-- Formulaire de connexion -->
    <div class="row">
        <form method="post" enctype="multipart/form-data" action='connexion.php'>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <label for="mdp">Mot de passe</label>
                <input type="password" name="mdp" class="form-control" id="mdp" placeholder="Mot de Passe" required>
            </div>
            <button type="submit" class="btn btn-primary" name="bouton">Submit</button>
        </form>
    </div>
</div><?php }
}
