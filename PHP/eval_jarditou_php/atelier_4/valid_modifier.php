<!-- formulaire de validation des modifications // ne vérifie pas la conformité des données, inscrit les modif dans la base de donnée -->

<?php

if($_POST['bouton'] == 'enregistrer')
{

    // On récupère d'abord les valeurs du tableau POST 
    $pro_id = $_POST['pro_id'];
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
    $pro_d_modif = $_POST['date_modif'];
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
    // Construction de la requête UPDATE sans injection SQL, clause WHERE permet d'appliquer le changement au bon produit
    $modif_rq = "UPDATE produits SET pro_cat_id=:pro_cat_id, pro_ref=:pro_ref, pro_libelle=:pro_libelle,
    pro_description=:pro_description, pro_prix=:pro_prix, pro_stock=:pro_stock,
    pro_couleur=:pro_couleur, pro_photo=:pro_photo, pro_d_ajout=:pro_d_ajout,
    pro_d_modif=:pro_d_modif, pro_bloque=:pro_bloque WHERE pro_id=:pro_id";
    try
    {

        $modif = $bdd_jarditou->prepare($modif_rq); // On prépare la requête

        // On lie ensuite les valeurs aux champs correspondants
        $modif->bindValue(':pro_id', $pro_id, PDO::PARAM_INT);
        $modif->bindValue(':pro_cat_id', $pro_cat_id, PDO::PARAM_INT);
        $modif->bindValue(':pro_ref', $pro_ref, PDO::PARAM_STR);
        $modif->bindValue(':pro_libelle', $pro_libelle, PDO::PARAM_STR);
        $modif->bindValue(':pro_description', $pro_description, PDO::PARAM_STR);
        $modif->bindValue(':pro_prix', $pro_prix, PDO::PARAM_STR);
        $modif->bindValue(':pro_stock', $pro_stock, PDO::PARAM_INT);
        $modif->bindValue(':pro_couleur', $pro_couleur, PDO::PARAM_STR);
        $modif->bindValue(':pro_photo', $pro_photo, PDO::PARAM_STR);
        $modif->bindValue(':pro_d_ajout', $pro_d_ajout, PDO::PARAM_STR);
        $modif->bindValue(':pro_d_modif', $pro_d_modif, PDO::PARAM_STR);
        $modif->bindValue(':pro_bloque', $pro_bloque, PDO::PARAM_INT);
        $modif->execute(); // On execute la requête
        $modif->closeCursor(); // On libère la connexion
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