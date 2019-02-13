function validation() {
    var myRequest = new Request('data.json');
    var tabquestion = [];   // un tableau qui permet de stocker toutes les questions
    var tabchoix = [];  // un tableau qui permet de stocker tous les choix
    var tabreponse = [];    // un tableau qui permet de stocker toutes les bonnes reponses

    fetch(myRequest)
        .then(function (response) { return response.json(); })
        .then(function (data) {
            for (var i = 0; i < data.length; i++) {
            tabquestion[i] = data[i].question;  
            tabchoix[i] = data[i].choix;
            tabreponse[i] = data[i].bonne_reponse;
        }
        console.log(tabquestion);
        console.log(tabchoix);
        console.log(tabreponse);
    });
}