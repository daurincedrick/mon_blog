<?php
/* Smarty version 3.1.33, created on 2019-12-29 02:10:25
  from 'C:\wamp64\www\mon_blog\templates\index.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5e080b1113a253_20050102',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6836cf82ced935ac27f29baac4d127847974ae31' => 
    array (
      0 => 'C:\\wamp64\\www\\mon_blog\\templates\\index.tpl',
      1 => 1577584841,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e080b1113a253_20050102 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Mon Blog</h1>
            <br/>
        </div>
    </div>

    <!-- Affichage des notifications -->
    <?php if (!empty($_SESSION['notifications'])) {?>
        <div class='row'>
            <div class="col-12 center-block">
                <div class="alert alert-<?php echo $_SESSION['notifications']['result'];?>
" role="alert">
                    <?php echo $_SESSION['notifications']['message'];?>

                </div>
            </div>
        </div>
    <?php }?>

    <div class="row">
        <!-- AFFICHAGE DES ARTICLES AVEC BOUCLE FOREACH --> 
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
                    <!-- Bouton pour laisser un commentaire -->
                    <div class="card-body">
                        <a href="http://localhost/mon_blog/commentaire.php?p=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" class="card-link" name="bouton-commentaire">Laisser un commentaire</a>
                    </div>                    
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">Date : <?php echo $_smarty_tpl->tpl_vars['value']->value['date_fr'];?>
</li>
                    </ul>
                    <!-- Eléments aparaissant que si l'utilisateur est connecté -->
                    <?php if ($_smarty_tpl->tpl_vars['connecte']->value == TRUE) {?>
                        <div class="card-body">
                            <!-- Bouton pour modifier l'article -->
                            <button type="button" class="btn btn-primary" onclick="window.location.href = 'http://localhost/mon_blog/articles.php?p=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
';" name="bouton-modifier">Modifier</button>
                            <!-- Bouton pour supprimer l'article -->
                            <button type="button" class="btn btn-primary" name="bouton-supprimer" data-toggle="modal" data-target="#exampleModal" >Supprimer</button>

                            <!-- Fenetre de confirmation de supression de l'article -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmation de la suppresion</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            Voulez vous vraiment supprimer cet article ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                            <button type="button" class="btn btn-primary" onclick="window.location.href = 'http://localhost/mon_blog/supprimer_articles.php?p=<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
';">Confirmer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    <?php }?>
                </div>
            </div>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        <!-- FIN BOUCLE -->
    </div>
    <br/>


    <!-- Bouton Pagination -->
    <div class="row">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <!--Boucle-->
                <?php
$_smarty_tpl->tpl_vars['index1'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['index1']->step = 1;$_smarty_tpl->tpl_vars['index1']->total = (int) ceil(($_smarty_tpl->tpl_vars['index1']->step > 0 ? $_smarty_tpl->tpl_vars['nb_total_pages']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['nb_total_pages']->value)+1)/abs($_smarty_tpl->tpl_vars['index1']->step));
if ($_smarty_tpl->tpl_vars['index1']->total > 0) {
for ($_smarty_tpl->tpl_vars['index1']->value = 1, $_smarty_tpl->tpl_vars['index1']->iteration = 1;$_smarty_tpl->tpl_vars['index1']->iteration <= $_smarty_tpl->tpl_vars['index1']->total;$_smarty_tpl->tpl_vars['index1']->value += $_smarty_tpl->tpl_vars['index1']->step, $_smarty_tpl->tpl_vars['index1']->iteration++) {
$_smarty_tpl->tpl_vars['index1']->first = $_smarty_tpl->tpl_vars['index1']->iteration === 1;$_smarty_tpl->tpl_vars['index1']->last = $_smarty_tpl->tpl_vars['index1']->iteration === $_smarty_tpl->tpl_vars['index1']->total;?>
                    <li class="page-item"><a class="page-link" href="http://localhost/mon_blog/?p=<?php echo $_smarty_tpl->tpl_vars['index1']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['index1']->value;?>
</a></li>
                    <?php }
}
?>
            </ul>
        </nav>
    </div>
</div>
<?php }
}
