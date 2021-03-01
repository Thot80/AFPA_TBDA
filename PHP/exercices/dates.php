<?php
$title = 'Dates et Heures';
require('header.php');
?> 



<?php 

$date = new DateTime ('14-07-2019');

echo 'Le numéro de la semaine correspondant à cette date est le : '  . $date->format('W') . '<br>'; 

$dateDuJour = new DateTime();
$dateDeFin = new DateTime('31-07-2021');
$finFormation = ($dateDeFin->getTimestamp() - $dateDuJour->getTimestamp())/(60*60*24);

echo 'Nous sommes aujourd\'hui le ' . $dateDuJour->format('d-m-Y') . '<br>';

echo 'Notre formation finie donc dans : ' . intval($finFormation) . ' jours <br>';

// Une anné et bisextile si : (elle est divisible par 4 ET non divisible par 100) OU si (elle est divisible par 400)

function bissextile($annee)
{
    if( ( ($annee % 4 == 0) and ($annee % 100 != 0) ) or ($annee % 400 == 0))
    {
        return true;
    }
    else
    {
        return false;
    } 
}
if (bissextile(2000))
{
    echo 'L\'an 2000 était une année bissextille <br>';
}
else
{
    echo 'L\'an 2000 n\'était pas une année bissextille <br>';
}
if (bissextile(2006))
{
    echo 'L\'an 2006 était une année bissextille <br>';
}
else
{
    echo 'L\'an 2006 n\'était pas une année bissextille <br>';
}
if (bissextile(2012))
{
    echo 'L\'an 2012 était une année bissextille <br>';
}
else
{
    echo 'L\'an 2012 n\'était pas une année bissextille <br>';
}
if (bissextile(2018))
{
    echo 'L\'an 2018 était une année bissextille <br>';
}
else
{
    echo 'L\'an 2018 n\'était pas une année bissextille <br>';
}
if (bissextile(2020))
{
    echo 'L\'an 2020 était une année bissextille <br>';
}
else
{
    echo 'L\'an 2020 n\'était pas une année bissextille <br>';
}

if (bissextile(1900))
{
    echo 'L\'an 1900 était une année bissextille <br>';
}
else
{
    echo 'L\'an 1900 n\'était pas une année bissextille <br>';
}

// Validité des dates à partir de l'exemple du 32/17/2009


$date = DateTime::createFromFormat('d/m/Y', '32/17/2019');
$error = DateTime::getLastErrors();

if (($error["error_count"] > 0) || ($error["warning_count"] > 0))
{
   echo 'La date n\'est pas au bon format <br>';
}
else
{
    
    echo 'La date est au bon format <br>';
}

date_default_timezone_set("Europe/Paris");
echo 'Voici l\'heure du jour au format heureheure h minuteminute :' . date('H\hi') .'<br>';

echo '<br> Nous allons maintenant afficher la date qu\'il sera dans 1 mois <br>';


$dateMoisProchain = $dateDuJour->modify('+1 month');

echo $dateMoisProchain->format('d/m/Y');

echo "<p> J'imagine qu'il s'agit d'un timestamp, la référence est le 01 Janvier 1970 à minuit pile, je vais convertir ce timestamp pour retrouver la date à laquelle il fait référence </p>";

echo date('d-m-Y', 1000200000);

echo "<br> Drôle de choix d'example ..."

?>

<?php
require('footer.php');
?>