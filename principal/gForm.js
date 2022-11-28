var guardar = document.getElementById('guardar'); //variable para obtener un elemento html por su id
var revisarMatricula = document.getElementById('matricula'); //variable para obtener un elemento html por su id
var revisarCurp = document.getElementById('curp'); //variable para obtener un elemento html por su id

var data = []; //variable de tipo array
var datosp = [];

guardar.addEventListener("click", agregar); //elemento que espera un clic en el elemento  y asi ejecutar la funcion a usar
revisarMatricula.addEventListener("blur", buscarMatricula); //elemento que espera que pierda el foco en el elemento  y asi ejecutar la funcion a usar
revisarCurp.addEventListener("blur", buscarCurp); //elemento que espera que pierda el foco en el elemento  y asi ejecutar la funcion a usar
revisarMatricula.addEventListener("blur", modificarONo); //elemento que espera que pierda el foco en el elemento  y asi ejecutar la funcion a usar
revisarCurp.addEventListener("blur", modificarONo); //elemento que espera que pierda el foco en el elemento  y asi ejecutar la funcion a usar

function agregar() { //funcion
    var matricula = document.querySelector('#matricula').value; //obtiene el valor de un elemento html y lo guarda en una variable
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
    var grado = document.querySelector('#grado_maximo_estudio').value; //se guarda el valor de 
    //grado_maximo_estudio en la variable grado para poder comprobar mas adelante que guardar en la 
    //variable grado_estudios
    var grado_maximo_estudio = "";
    if (document.querySelector('#grado').value == "" || document.querySelector('#grado').value == null) {
        //verifica que si el elemento select tiene un valor o no y dependiendo del resultado sera lo que se guarde en la variable grado_maximo_estudio
        grado_maximo_estudio = document.querySelector('#grado_maximo_estudio').value;
    } else {
        grado_maximo_estudio = document.querySelector('#grado_maximo_estudio').value + " " + document.querySelector('#grado').value;
    }
    var domicilio = document.querySelector('#domicilio').value;
    var fecha_exped = document.querySelector('#fecha_exped').value;
    var clase = document.querySelector('#clase').value;
    //console.log(domicilio);

    var grado_estudios; //sentencias if para poder guardar un valor que sirva para reconocer el grado maximo 
    //de estudios mas facilmente dependiendo de la variable grado_maximo_estudio
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

    //agrega elementos al arreglo
    data.push( //guardado de datos en array y convirtiendo en mayusculas las variables que contienen cadenas
        {
            "matricula": matricula.toUpperCase(),
            "nombre_apellidos": nombre_apellidos.toUpperCase(),
            "fecha_nac": fecha_nac,
            "lugar_nac": lugar_nac.toUpperCase(),
            "curp": curp.toUpperCase(),
            "mexicanos_por": mexicanos_por.toUpperCase(),
            "nombre_ape_padre": nombre_ape_padre.toUpperCase(),
            "nombre_ape_madre": nombre_ape_madre.toUpperCase(),
            "estado_civil": estado_civil.toUpperCase(),
            "ocupacion": ocupacion.toUpperCase(),
            "leer_escribir": leer_escribir.toUpperCase(),
            "grado_maximo_estudio": grado_maximo_estudio.toUpperCase(),
            "grado_estudios": grado_estudios,
            "domicilio": domicilio.toUpperCase(),
            "fecha_exped": fecha_exped,
            "clase": clase,
        }
    );

    if (matricula == '' || nombre_apellidos == '' || fecha_nac == '' || lugar_nac == '' || curp == '' || mexicanos_por == '' || estado_civil == '' || ocupacion == '' || leer_escribir == '' || grado_maximo_estudio == '' || domicilio == '' || fecha_exped == '' || clase == '') { //sentencia if para verificar que ninun campo este vacio y si esta vacio algun campo mande una alerta
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'POR FAVOR RELLENE TODO LOS CAMPOS FALTANTES',
            showConfirmButton: false,
            timer: 4500
        })
    } else { //si no que realize la siguiente operación
        alerta();
    }


}




function alerta() {
    var mensaje; //manda una alerta para poder verificar los datos a guardar 
    var texto = "MATRICULA: " + matricula.value + "\nNOMBRE: " + nombre_apellidos.value + "\nFECHA DE NAC: " + fecha_nac.value + "\nLUGAR DE NAC: " + lugar_nac.value + "\nCURP: " + curp.value + "\nMEXICANOS POR: " + mexicanos_por.value + "\nNOMBRE DEL PADRE: " + nombre_ape_padre.value + "\nNOMBRE DE LA MADRE: " + nombre_ape_madre.value + "\nESTADO CIVIL: " + estado_civil.value + "\nOCUPACIÓN: " + ocupacion.value + "\nSABE LEER: " + leer_escribir.value + "\nGRADO MAXIMO DE ESTUDIO: " + grado_maximo_estudio.value + "\nDOMICILIO: " + domicilio.value + "\nFECHA DE EXPED: " + fecha_exped.value + "\n¿DESEA GUARDAR?";
    console.log(data);
    var opcion = confirm("¿ESTA TODA LA INFORMACIÓN CPRRECTA?\n" + texto); //si confirma que los datos estan correctos se manda a la siguiente acción
    if (opcion == true) {
        save(); //va a la siguiente acción
    } else { //manda un mensaje si no se desea guardar
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
        url: "guardarForm.php", //elemento en donde se ejecutara la sentencia
        data: "json=" + json, //datos que se usaran en la sentencia
        success: function (respo) { //en caso que todo se ejecuter correctamente se vaciaran los datos y mandara una alerta que todo salio exitosamente
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
            mensaje = Swal.fire({ //alerta de todo salio exitosamente
                position: 'center',
                icon: 'success',
                title: 'INFORMACIÓN GUARDADA',
                showConfirmButton: false,
                timer: 1500
            })
        },
        error: function (jqXHR, textStatus, errorThrown) { //en caso de error
            alert('Error!!:  ');
        }

    });
}

//Función que sirve para poder revisar si la matricula se encuentra en la base de datos
function buscarMatricula() {
    var matricula = document.querySelector('#matricula').value; //obtiene el valor del input con id matricula
    bMa = matricula;
    if (bMa.length == 9) {
        if (bMa != "") {
            $.ajax({
                type: "POST", //sentencia de tipo POST
                url: "revisarMatricula.php", //elemento en donde se ejecutara la sentencia
                data: "json=" + bMa, //datos que se usaran en la sentencia
                dataType: "json",
                success: function (resultado) { //en caso que todo salga bien se mandara una alerta con el respectivo resultado
                    if (resultado == "S") { //en caso de obtener S mandara una alerta que la matricula ya esta siendo usada en algun registro de la base de datos
                        mensaje = Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'MATRICULA YA UTILIZADA',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else if (resultado == "N") { //en caso de obtener N mandara una alerta que la matricula esta sin usar
                        mensaje = Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'MATRICULA SIN USAR',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }

                },
                error: function (jqXHR, textStatus, errorThrown) { //mada un error si no se ejecuta correctamente
                    alert('Error!!:  ');
                }

            })
        }
    }
}

//Función que sirve para poder revisar si la matricula se encuentra en la base de datos
function buscarCurp() {
    var curp = document.querySelector('#curp').value; //obtiene el valor del input con id curp
    bMa = curp;
    if (bMa.length == 18) {
        if (bMa != "") {
            $.ajax({
                type: "POST", //sentencia de tipo POST
                url: "revisarCurp.php", //elemento en donde se ejecutara la sentencia
                data: "json=" + bMa, //datos que se usaran en la sentencia
                dataType: "json",
                success: function (resultado) { //en caso que todo salga bien se mandara una alerta con el respectivo resultado
                    if (resultado == "S") { //en caso de obtener S mandara una alerta que la curp ya esta siendo usada en algun registro de la base de datos
                        mensaje = Swal.fire({
                            position: 'center',
                            icon: 'error',
                            title: 'CURP YA REGISTRADA',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    } else if (resultado == "N") { //en caso de obtener N mandara una alerta que la curp esta sin usar
                        mensaje = Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'CURP NO REGISTRADA',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }

                },
                error: function (jqXHR, textStatus, errorThrown) { //mada un error si no se ejecuta correctamente
                    alert('Error!!:  ');
                }

            })
        }
    }

}

function modificarONo() {
    var curp = document.querySelector('#curp').value; //obtiene el valor del input con id curp
    var matricula = document.querySelector('#matricula').value; //obtiene el valor del input con id matricula
    if (curp.length < 18) {
        document.getElementById("matricula").setAttribute("readonly", "readonly", false);
        document.getElementById("nombre_apellidos").setAttribute("readonly", "readonly", false);
        document.getElementById("fecha_nac").setAttribute("disabled", "disabled", false);
        document.getElementById("lugar_nac").setAttribute("readonly", "readonly", false);
        document.getElementById("mexicanos_por").setAttribute("disabled", "disabled", false);
        document.getElementById("nombre_ape_padre").setAttribute("readonly", "readonly", false);
        document.getElementById("nombre_ape_madre").setAttribute("readonly", "readonly", false);
        document.getElementById("estado_civil").setAttribute("disabled", "disabled", false);
        document.getElementById("ocupacion").setAttribute("readonly", "readonly", false);
        document.getElementById("leer_escribir").setAttribute("disabled", "disabled", false);
        document.getElementById("grado_maximo_estudio").setAttribute("disabled", "disabled", false);
        document.getElementById("grado").setAttribute("disabled", "disabled", false);
        document.getElementById("domicilio").setAttribute("readonly", "readonly", false);
        document.getElementById("guardar").setAttribute("disabled", "disabled", false);

    }

    if (curp.length == 18) {
        document.getElementById("matricula").removeAttribute("readonly", false);
        if (curp.length == 18 && matricula.length == 9) {
            document.getElementById("nombre_apellidos").removeAttribute("readonly", false);
            document.getElementById("fecha_nac").removeAttribute("disabled", false);
            document.getElementById("lugar_nac").removeAttribute("readonly", false);
            document.getElementById("mexicanos_por").removeAttribute("disabled", false);
            document.getElementById("nombre_ape_padre").removeAttribute("readonly", false);
            document.getElementById("nombre_ape_madre").removeAttribute("readonly", false);
            document.getElementById("estado_civil").removeAttribute("disabled", false);
            document.getElementById("leer_escribir").removeAttribute("disabled", false);
            document.getElementById("grado_maximo_estudio").removeAttribute("disabled", false);
            document.getElementById("grado").removeAttribute("disabled", false);
            document.getElementById("domicilio").removeAttribute("readonly", false);
            document.getElementById("guardar").removeAttribute("disabled", false);
        }
    }
}