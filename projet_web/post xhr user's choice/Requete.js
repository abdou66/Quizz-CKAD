var question, rep1, rep2, rep3, rep4, numQuestion;
var k = 0;
var time = 90;
var timer;
var j=0;
var i = 1;
var req = new XMLHttpRequest(); //creation d'une nouvelle requete xhr

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
            console.log(data);                                 
               data.splice(k,1);
              console.log("regarde = " + data.length); // permet de vérifier si la suppression est effectuée
            }
    }        
}

function postRadioButtonValue(monUrl){
    question = document.getElementById('laquestion');
    lrep1=document.getElementById('lrep1');
    lrep2 = document.getElementById('lrep2');
    lrep3=document.getElementById('lrep3');
    lrep4=document.getElementById('lrep4');
    rep1=document.getElementById('rep1');
    rep2 = document.getElementById('rep2');
    rep3=document.getElementById('rep3');
    rep4=document.getElementById('rep4');
    numQuestion=document.getElementById("numquestion");

    req.open("POST", monUrl, true);
    req.onreadystatechange = function () {
        afficherContenu(req); 
    }
    req.setRequestHeader("content-TYPE", "application/x-www-form-urlencoded");
    //send
    if(lrep1.checked)       //si choix utilisateur=1
    req.send("reponse=" + rep1.innerHTML) ; //envoie du choix de l'utilisateur au serveur
    else if(lrep2.checked)
    req.send("reponse=" + rep2.innerHTML) ;
    else if(lrep3.checked)
    req.send("reponse=" + rep3.innerHTML) ;
    else if(lrep4.checked)
    req.send("reponse=" + rep4.innerHTML) ;
    else
    console.log("boulgnou fonto dei, doo cocher ish");
}
