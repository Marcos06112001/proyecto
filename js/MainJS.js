/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

//SCRIPTS IMAGEN
// function readURL(input) {
//     console.log(input);
//     console.log(input.files);
//     if (input.files && input.files[0]) {
//         var reader = new FileReader();
//         reader.onload = function (e) {
//             $('#blah')
//                 .attr('src', e.target.result)
//                 .height(200)
//                 .show(); 
//                 document.getElementById('lblImg').hidden = true;
//         };
//         reader.readAsDataURL(input.files[0]);
//     }
// }

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah')
                .attr('src', e.target.result)
                .height(200)
                .show(); 
            $('#lblImg').hide();
        };
        reader.readAsDataURL(input.files[0]);
    }
}

function addCard(formulario) {
    var valor = formulario.elements[0].value;
    var url = '/carrito/agregar';
    url = url + '/' + valor;
    $("#resultsBlock").load(url);
}

//Scripts Agregar Metodo Pago
function checkFirstDigit() {
    var numTarjeta = document.getElementById('numTarjeta').value;
    var firstDigit = numTarjeta.charAt(0);

    var visaBtn = document.getElementById('visaBtn');
    var mastercardBtn = document.getElementById('mastercardBtn');

    visaBtn.classList.remove('SeleccionadoTarjeta');
    mastercardBtn.classList.remove('SeleccionadoTarjeta');

    if (firstDigit === '4') {
        visaBtn.disabled = false;
        visaBtn.classList.add('SeleccionadoTarjeta');
        mastercardBtn.disabled = true;
    } else if (firstDigit === '5') {
        mastercardBtn.disabled = false;
        mastercardBtn.classList.add('SeleccionadoTarjeta');
        visaBtn.disabled = true;
    } else {
        visaBtn.disabled = true;
        mastercardBtn.disabled = true;
    }
}

function validarLongitud(input, maxLength) {
    if (input.value.length > maxLength) {
        input.value = input.value.slice(0, maxLength); 
    }
}

//SCRIPTS LOGIN


//SCRIPTS MENU PRINCIPAL

