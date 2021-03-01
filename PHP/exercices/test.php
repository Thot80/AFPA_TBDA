<?php


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
            echo 'La différence de ' .$nbr1. ' et ' .$nbre. ' vaut ' . ($nbr1 - $nbr2) ;
        break;
        case '*' :
            echo 'La produit de ' .$nbr1. ' par ' .$nbre. ' vaut ' . ($nbre * $nbre) ;
        break;
        case '-' :
            if ($nbr2 = 0)
            {
                echo 'On ne peut pas diviser un nombre par 0';
            }
            else
            {
                echo 'La division de ' .$nbr1. ' par ' .$nbr2. ' vaut ' . ($nbr1 / $nbr2) ;
            }
        break;
    }
    ?>

