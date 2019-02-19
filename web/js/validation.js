function validation() {
  let type = document.getElementById('selector');
  let nif = document.getElementById('nif');

  if (type === 'dni') {
    validateDNI(nif);
  } else if (type === 'pasaporte') {
    validateDNI(nif);
  } else if (type === 'nie') {
    passaport(nif);
  }
}

function validateDNI(dni) {
  let numero, letr, letra;
  let expresion_regular_dni = /^[XYZ]?\d{5,8}[A-Z]$/;

  dni = dni.toUpperCase();

  if(expresion_regular_dni.test(dni)){
    numero = dni.substr(0,dni.length-1);
    numero = numero.replace('X', 0);
    numero = numero.replace('Y', 1);
    numero = numero.replace('Z', 2);
    letr = dni.substr(dni.length-1, 1);
    numero = numero % 23;
    letra = 'TRWAGMYFPDXBNJZSQVHLCKET';
    letra = letra.substring(numero, numero+1);
    if (letra === letr) {
      return true;
    }
  }
  return false;
}

function passaport(type) {
  let regsaid = /[a-zA-Z]{2}[0-9]{7}/;

  if (regsaid.test(type)) {
    return false;
  }
  return true;
}
