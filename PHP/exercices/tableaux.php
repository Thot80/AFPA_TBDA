
<?php

$jourMoisAnnee =
    [
        'Janvier' => 31,
        'Février' => 28,
        'Mars' => 31,
        'Avril' => 30,
        'Mai' => 31,
        'Juin' => 30,
        'Juillet' => 31,
        'Août' => 31,
        'Septembre' => 30,
        'Octobre' => 31,
        'Novembre' => 30,
        'Décembre' => 31
    ];

$title = 'Tableaux';
require('header.php');
?>
    <h1 class="text-center">
    Les Tableaux
    </h1>
    <h2 class="text-center">Exercice 1</h2>
<!-- 
    Exercice 1

    Cet exercice est issu d'un cas réel de développement d'une application de gestion de plannings.

    Le tableau $a ci-dessous représente les plannings de groupes de stagiaires.
    Le code 19XXX représente le numéro de groupe.
    Les positions correspondent aux numéros de semaines dans l'année (peu importe quelle année).
    Les valeurs vides ("") en début et fin de tableau indiquent respectivement que la formation n'a pas commencé / est terminée.
    Quand une formation a débuté, les cellules vides indiquent des vacances.


$a = array("19001" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "", "", "Centre",
 "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", "Validation"), 
     "19002" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Stage",
      "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", ""), 
     "19003" => array("", "", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", 
     "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "", "", "Validation") 
    );
Quelle semaine a lieu la validation du groupe 19002 ?

Il suffit de trouver l'index de la case "Validation" est lui ajouter 1
 -->
 <p class="mx-3">
 <?php
$compteur = 0;
$a = array("19001" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "", "", "Centre",
 "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", "Validation"), 
     "19002" => array("Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Stage",
      "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Validation", ""), 
     "19003" => array("", "", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", "Centre", 
     "Centre", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "Stage", "", "", "Validation") 
    );

foreach($a['19002'] as $semaine)
{
    $compteur++;
    if ($semaine == 'Validation')
    {
        echo 'La validation du groupe 2 à lieu la semaine n° ' .$compteur ;
    break;
    }
}
echo '<br>';
?>
</p>

<h2 class="text-center">Exercice 2</h2>
<!--

Exercice 2
Trouver la position de la dernière occurrence de Stage pour le groupe 19001.  -->
<p class="mx-3">
<?php
$positions_stage = array_keys($a[19001],"Stage");
echo 'Le dernier stage du groupe 1 s\'est déroulé semaine n° ' .(end($positions_stage) +1) . '<br>';
?>
</p>
<!-- Exercice 3

Extraire, dans un nouveau tableau, les codes des groupes. -->

<h2 class="text-center">Exercice 3</h2>
<p class="mx-3">
<?php
foreach ($a as $clefs => $valeur)
{
    $new_tab[] = $clefs;
    echo 'Groupe n° '.$clefs. '<br>';
}
foreach ($new_tab as $value)
{
    echo 'Groupe n°' .$value. '<br>';
}
?>
</p>

<h2 class="text-center">Exercice 4</h2>
<!-- Exercice 4

Combien de semaines dure le stage du groupe 19003 ? -->
<p class="mx-3">
<?php

$new_tab = array_count_values($a[19003]);
echo 'Le stage du groupe n°3 dure ' . $new_tab["Stage"] . ' semaines';

?>

    </p>
    <h2 class="text-center">
    Mois de l'Année
    </h2>
    <table class='table'>
        <thead>
            <tr>
                <th>Mois</th>
                <th>Nombre de jour</th>
            </tr>
        </thead>
        <tbody>
        <!-- On affiche une ligne de 2 colonnes du tableau par pair clé/valeure de notre tableau associatif  -->
            <?php 
            foreach($jourMoisAnnee as $key => $value)
            {?>
                <tr>
                <td class="px-5 text-align"><?=$key?></td> <td><?=$value?></td>
                </tr>
           <?php }?>


        </tbody>
    </table>

<!-- Tri des valeurs du tableaux associatif en mode numérique -->

<h2 class="text-center">
Mois de l'Année triés
</h2>

<table class='table'>
        <thead>
            <tr>
                <th>Mois</th>
                <th>Nombre de jour</th>
            </tr>
        </thead>
        <tbody>
        <!-- On affiche une ligne de 2 colonnes du tableau par pair clé/valeure de notre tableau associatif  -->
            <?php
            asort($jourMoisAnnee, SORT_NUMERIC);
            foreach($jourMoisAnnee as $key => $value)
            {
                echo '<tr>';
                echo '<td class=\'px-5 text-align\'>'.$key.'</td> <td>'.$value.'</td>';
                echo '</tr>';    
            }; 
            ?>

        </tbody>
    </table>
<?php
$capitales = array(
    "Bucarest" => "Roumanie",
    "Bruxelles" => "Belgique",
    "Oslo" => "Norvège",
    "Ottawa" => "Canada",
    "Paris" => "France",
    "Port-au-Prince" => "Haïti",
    "Port-d'Espagne" => "Trinité-et-Tobago",
    "Prague" => "République tchèque",
    "Rabat" => "Maroc",
    "Riga" => "Lettonie",
    "Rome" => "Italie",
    "San José" => "Costa Rica",
    "Santiago" => "Chili",
    "Sofia" => "Bulgarie",
    "Alger" => "Algérie",
    "Amsterdam" => "Pays-Bas",
    "Andorre-la-Vieille" => "Andorre",
    "Asuncion" => "Paraguay",
    "Athènes" => "Grèce",
    "Bagdad" => "Irak",
    "Bamako" => "Mali",
    "Berlin" => "Allemagne",
    "Bogota" => "Colombie",
    "Brasilia" => "Brésil",
    "Bratislava" => "Slovaquie",
    "Varsovie" => "Pologne",
    "Budapest" => "Hongrie",
    "Le Caire" => "Egypte",
    "Canberra" => "Australie",
    "Caracas" => "Venezuela",
    "Jakarta" => "Indonésie",
    "Kiev" => "Ukraine",
    "Kigali" => "Rwanda",
    "Kingston" => "Jamaïque",
    "Lima" => "Pérou",
    "Londres" => "Royaume-Uni",
    "Madrid" => "Espagne",
    "Malé" => "Maldives",
    "Mexico" => "Mexique",
    "Minsk" => "Biélorussie",
    "Moscou" => "Russie",
    "Nairobi" => "Kenya",
    "New Delhi" => "Inde",
    "Stockholm" => "Suède",
    "Téhéran" => "Iran",
    "Tokyo" => "Japon",
    "Tunis" => "Tunisie",
    "Copenhague" => "Danemark",
    "Dakar" => "Sénégal",
    "Damas" => "Syrie",
    "Dublin" => "Irlande",
    "Erevan" => "Arménie",
    "La Havane" => "Cuba",
    "Helsinki" => "Finlande",
    "Islamabad" => "Pakistan",
    "Vienne" => "Autriche",
    "Vilnius" => "Lituanie",
    "Zagreb" => "Croatie"
);

// Tri des clés du tableau dans l'ordre alphabétique
ksort($capitales);
?>
<h2 class="text-center">
Capitales triées
</h2>
<table class='table'>
        <thead>
            <tr>
                <th>Capitale</th>
                <th>Pays</th>
            </tr>
        </thead>
        <tbody>
        <!-- On affiche une ligne de 2 colonnes du tableau par pair clé/valeure de notre tableau associatif  -->
            <?php 
            foreach($capitales as $key => $value)
            {
                echo '<tr>';
                echo '<td class=\'px-5 text-align\'>'.$key.'</td> <td>'.$value.'</td>';
                echo '</tr>';    
            }; 
            ?>

        </tbody>
    </table>
<h2 class="text-center">Nom de Pays triés
</h2>

<!-- Tri des valeurs du tableau par ordre alphabétique -->
<?php asort($capitales);?>
<table class='table'>
        <thead>
            <tr>
                <th>Pays</th>
                <th>Capitale</th>
            </tr>
        </thead>
        <tbody>
        <!-- On affiche une ligne de 2 colonnes du tableau par pair clé/valeure de notre tableau associatif  -->
            <?php 
            foreach($capitales as $key => $value)
            {
                echo '<tr>';
                echo '<td class=\'px-5 text-align\'>'.$value.'</td> <td>'.$key.'</td>';
                echo '</tr>';    
            }; 
            ?>

        </tbody>
    </table>
<?php echo 'Le tableau comporte ' .count($capitales).' pays'; ?>

<h2 class="text-center">
Suppression des capitales qui commencent par B
</h2>
<!--Voire array_splice et array_pop-->
<?php
ksort($capitales);
while (array_key_exists('#[%B]#', $capitales))
{
    unset($capitales['#[%B]#']);
}

?>
<table class='table'>
        <thead>
            <tr>
                <th>Capitale</th>
                <th>Pays</th>
            </tr>
        </thead>
        <tbody>
        <!-- On affiche une ligne de 2 colonnes du tableau par pair clé/valeure de notre tableau associatif  -->
            <?php 
            foreach($capitales as $key => $value)
            {
                echo '<tr>';
                echo '<td class=\'px-5 text-align\'>'.$key.'</td> <td>'.$value.'</td>';
                echo '</tr>';    
            }; 
            ?>

        </tbody>
    </table>
<h2 class="text-center">Liste des région et départements</h2>

<?php
$departements = array(
    "Hauts-de-france" => array("Aisne", "Nord", "Oise", "Pas-de-Calais", "Somme"),
    "Bretagne" => array("Côtes d'Armor", "Finistère", "Ille-et-Vilaine", "Morbihan"),
    "Grand-Est" => array("Ardennes", "Aube", "Marne", "Haute-Marne", "Meurthe-et-Moselle", "Meuse", "Moselle", "Bas-Rhin", "Haut-Rhin", "Vosges"),
    "Normandie" => array("Calvados", "Eure", "Manche", "Orne", "Seine-Maritime")
);
ksort($departements);
?>

<table class='table'>
        <thead>
            <tr>
                <th>Region</th>
                <th>Départements</th>
            </tr>
        </thead>
        <tbody>
        <!-- On affiche une ligne de 2 colonnes du tableau par pair clé/valeure de notre tableau associatif  -->
            <?php 
            foreach($departements as $key => $value)
            {
                echo '<tr>';
                echo '<td class=\'px-5 text-align\'>'.$key.'</td>';
                foreach($value as $valeur)
                {
                    
                    echo '<td class=\'px-5 text-align\'>'.$valeur.'</td>';
                    
                }
                echo '</tr>';    
            }; 
            ?>

        </tbody>
    </table>

    <h2 class="text-center">Région et nombre de départements</h2>
    <table class='table'>
        <thead>
            <tr>
                <th>Region</th>
                <th>Nombre de départements</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            foreach($departements as $key => $value)
            {
                echo '<tr>';
                echo '<td class=\'px-5 text-align\'>'.$key.'</td> <td>' .count($value).'</td>';
                echo '</tr>';
            }; 
            ?>
<?php
require('footer.php');
?>

