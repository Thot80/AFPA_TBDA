<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
    crossorigin="anonymous">
    <title>Tableau</title>
</head>
<body>

<div class="container"> 
    
<!-- Appelle le header -->
<?php include("header.php");?>

    <!-- Tableau responsive -->
    <div class="table mx-auto">
        <!--  1 bande sur 2 colorée, surligne lorsqu'est survolé par la souris, présence de bordures -->
        <table class="table table-striped table-hover table-bordered">

            <!-- Header du tableau -->
            <thead class="bg-light">
                <tr>
                    <th>Photo</th>
                    <th>ID</th>
                    <th>Catégorie</th>
                    <th>Libellé</th>
                    <th>Prix</th>
                    <th>Couleur</th>
                </tr>   
                </thead>

            <!-- Body du tableau -->
            <tbody>         
                <tr class="table-warning">
                    <td><img src="public/images/7.jpg" alt="Barbecue Aramis" title="Barbecue Aramis" style="width: 10%; height:auto;"></td>
                    <td>7</td>
                    <td>Barbecue</td>
                    <td>Aramis</td>
                    <td>110.00€</td>
                    <td>Brun</td>
                </tr>
                <tr>
                    <td><img src="public/images/8.jpg" alt="Barbecue Athos" title="Barbecue Athos" style="width: 10%; height:auto;"></td>
                    <td>8</td>
                    <td>Barbecue</td>
                    <td>Athos</td>
                    <td>249.99€</td>
                    <td>Noir</td>
                </tr>
                <tr class="table-warning">
                    <td><img src="public/images/11.jpg" alt="Barbecue Clatronic" title="Barbecue Clatronic" style="width: 10%; height:auto;"></td>
                    <td>11</td>
                    <td>Barbecue</td>
                    <td>Clatronic</td>
                    <td>135.90€</td>
                    <td>Chrome</td>
                </tr>
                <tr>
                    <td><img src="public/images/12.jpg" alt="Barbecue Camping" title="Barbecue Camping" style="width: 10%; height:auto;"></td>
                    <td>12</td>
                    <td>Barbecue</td>
                    <td>Camping</td>
                    <td>88.00€</td>
                    <td>Noir</td>
                </tr>
                <tr class="table-warning">
                    <td><img src="public/images/13.jpg" alt="Brouette Green" title="Brouette Green" style="width: 10%; height:auto;"></td>
                    <td>13</td>
                    <td>Brouette</td>
                    <td>Green</td>
                    <td>49.00€</td>
                    <td>verte</td>
                </tr>
             </tbody>     

            <!-- Pas de footer de tableau -->
        </table>
    </div>

<?php include("footer.php"); ?>


</div>










    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" 
    crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" 
    crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
     crossorigin="anonymous"></script>
</body>
</html>