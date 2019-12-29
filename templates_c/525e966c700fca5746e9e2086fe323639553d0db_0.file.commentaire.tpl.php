<?php
/* Smarty version 3.1.33, created on 2019-12-29 03:46:33
  from 'C:\wamp64\www\mon_blog\templates\commentaire.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e082199ed9725_83948368',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '525e966c700fca5746e9e2086fe323639553d0db' => 
    array (
      0 => 'C:\\wamp64\\www\\mon_blog\\templates\\commentaire.tpl',
      1 => 1577590221,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e082199ed9725_83948368 (Smarty_Internal_Template $_smarty_tpl) {
?><!--Déclaration du script javascrypt pour vérifier si le pseudo et l'email du formulaire de la page commentaire n'est pas vide-->
<?php echo '<script'; ?>
>
    /* --- www.easy-micro.org --- */

    function valider() {
        //si les valeurs des champs nom et prenom sont différentes du vide
        if ((form_comm.texte_comm.value != "") && (form_comm.email_comm.value != "")) {
            //les données sont ok, on peut envoyer le formulaire
            return true;
        } else {
            //sinon on affiche un message
            alert("Merci de remplir les champs commentaire et email");
            //et on indique de ne pas envoyer le formulaire
            return false;
        }
    }

<?php echo '</script'; ?>
>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="mt-5">Commentaire</h2>
            <br/>
        </div>
    </div>

    <!-- Affichage des éléments de l'article à commenter --> 
    <div class="row">
        <div class="col-sm">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_articles']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                <div class="col-md-6" >
                    <div class="card" style="width: 18rem;">
                        <img src="img/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
.jpg" class="card-img-top" alt="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
</h5>
                            <p class="card-text"><?php echo $_smarty_tpl->tpl_vars['value']->value['texte'];?>
</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Date : <?php echo $_smarty_tpl->tpl_vars['value']->value['date_fr'];?>
</li>
                        </ul>                
                    </div>
                </div>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div> 


        <!-- FORMULAIRE COMMENTAIRES -->
        <div class="col-sm">
            <form id="form_comm" method="post" enctype="multipart/form-data" onsubmit="return valider()" action='commentaire.php'>
                <div class="form-group">
                    <input type="hidden" name="id_cache" class="form-control" id="id_cache" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" required>
                </div>
                <div class="form-group">
                    <label for="pseudo">Pseudo</label>
                    <input type="text" name="pseudo" class="form-control" id="pseudo" placeholder="Pseudo" required >
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email_comm" class="form-control" id="email_comm" placeholder="Email" >
                </div>
                <div class="form-group">
                    <label for="Commentaire">Commentaire</label>
                    <textarea class="form-control" name="texte_comm" id="texte_comm" rows="3" ></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="bouton">Envoyer</button>
            </form>
        </div>
    </div>    
    <br/>


    <!-- LISTE DES COMMENTAIRES -->
    <div id="navbar-example">
        <nav id="navbar-example2" class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">Commentaires</a>
        </nav>
        <!-- Affichage des commentaires stocké dans la bdd -->
        <div data-spy="scroll" data-target="#navbar-example2" data-offset="0">
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_commentaires']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                <br/>
                <h5 id="<?php echo $_smarty_tpl->tpl_vars['value']->value['id_comm'];?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['pseudo'];?>
</h5>
                <p><?php echo $_smarty_tpl->tpl_vars['value']->value['texte_comm'];?>
</p>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
    </div>
</div><?php }
}
