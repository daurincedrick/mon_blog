<?php
/* Smarty version 3.1.33, created on 2019-12-03 02:14:13
  from 'C:\wamp64\www\mon_blog\templates\articles.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5de5c4f5a74a73_98440700',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c62714e8f45030aa9dbd08853d9d37283c9b0ef7' => 
    array (
      0 => 'C:\\wamp64\\www\\mon_blog\\templates\\articles.tpl',
      1 => 1575339208,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5de5c4f5a74a73_98440700 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Page Content -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1 class="mt-5">Mon Blog</h1>
                <h2 class="mt-5">Articles</h2>
                <br/>
            </div>
        </div>
        
        <!-- Modification de l'article si la variable affiche_modif est égal à 1 -->
        <?php if ($_smarty_tpl->tpl_vars['affiche_modif']->value == TRUE) {?>
            <!-- Remplissage formulaire avec boucle foreach -->
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['tab_articles']->value, 'value');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['value']->value) {
?>
                <div class="row">
                    <form method="post" enctype="multipart/form-data" action='articles.php'>
                        <div class="form-group">
                            <input type="hidden" name="id_cache" class="form-control" id="id_cache" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
" required>
                        </div>
                        <div class="form-group">
                            <label for="titre">Titre</label>
                            <input type="text" name="titre" class="form-control" id="titre" placeholder="Titre" value="<?php echo $_smarty_tpl->tpl_vars['value']->value['titre'];?>
" required>
                        </div>
                        <div class="form-group">
                            <label for="Texte">Texte</label>
                            <textarea class="form-control" name="texte" id="texte" rows="3" required><?php echo $_smarty_tpl->tpl_vars['value']->value['texte'];?>
</textarea>
                        </div>
                        <img src="img/<?php echo $_smarty_tpl->tpl_vars['value']->value['id'];?>
.jpg" class="rounded mx-auto d-block" height="176" width="235" alt="...">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="publie" id="publie" checked="">
                            <label class="custom-control-label" for="publie">Publié ?</label>
                        </div>
                        <button type="submit" class="btn btn-primary" name="bouton">Submit</button>
                    </form>
                </div>            
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        
        <!-- Ajout de l'article si la variable affiche_modif est différent de 1 -->
        <?php } else { ?>
            <div class="row">
                <form method="post" enctype="multipart/form-data" action='articles.php'>
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" name="titre" class="form-control" id="titre" placeholder="Titre" required>
                    </div>
                    <div class="form-group">
                        <label for="Texte">Texte</label>
                        <textarea class="form-control" name="texte" id="texte" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="img">Image</label>
                        <input type="file" class="form-group-file" name="img" id="img" required>                
                    </div>
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="publie" id="publie">
                        <label class="custom-control-label" for="publie">Publié ?</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="bouton">Submit</button>
                </form>
            </div>            
        <?php }
}
}
