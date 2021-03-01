
// EXERCICE 1


// On créer une variable correspondant au bouton que l'on souhaite déclencher
// On récupère l'Id correspondante dans le HTML
// On place un mouchard sur l'évennement "click"
// La fonction jmv se déclenche lorsque le bouton est clické

var bouton24 = document.getElementById("Id_btn24").addEventListener("click", jmv);

// Classe les âges des gens en 3 catégories

function jmv()
{
    // Initialisation des variables utiles à la réalisation de la fonction
    saisi = 0;
    jeune = 0;
    moyen = 0;
    vieux = 0;
    compteur = 1;

    // La boucle tourne tant qu'un centenaire n'y est pas inséré, j'ai voulu prévoir un arrêt comme suit dans le cas ou l'utilisateur click sur annuler :
    // if (saisi == null) {break;} mais ça n'a pas marché, j'aimerais bien en parler !!


    while ( (saisi < 100) || (isNaN(saisi)) )
    {
        saisi = parseInt(prompt("Veuillez saisir l'âge n°" + compteur +  " svp"));

        // On a voulu prévoir un éventuel comportement déviant de l'utilisateur...
        // N'arrête pas la boucle, n'augmente pas le compteur

        if ( (saisi <= 0) || (isNaN(saisi)) )
        {
            alert("Saisie incorecte !");
        }

        // Compte les jeunes et le n° de la saisi
        else if (saisi < 20)
        {
            jeune = jeune + 1;
            compteur = compteur + 1 ;
        }

        // Compte les moyens et le n° de l'âge saisi
        else if (saisi <= 40)
        {
            moyen = moyen + 1;
            compteur = compteur + 1 ;
        }

        // Compte les vieux et le n° de l'âge saisi
        else
        {
            vieux = vieux + 1;
            compteur = compteur + 1 ;
        }
    }

    // Affiche le résultat dans une fenêtre
    alert("Il y a : " + jeune + " jeunes" + "\nIl y a : " + moyen + " moyens" + "\nIl y a : " + vieux + " vieux");
}


// EXERCICE 2

var bouton25 = document.getElementById("Id_btn25").addEventListener("click", TableMultiplication);


// function GetInteger() {

//     n = parseInt(prompt("Veuillez saisir un nombre svp"));

//     while (isNaN(n))
//     {
//         n = parseInt(prompt("Saisi incorrecte, recommencez !"));
//     }
//     return n;
// }

// function TableMultiplication(n)
// {
//     if (n == undefined)
//     {
//         nombre = GetInteger();
//     }
//    else 
//    {
//        nombre = parseInt(n);
//    }
//     for (i = 1; i <= 10; i++)
//     {
//         console.log(i + " x " + nombre + " = " + i*nombre);
//     }
//     alert("Consultez le log pour lire la table de multiplication du nombre " + nombre);
// }

// Je ne comprends pas pourquoi le code précédent ne fonctionnait pas en interraction avec l'évennement click alors qu'il marche sur la console...


function TableMultiplication()
{
    nombre = parseInt(prompt("Veuillez saisir un nombre svp"));

    for (i = 1; i <= 10; i++)
    {
        console.log(i + " x " + nombre + " = " + i*nombre);
    }
    alert("Consultez le log pour lire la table de multiplication du nombre " + nombre);
}


// EXERCICE 3

var bouton26 = document.getElementById("Id_btn26").addEventListener("click", RecherchePrenom);

var tab = ["Audrey", "Aurélien", "Flavien", "Jérémy", "Laurent", "Melik", "Nouara", "Salem", "Samuel", "Stéphane"];

// Je créer ici cette variable car à plusieurs reprises, je n'ai pas réussi à utiliser la fonction .length au sein de mes fonctions...
var taille_tab = tab.length;

function RecherchePrenom()
{
    prenom = prompt("Veuillez saisir un prénom svp \nVeillez à respecter les accents et à mettre une majuscule au prénom !");

    // array.indexOf("string") renvoi l'indice de la première occurence de "string" dans array ou -1 si ne trouve pas
    // Cette fonction nous évite une boucle for en plus mais il aurait été possible de faire sans 
    indice = tab.indexOf(prenom);
    if (indice == -1) 
    {
        alert("Nous n'avons pas pu trouver le prénom en question !");
    }
    else
    {
        // Décale tous les prénoms d'un cran à partir de l'endroit ou on a trouvé le prénom recherché, celui ci est écrasé
        // Le dernier indice du tableau est tab.length-1, on arrete donc à tab.legth -2 histoire que le dernier tab[i] de la boucle ait un sens
       for (i=indice; i <= taille_tab - 2; i++)
       {
           tab[i] = tab[i+1];
       }
       tab[taille_tab -1] = "";
       console.log(tab);
    }
}



// EXERCICE 4

var bouton27 = document.getElementById("Id_btn27").addEventListener("click", TotalCommande);


function TotalCommande()
{
    pu = parseInt(prompt("Veuillez saisir le prix unitaire du produit"));
    qtecom = parseInt(prompt("Veuillez saisir la quantité de produit commandée"));
    tot = pu * qtecom;
    if (tot < 100)
    {
        rem = 0;
        port = 6;
        remise = "0%";
    }
    else if (tot <= 200)
    {
        rem = 5*tot/100;
        port = 6;
        remise = "5%";

    }
    // 333 € est la valeure du prix total pour laquelle les 2 % de frais de port sur le prix remisé dépasse les 6€
    else if (tot <= 333,33)
    {
        rem = 10*tot/100;
        port = 6;
        remise = "10%";
    }
    // De même, au dela de cette valeur, prix remisé = 500 €, frais de port offert
    else if (tot < 555,56)
    {
        rem = 10*tot/100;
        port = 2*(tot-rem)/100;
        remise = "10%";
    }
    else 
    {
        rem = 10*tot/100;
        port=0;
        remise = "10%";
    }

    // .toFixed() est utilisé dans les programmes "financiers" pour arrondir les chiffres (précision en argument)
    pap = tot - rem + port;
    rem = rem.toFixed(2);
    port = port.toFixed(2);
    pap = pap.toFixed(2);
    alert("Le prix total à payer est " + pap + " €" + "\nLa remise est de "+ remise + " soit " + rem + " €"+ "\nLes frais de port sont de " + port + " €");
}

// Ca n'est surement pas la meilleure manière de faire, probablement un meilleur résultat avec des conditions imbriquées, je le referais si j'ai le temps !


