<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <title>Tableau</title>
</head>
<body>

<div class="container">

    <!-- Header -->
    <?php
    include("header.php");
    ?>

    <!-- Connexion à la base de données jarditou -->
    <?php
    include("conexion_bdd_jarditou.php");
    ?>

    <!-- On fait une requête (query) SQL dans la table jarditou, ici selectionner toutes les colonnes de la table produits, 
    on stock le résultat de cette requête dans une variable (en fin plutot un objet je crois...) table_produit -->
    <?php
    $table_produit = $bdd_jarditou->query('SELECT * FROM `produits`');
    ?>
    <!-- J'aurait probablement pu sélectionner uniquement les champs qui m'interessent dans l'ordre qui m'intéresse -->

    <!-- Tableau responsive -->
        <!--  1 bande sur 2 colorée, surligne lorsqu'est survolé par la souris, présence de bordures -->
        <table class="table table-striped table-hover table-bordered">

            <!-- Header du tableau -->
            <thead class="bg-light">
                <tr>
                    <th>Photo</th>
                    <th>ID</th>
                    <th>Référence</th>
                    <th>Libellé</th>
                    <th>Prix</th>
                    <th>Stock</th>
                    <th>Couleur</th>
                    <th>Ajout</th>
                    <th>Modif</th>
                    <th>Bloqué</th>
                </tr>   
            </thead>
                
            <!-- 
            Body du tableau // A chaque ligne du tableau va correspondre une ligne de la base de donnée
            Il faut faire une boucle sur la requête fetch pour récupérer les infos ligne par ligne dans la bdd et
            les afficher/mettre en forme dans le tableau 
            -->
            <tbody>   
            <!-- Boucle sur chaque ligne de la bdd, pour chaque ligne $produit est un tableau associatif -->
                <?php
                    while($produit = $table_produit -> fetch((PDO::FETCH_OBJ)))
                    {
                        /* Initialisation d'une ligne de tableau HTML */
                        echo '<tr>';
                            /* Cellule image on utilise, l'id et le libelle de la data base dans notre balise html*/
                            echo '<td>';
                                echo '<img src="../public/images/'.($produit->pro_id).'.jpg" alt="'.($produit->pro_libelle).
                                    '" title=" '.($produit->pro_libelle).'"style="width: 50%; height:auto;">';
                            echo '</td>';

                            /* 2ème cellulle, id du produit */
                            echo '<td>';
                                echo $produit->pro_id;
                            echo '</td>';

                            /* 3ème cellule, reférence du produit */
                            echo '<td>';
                                echo $produit->pro_ref;
                            echo '</td>';

                            /* 4ème cellulle, libellé du produit en lien vers une autre page */
                            echo '<td>';
                                echo '<a href="detail.php?pro_id='.$produit->pro_id.'" title="Détails">'.$produit->pro_libelle.'</a>';
                            echo '</td>';

                            /* 5ème cellule, prix du produit */
                            echo '<td>';
                                echo $produit->pro_prix.'€';
                            echo '</td>';

                            /* 6ème cellule, stock du produit */
                            echo '<td>';
                                echo $produit->pro_stock;
                            echo '</td>';

                            /* 6ème cellule, couleur du produit */
                            echo '<td>';
                                echo $produit->pro_couleur;
                            echo '</td>';

                            /* 7ème cellule, ajout du produit */
                            echo '<td>';
                                echo $produit->pro_d_ajout;
                            echo '</td>';
                            
                            /* 8ème cellule, ajout du produit */
                            echo '<td>';
                                echo $produit->pro_d_modif;
                            echo '</td>';

                            /* 9ème cellule, bloqué */
                            echo '<td>';
                                echo $produit->pro_bloque;
                            echo '</td>';

                            /* On referme la ligne du tableau */
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>

    <!-- On libère la connexion au serveur  -->
    <?php $table_produit->closeCursor();?>  

    <div class="text-center">
    <a href="ajouter.php" title="S'y rendre">Vous souhaitez ajouter un produit ?</a>
    </div>

    <br>

    <!-- Footer -->
    <?php
    include("footer.php");
    ?>

</div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
     crossorigin="anonymous"></script>   
</body>
</html>