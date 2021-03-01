<!-- Exercice 3

Ecrire un script qui affiche la table de multiplication totale de {1,...,12} par {1,...,12}, le résultat doit être le suivant : -->

<?php


for ($i = 0; $i < 13; $i++)
{
    $vecteur_initial[] = $i;
}


foreach ($vecteur_initial as $rang)
{
    foreach ($vecteur_initial as $i)
    {
        echo ' ' .$i * $rang. ' ';
    }
    echo '<br>';
}

?>