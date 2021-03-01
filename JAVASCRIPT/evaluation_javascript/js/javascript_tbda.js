
var bouton8 = document.getElementById("Id_btn8");
bouton8.addEventListener("click", salutation_bis);

function salutation_bis(nom, prenom, sexe){

nom = window.prompt("Entrez votre nom") ;
prenom = window.prompt("Entrez votre prénom") ;
sexe ;
if (window.confirm("Etes vous un homme ?") == true )
{
    sexe = "Homme" ;
    window.alert("Bonjour Monsieur " + nom + " " + prenom +  "\nBienvenue sur notre site web !") ;
}
else
{
    sexe = "Femme" ;
    window.alert("Bonjour Madame " + nom + " " + prenom +  "\nBienvenue sur notre site web !") ;
}
}

var bouton9 = document.getElementById("Id_btn9");
bouton9.addEventListener("click", operateurs);

function operateurs() {
a = "100" ;
b = 100 ;
c = 1.00 ;
d = true ;
window.alert("Ceci est une chaine de caractères : " + a) ;
b-- ;
c = c + parseInt(a) ;
d = "false" ;
window.alert(b);
window.alert(c);
window.alert(d);
}

var bouton10 = document.getElementById("Id_btn10");
bouton10.addEventListener("click", parite);

function parite(nbre){
nbre = parseInt(prompt("Entrez un nombre")) ;
test = nbre%2 ;
if (test == 0)
{
    alert("Le nombre est divisible par 2");
}
else
{
    alert("Le nombre n'est pas divisible par 2");
}
}

var bouton11 = document.getElementById("Id_btn11");
bouton11.addEventListener("click", age);

function age(an){
an = parseInt(prompt("Quelle est votre année de naissance ?"));
while (an > 2020)
{
    alert("Ne vous moquez pas de moi !");
    an = parseInt(prompt("Quelle est votre année de naissance ?"));
}
an = 2020 - an ;
if (an >= 18)
{
    alert("Vous avez " + an + " ans" + "\nVous êtes donc majeur !") ;    
}
else
{
    alert("Vous avez " + an + " ans" + "\nVous êtes donc mineur !") ;
}
}

var bouton12 = document.getElementById("Id_btn12");
bouton12.addEventListener("click", calculatrice);

function calculatrice(n1,n2){
n1 = parseInt(prompt("Saisir un premier nombre entier")) ;
n2 = parseInt(prompt("Saisir un deuxième nombre entier")) ;
operation = prompt("Choisissez une opération") ;
resultat = null ;
if (operation == "+")
{
     resultat = n1 + n2 ;
}
else if (operation == "-")
{
     resultat = n1 - n2 ;
}
else if (operation == "*")
{
     resultat = n1 * n2 ;
}
else if (operation == "/" &&  ((n1 == 0) || (n2 == 0)))
{
    alert("On ne peut pas diviser un nombre par 0");  
}
else if  (operation == "/")
{
    resultat = n1 / n2 ;
}
else
{
    alert("Opération inconnue !");
}
alert(resultat);
}

var bouton13 = document.getElementById("Id_btn13");
bouton13.addEventListener("click", saisie);

function saisie(){
i = 0 ;
prenoms = [];
prems = "debut" ;
k = 0;
while (prems != null )
{
    k= i + 1 ;
    prenoms[i] = prompt("Saisissez le prénom n° " + k + "\nou clic sur Annuler pour arrêter la saisie") ;
    prems = prenoms[i];
    i++
}
k = 0;
i = i-1;
alert("Vous avez saisi " + i + " prénoms");
for (var j = 0 ; j < (prenoms.length - 1) ; j++)
{
    k = j + 1 ;
    alert("Prénom n° "+ k + " " +prenoms[j]); 
}
}

var bouton14 = document.getElementById("Id_btn14");
bouton14.addEventListener("click", moyenne);

function moyenne(N){
N = 0;
S = 0 ;
M = 0 ;
i = 0 ;
do
{
    i++
    N = parseInt(prompt("Saisir un nombre \nOn arrête la saisie avec la valeur 0"));
    S = S + N;
    M = S/(i-1);
}while (N != 0)
alert("La somme vaut : " + S + "\nLa moyenne vaut : " + M);
}


var bouton15 = document.getElementById("Id_btn15");
bouton15.addEventListener("click", multiples);

function multiples(N, X){

N = parseInt(prompt("Saisir un premier nombre entier"));
X = parseInt(prompt("Saisir un deuxième nombre entier"));
for (i=1 ; i <= N ; i++)
{
    P = i*X;
    console.log(i + " x " + X +" = " + P );
}
}

var bouton16 = document.getElementById("Id_btn16");
bouton16.addEventListener("click", voyelles);

function voyelles(){
expression = prompt("Veuillez saisir un mot");
sauvegarde = expression ;
taille = expression.length ;
coupe = 0 ;
compteur = 0 ;
if (expression.indexOf("a") != -1)
{
    while (expression.indexOf("a") != -1)
    {
        coupe = expression.indexOf("a");
        expression = expression.substr((coupe+1), (taille-coupe-1));
        compteur++;
    }
}
expression = sauvegarde ;
if (expression.indexOf("e") != -1)
{
    while (expression.indexOf("e") != -1)
    {
        coupe = expression.indexOf("e");
        expression = expression.substr((coupe+1), (taille-coupe-1));
        compteur++;
    }
}
expression = sauvegarde ;
if (expression.indexOf("i") != -1)
{
    while (expression.indexOf("i") != -1)
    {
        coupe = expression.indexOf("i");
        expression = expression.substr((coupe+1), (taille-coupe-1));
        compteur++;
    }
}
expression = sauvegarde ;
if (expression.indexOf("o") != -1)
{
    while (expression.indexOf("o") != -1)
    {
        coupe = expression.indexOf("o");
        expression = expression.substr((coupe+1), (taille-coupe-1));
        compteur++;
    }
}
expression = sauvegarde ;
if (expression.indexOf("u") != -1)
{
    while (expression.indexOf("u") != -1)
    {
        coupe = expression.indexOf("u");
        expression = expression.substr((coupe+1), (taille-coupe-1));
        compteur++;
    }
}
expression = sauvegarde ;
if (expression.indexOf("y") != -1)
{
    while (expression.indexOf("y") != -1)
    {
        coupe = expression.indexOf("y");
        expression = expression.substr((coupe+1), (taille-coupe-1));
        compteur++;
    }
}
alert("Le mot contenait " + compteur + " voyelle(s)");
}


var bouton17 = document.getElementById("Id_btn17");
bouton17.addEventListener("click", produit);

function produit(x,y){
x = parseInt(prompt("Saisir un 1er nombre"));
y = parseInt(prompt("Saisir un 2ème nombre"));
p=x*y;

alert("Le produit des 2 nombres vaut : " + p)
}

function cube(x)
{
    return x*x*x ;
}
function produit1(x,y)
 {
    return x*y; 
}

var bouton18 = document.getElementById("Id_btn18");
bouton18.addEventListener("click", afficheImg);
function afficheImg(){

var img = document.createElement("img");
img.src = "papillon.jpg";
var block = document.getElementById("papillon");
block.appendChild(img);

var test1 = document.getElementById("legende1");
var test2 = document.getElementById("legende2");
var test3 = document.getElementById("legende3");

x = parseInt(prompt("Saisir un 1er nombre"));
y = parseInt(prompt("Saisir un 2ème nombre"));

test1.innerHTML = ("Le produit des 2 nombres vaut : " + produit1(x,y));
test2.innerHTML =("Le cube du 1er nombre vaut : " + cube(x));
test3.innerHTML =("Le cube du second nombre vaut : " + cube(y));
}

var bouton19 = document.getElementById("Id_btn19");
bouton19.addEventListener("click", strtok);

function strtok(n, str1, str2){

n = parseInt(prompt("Veuillez saisir un nombre entier"));
str2 = prompt("Veuillez saisir un caractère de ponctuation",",/;.!...");
str1 = prompt("Veuillez saisir une liste de mots séparés par le caractère précédement donné");
ancre = 0;
fin = 0;
place = 0;
resultat = "0";
for ( i = 1; i <= n-1; i++) {
   place = str1.indexOf(str2, ancre);
   ancre = place + 1;
}
fin = str1.indexOf(str2, ancre);
 resultat = str1.substr(place+1, fin-place-1);
alert(resultat);
}

var bouton20 = document.getElementById("Id_btn20");
bouton20.addEventListener("click", tab);

function tab() {

n = parseInt(prompt("Saisir la taille du tableau"));
tableau = new Array(n);
affiche = "";
for (i=0 ; i<n; i++){

tableau[i] = prompt("Saisi n° " + (i+1));
affiche = affiche + "\n" + tableau[i];
}
alert(affiche);
}



