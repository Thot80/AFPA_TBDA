<!--
 Connexion à la base de donnée jarditou, création de l'objet bdd_jarditou qui représente cette connexion
 Le bloc catch se déclenche et affiche un message d'erreur si la connexion à la base échoue
-->
<?php
try
{
    //Instanciation de la connexion à la base
    $bdd_jarditou = new PDO('mysql:host=localhost;dbname=jarditou;charset=utf8', 'root', '');
    
    // Configure des attributs PDO au gestionnaire de base de données
     // Ici nous configurons l'attribut ATTR_ERRORMODE en lui donnant la valeur ERRMODE_EXCEPTION (cf. Ressources pour en savoir plus).

    $bdd_jarditou->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
//Si échec de la connexion (du try), on attrape l'exception avec catch
catch (Exception $e)
{
    // On affiche le message et le code de l'erreur
    echo 'Erreur : ' . $e->getMessage() . '<br />';
    echo 'N° : ' . $e->getCode();
    die('fin du script');
}
?>

