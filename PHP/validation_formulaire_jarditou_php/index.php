<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <title>Accueil Jarditou</title>
</head>
<body>

<div class="container">

<!-- Fonction include() appelle une page php - ne contenant souvent que du html - permet de séparer les éléments qui seront présents sur toutes les pages
d'un site, de les mettre sur des pages séparés et de les appeler sur chaque page du site, si on doit les modifier on le fera donc qu'une fois !! -->


<!-- Appelle le header -->
<?php include("header.php");?>


<!-- Corps de la page, une colonne de gauche (2/3 de la largeur) et une colonne de droite (1/3) pour taille d'écran lg (992px), l'une au dessus de 
l'autre pour des écrans plus petits -->

<div class="row mx-auto">

            <div class="col-12 col-lg-8">
                <section>
                    <article>
                        <h2>
                            L'entreprise
                        </h2>
                        <p>
                            Notre entreprise familiale met tout son savoir-faire à votre disposition dans le domaine du jardin et du paysagisme.
                        </p>
                        <p>
                            Créée il y a 70 ans, notre entreprise vend fleurs, arbustes, matériel à main et motorisés.
                        </p>
                        <p>
                            Implantés à Amiens, nous intervenons dans tout le département de la Somme : Albert, Doullens, Péronne, Abbeville, Corbie
                        </p>
                    </article>
                </section>		
                
                <section>
                    <article>
                        <h2>
                            Qualité
                        </h2>
                        <p>
                            Nous mettons à votre disposition un service personnalisé, avec 1 seul interlocuteur durant tout votre projet.
                        </p>
                        <p>
                            Vous serez séduit par notre expertise, nos compétences et notre sérieux.
                        </p>
                    </article>
                    <article>
                        <h2>
                            Devis gratuit
                        </h2>
                        <p>
                            Vous pouvez bien sûr contacter pour de plus amples informations ou pour une demande d’intervention. Vous souhaitez un devis ? Nous vous le réalisons gratuitement.
                        </p>
                    </article>
                </section>
     
            </div>
            <div class="col-12 col-lg-4 bg-warning">
                COLONNE DROITE
            </div>
        </div>

<!-- Footer -->
<?php include("footer.php");?>


<?php 
$suppress_localhost = false;
?>
</div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
     crossorigin="anonymous"></script>   
</body>
</html>