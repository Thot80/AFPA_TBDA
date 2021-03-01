<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <title>Détail</title>
</head>
<body>

    <!-- Header -->
    <?php
    include("header.php");
    ?>

    <!-- Connexion à la base de données jarditou -->
    <?php
    include("conexion_bdd_jarditou.php");
    ?>

    <!-- Récupération de l'identifiant du produit transmis via l'URL  -->
    <?php $pro_id = $_GET['pro_id'];?>

    <!-- Préparation de la reqête pour récupérer toutes les colonnes de la table produit correspondant à ce pro_id, nous devons donc obtenir
    un array -->
    <!-- Nous allons aussi faire une requête pour récupérer le nom de catégorie dans la table catégorie associé à l'id
    de catégorie dans la table produit -->
    <!-- Nous allons aussi avoir besoin de toutes les catégories distincte pour le menu selct dans le formulaire -->
    <?php
    $requete_info = "SELECT * FROM produits WHERE pro_id =".$pro_id;
    $pro_info = $bdd_jarditou->query($requete_info);
    $vecteur_info = $pro_info->fetch(PDO::FETCH_OBJ);
    $pro_info->closeCursor();
    $requete_categorie = "SELECT categories.cat_nom FROM produits INNER JOIN categories ON produits.pro_cat_id = categories.cat_id 
    WHERE pro_id=".$pro_id;
    $cat_info = $bdd_jarditou->query($requete_categorie);
    $categorie = $cat_info->fetch(PDO::FETCH_OBJ);
    $cat_info->closeCursor();
    $requete_liste_cat = "SELECT DISTINCT categories.cat_nom FROM categories";
    $cat = $bdd_jarditou->query($requete_liste_cat);
    /* Date du jour sur le serveur qui héberge le site */
    $date = date('Y-m-d');
    ?>

    <!-- Image responsive, titre et alt = nom du produit récup dans BDD, image correspondant à l'ID transmis via l'URL  -->
    <div class="d-flex justify-content-center">
        <img title="<?php echo ($vecteur_info->pro_libelle);?>" alt="<?php echo ($vecteur_info->pro_libelle);?>"
        src="../public/images/<?php echo ($vecteur_info->pro_id);?>.jpg" style="width : 10%; height:auto;">
    </div>

    <!-- Formulaire, methode GET car redirection sur autre page du site, la page valid_detail renvoi sur une page différente du site
    selon le bouton séléctionné à la fin du formulaire -->
   
    <form method="GET" enctype="multipart/form-data" class="my-auto mx-auto" action="valid_detail.php">


    <!-- Ici un champ caché qui nous permettra de récupérer l'id du produit et de la transmettre via l'URL 
    même si on ne souhaite pas l'afficher dans le formulaire de cette page, au cas ou en aurait besoin
     / l'atribut readonly empeche l'utilisateur de modifier le champ -->
    <div class="form-group">
            <label for="pro_id"></label>
            <input type="hidden" class="form-control bg-light" name="pro_id" id="pro_id"
            value="<?php echo ($pro_id);?>" readonly>
    </div>

        <div class="form-group">
            <label for="reference">Référence :</label>
            <input type="text" class="form-control bg-light" name="reference" id="reference"
            value="<?php echo ($vecteur_info->pro_ref);?>">
        </div>

        <!-- Ici, on a récupéré le nom de catégorie associé à l'id_pro et id_pro_cat pour le mettre par défault dans le menu select
        puis on a récupéré toutes les catégories distinctes pour les mettre en option dans le select grace à la boucle while -->
        <div class="form-group">
            <label class="mr-sm-2" for="categorie">Catégorie :</label>
            <select  class="custom-select mr-sm-2 bg-light" name="categorie" id="categorie">
            <option selected value="<?php echo ($categorie->cat_nom);?>"><?php echo ($categorie->cat_nom);?></option>
            <!-- Boucle sur toutes les catégories dans l'objet cat pour afficher de manière dynamique le menu select -->
            <?php
            while($cat_liste = $cat->fetch(PDO::FETCH_OBJ))
            {
                /* Ici on affiche tous les éléments de catégories sauf celui afficher en premier et correspondant à la catégorie du produit
                sélectionné */
                if ($cat_liste->cat_nom != $categorie->cat_nom)
                {
                echo '<option value="'.$cat_liste->cat_nom.'">'.($cat_liste->cat_nom).'</option>'; 
                }
    
            }
            /* On referme la connexion à la BDD */
            $cat->closeCursor();
            ?>
            </select>
        </div>

        <div class="form-group">
            <label for="libelle">Libellé :</label>
            <input type="text" class="form-control bg-light" name="libelle" id="libelle"
            value="<?php echo ($vecteur_info->pro_libelle);?>">
        </div>

        <div class="form-group">
            <label for="description">Description :</label>
            <textarea class="form-control bg-light" name="description" id="description" rows="3"><?php echo($vecteur_info->pro_description); ?></textarea>
        </div>
        
        <div class="form-group">
            <label for="prix">Prix :</label>
            <input type="text" class="form-control bg-light" name="prix" id="prix"
            value="<?php echo ($vecteur_info->pro_prix).'€';?>">
        </div>

        <div class="form-group">
            <label for="stock">Stock :</label>
            <input type="number" class="form-control bg-light" name="stock" id="stock"
            value="<?php echo ($vecteur_info->pro_stock);?>">
        </div>

        <div class="form-group">
            <label for="couleur">Couleur :</label>
            <input type="text" class="form-control bg-light" name="couleur" id="couleur"
            value="<?php echo ($vecteur_info->pro_couleur);?>">
        </div>

        <!-- Ici un champ caché qui nous permettra de récupérer le format de la photo du produit et de la transmettre via l'URL 
        même si on ne souhaite pas l'afficher dans le formulaire de cette page, au cas ou en aurait besoin  -->
        <div class="form-group">
            <label for="pro_photo"></label>
            <input type="hidden" class="form-control bg-light" name="pro_photo" id="pro_photo"
            value="<?php echo ($vecteur_info->pro_photo);?>">
        </div>
        <p>
            Produit bloqué ? :
        </p>
        
        <?php
            if ($vecteur_info->pro_bloque == 1)
            {
                $oui = 'checked';
                $non = '';
            }
            else
            {
                $oui = '';
                $non = 'checked';
            }
            ?>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="bloque" id="oui" value="oui" <?php echo $oui;?>>
            <label class="form-check-label" for="oui">
              Oui
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="bloque" id="non" value="non" <?php echo $non;?>>
            <label class="form-check-label" for="non">
              Non
            </label>
        </div>

        <div class="form-group">
            <label for="date_ajout">Date d'ajout :</label>
            <input type="date" class="form-control" name="date_ajout" id="date_ajout"
            value="<?php echo ($vecteur_info->pro_d_ajout);?>" readonly>
        </div>

        <div class="form-group">
            <label for="date_modif">Date de modification :</label>
            <input type="date" class="form-control" name="date_modif" id="date_modif"
            value="<?php echo ($date);?>" readonly>
        </div>
        <!-- Les value sur les boutons vont permettre de séparer les actions à effectuer en fonctions
        du bouton cliqué une fois sur la page de traitement de formulaire, les boutons ont tous le même nom pour
        que cela corresponde toujours à la même entrée dans le tableau GET -->
        <div class="btn-group btn-group-lg" role="group" aria-label="Un groupe de boutons">
            <button class="btn btn-dark mx-3" type="submit" name="bouton" id="retour" value="retour">Retour</button>
            <button class="btn btn-warning mx-3" type="submit" name="bouton" id="modifier" value="modifier">Modifier</button>
            <button class="btn btn-danger mx-3" type="submit" name="bouton" id="supprimer" value="supprimer">Supprimer</button>
        </div>
    </form>

    <br>
    <!-- Footer -->
    <?php
        include("footer.php");
    ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
     crossorigin="anonymous"></script>   
</body>
</html>