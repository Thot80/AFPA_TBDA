<!-- formulaire de création d'une nouvelle entrée // ne vérifie pas la conformité des données -->

<?php

if($_POST['bouton'] == 'enregistrer')
{

    // On récupère d'abord les valeurs du tableau POST 
    $pro_ref = $_POST['reference'];
    $pro_cat = $_POST['categorie'];
    $pro_libelle = $_POST['libelle'];
    $pro_description = $_POST['description'];
    /* Sert à enlever le signe € à la fin du prix */
    if (!strpos($_POST['prix'], '€'))
    {
        $pro_prix =floatval($_POST['prix']);
    }
    else
    {
        $pro_prix =floatval(substr($_POST['prix'],0,-1));
    }
    $pro_stock = $_POST['stock'];
    $pro_couleur = $_POST['couleur'];
    $pro_photo = $_POST['pro_photo'];

    // Dans la bdd, pro_block tiny int vaut 0 ou 1 pour pas bloqué ou bloqué, d'ou cette manip
    if ($_POST['bloque'] == 'non')
    {
        $pro_bloque = 0;
    }
    else
    {
        $pro_bloque = 1;
    }
    $pro_d_ajout = $_POST['date_ajout'];
    ?>

    <!-- Connexion à la base de données jarditou -->
    <?php
        include("conexion_bdd_jarditou.php");
    ?>

    <?php
    $requete_categorie = "SELECT categories.cat_id FROM categories 
    WHERE cat_nom=".'"'.$pro_cat.'"'; // Selectionne l'id dans la table categorie correspondant au nom de categorie du produit
    $cat_info = $bdd_jarditou->query($requete_categorie); // On execute la requete
    $cat_id = $cat_info->fetch(PDO::FETCH_OBJ);
    $pro_cat_id = $cat_id->cat_id; // On stock l'id dans pro_cat_id pour l'injecter ensuite dans la table produit
    $cat_info->closeCursor(); // On libère la connexion
    ?>
    <?php
    // Construction de la requête CREATE sans injection SQL
    $ajout_rq = "INSERT INTO produits (pro_cat_id, pro_ref, pro_libelle,pro_description, pro_prix, pro_stock,
    pro_couleur, pro_photo, pro_d_ajout, pro_bloque) VALUES (:pro_cat_id,:pro_ref,:pro_libelle,:pro_description,:pro_prix,:pro_stock,
    :pro_couleur,:pro_photo,:pro_d_ajout,:pro_bloque)";
    try
    {

        $ajout = $bdd_jarditou->prepare($ajout_rq); // On prépare la requête

        // On lie ensuite les valeurs aux champs correspondants
        $ajout->bindValue(':pro_cat_id', $pro_cat_id, PDO::PARAM_INT);
        $ajout->bindValue(':pro_ref', $pro_ref, PDO::PARAM_STR);
        $ajout->bindValue(':pro_libelle', $pro_libelle, PDO::PARAM_STR);
        $ajout->bindValue(':pro_description', $pro_description, PDO::PARAM_STR);
        $ajout->bindValue(':pro_prix', $pro_prix, PDO::PARAM_STR);
        $ajout->bindValue(':pro_stock', $pro_stock, PDO::PARAM_INT);
        $ajout->bindValue(':pro_couleur', $pro_couleur, PDO::PARAM_STR);
        $ajout->bindValue(':pro_photo', $pro_photo, PDO::PARAM_STR);
        $ajout->bindValue(':pro_d_ajout', $pro_d_ajout, PDO::PARAM_STR);
        $ajout->bindValue(':pro_bloque', $pro_bloque, PDO::PARAM_INT);
        $ajout->execute(); // On execute la requête
        $ajout->closeCursor(); // On libère la connexion
    }
    // Gestion des erreurs
    catch (Exception $e) 
    {
        echo "La connexion à la base de données a échoué ! <br>";
        echo "Merci de bien vérifier vos paramètres de connexion ...<br>";
        echo "Erreur : " . $e->getMessage() . "<br>";
        echo "N° : " . $e->getCode();
        die("Fin du script");
    }

    // Redirection vers la page index.php 
    header("Location: index.php");
    exit;
}
else
{
    // Redirection vers la page index.php 
    header("Location: index.php");
}
?>