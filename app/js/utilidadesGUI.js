

function formatoSeparadorMiles(input) {
  var num = input.value.replace(/\./g, '');
  if (!isNaN(num)) {
    num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g, '$1.');
    num = num.split('').reverse().join('').replace(/^[\.]/, '');
    input.value = num;
  } else {
    alert('Solo se permiten numeros');
    input.value = input.value.replace(/[^\d\.]*/g, '');
  }
}

function validarCampoNumerico(input) {
  if (input.charCode >= 48 && input.charCode <= 57) {
    return true;
  }
  alert('Solo se permiten numeros');
  return false;
}

function validarNumerico() {
  $('input#reg_numero')
    .keypress(function (event) {
      if (event.charCode < 48 || event.charCode > 57 || this.value.length === 7) {
        return false;
      }
    });
}

function mostrarCalendario() {
  // Datepicker
  $('.fc-datepicker').datepicker({
    dateFormat: 'dd/mm/yy',
    showOtherMonths: true,
    selectOtherMonths: true
  });

  // Color picker
  $('#colorpicker').spectrum({
    color: '#17A2B8'
  });

  $('#showAlpha').spectrum({
    color: 'rgba(23,162,184,0.5)',
    showAlpha: true
  });
}

function es_fecha_valida(day, month, year) {
  var dteDate;
  month = month - 1;
  dteDate = new Date(year, month, day);
  return ((day == dteDate.getDate()) && (month == dteDate.getMonth()) && (year == dteDate.getFullYear()));
}

function verificar_fecha(fecha) {
  var patron = new RegExp("^(19|20)+([0-9]{2})([/])([0-9]{1,2})([/])([0-9]{1,2})$");//yyyy-mm-dd
  var patron2 = new RegExp("^([0-9]{1,2})([/])([0-9]{1,2})([/])(19|20)+([0-9]{2})$");//dd/mm/yyyy
  if (fecha.search(patron2) == 0) {
    var values = fecha.split("/");
    if (es_fecha_valida(values[0], values[1], values[2])) {
      return true;
    }
  }
  return false;
}

function completarCeroIzquierda(number, width) {
  var numberOutput = Math.abs(number); /* Valor absoluto del número */
  var length = number.toString().length; /* Largo del número */
  var zero = "0"; /* String de cero */

  if (width <= length) {
    if (number < 0) {
      return ("-" + numberOutput.toString());
    } else {
      return numberOutput.toString();
    }
  } else {
    if (number < 0) {
      return ("-" + (zero.repeat(width - length)) + numberOutput.toString());
    } else {
      return ((zero.repeat(width - length)) + numberOutput.toString());
    }
  }
}