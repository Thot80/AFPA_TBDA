<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <title>Ajouter</title>
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

    <?php
    $requete_liste_cat = "SELECT DISTINCT categories.cat_nom FROM categories";
    $cat = $bdd_jarditou->query($requete_liste_cat);
    /* Date du jour sur le serveur qui héberge le site */
    $date = date('Y-m-d');
    ?>
    
  
        <form method="POST" enctype="multipart/form-data" class="my-auto mx-auto" action="valid_ajouter.php">

            <div class="form-group">
                <label for="reference">Référence :</label>
                <input type="text" class="form-control bg-light" name="reference" id="reference">
            </div>
            
            <div class="form-group">
                <label class="mr-sm-2" for="categorie">Catégorie :</label>
                <select  class="custom-select mr-sm-2 bg-light" name="categorie" id="categorie">
                <!-- Boucle sur toutes les catégories dans l'objet cat pour afficher de manière dynamique le menu select -->
                <?php
                while($cat_liste = $cat->fetch(PDO::FETCH_OBJ))
                {   
                    echo '<option value="'.$cat_liste->cat_nom.'">'.($cat_liste->cat_nom).'</option>';  
                }
                /* On referme la connexion à la BDD */
                $cat->closeCursor();
                ?>
                </select>
            </div>

            <div class="form-group">
                <label for="libelle">Libellé :</label>
                <input type="text" class="form-control bg-light" name="libelle" id="libelle">
            </div>

            <div class="form-group">
                <label for="description">Description :</label>
                <textarea class="form-control bg-light" name="description" id="description" rows="3"></textarea>
            </div>
            
            <div class="form-group">
                <label for="prix">Prix :</label>
                <input type="text" class="form-control bg-light" name="prix" id="prix">
            </div>

            <div class="form-group">
                <label for="stock">Stock :</label>
                <input type="number" class="form-control bg-light" name="stock" id="stock">
            </div>

            <div class="form-group">
                <label for="couleur">Couleur :</label>
                <input type="text" class="form-control bg-light" name="couleur" id="couleur">
            </div>

            <div class="form-group">
            <label for="pro_photo">Extension de la photo :</label>
            <input type="text" class="form-control bg-light" name="pro_photo" id="pro_photo">
        </div>

            <p>
                Produit bloqué ? :
            </p>
    
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bloque" id="oui" value="oui">
                <label class="form-check-label" for="oui">
                Oui
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="bloque" id="non" value="non" checked >
                <label class="form-check-label" for="non">
                Non
                </label>
            </div>

            <div class="form-group">
                <label for="date_ajout">Date d'ajout :</label>
                <input type="date" class="form-control" name="date_ajout" id="date_ajout"
                value="<?php echo ($date);?>" readonly>
            </div>

            <div class="btn-group btn-group-lg" role="group" aria-label="Un groupe de boutons">
                <button class="btn btn-dark mx-3" type="submit" name="bouton" id="retour" value="retour">Retour</button>
                <button class="btn btn-success mx-3" type="submit" name="bouton" id="enregistrer" value="enregistrer">Enregistrer</button>
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