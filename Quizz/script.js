window.onload=init;
var t=12;
function init(){
    document.getElementById("temps").innerHTML=t;
    t--;
    setTimeout(init,1000);

    if(t<0){
        t=12; 
        document.getElementById("bvalid").click();
    } 
    
}

    