<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 class="mt-5">Création d'un compte</h2>
            <br/>
        </div>
    </div>
    
    <!-- Formulaire de création d'utilisateur-->
    <div class="row">
        <form method="post" enctype="multipart/form-data" action='utilisateurs.php'>
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom" placeholder="Nom" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prénom" required>
            </div>
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
</div>
