<!--Déclaration du script javascrypt pour vérifier si le pseudo et l'email du formulaire de la page commentaire n'est pas vide-->
<script>
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

</script>

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
            {foreach from=$tab_articles item=value}
                <div class="col-md-6" >
                    <div class="card" style="width: 18rem;">
                        <img src="img/{$value.id}.jpg" class="card-img-top" alt="{$value.id}">
                        <div class="card-body">
                            <h5 class="card-title">{$value.titre}</h5>
                            <p class="card-text">{$value.texte}</p>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Date : {$value.date_fr}</li>
                        </ul>                
                    </div>
                </div>
            {/foreach}
        </div> 


        <!-- FORMULAIRE COMMENTAIRES -->
        <div class="col-sm">
            <form id="form_comm" method="post" enctype="multipart/form-data" onsubmit="return valider()" action='commentaire.php'>
                <div class="form-group">
                    <input type="hidden" name="id_cache" class="form-control" id="id_cache" value="{$value.id}" required>
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
            {foreach from=$tab_commentaires item=value}
                <br/>
                <h5 id="{$value.id_comm}">{$value.pseudo}</h5>
                <p>{$value.texte_comm}</p>
            {/foreach}
        </div>
    </div>
</div>