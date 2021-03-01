<?php 
    $title = 'Boucles et Conditions';
    require('header.php');    
?>

<h1 class="text-center">Boucles et Conditions</h1>

<h2 class="text-center">Exercice 1</h2>
<!-- Exercice 1

Ecrire un script PHP qui affiche tous les nombres impairs entre 0 et 150, par ordre croissant : 1 3 5 7... -->
<p class="mx-3">
    <?php 

    for ($i = 0; $i < 151; $i++)
    {
        if ($i % 2 != 0)
        {
            echo 'Le nombre ' .$i. ' est impair <br>';
        }
    }
    ?>
</p>

<h2 class="text-center">Exercice 2</h2>
<!-- Exercice 2

Écrire un programme qui écrit 500 fois la phrase Je dois faire des sauvegardes régulières de mes fichiers. -->
<p class="mx-3">
    <?php
    for ($i=0; $i<501; $i++)
    {
        echo 'Je dois faire des sauvegardes régulières de mes fichiers <br>';
    }
    ?>
</p>

<h2 class="text-center">Exercice 3</h2>
<!-- Exercice sur la table de multiplication  -->


<table class="table">
<?php

$table[0][0] = 0;

for ($i = 1; $i <= 12; $i++)
{
  echo "<tr>";
  for ($j = 1; $j <= 12; $j++)
  {
    $table[$i][$j] = $i*$j;
    echo "<td class=\"px-5 text-center \">" . $table[$i][$j] . "</td>";
  }
  echo "</tr>";
}
?>

</table>

<?php
require('../footer.php');
?>
