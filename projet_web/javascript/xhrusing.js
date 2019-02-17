function validation(){

var req = new XMLHttpRequest();
req.open('GET', 'data.json', true);
req.onreadystatechange = function(){
    console.log(req);
    if(((req.readyState==4) && (req.status==200))){
        
        var items = JSON.parse(req.responseText);
        var output = '<ul>';
        for(var key in items){
            output += '<li>' + items[key].question + '</li>';
        }
        output += '<ul>';
        document.getElementById('update').innerHTML = output;
    }
}
req.send();    
}

