<?php

$handle = fopen('liens.txt','r');

$file_lines = file('liens.txt', FILE_SKIP_EMPTY_LINES);

foreach ($file_lines as $key => $value )
{
    echo 'Voici le liens vers le site : <a href = "' . $value . '"> lien n° '. $key .'</a> <br>';
}


$infos = file('http://bienvu.net/misc/customers.csv', FILE_SKIP_EMPTY_LINES); // On récupère les infos du fichier, on les stocks dans un tableau associatif ligne par ligne
$separator = ','; // On définit le séparateur qui nous permettra de trier les infos dans le fichier


?>

<table>
<thead>
<tr>
<th>Surname</th>
<th>Firstname</th>
<th>Email</th>
<th>Phone</th>
<th>City</th>
<th>State</th>
</tr>
</thead>
<tbody>
<?php

// Pour chaque ligne du fichier csv, on veut une ligne du tableau
foreach($infos as $key => $ligne)
{
    echo "<tr>";
    $information = explode($separator, $ligne);
    foreach ($information as $cle => $valeur)
    {
        echo "<td>" . $valeur . "</td>";
    }
    echo "</tr>";
}
?>
</tbody>

</table>