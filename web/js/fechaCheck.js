let date= document.getElementById('fechaNac');
let button=document.getElementById("registrarse");
function dateCheck() {
    let fechaactual = new Date();
    let fechActualStringed = String(fechaactual);
    let fechaActualSplited = fechActualStringed.split(" ");
    fechaActualSplited[3] = fechaActualSplited[3] - 18;
    fechaActualSplited[3] = String(fechaActualSplited[3]);
    button.disabled = false;
    let fechaCliente = new Date(date.value);

    fechaActualSplited[4] = "01:00:00";

    let fechaParsed = fechaActualSplited[3] + "-" + fechaActualSplited[1] + "-" + fechaActualSplited[2] + "-" + fechaActualSplited[4];
    let fechaDated = new Date(fechaParsed);


    if (fechaCliente > fechaDated) {
        button.disabled = true;
    }
}
