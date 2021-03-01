<!-- Jarditou // En tête responsive avec Bootstrap -->


<!-- Logo et Slogan Jarditou, visible pour les tailles d'écran suppérieures à large (992px)   -->
<div class="row">
    
<!-- Logo, prends 8/12 de la largeur, soit 2/3 -->
    <div class="col-8 d-none d-lg-block">

        <img src="../public/images/jarditou_logo.jpg" title="Logo Jarditou" class="img-fluid w-25" alt="Logo Jarditou">

    </div>

<!-- Slogan, prend 4/12 soit 1/3  -->
    <div class="col-4 h1 d-none d-lg-block text-right">Tout le jardin</div>

</div>

<!-- Bar de navigation, collapse dans un menu deroulant de type hamburger pour les ecrans plus petits que lg-large-992px -->
<nav class="navbar navbar-expand-lg navbar-light bg-light mx-auto"> 

    <a class="navbar-brand" href="index.php" title="Accueil">Jarditou.com</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
      
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

<!-- TODO Vérifier les adresses des liens une fois que les pages php auront étées crées -->
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="tableau.php">Tableau</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Votre promotion" aria-label="Votre promotion">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Rechercher</button>
        </form>
    </div>
</nav>

<!-- Bannière - Toute la largeure - image fluide avec taille responsive -->

    <img src="../public/images/promotion.jpg" class="img-fluid w-100" title="Promotion sur les lames de terrasse" alt="Promotion sur les lames de terrasse" class="col-12">

