<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <title>Contact</title>

</head>
<body>

<div class="container">

  <!-- Header -->
  <?php include("header.php") ?>
  

<!-- On affiche le contenu du tableau POST ligne après ligne -->
<?php
    {
        foreach($_POST as $clef => $valeur)
        {
            echo $clef. ' : ' .$valeur. '<br>';
        }
    }
    ?>
</div>   

<!-- Footer -->
<?php include("footer.php") ?>

<!-- TODO Mettre à jour le javascript, changements dans les id à récupérer !! -->
<!-- Script maison pour le contrôle côté client du formulaire / A refaire, des changements ont étés apportés dans la nomenclature... -->
  <script src="public/js/validation_form_client.js"></script>

<!-- Script Bootstrap -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
     crossorigin="anonymous"></script>

</body>
</html>