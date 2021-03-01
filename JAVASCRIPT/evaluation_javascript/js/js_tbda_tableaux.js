function GetInteger() {
    n = parseInt(prompt("Veuillez saisir un entier positif svp"));
    return n;
}

function InitTab(n) {
    if (n == undefined)
    {
        instance = GetInteger();
    }
    else 
    {
        instance = parseInt(n);
    }
    tableau = new Array(instance);
    return tableau;
}

function SaisieTab() {
    
    tableau = InitTab();
    for (i=0; i < tableau.length; i++) {
        tableau[i] = prompt("Poste n° " + (i+1));
    }
    return tableau;
}

function AfficheTab(tableau) {

    if (tableau == undefined)
    {
        tableau = SaisieTab();
    }
    affiche = "";
    for (i=0; i<tableau.length; i++)
    {
         affiche = affiche + "\n" + tableau[i];
    }
    alert(affiche)
}
function RechercheTab(tableau, rang){

    if (tableau == undefined)
    {
        tableau = SaisieTab();
    }

    while ((rang == undefined) || (rang >= tableau.length) || (rang <= 0))
    {
        alert("Rang invalide !");
        rang = GetInteger();
    }

    alert(tableau[rang]);
}

function InfoTab(tableau) {

    if (tableau == undefined)
    {
        tableau = SaisieTab();
    }

    somme = 0; 
    max = tableau[0];
    for(i = 0; i < tableau.length; i++)
    {
        
        somme = somme + tableau[i];
        if (tableau[i] > max)
        {
            max = tableau[i];
        }
    }
    moy = somme/tableau.length;
    alert("La moyenne des postes est : " + moy + "\nLe maximum des postes est : " + max);
}


function tri_a_bulle(tableau) {

    var changed;
    do{
        changed = false;
        for(var i=0; i < tab.length-1; i++) {
            if(tab[i] > tab[i+1]) {
                var tmp = tab[i];
                tab[i] = tab[i+1];
                tab[i+1] = tmp;
                changed = true;
            }
        }
    } while(changed);

}