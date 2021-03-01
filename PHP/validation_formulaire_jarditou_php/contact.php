<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="public/css/styles.css">
    <title>Contact</title>

</head>
<body>


 <!-- On appelle la page validation qui contient tous nos tests -->
<?php 
include("validation.php");
?>

<div class="container">

  <!-- Header -->
  <?php include("header.php") ?>

<!--  Si le premier POST n'a pas encore eu lieu, on affiche un formulaire vierge qui sera traité sur la même page -->

  <?php 
  if (empty($_POST))
  {  
  ?>
  
    <form  method="POST" <?php $action;?> enctype="multipart/form-data" class="my-auto mx-auto">
        
        <span class='erreur'>*Ces zones sont obligatoires</span> <br>
        <h2>
            Vos Coordonnées
        </h2> 

        <div class="form-group">
          <label for="nom">Nom*</label>
          <input type="text" class="form-control" name="nom" id="nom">
          <br><span id="miss_nom"></span>
        </div>

        <div class="form-group">
          <label for="prenom">Prénom*</label>
          <input type="text" class="form-control" name="prenom" id="prenom">
          <br><span id="miss_prenom"></span>
        </div>

        Sexe* <br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sexe" id="feminin" value="feminin">
            <label class="form-check-label" for="Féminin">
              Féminin
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sexe" id="masculin" value="masculin">
            <label class="form-check-label" for="Masculin">
              Masculin
            </label>
        </div>
        <br><span id="miss_sexe"></span>
        

        <div class="form-group">
        <br>
            <label for="date">Date de naissance*</label>
            <input type="date" class="form-control" name="date" id="date">
            <br><span id="miss_date"></span>
        </div>
        
        <div class="form-group">
            <label for="cp">Code postal*</label>
            <input type="text" class="form-control" name="cp" id="cp">
            <br><span id="miss_cp"></span>
        </div>

        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" name="adresse" id="adresse">
        </div>

        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" name="ville"  id="ville">
        </div>

        <div class="form-group">
            <label for="email">Email*</label>
            <input type="email" class="form-control" name="email" id="email">
            <br><span id="miss_email"></span>
        </div>

        <h2>
            Votre Demande
        </h2>

        <div class="form-group">
            <label class="mr-sm-2" for="sujet">Sujet</label>
            <select class="custom-select mr-sm-2" name="sujet" id="sujet">
            <option value="0">Veuillez sélectionner un sujet</option>
            <option value="mes_commandes">Mes commandes</option>
            <option value="question_sur_un_produit">Question sur un produit</option>
            <option value="reclamation">Réclamation</option>
            <option value="autre">Autre</option>
            </select>
        </div> 

        <div class="form-group">
            <label for="votre_question">Votre question*</label>
            <textarea class="form-control" name="question" id="votre_question" rows="3"></textarea>
            <br><span id="miss_question"></span>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="autorisation" id="autorisation" value="donnee">
            <label class="form-check-label" for="autorisation">J'accepte le traitement informatique de ce formulaire</label>
          </div>
          <span id="miss_autorisation"></span>
          <br>
         
          <br>

          <button class="btn btn-light" type="submit" id="envoyer">Envoyer</button>
          <button class="btn btn-light" type="reset" id="annuler">Annuler</button>
    </form>

    <br>
<?php

}
else
{
?>

<!-- Si ça n'est pas le premier POST mais que les données saisie sont incorrectes, on affiche ce formulaire
avec les valeurs précédemments remplies en value dans les input et les messages d'erreurs là ou les données sont mauvaises -->
<!-- action est différent selon que les données sont bonnes ou mauvaises -->
<form  method="POST" <?php echo $action; ?> enctype="multipart/form-data" class="my-auto mx-auto">
        
<span class='erreur'> *Ces zones sont obligatoires </span><br>
        <h2>
            Vos Coordonnées
        </h2>
         <!--Une balise pour afficher un message d'erreur si le champ n'est pas bon et une balise pour donner 
         la valeur précédemment saisie par l'utilisateur au champ  -->

        <div class="form-group">
          <label for="nom">Nom*</label>
          <input type="text" class="form-control" name="nom" id="nom" value=" <?php echo $nom; ?>" >
          <br><span id="miss_nom"></span>
          <span class='erreur'><?php echo $message['nom'];?></span>
        </div>

        <div class="form-group">
          <label for="prenom">Prénom*</label>
          <input type="text" class="form-control" name="prenom" id="prenom" value="<?php echo $prenom; ?>">
          <br><span id="miss_prenom"></span>
          <span class='erreur'><?php echo $message['prenom'];?></span>
        </div>
        Sexe* <br>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sexe" id="feminin" value="feminin"<?php echo $sexe_f;?>>
            <label class="form-check-label" for="feminin">
              Féminin
            </label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="sexe" id="masculin" value="masculin" <?php echo $sexe_m;?>>
            <label class="form-check-label" for="masculin">
              Masculin
            </label>
        </div>
        <br><span id="miss_sexe"></span>
        <span class='erreur'><?php echo $message['sexe'];?></span>
        
        <div class="form-group">
        <br>
            <label for="date">Date de naissance*</label>
            <input type="date" class="form-control" name="date" id="date" value="<?php echo $date;?>">
            <br><span id="miss_date"></span>
            <span class='erreur'> <?php echo $message['date'];?></span>
        </div>
        
        <div class="form-group">
            <label for="cp">Code postal*</label>
            <input type="text" class="form-control" name="cp" id="cp" value="<?php echo $cp;?>">
            <br><span id="miss_cp"></span>
            <span class='erreur'> <?php echo $message['cp'];?></span>
        </div>

        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" name="adresse" id="adresse" value="<?php echo $adresse; ?>" >
        </div>

        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" name="ville"  id="ville" value="<?php echo $ville; ?>">
        </div>

        <div class="form-group">
            <label for="email">Email*</label>
            <input type="email" class="form-control" name="email" id="email" value="<?php echo $email;?>">
            <br><span id="miss_email"></span>
            <span class='erreur'> <?php echo $message['email'];?></span>
        </div>

        <h2>
            Votre Demande
        </h2> 

        <div class="form-group">
            <label class="mr-sm-2" for="sujet">Sujet*</label>
            <select class="custom-select mr-sm-2" name="sujet" id="sujet">
            <option value="0" <?php echo $option0;?>>Veuillez sélectionner un sujet</option>
            <option value="mes_commandes" <?php echo $option1;?>>Mes commandes</option>
            <option value="question_sur_un_produit" <?php echo $option2;?>>Question sur un produit</option>
            <option value="reclamation" <?php echo $option3;?>>Réclamation</option>
            <option value="autre" <?php echo $option4;?>>Autre</option>
            </select>
            <span class='erreur'> <?php echo $option;?></span>
        </div>  

        <div class="form-group">
            <label for="question">Votre question*</label>
            <textarea class="form-control" name="question" id="question" rows="3" ><?php echo $question;?></textarea>
            <br><span id="miss_question"></span>
            <span class='erreur'> <?php echo $message['question'];?></span>
          </div>

          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" name="autorisation" id="autorisation" value="donnee"<?php echo $autorisation;?>>
            <label class="form-check-label" for="autorisation">J'accepte le traitement informatique de ce formulaire</label>
          </div>
          <span id="miss_autorisation"></span>
          <br>
          <span class='erreur'><?php echo $message['autorisation'];?></span>
          <br>

          <button class="btn btn-light" type="submit" id="envoyer">Envoyer</button>
          <button class="btn btn-light" type="reset" id="annuler">Annuler</button>
  
    </form>
<?php
}
?>
    <br>
    
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