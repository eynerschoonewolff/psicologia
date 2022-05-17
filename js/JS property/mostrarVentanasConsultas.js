const consulta1 = 'Consulta1';
const consulta2 = 'Consulta2';
const consulta3 = 'Consulta3';
const consulta4 = 'Consulta4';
const consulta5 = 'Consulta5';
const consulta6 = 'Consulta6';
const consulta7 = 'Consulta7';
const consulta8 = 'Consulta8';

let opcionesConsultas = document.getElementById("opciones")
let tablaconsulta1 = document.getElementById("consulta1")
let tablaconsulta2= document.getElementById("consulta2")
let tablaconsulta3 = document.getElementById("consulta3")
let tablaconsulta4 = document.getElementById("consulta4")
let tablaconsulta5 = document.getElementById("consulta5")
let tablaconsulta6 = document.getElementById("consulta6")
let tablaconsulta7 = document.getElementById("consulta7")
let tablaconsulta8 = document.getElementById("consulta8")
let cajaConsulta = document.getElementById("cajaConsulta")

let LabelContenido = document.getElementById('ConsultaGene')

opciones.addEventListener("change", validar)
opciones.addEventListener("change", enviarFormularioEstadistica)

function enviarFormularioEstadistica() {
    document.querySelector('#formularioEstadistica').submit();
}

function validar() {
    if (opcionesConsultas.value === consulta1) {
        tablaconsulta2.classList.add('d-none');
        tablaconsulta3.classList.add('d-none');
        tablaconsulta4.classList.add('d-none');
        tablaconsulta5.classList.add('d-none');
        tablaconsulta6.classList.add('d-none');
        tablaconsulta7.classList.add('d-none');
        tablaconsulta8.classList.add('d-none');
        tablaconsulta1.classList.remove('d-none');
    } else if (opcionesConsultas.value === consulta2) {
        tablaconsulta1.classList.add('d-none');
        tablaconsulta3.classList.add('d-none');
        tablaconsulta4.classList.add('d-none');
        tablaconsulta5.classList.add('d-none');
        tablaconsulta6.classList.add('d-none');
        tablaconsulta7.classList.add('d-none');
        tablaconsulta8.classList.add('d-none');
        tablaconsulta2.classList.remove('d-none');
        cajaConsulta.classList.remove('d-none');
    }else if(opcionesConsultas.value === consulta3){
        tablaconsulta2.classList.add('d-none');
        tablaconsulta1.classList.add('d-none');
        tablaconsulta4.classList.add('d-none');
        tablaconsulta5.classList.add('d-none');
        tablaconsulta6.classList.add('d-none');
        tablaconsulta7.classList.add('d-none');
        tablaconsulta8.classList.add('d-none');
        cajaConsulta.classList.remove('d-none');
        tablaconsulta3.classList.remove('d-none');
        LabelContenido.textContent='Diagnostico';

    }else if(opcionesConsultas.value === consulta4){
        tablaconsulta2.classList.add('d-none');
        tablaconsulta3.classList.add('d-none');
        tablaconsulta1.classList.add('d-none');
        tablaconsulta5.classList.add('d-none');
        tablaconsulta6.classList.add('d-none');
        tablaconsulta7.classList.add('d-none');
        tablaconsulta8.classList.add('d-none');
        cajaConsulta.classList.add('d-none');
        tablaconsulta4.classList.remove('d-none');
        
    }
    else if(opcionesConsultas.value === consulta5){
        tablaconsulta2.classList.add('d-none');
        tablaconsulta3.classList.add('d-none');
        tablaconsulta4.classList.add('d-none');
        tablaconsulta1.classList.add('d-none');
        tablaconsulta6.classList.add('d-none');
        tablaconsulta7.classList.add('d-none');
        tablaconsulta8.classList.add('d-none');
        cajaConsulta.classList.add('d-none');
        tablaconsulta5.classList.remove('d-none');

    }
    else if(opcionesConsultas.value === consulta6){
        tablaconsulta2.classList.add('d-none');
        tablaconsulta3.classList.add('d-none');
        tablaconsulta4.classList.add('d-none');
        tablaconsulta5.classList.add('d-none');
        tablaconsulta1.classList.add('d-none');
        tablaconsulta7.classList.add('d-none');
        tablaconsulta8.classList.add('d-none');
        tablaconsulta6.classList.remove('d-none');
        cajaConsulta.classList.remove('d-none');
        LabelContenido.textContent='Curso';


    }
    else if(opcionesConsultas.value === consulta7){
        tablaconsulta2.classList.add('d-none');
        tablaconsulta3.classList.add('d-none');
        tablaconsulta4.classList.add('d-none');
        tablaconsulta5.classList.add('d-none');
        tablaconsulta6.classList.add('d-none');
        tablaconsulta1.classList.add('d-none');
        tablaconsulta8.classList.add('d-none');
        tablaconsulta7.classList.remove('d-none');
        cajaConsulta.classList.remove('d-none');

    }
    else if(opcionesConsultas.value === consulta8){
        tablaconsulta2.classList.add('d-none');
        tablaconsulta3.classList.add('d-none');
        tablaconsulta4.classList.add('d-none');
        tablaconsulta5.classList.add('d-none');
        tablaconsulta6.classList.add('d-none');
        tablaconsulta7.classList.add('d-none');
        tablaconsulta1.classList.add('d-none');
        tablaconsulta8.classList.remove('d-none');
        cajaConsulta.classList.add('d-none');

    }
}

    
    
(function() {
    validar();

})();

