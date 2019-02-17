var k = 0;
var time = 90;
var timer;
var j=0;
var i = 1;
var myRequest = new Request('data.json');

function validation() {
    fetch(myRequest)
        .then(function (response) { return response.json(); })
        .then(function (data) {
            var tableau = new Array(data.length);
            for(var index=0; index<data.length; index++)
                tableau[index] = index;
        if(tableau.length>0){
            k = Math.floor(Math.random() * data.length);  //permet de faire un random  
            document.getElementById("laquestion").innerHTML = data[k].question;
            document.getElementById("rep1").innerHTML = data[k].choix[0];
            document.getElementById("rep2").innerHTML = data[k].choix[1];
            document.getElementById("rep3").innerHTML = data[k].choix[2];
            document.getElementById("rep4").innerHTML = data[k].choix[3];
            document.getElementById("numquestion").innerHTML = "#" + i;
            j++;
            if (j < 10) {
                timer = setTimeout("validation()", time);
            } else { 
                localStorage.setItem(k, data[k].question + ' - ' + data[k].choix + ' - ' + data[k].bonne_reponse ); 
                j=0;
                i++;                     
                tableau[k] = tableau[tableau.length-1];                
                tableau.pop();
                console.log("regarde = " + tableau.length); // permet de vérifier si la suppression est effectuée
            }
        }    
        });
}

/*TODO
    -Recupérer une question au hazard dans le fichier json
    -L'afficher et afficher quatre reponses possibles
    -supprimer la question sélectionnée
    -ajouter dans le fichier json les numeros de question et 4 propositions de reponse
    -s'il n'ya plus de question dans le fichier ou tableau (maybe), goto page resulat
    */