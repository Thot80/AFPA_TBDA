var bouton1 = document.getElementById("Id_btn1");
bouton1.addEventListener("click",carre);

function carre(x){
x = parseInt(prompt("Entrez un nombre"));
while(isNaN(x))
{
    alert("Saisie incorrecte !");
    y = prompt("Entrez un nombre ou cliquez sur Annuler pour sortir");
    x = parseInt(y);
    if (y== null) {break;}  
}
resultat = x*x;
alert("Le carré du nombre saisi est : " + resultat);
}


var bouton2 = document.getElementById("Id_btn2");
bouton2.addEventListener("click",salutation);

function salutation(){
prenom = prompt("Quel est votre prénom ?");
alert("Bonjour, " + prenom +" !");
}


var bouton3 = document.getElementById("Id_btn3");
bouton3.addEventListener("click", prixTTC);

function prixTTC(){

    pHT = parseInt(prompt("Donnez le prix HT"));
    taux = parseInt(prompt("Donnez le taux de TVA en %"));
    nbre = parseInt(prompt("Combien d'articles avez vous pris ?"));

    while ((isNaN(pHT)) || (isNaN(taux)) || (isNaN(nbre)))
    {
        alert("Saisie Incorecte !");
        pHT = parseInt(prompt("Donnez le prix HT"));
        taux = parseInt(prompt("Donnez le taux de TVA en %"));
        nbre = parseInt(prompt("Combien d'articles avez vous pris ?"));
    }

    taux = taux / 100;
    pTTC = nbre * pHT *(1 + taux);
    alert("Le prix TTC est : " + pTTC);
}

var bouton4 = document.getElementById("Id_btn4");
bouton4.addEventListener("click", signe);

function signe(n1) {

n1 = parseInt(prompt("Veuillez renseigner un nombre"));

if (n1 > 0) 
{
    alert("Ce nombre est positif");
}
else if (n1 < 0)
{
    alert("Ce nombre est négatif");
}
else
{
    alert("Ce nombre est nul");
}
}

var bouton5 = document.getElementById("Id_btn5");
bouton5.addEventListener("click", signe_bis);

function signe_bis(n1, n2){

n1 = parseInt(prompt("Veuillez renseigner un premier nombre"));
n2 = parseInt(prompt("Veuillez renseigner un second nombre"));
if ((n1 < 0 && n2 < 0) || (n1 > 0 && n2 > 0))
{
    alert("Le produit est positif");
}
else if ((n1 < 0 && n2 > 0 ) || (n1 >0 && n2 < 0))
{
    alert("Le produit est négatif");
}
else
{
    alert("Le produit est nul");
}
}

var bouton6 = document.getElementById("Id_btn6");
bouton6.addEventListener("click", avenir);

function avenir(heure) {

heure = prompt("Veuillez renseigner les heures puis les minutes au format hh/mm", "23/58");
h = heure.substr(0, 2) ;
m = heure.substr(3, 2) ;
test = heure.substr(2, 1); 
h = parseInt(h) ;
m = parseInt(m) ;
while ((m >= 60 || m <= 0) || (h >= 24 || h <= 0) || (test != "/") || (heure.length != 5) || (isNaN(h)) || (isNaN(m)) )
{
    alert("N'essaye jamais de me tromper !") ;
    heure = prompt("Recomence !", "23/58");
    h = heure.substr(0, 2) ;
    m = heure.substr(3, 2) ;
    test = heure.substr(2, 1);
    h = parseInt(h) ;
    m = parseInt(m) ;
}
if (m < 59)
{
    m = m+1 ;
}
else if (h < 23)
{
    m = 0 ;
    h = h+1 ;
}
else
{
    m = 0 ;
    h = 0;
}

alert("Dans 1 minute il sera : " + h +" heures et " + m + " minutes" );
} 

var bouton7 = document.getElementById("Id_btn7");
bouton7.addEventListener("click", tarif);

function tarif(n) {
n = prompt("Veuillez saisir le nombre de photocopies effectuées");
while (isNaN(n))
{
    n = prompt("Saisie incorecte !");
}

if (n <= 10)
{
     p = 0.1*n ;
    
}
else if (n <= 30)
{
    p = 10*0.1 + (n-10)*0.09;
}
else
{
    p = 10*0.1 + 20*0.09 + (n-30)*0.08;
}

alert("Le prix est de " + p +" €");
}
