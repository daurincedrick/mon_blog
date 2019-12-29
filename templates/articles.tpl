<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Mon Blog</h1>
            <h2 class="mt-5">Articles</h2>
            <br/>
        </div>
    </div>

    <!-- Formulaire pour la modification de l'article si la variable affiche_modif est égal à 1 -->
    {if $affiche_modif == TRUE}
        <!-- Remplissage formulaire avec boucle foreach -->
        {foreach from=$tab_articles item=value}
            <div class="row">
                <form method="post" enctype="multipart/form-data" action='articles.php'>
                    <div class="form-group">
                        <input type="hidden" name="id_cache" class="form-control" id="id_cache" value="{$value.id}" required>
                    </div>
                    <div class="form-group">
                        <label for="titre">Titre</label>
                        <input type="text" name="titre" class="form-control" id="titre" placeholder="Titre" value="{$value.titre}" required>
                    </div>
                    <div class="form-group">
                        <label for="Texte">Texte</label>
                        <textarea class="form-control" name="texte" id="texte" rows="3" required>{$value.texte}</textarea>
                    </div>
                    <img src="img/{$value.id}.jpg" class="rounded mx-auto d-block" height="176" width="235" alt="...">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name="publie" id="publie" checked="">
                        <label class="custom-control-label" for="publie">Publié ?</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="bouton">Submit</button>
                </form>
            </div>            
        {/foreach}

        <!-- Formulaire pour l'ajout de l'article si la variable affiche_modif est différent de 1 -->
    {else}
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
    {/if}