<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="mt-5">Recherche</h2>
            <br/>

            <!-- Formulaire de recherche d'article -->
            <form method="get" enctype="multipart/form-data" action='search.php'>
                <div class="form-group">
                    <input type="text" name="recherche" class="form-control" id="recherche" placeholder="Rechercher" required>
                </div>
                <button type="submit" class="btn btn-primary" name="bouton">Rechercher</button>
            </form>
        </div>
    </div>

    <!-- Si le nombre de résultat concernant la recherche est supérieur à 0 alors on affiche -->
    {if $nb_result > 0}

        <!-- AFFICHAGE ARTICLE -->
        <div class="row">
            <!-- AFFICHAGE DES ARTICLES AVEC BOUCLE FOREACH --> 
            {foreach from=$tab_articles item=value}
                <div class="col-md-6" >
                    <div class="card" style="width: 18rem;">
                        <img src="img/{$value.id}.jpg" class="card-img-top" alt="{$value.id}">
                        <div class="card-body">
                            <h5 class="card-title">{$value.titre}</h5>
                            <p class="card-text">{$value.texte}</p>
                        </div>
                        <!-- Bouton pour laisser un commentaire -->
                        <div class="card-body">
                            <a href="http://localhost/mon_blog/commentaire.php?p={$value.id}" class="card-link" name="bouton-commentaire">Laisser un commentaire</a>
                        </div>                    
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Date : {$value.date_fr}</li>
                        </ul>
                        <!-- Eléments aparaissant que si l'utilisateur est connecté -->
                        {if $connecte eq TRUE}
                            <div class="card-body">
                                <!-- Bouton pour modifier l'article -->
                                <button type="button" class="btn btn-primary" onclick="window.location.href = 'http://localhost/mon_blog/articles.php?p={$value.id}';" name="bouton-modifier">Modifier</button>
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
                                                <button type="button" class="btn btn-primary" onclick="window.location.href = 'http://localhost/mon_blog/supprimer_articles.php?p={$value.id}';">Confirmer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        {/if}
                    </div>
                </div>
            {/foreach}
            <!-- FIN BOUCLE -->
        </div>
        <br/>

        <!-- Bouton Pagination -->
        <div class="row">
            <nav aria-label="Page navigation example">
                <ul class="pagination">
                    <!--Boucle-->
                    {for $index1=1 to $nb_total_pages}
                        <li class="page-item"><a class="page-link" href="http://localhost/mon_blog/search.php?p={$index1}&recherche={$var_recherche}">{$index1}</a></li>
                        {/for}
                </ul>
            </nav>
        </div>

    {elseif $nb_result === 0}
        <!-- Réponse si il n'y a pas de résultat -->
        <div class="row">
            <div class="col-lg-12 text-center">
                <h3 class="mt-5">Désolé aucun résultat pour votre recherche</h3>
                <br/>
            </div>
        </div>
    {/if}
</div>