<?php
$title = 'Les Fonctions';
require('header.php');
?>

<!-- Exercice

Ecrivez la fonction calculator() traitant les opérations d'addition, de soustraction, de multiplication et de division. -->

<h1 class="text-center">Les Fonctions en php</h1>

<h2 class="text-center">Fonction Calculator</h2>

<img src="assets/img/code_calculator.PNG" alt="Une capture d'écran du code de la fonction demandée en exercice" class="mx-3">

<?php

function calculator($nbr1, $nbr2, $operation)
{
    $tampon1 = readline ('Entrer une première valeure');
    $tampon2 = readline ('Entrer une seconde valeure');
    $nbr1 = (int) $tampon1;
    $nbr2 = (int) $tampon2;
    $tampon3 = readline ('Selectionnez une opération parmi : +,-,*,/') ;
    
    switch ($tampon3)
    {
        case "+" :
            echo 'La somme de ' . $nbr1 . ' et ' . $nbr2. ' vaut '  .($nbr1 + $nbr2) ;
        break ;
        case "-" :
            echo 'La différence de ' .$nbr1. ' et ' .$nbr2. ' vaut ' . ($nbr1 - $nbr2) ;
        break;
        case "*" :
            echo 'La produit de ' .$nbr1. ' par ' .$nbr2. ' vaut ' . ($nbr1 * $nbr2) ;
        break;
        case '/' :
            if ($nbr2 = 0)
            {
                echo 'On ne peut pas diviser un nombre par 0';
            }
            else
            {
                echo 'La division de ' .$nbr1. ' par ' .$nbr2. ' vaut ' . $nbr1/$nbr2 ;
            }
        break;
    }
}
?>

<h2 class="text-center">La Fonction lien</h2>

<p> Nous allons l'essayer sur le lien qui mène au manuel français de php</p>

<?php

// Ecrivez une fonction qui permette de générer un lien.

// La fonction doit prendre deux paramètres, le lien et le titre

function lien($chemin, $texte) {
    echo '<a href ="' . $chemin . '">' . $texte . '</a>';
}

lien('https://www.php.net/manual/fr/', 'Manuel PHP Français');

?>

<p>Voici le code source de cette fonction</p>

<img src="assets/img/code_lien.PNG" alt="Image du code source de la fonction demandée en exercice">


<h2 class="text-center">Fonction somme des valeurs d'un tableau</h2>

<?php

function sommeValeur($tableau)
{
    $somme = 0;
    if (gettype($tableau) !== 'array')
    {
        echo 'La variable doit être du type array ! <br>';
        return false;
    }
    else
    {
        
        foreach ($tableau as $value)
        {
            $check = gettype($value);
            if (($check !== 'integer'))
            {
                echo 'Le tableau ne doit contenir que des valeurs numériques <br>';
                return false;   

            }
            else
            {
                $somme += $value;
            }
        }
        echo 'La somme des valeurs du tableau vaut : ' . $somme . '<br>';
        return $somme;
        
    }
}
?>

<p>Nous allons maintenant tester notre code avec 3 exemples, 1 ou la variable rentrée dans la fonction n'est pas un tableau, l'autre ou le tableau rentré en paramètre ne contient pas que des nombres et en fin, avec un paramètre correct</p>

<?php
$parametre1 = 'Rigolons un peu';
$parametre2 = array(6,36,'Salut',45);
$parametre3 = array(6, 36, 6, 120);

echo '<br>' . sommeValeur($parametre1) . '<br>';
echo '<br>' . sommeValeur($parametre2) . '<br>';
echo '<br>' . sommeValeur($parametre3) . '<br>';

var_dump(gettype($parametre1));
var_dump(gettype($parametre2));
var_dump(gettype($parametre2[2]));
var_dump(gettype($parametre3[0]));
var_dump(gettype($parametre3[3]));
?>



<h2 class="text-center">Créer une fonction qui vérifie le niveau de complexité d'un mot de passe</h2>
<p>Elle doit prendra un paramètre de type chaîne de caractères. Elle retournera une valeur booléenne qui vaut true si le paramètre (le mot de passe) respecte les règles suivantes :</p>

<ul>
    <li>Faire au moins 8 caractères de long</li>
    <li>Avoir au moins 1 chiffre</li>
    <li>Avoir au moins une majuscule et une minuscule</li>
</ul>



<?php

function verifMdp($mdp){

    $taille = strlen($mdp);
    $cptMajus = 0;
    $cptMinus = 0;
    $cptNombre = 0;

    
        for ($i=0; $i < $taille; $i++)
        {
            $charactere = substr($mdp, $i, $i+1);
            if (($charactere >= 'a') & ($charactere <= 'z'))
            {
                $cptMinus += 1 ;
            }
            else if (($charactere >= 'A') & ($charactere <= 'Z'))
            {
                $cptMajus += 1;
            }
            else if (($charactere >= '0') & ($charactere <= '9'))
            {
                $cptNombre += 1;
            }
        }
    if (($taille >= 8) & ($cptMajus > 0) & ($cptMinus > 0) & ($cptNombre > 0))
    {
        return true;
    }
    else
    {
        return false;
    }   
}

var_dump(verifMdp('salutaaaaa'));
var_dump(verifMdp('saAutaaaaaa'));
var_dump(verifMdp('salA3taaaaa'));
var_dump(verifMdp('AMPDaaaaaaaa'));

?>  

<?php
require('footer.php');
?>
  




