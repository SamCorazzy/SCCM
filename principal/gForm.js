var guardar = document.getElementById('guardar');
var revisarMatricula = document.getElementById('matricula');
var revisarCurp = document.getElementById('curp');

var data = []; //variable de tipo array
var datosp = [];

guardar.addEventListener("click", agregar); //elemento que espera un clic en el elemento  y asi ejecutar la funcion a usar
revisarMatricula.addEventListener("blur", buscarMatricula);
revisarCurp.addEventListener("blur", buscarCurp);

function agregar() { //funcion
    var matricula = document.querySelector('#matricula').value;
    var nombre_apellidos = document.querySelector('#nombre_apellidos').value;
    var fecha_nac = document.querySelector('#fecha_nac').value;
    var lugar_nac = document.querySelector('#lugar_nac').value;
    var curp = document.querySelector('#curp').value;
    var mexicanos_por = document.querySelector('#mexicanos_por').value;
    var nombre_ape_padre = document.querySelector('#nombre_ape_padre').value;
    var nombre_ape_madre = document.querySelector('#nombre_ape_madre').value;
    var estado_civil = document.querySelector('#estado_civil').value;
    var ocupacion = document.querySelector('#ocupacion').value;
    var leer_escribir = document.querySelector('#leer_escribir').value;
    var grado = document.querySelector('#grado_maximo_estudio').value;
    var grado_maximo_estudio = "";
    if (document.querySelector('#grado').value == "" || document.querySelector('#grado').value == null) {
        grado_maximo_estudio = document.querySelector('#grado_maximo_estudio').value;
    } else {
        grado_maximo_estudio = document.querySelector('#grado_maximo_estudio').value + " " + document.querySelector('#grado').value;
    }
    var domicilio = document.querySelector('#domicilio').value;
    var fecha_exped = document.querySelector('#fecha_exped').value;
    var clase = document.querySelector('#clase').value;
    //console.log(domicilio);
    //agrega elementos al arreglo
    var grado_estudios;
    if (grado == 'SinEstudios') {
        grado_estudios = "1-sinestudios"
        grado_maximo_estudio = "Sin Estudios";
    } else if (grado == 'Preescolar') {
        grado_estudios = "2-preescolar"
    } else if (grado == 'Primaria') {
        grado_estudios = "3-primaria"
    } else if (grado == 'Secundaria') {
        grado_estudios = "4-secundaria"
    } else if (grado == 'Bachillerato') {
        grado_estudios = "5-bachillerato"
    } else if (grado == 'Licenciatura') {
        grado_estudios = "6-licenciatura"
    }


    data.push( //guardado de datos en array
        {
            "matricula": matricula,
            "nombre_apellidos": nombre_apellidos,
            "fecha_nac": fecha_nac,
            "lugar_nac": lugar_nac,
            "curp": curp,
            "mexicanos_por": mexicanos_por,
            "nombre_ape_padre": nombre_ape_padre,
            "nombre_ape_madre": nombre_ape_madre,
            "estado_civil": estado_civil,
            "ocupacion": ocupacion,
            "leer_escribir": leer_escribir,
            "grado_maximo_estudio": grado_maximo_estudio,
            "grado_estudios": grado_estudios,
            "domicilio": domicilio,
            "fecha_exped": fecha_exped,
            "clase": clase,
        }
    );

    if (matricula == '' || nombre_apellidos == '' || fecha_nac == '' || lugar_nac == '' || curp == '' || mexicanos_por == '' || nombre_ape_padre == '' || nombre_ape_madre == '' || estado_civil == '' || ocupacion == '' || leer_escribir == '' || grado_maximo_estudio == '' || domicilio == '' || fecha_exped == '' || clase == '') {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'POR FAVOR RELLENE TODO LOS CAMPOS FALTANTES',
            showConfirmButton: false,
            timer: 4500
        })
    } else {
        alerta();
    }


}




function alerta() {
    var mensaje;
    var texto = "MATRICULA: " + matricula.value + "\nNOMBRE: " + nombre_apellidos.value + "\nFECHA DE NAC: " + fecha_nac.value + "\nLUGAR DE NAC: " + lugar_nac.value + "\nCURP: " + curp.value + "\nMEXICANOS POR: " + mexicanos_por.value + "\nNOMBRE DEL PADRE: " + nombre_ape_padre.value + "\nNOMBRE DE LA MADRE: " + nombre_ape_madre.value + "\nESTADO CIVIL: " + estado_civil.value + "\nOCUPACIÓN: " + ocupacion.value + "\nSABE LEER: " + leer_escribir.value + "\nGRADO MAXIMO DE ESTUDIO: " + grado_maximo_estudio.value + "\nDOMICILIO: " + domicilio.value + "\nFECHA DE EXPED: " + fecha_exped.value + "\n¿DESEA GUARDAR?";
    console.log(data);
    var opcion = confirm("¿ESTA TODA LA INFORMACIÓN CPRRECTA?\n" + texto);
    if (opcion == true) {
        save();
    } else {
        mensaje = Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'ERROR AL GUARDAR',
            showConfirmButton: false,
            timer: 1500
        })
    }
}



function save() {
    var json = JSON.stringify(data); //variable para guardar los datos contenidos en el array data
    $.ajax({
        type: "POST", //sentencia de tipo POST
        url: "api.php", //elemento en donde se ejecutara la sentencia
        data: "json=" + json, //datos que se usaran en la sentencia
        success: function (respo) {
            document.querySelector('#matricula').value = "";
            document.querySelector('#nombre_apellidos').value = "";
            document.querySelector('#fecha_nac').value = "";
            document.querySelector('#lugar_nac').value = "";
            document.querySelector('#curp').value = "";
            document.querySelector('#mexicanos_por').value = "";
            document.querySelector('#nombre_ape_padre').value = "";
            document.querySelector('#nombre_ape_madre').value = "";
            document.querySelector('#estado_civil').value = "";
            document.querySelector('#ocupacion').value = "";
            document.querySelector('#leer_escribir').value = "";
            document.querySelector('#grado_maximo_estudio').value = "";
            document.querySelector('#domicilio').value = "";
            document.querySelector('#clase').value = "";
            mensaje = Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'INFORMACIÓN GUARDADA',
                showConfirmButton: false,
                timer: 1500
            })
        }

    });
}

//Función que sirve para poder revisar si la matricula se encuentra en la base de datos
function buscarMatricula() {
    var matricula = document.querySelector('#matricula').value;
    bMa = matricula;
    console.log(bMa);
    if (bMa != "") {
        $.ajax({
            type: "POST", //sentencia de tipo POST
            url: "revisarMatricula.php", //elemento en donde se ejecutara la sentencia
            data: "json=" + bMa, //datos que se usaran en la sentencia
            dataType: "json",
            success: function(resultado){
                console.log(resultado);
                if(resultado == "S"){
                    mensaje = Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'MATRICULA YA UTILIZADA',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }else if(resultado == "N"){
                    mensaje = Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'MATRICULA SIN USAR',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
                
            },error: function( jqXHR, textStatus, errorThrown ) {
                alert( 'Error!!:  ');
            }
            
        })
    }
    else{
        mensaje = Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'INGRESE UNA MATRICULA',
            showConfirmButton: false,
            timer: 3500
        })
    }
}

function buscarCurp() {
    var curp = document.querySelector('#curp').value;
    bMa = curp;
    console.log(bMa);
    if (bMa != "") {
        $.ajax({
            type: "POST", //sentencia de tipo POST
            url: "revisarCurp.php", //elemento en donde se ejecutara la sentencia
            data: "json=" + bMa, //datos que se usaran en la sentencia
            dataType: "json",
            success: function(resultado){
                console.log(resultado);
                if(resultado == "N"){
                    mensaje = Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: 'CURP YA REGISTRADA',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }else if(resultado == "S"){
                    mensaje = Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'CURP NO REGISTRADA',
                        showConfirmButton: false,
                        timer: 1500
                    })
                }
                
            },error: function( jqXHR, textStatus, errorThrown ) {
                alert( 'Error!!:  ');
            }
            
        })
    }
    else{
        mensaje = Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'INGRESE UNA CURP',
            showConfirmButton: false,
            timer: 3500
        })
    }
}