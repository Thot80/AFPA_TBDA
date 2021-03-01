<!-- Connexion à la base de données jarditou -->
    <?php
    include("conexion_bdd_jarditou.php");
    if ($_POST['bouton']=='supprimer')
    {
        try
        {
            $pro_id=$_POST['pro_id'];
            $requete_suppr = $bdd_jarditou->prepare("DELETE FROM produits WHERE pro_id=:pro_id");
            $requete_suppr->bindValue(':pro_id', $pro_id, PDO::PARAM_INT);
            $requete_suppr->execute();
            $requete_suppr->closeCursor();
        }
        catch (Exception $e) 
        {
            echo "La connexion à la base de données a échoué ! <br>";
            echo "Merci de bien vérifier vos paramètres de connexion ...<br>";
            echo "Erreur : " . $e->getMessage() . "<br>";
            echo "N° : " . $e->getCode();
            die("Fin du script");
        }
        header("Location: index.php");
        exit;
    }
    else
    {
        header("Location: index.php");
    }
    ?>