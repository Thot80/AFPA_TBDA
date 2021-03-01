// EXERCICE 5
alert("Le script de cette page se trouve dans le fichier exercice5.js\nCe message reste affiché dans le log");
console.log("Le script de cette page se trouve dans le fichier exercice5.js");


// Création d' 1 fonctions (entrer) qui pourra être appellée pour chaque champ de formulaire

function entrer(evenement)
{
    // On recupere l'id de l'element qui a declenché l'evennement // On obtient un objet HTML //  Expl : id="nom" donne nom
    identite = evenement.target.id;

    // Ici, on créer une variable javascript mirroir de l'element qui a declenché l'evennement // Correspond à  var nom = get ElementById("nom") 
    identite_mirroir = document.getElementById(identite);

    // On donne la valeure champ vide à cette variable pour "nettoyer" le champ // utilisation de la propriete objet .value 
    identite_mirroir.value = "";
 }

 

// On récupère l'id HTML et on stock dans une variable javascript
var nom = document.getElementById("Nom");

// On récupère l'id d'un span vide situé sous le champ
var miss_nom = document.getElementById("miss_nom");

// RegEx qui accèpte les caractères accentués, les majuscules ou les minuscules, les noms composé avec espaces, tirets ou apostrophes
var nom_valid = /^[a-zA-Zéèêëàâäîï][a-zéèêëàâäîï]+([-'\s'][a-zA-Zéèêëàâäîï][a-zéèêëàâäîï]+)?$/;

// On donne une valeur au champ 
nom.value = "Veuillez saisir votre nom";

// On met un mouchard sur l'evennement entrer dans le champ pour le nettoyer
nom.addEventListener("focusin", entrer);

// On met un mouchard sur l'evennement sortir du champ pour le controler
nom.addEventListener("focusout", CtrlNom);

function CtrlNom(event)
{
    //  validity.valueMissing envoi un booléen qui vaut vrais si le champ est vide, le champ doit avoir un required dans le HTML
    if(nom.validity.valueMissing)
    {
        // On écrit dans le span, on colore le texte et la bordure du champ, on laisse le champ vide pour pouvoir le controller plus facilement à la fin
        // La ligne du dessous ne sera utile qu'au moment d'appeler la fonction lors du submit, elle empeche le submit si probleme
        event.preventDefault();
        miss_nom.textContent = "Nom manquant";
        miss_nom.style.color = "red";
        nom.style.borderColor = "red";
        nom.value = "";
    }
    // Si le champ n'est pas vide, on controle avec la RegEx, RegEx.test.champ_à_tester == false si regle non respecée, on met false ds la condition
    // pour la déclencher car de base elle se declenche avec un booléen vrais, le RegEx.test envoi un booléen faux si problème
    else if (nom_valid.test(nom.value) == false)
    {
        event.preventDefault();
        miss_nom.textContent = "Format incorrect";
        miss_nom.style.color = "orange";
        nom.style.borderColor = "orange";
    }
    // Si le champ est correctement rempli, le span reste vide (ou le redevient) et le cadre est vert
    else
    {
        miss_nom.textContent = "";
        nom.style.borderColor = "green";
    }
}




// On répete le processus précédent pour le champ prénom
var prenom = document.getElementById("Prénom");
var miss_prenom = document.getElementById("miss_prenom");
var prenom_valid = /^[a-zA-Zéèêëàâäîï][a-zéèêëàâäîï]+([-'\s'][a-zA-Zéèêëàâäîï][a-zéèêëàâäîï]+)?$/;
prenom.value = "Veuillez saisir votre prénom";
prenom.addEventListener("focusin", entrer);
prenom.addEventListener("focusout", CtrlPrenom);

function CtrlPrenom(event){
if(prenom.validity.valueMissing)
    {
        event.preventDefault();
        miss_prenom.textContent = "Prénom manquant";
        miss_prenom.style.color = "red";
        prenom.style.borderColor = "red";
        prenom.value = "";
    }
    else if (prenom_valid.test(prenom.value) == false)
    {
        event.preventDefault();
        miss_prenom.textContent = "Format incorrect";
        miss_prenom.style.color = "orange";
        prenom.style.borderColor = "orange";
    }
else
    {
        miss_prenom.textContent = "";
        prenom.style.borderColor = "green";
    }
}


// On va verifier que les bouton radio sont bien cochés en créant une fonction, cette vérification se fera au moment du submit seulement, en appelant la fonction
var masculin = document.getElementById("Masculin");
var feminin = document.getElementById("Féminin");
var miss_sexe = document.getElementById("miss_sexe");

function CtrlSexe(event)
{
    if ((masculin.validity.valueMissing) && (feminin.validity.valueMissing))
    {
        event.preventDefault();
        miss_sexe.textContent = "Sélectionnez votre sexe";
        miss_sexe.style.color = "red";
    }
    else
    {
        miss_sexe.textContent = "";
    }  
}



// On procède comme avec les autres champs sauf qu'on doit définir un nouveau RegEX plus adapté

var date = document.getElementById("Date");
var miss_date = document.getElementById("miss_date");
date.value = "jj/mm/aaaa";
date.addEventListener("focusin", entrer);
date.addEventListener("focusout",CtrlDate);

// Attention, date au format anglo-saxon yyyy-dd--mm
var date_valid =/^([0-9]{4})\-([0-9]{2})\-([0-9]{2})$/;


function CtrlDate(event)
{
    if(date.validity.valueMissing)
    {
        event.preventDefault();
        miss_date.textContent = "Date manquante";
        miss_date.style.color = "red";
        date.style.borderColor = "red";
        date.value = "";
    }
    else if (date_valid.test(date.value) == false)
    {
        event.preventDefault();
        miss_date.textContent = "Format incorrect";
        miss_date.style.color = "orange";
        date.style.borderColor = "orange";
    }
    else
    {
        miss_date.textContent = "";
        date.style.borderColor = "green";
    }
}

// De même avec un nouveau RegEx
// Celui que j'avais fait ne fonctionnait pas bien, celui ci est tiré d'internet


var cp = document.getElementById("cp");
var miss_cp = document.getElementById("miss_cp");
var cp_valid = /^(([0-8][0-9])|(9[0-5])|(2[ab]))[0-9]{3}$/;
cp.value = "00000";
cp.addEventListener("focusin", entrer);
cp.addEventListener("focusout", CtrlCp);

function CtrlCp(event)
{
    if(cp.validity.valueMissing)
    {
        event.preventDefault();
        miss_cp.textContent = "Code postal manquant";
        miss_cp.style.color = "red";
        cp.style.borderColor = "red";
        cp.value = "";
    }
    else if (cp_valid.test(cp.value) == false)
    {
        event.preventDefault();
        miss_cp.textContent = "Format incorrect";
        miss_cp.style.color = "orange";
        cp.style.borderColor = "orange";
    }
    else
    {
        miss_cp.textContent = "";
        cp.style.borderColor = "green";
    }
}

// On commence à avoir l'habitude, il suffit de définir un nouveau RegEx !

var email = document.getElementById("email");
var miss_email = document.getElementById("miss_email");

// RegEx trouvé et conseillé par le W3C, pas vraiment eu le temps de l'étudier en profondeur, à faire !!
var email_valid =/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/ ;
email.value = "dave.loper@afpa.fr";
email.addEventListener("focusin", entrer);
email.addEventListener("focusout", CtrlEmail);

function CtrlEmail(event)
{
    if (email.validity.valueMissing)
    {
        event.preventDefault();
        miss_email.textContent = "email manquant";
        miss_email.style.color = "red";
        email.style.borderColor = "red";
    }
    else if (email_valid.test(email.value) == false)
    {
        event.preventDefault();
        miss_email.textContent = "Format incorrect";
        miss_email.style.color = "orange";
        email.style.borderColor = "orange";
    }
else
    {
        miss_email.textContent = "";
        email.style.borderColor = "green";
    }
}


// Utile si on voulait placer le sujet sélectionné dans le textarea
// var sujet = document.getElementById("Sujet");
// var votrequestion = document.getElementById("Votrequestion");
// sujet.addEventListener("change", chgt);
// function chgt() {
//     sujet = sujet.value;
//     if(sujet != "Veuillez sélectionner un sujet")
//     {
//         votrequestion.value = sujet + "\n";
//     }
// }


var question = document.getElementById("Votrequestion");
var miss_question = document.getElementById("miss_question");
question.value = "Veuillez nous écrire ici";
question.addEventListener("focusin", entrer);
question.addEventListener("focusout", CtrlQuestion);

function CtrlQuestion(event)
{
    if (question.validity.valueMissing)
    {
        event.preventDefault();
        miss_question.textContent = "Ce champ est obligatoire";
        miss_question.style.color = "red";
        question.style.borderColor = "red";
    }
    else
    {
        miss_question.textContent = "";
        question.style.borderColor = "green";
    }
}

// On procède de la même manière que pour les bouttons radio
var autorisation = document.getElementById("autorisation");
var miss_autorisation = document.getElementById("miss_autorisation");

function CtrlAutorisation(event)
{
    if (autorisation.checked == false)
    {
        event.preventDefault();
        miss_autorisation.textContent = "Veuillez accépter les conditions d'utilisation";
        miss_autorisation.style.color = "red";
    }
    else
    {
        miss_autorisation.textContent = "";
    }
}

// On va créer une fonction reset qui vide tous les champs, cette pratique n'est pas recommandée par le W3C

// On créer un tableau avec le contenu de toutes les balises input
var input = document.getElementsByTagName("input");
var annuler = document.getElementById("annuler");

annuler.addEventListener("click", Efface)

function Efface()
{
    autorisation.checked = false;
    for (i=0; i < input.length; i++)

    {
        input.value = "";     
    }
}
 // J'ai voulu mettre tous les cadres en rouge avec un code de ce type mais je n'ai pas réussi....
//  if (input.validity.valueMissing)
//        {
//            input[i].style.borderColor = "red";
//        }


// Bouquet final, on va essayer de rappeler toutes ces fonctions lors du submit... Ca marche !
var envoyer = document.getElementById("envoyer");
envoyer.addEventListener("click", CtrlForm);

function CtrlForm(event)
{
    CtrlNom(event);
    CtrlPrenom(event);
    CtrlSexe(event);
    CtrlDate(event);
    CtrlCp(event);
    CtrlEmail(event);
    CtrlQuestion(event);
    CtrlAutorisation(event);
}

















// var nom = document.getElementById("Nom");
// nom.value = "Veuillez saisir votre nom";
// nom.addEventListener("focusin", entrer);
// nom.addEventListener("focusout", quitter);

// var prenom = document.getElementById("Prénom");
// prenom.value = "Veuillez saisir votre prénom";
// prenom.addEventListener("focusin", entrer);
// prenom.addEventListener("focusout", quitter);

// var date = document.getElementById("Date");
// date.value = "jj/mm/aaaa";
// date.addEventListener("focusin", entrer);
// date.addEventListener("focusout", quitter);

// var cp = document.getElementById("Codepostal");
// cp.value = "80000";
// cp.addEventListener("focusin", entrer);
// cp.addEventListener("focusout", quitter);

// var email = document.getElementById("email");
// email.value = "dave_loper@afpa.fr";
// email.addEventListener("focusin", entrer);
// email.addEventListener("focusout", quitter);


// var sujet = document.getElementById("Sujet");
// var votrequestion = document.getElementById("Votrequestion");
// sujet.addEventListener("change", chgt);
// votrequestion.addEventListener("focusout", quitter);

// function chgt() {

//     sujet = sujet.value;
//     if(sujet != "Veuillez sélectionner un sujet")
//     {
//         votrequestion.value = sujet + "\n";
//     }
// }


// function entrer(evenement)
// {
//     identite = evenement.target.id;
//     identite_mirroir = document.getElementById(identite);
//     identite_mirroir.value = "";
// }

// function quitter(evenement)
// {
//     identite = evenement.target.id;
//     identite_mirroir = document.getElementById(identite);
//     if (identite_mirroir.value == "")
//     {
//         alert("Ce champ est obligatoire !");
//         identite_mirroir.value = identite + "";
//     }
// }


// var masculin = document.getElementById("Masculin");
// var feminin = document.getElementById("Feminin");
// var annuler = document.getElementById("annuler");


