<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <title>Supprimer</title>
</head>
<body>

    <!-- Header -->
    <?php
    include("header.php");
    ?>

     <!-- Image responsive, titre et alt = nom du produit récup dans BDD, image correspondant à l'ID transmis via l'URL  -->
     <div class="d-flex justify-content-center">
        <img title="<?php echo ($_GET['libelle']);?>" alt="<?php echo ($_GET['libelle']);?>"
        src="../public/images/<?php echo ($_GET['pro_id']);?>.jpg" style="width : 10%; height:auto;">
    </div>

    <div class="text-center">
    <h1>
    <strong><?php echo ($_GET['libelle']);?></strong>
    </h1>
    <h2>
    Êtes vous sûr de vouloir supprimer <br>
    <strong>"<?php echo ($_GET['libelle']);?>"</strong> de la base de données ?
    </h2>
    </div>
    <br>
    <form method="POST" enctype="multipart/form-data" class="my-auto mx-auto" action="valid_supprimer.php">
        <div class="form-group">
                <label for="pro_id"></label>
                <input type="hidden" class="form-control bg-light" name="pro_id" id="pro_id"
                value="<?php echo ($_GET['pro_id']);?>" readonly>
        </div>
        <div class="display-inline-block text-center">
            <div class="btn-group btn-group-lg" role="group" aria-label="Un groupe de boutons">
                <button class="btn btn-danger mx-3" type="submit" name="bouton" id="supprimer" value="supprimer">Supprimer</button>
                <button class="btn btn-success mx-3" type="submit" name="bouton" id="annuler" value="annuler">Annuler</button>
            </div>
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