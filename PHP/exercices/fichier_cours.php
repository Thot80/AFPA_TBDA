<?php
$title = "Cours sur les fichiers";
require('header.php');
?>












<?php

//                                      Cours sur la lecture écriture en PHP

/*
************************************** Tableau des principaux mode d'ouverture des fichiers ************************************************

Caractère   Accès                   Placement sur le fichier    Création si n'existe pas    Notes

r           lecture                 début                       non

r+          lecture+ecriture        début                       non

w           écriture                début                       oui                         réduit la taille du fichier à 0

w+          lecture +ecriture       début                       oui                         réduit la taille du fichier à 0                   

a           ecriture                fin                         oui                         fseek() n'a aucun effet

a+          lecture+ecriture        fin                         oui                         fseek() que pour la lecture

x           ecriture                debut                       oui                         Si le fichier existe, fopen() échoue

x+          lecture+ecriture        début                       oui                         Si le fichier existe, fopen() echoue

c           ecriture                début                       oui                         Si le fichier existe, n'est pas tronqué

c+          lecture+ecriture        début                       oui                         Si le fichier existe n'est pas tronqué

*/


/*
    Retour chariot en fonction des OS
    Windows   : /r/n
    GNU/Linux : /n
    MacOs     : /r

    Pour éviter les problème de retour à ligne, il est conseillé de travailler en mode binaire, il suffit de rajouter un b après la lettre du mode de lecture (expl : ab+, rb, etc...)

*/

$myFile = fopen("liens.txt", "r"); // Création d'un pointeur sur le fichier, en argument de la fonction fopen, le chemin relatif et le mode d'ouverture du fichier, cette fonction retourne true si ouverture ok et false si le fichier n'a pas pu être ouvert

if (!$myFile)
{
    exit ("Le fichier n'a pas pû être ouvert correctement"); // Si problème d'ouverture, quitte le script et affiche un message d'erreur / die = exit, allias
}

$str = fgetc($myFile); // fgetc = file get charachter, retourne un charactère et pointe sur le suivant, retourne false quand il n'y a plus rien à lire

echo $str;

echo "<br>";

while($str = fgetc($myFile))
    echo $str;



if(!fclose($myFile)) // Fonction qui referme le pointeur sur le fichier // Retourne true ou false de la même manière que fopen()
    exit ("Le fichier n'a pas pû etre fermé correctement");

$myFile = fopen("liens.txt", "r");

// feof() = file end of file, renvoi true si en fin de fichier

while (!feof($myFile)) 
{
    echo fgetc($myFile);
}
if(!fclose($myFile)) // Fonction qui referme le pointeur sur le fichier // Retourne true ou false de la même manière que fopen()
    exit ("Le fichier n'a pas pû etre fermé correctement");

echo "<br> <br>";

$myFile = fopen("liens.txt", "r");
// Fonction fgets() pour file get string, de base lis ligne par ligne, si 2 arguments entier, lira le nombre de caractère en argument
while (!feof($myFile))
    echo fgets($myFile) . "<br>";

// En mode binaire, fread() est très efficace, elle lit ligne par ligne également ou un certain nombre d'octets passés en paramètre
if(!fclose($myFile)) // Fonction qui referme le pointeur sur le fichier // Retourne true ou false de la même manière que fopen()
    exit ("Le fichier n'a pas pû etre fermé correctement");

// Il existe aussi une fonction qui permet de lire l'intégralité d'un fichier sans même l'avoir ouvert au préalable, file(), elle renvoi les infos du fichier sous forme d'un tableau

$infos = file("liens.txt");
echo "<pre>";
print_r($infos);
echo "</pre>";

// Il existe une fonction similaire qui permet de récupérer les infos du fichiers mais sous forme de chaine de caractère cette fois si, renvoi en une seule chaine

$infosString = file_get_contents("liens.txt");
var_dump($infosString);


// ******************************************** Ecriture *****************************************************

// Equivalent de fread() : fwrite();

$myFile = fopen("liens.txt", "a");
fwrite($myFile,"https://www.udemy.com/home/my-courses/learning/");

?>

<?php
require('footer.php');
?>