<?php 
/* Redirection vers une page différente du même dossier, code pri sur php manual, pas encore eu le temps de l'étudier en détails... */
$host  = $_SERVER['HTTP_HOST'];
$uri   = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
    /* Switch sur les différentes valeures du bouton submit du formulaire détails, si retour sélectionné, retour à la page tableau
    si modifier sélectionné, redirection sur la page modifier, si supprimer, redirection sur la page supprimer
    on concatène dans l'URL les paires clefs/valeurs du tableau GET transmises par le formulaire pour y avoir accès
    sur les pages vers lesquelles on se redirige (sauf retour) */
    switch ($_GET['bouton'])
    {
        case 'retour' :
            $extra = 'tableau.php';
            header("Location: http://$host$uri/$extra");
            exit; 
        break;

        case 'modifier' :
            $extra = 'modifier.php?';
            foreach($_GET as $key=>$value)
            {
                $extra = $extra.$key.'='.$value.'&';
            }
            header("Location: http://$host$uri/$extra");
            exit; 
        break;
        case 'supprimer' :
            $extra = 'supprimer.php?';
            foreach($_GET as $key=>$value)
            {
                $extra = $extra.$key.'='.$value.'&';
            }
            header("Location: http://$host$uri/$extra");
            exit; 
        break;               
    }
?>