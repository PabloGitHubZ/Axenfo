function validaIP() {
    let ip = document.getElementById("ip").value;
    let segmento = ip.split(".");
    if(segmento.length != 4) {
        alert ("Formato de IP no válido");
    }
    for(i in segmento) {
        if (!/^\d+$/g.test(segmento[i])
        || + segmento[i]>255
        || + segmento[i]<0
        || /^[0][0-9]{1,2}/.test(segmento[i])) {
        alert ('Formato de IP no válido');
        }   
    }
    alert ('Formato de IP válido');
}