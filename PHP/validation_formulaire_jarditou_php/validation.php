<?php

/* 
Je créer ici une variable message de type tableau associatif avec comme clefs le nom du champ de formulaire correspondant
j'ai bien vu que la pratique courante était plutot de faire une variable de type string et d'afficher les erreurs au fur
et à mesure ou alors de concaténer les différents messages d'erreurs puis de les afficher à la fin, je veux pour ma part
les afficher à la fin sous chaque champ concerné
 */


$message['nom'] = '';
$message['prenom'] = '';
$message['sexe'] = '';
$message['date'] = '';
$message['cp'] = '';
$message['email'] = '';
$message['question'] = '';
$message['autorisation'] = '';
$email_regex = '#[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+#';
$action='action="contact.php"';

// Ces variables vont servir à recupérer les valeurs des bouton radio s'ils sont sélectionnés
$sexe_f = '';
$sexe_m = '';

// Ces variables servirons à gérer les choix dans le menu déroulant, incruster des selected dans le html
$option = '';
$option0 = '';
$option1 = '';
$option2 = '';
$option3 = '';
$option4 = '';

// Ce tableau contiendra une liste de booléens et permettrea de rediriger vers une autre page si tout est ok dans le formulaire
$declic = array();


/* 
Je préfère travailler sur des variables autres que le tableau $_POST dans un premier temps pour améliorer la lisibilité du code...
j'utilise la fonction htmlspecialchars pour échapper les balises HTML si l'utilisateur venait à en rentrer, ceci afin de boucher
la faille de sécurité XSS 
*/


/* 
Nous allons maintenant pouvoir faire nos tests de vérification
*/


// On ne commence les tests que si le formulaire a été soumis, important car ce script est destiné à être sur la même page PHP que le formulaire
if (!empty($_POST))
{
    // Déclaration de variables
    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    
    if (!empty($_POST['sexe']))
    {
        $sexe = $_POST['sexe'];
    }
    
    $date = htmlspecialchars($_POST['date']);
    $cp = htmlspecialchars($_POST['cp']);
    $email = htmlspecialchars($_POST['email']);
    $question = htmlspecialchars($_POST['question']);
    $autorisation = '';
    $option = '';
    $adresse = htmlspecialchars($_POST['adresse']);
    $ville = htmlspecialchars($_POST['ville']);
    
    if (!empty($_POST['autorisation']))
    {
        $autorisation = $_POST['autorisation'];
    }
    
    // Test sur nom
    if (empty($nom))
    {
        $message['nom'] = 'Veuillez saisir votre nom svp';
        $declic[] = false ;
    }
    elseif (strlen($nom) > 40)
    {
        $message['nom'] = 'Ce nom est trop long !';
        $declic[] = false;
    }
    else
     {
        $declic[] = true;
     }

     // Test prenom
    if (empty($prenom))
        {
            $message['prenom'] = 'Veuillez saisir votre prenom svp';
            $declic[] = false ;
        }
    elseif (strlen($prenom) > 40)
    {
        $message['prenom'] = 'Ce prenom est trop long !';
        $declic[] = false;
    }
    else
    {
        $declic[] = true;
    }

    // Test sexe, si radio pas coché, message champ obligatoire, si radio coché, ajout de checked dans l'input HTML pour conserver
    // la valeur lors du renvoi du formulaire !! Je suis pas peu fier sur ce coup...
    if (!isset($_POST['sexe']))
    {
        $message['sexe'] = 'Veuillez renseigner votre sexe svp';
        $declic[] = false ;
    }
    else
    {
        if($_POST['sexe'] == 'masculin')
        {
            $sexe_m = 'checked';
        }
        elseif($_POST['sexe'] == 'feminin')
        {
            $sexe_f = 'checked';
        }
        $declic[] = true;
    }

    // Test date
    if (empty($date))
        {
            $message['date'] = 'Veuillez saisir votre date de naissance svp';
            $declic[] = false;
        }
    elseif(!preg_match( '#^\d{1,2}/\d{1,2}/\d{4}$#' , $date ))
    {
        $message['date'] = 'Veuillez saisir une date au format jj/mm/aaaa';
        $declic[] = false;
    }
    else
    {
        $declic[] = true;
    }

    // Test code postal
    if (empty($cp))
        {
            $message['cp'] = 'Veuillez saisir votre code postal svp';
            $declic[] = false;
        }
    elseif(!preg_match( '#^[0-9]{5}$#' , $cp ))
    {
        $message['cp'] = 'Veuillez saisir un code postal valide';
        $declic[] = false;
    }
    else
    {
        $declic[] = true;
    }

    // Test email
    if (empty($email))
    {
        $message['email'] = 'Veuillez renseigner votre adresse e-mail svp';
        $declic[] = false;
    }
    elseif (!preg_match($email_regex , $email))
    {
        $message['email'] = 'Email non valide !';
        $declic[] = false;
    }
    else
    {
        $declic[] = true;
    }
    // Test du sujet sélectionné
    // si POST['sujet'] existe, on examine les cas et on affiche un message d'erreur ou pas, on stock la valeur pour la recharger
    // avec la nouvelle page, boum ! Ca ne marche pas...

    // N'envoi pas le formulaire la première fois qu'il est juste, l'envoi quand même la 2ème fois même si l'option0 est selected...
    if(!isset($_POST['sujet']))
    {
        $option = 'Veuillez sélectionner un sujet';
        $option0 = 'selected';
        $declic[] = false;
    }
    // Sinon, on selectionne comme valeur par defaul 'Veuillez sélectionner un sujet' et on affiche le message d'erreur
    else
    {
    $sujet = $_POST['sujet'];
        switch($sujet)
        {
            case  '0' :
                $option = 'Veuillez sélectionner un sujet';
                $option0 = 'selected';
                $declic[] = false;
            break;
            case 'mes_commandes' :
                $option = '';
                $option1 = 'selected';
                $declic[] = true;
            break;
            case 'question_sur_un_produit' :
                $option = '';
                $option2 = 'selected';
                $declic[] = true;
            break;
            case 'reclamation' :
                $option = '';
                $option3 = 'selected';
                $declic[] = true;
            break;
            case 'autre' :
                $option = '';
                $option4 = 'selected';
                $declic[] = true;
            break;
        }
    }
    // Test champ de texte
    if (empty($question))
    {
        $message['question'] = 'Veuillez saisir votre question ici';
        $declic[] = false;
    }
    else
    {
        $declic[] = true;
    }
    
    // Test check box + récupération de la valeur checked
    if (!isset($_POST['autorisation']))
    {
        $message['autorisation'] = 'Veuillez autoriser l\'envoi des données';
        $declic[] = false;
    }
    else
    {
        $autorisation = 'checked';
        $declic[] = true;
    }
}

// On parcourt le tableau contenant les booléens pour savoir si on passe sur la page qui affiche les données ou pas
// Des qu'une valeur false est trouvée, on casse la boucle car ca ne sert à rien de continuer
// Si les données sont bonnes, on affiche le résultat du formulaire sur une autre page
foreach ($declic as $test)
{
    if (!$test)
    {
        $action='action="contact.php"';
    break;
    }
    else
    {
        $action='action="donnees.php"';
    }
}
?>