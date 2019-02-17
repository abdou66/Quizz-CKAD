var question, rep1, rep2, rep3, rep4, numQuestion;
var k = 0;
var time = 90;
var timer;
var j=0;
var i = 1;
var req = new XMLHttpRequest();
function executeRequete(monUrl) {
    question = document.getElementById('laquestion');
    rep1=document.getElementById('rep1');
    rep2 = document.getElementById('rep2');
    rep3=document.getElementById('rep3');
    rep4=document.getElementById('rep4');
    numQuestion=document.getElementById("numquestion")
    req.open('GET', monUrl, true);
    req.onreadystatechange = function () {
        afficherContenu(req);
    }
    req.send();
}

function afficherContenu(requete){
    if((requete.readyState==4) && (requete.status==200)){
        data=JSON.parse(requete.responseText);  //json --> array        
        k = Math.floor(Math.random() * data.length);    //permet de faire un random 
        question.innerHTML=data[k].libelle;
        rep1.innerHTML=data[k].choix1;
        rep2.innerHTML=data[k].choix2;
        rep3.innerHTML=data[k].choix3;
        rep4.innerHTML=data[k].choix4;
        numQuestion.innerHTML = "#" + i;
        console.log("debut = " + data.length); 
        j++;
            if (j < 10) {
                timer = setTimeout("afficherContenu(req)", time);
            } else { 
                j=0;
                i++;   
            console.log (data);                                 
               data.splice(k,1);
              console.log("regarde = " + data.length); // permet de vérifier si la suppression est effectuée
            }
    }        
}