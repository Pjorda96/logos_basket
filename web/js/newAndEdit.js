let jugadorbox=document.getElementById('appbundle_datos_jugador');
let entrenadorbox=document.getElementById('appbundle_datos_entrenador');
let tutorbox=document.getElementById('appbundle_datos_tutor');
let jugadorInfo=document.getElementById('jugadorInfo');
let jugadorHr=document.getElementById('hrJugador');
let fechaNacYear=document.getElementById('appbundle_datos_fechaNacimiento_year');
let fechaNacMonth=document.getElementById('appbundle_datos_fechaNacimiento_month');
let fechaNacDay=document.getElementById('appbundle_datos_fechaNacimiento_day');
let divTitular=document.getElementById('titularInfo');
let titularHr=document.getElementById('titularHr');
let loteriaBox=document.getElementById('appbundle_datos_loteria');
let messageLoteriaSi=document.getElementById('loteriaSi');
let messageLoteriaNo=document.getElementById('loteriaNo');
function casillas(){
    console.log(jugadorbox.checked, entrenadorbox.checked, tutorbox.checked);
    console.log(jugadorInfo);
    if (jugadorbox.checked==true){
        jugadorInfo.style.display='block';
        jugadorHr.style.display='block';
    }else{
        jugadorInfo.style.display='none';
        jugadorHr.style.display='none';
    }
}

function loteria() {
    if (loteriaBox.checked==true){
        messageLoteriaSi.style.display='block';
        messageLoteriaNo.style.display='none';
    }else{
        messageLoteriaSi.style.display='none';
        messageLoteriaNo.style.display='block';
    }
}

function titular(){
    let fechaactual = new Date();
    let fechActualStringed = String(fechaactual);
    let fechaActualSplited = fechActualStringed.split(" ");
    fechaActualSplited[3] = fechaActualSplited[3] - 18;
    fechaActualSplited[3] = String(fechaActualSplited[3]);


    fechaActualSplited[4] = "01:00:00";

    let fechaParsed = fechaActualSplited[3] + "-" + fechaActualSplited[1] + "-" + fechaActualSplited[2];
    let fechaCliente= fechaNacYear.value + "-" + fechaNacMonth.value + "-" + fechaNacDay.value;
    let fechaDated = new Date(fechaParsed);
    let fechaDatedCliente= new Date(fechaCliente);



    if (fechaDatedCliente > fechaDated) {
        divTitular.style.display='block';
        titularHr.style.display='block';
    }else{
        divTitular.style.display='none';
        titularHr.style.display='none';
    }
}
