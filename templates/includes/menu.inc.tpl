<body>

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
                        {if $connecte == TRUE}
                            <!-- Articles --> 
                            <li class="nav-item">
                                <a class="nav-link" href="articles.php">Articles</a>
                            </li>
                            <!-- Deconnexion --> 
                            <li class="nav-item">
                                <a class="nav-link" href="deconnexion.php">Deconnexion</a>
                            </li>
                        <!-- Condition affiche options "Utilisateurs" et "Connexion" dans le menu si l'utilisateur n'est pas connecté --> 
                        {else}
                            <!-- Utilisateurs --> 
                            <li class="nav-item">
                                <a class="nav-link" href="utilisateurs.php">Utilisateurs</a>
                            </li>
                            <!-- Connexion --> 
                            <li class="nav-item">
                                <a class="nav-link" href="connexion.php">Connexion</a>
                            </li>                       
                        {/if}
                    </ul>
                </div>
        </div>
  </nav>