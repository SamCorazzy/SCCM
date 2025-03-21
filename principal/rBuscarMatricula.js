var bMa = "";//variables a usar en las funciones
var a=1;
var datosp = [];
var url;


//funcion que se ejecuta al momento que el evento onkeyup se ejecuta en el input buscar del archivo 
//tabla_prueba.php
function buscarMatricula() {
    console.log(a++);
    var matricula = document.querySelector('#buscar').value;//obtiene el valor de un elemento html y lo guarda en una variable
    bMa = matricula;
    if (matricula != "") {//se analiza si la varible esta vacia
        $.ajax({
            type: "POST", //sentencia de tipo POST
            url: "buscarMatricula.php", //elemento en donde se ejecutara la sentencia
            data: "json=" + bMa, //datos que se usaran en la sentencia
            dataType: "json",
            success: function (datosp) {//en caso que todo se ejecuter correctamente se imprimiran los datos 
            //en el tbody de la tabla con el id tablajson del archivo tabla_prueba.php
                var html;
                var i;
                for (i = 0; i < datosp.length; i++) {//se efectua un for para poder imprimir todos los datos en la tabla
                    html += "<tr>" +
                        "<td>"+ datosp[i].matricula + "</td>" +
                        "<td>" + datosp[i].nombre_apellidos + "</td>" +
                        "<td>" + datosp[i].fecha_nac + "</td>" +
                        "<td>" + datosp[i].lugar_nac + "</td>" +
                        "<td>" + datosp[i].curp + "</td>" +
                        "<td>" + datosp[i].mexicanos_por + "</td>" +
                        "<td>" + datosp[i].nombre_ape_padre + "</td>" +
                        "<td>" + datosp[i].nombre_ape_madre + "</td>" +
                        "<td>" + datosp[i].estado_civil + "</td>" +
                        "<td>" + datosp[i].ocupacion + "</td>" +
                        "<td>" + datosp[i].leer_escribir + "</td>" +
                        "<td>" + datosp[i].grado_maximo_estudio + "</td>" +
                        "<td>" + datosp[i].domicilio + "</td>" +
                        "<td>" + datosp[i].fecha_exped + "</td>" +
                        "</tr>";
                }
                $('#tablajson tbody').html(html);//lugar en donde se imprimiran
            },
            error: function (jqXHR, textStatus, errorThrown) {//mostrara un error si no hay conexion
                alert('Error...'+jqXHR+"  |||  "+textStatus+"  ||||  "+errorThrown)
            }
        });
        inputVision();//funcion que sirve para mostrar un boton que sirve para imprimir la matricula buscada
    } else {
        imprimirDatos();//en caso que no encuentre la matricula o este vacio el input se ejecuta esta funcion
    }
    valor();//funcion que asigna el valor del input con id buscar a otro oculto
}


function imprimirDatos() { 
    console.log("b");
    inputVision();//en caso que no encuentre la matricula o este vacio el input se ejecuta esta funcion
    url = "generarTabla.php";
    $("#tablajson tbody").html(""); //definiedo el formato de tabla en html usando un id de 
    //tabla
    $.getJSON(url, function (datosp) {//metodo de obtencion de un documento json con la url y la funcion o arreglo a usar de ese documento
        $.each(datosp, function (i, datosp) { //recorrer los elementos de un json
            var newRow =
                "<tr>"
                // imprimir los elementos del json en una celda de la tabla asignada
                +
                '<td>' + datosp.matricula + '</td>' +
                "<td>" + datosp.nombre_apellidos + "</td>" +
                "<td>" + datosp.fecha_nac + "</td>" +
                "<td>" + datosp.lugar_nac + "</td>" +
                "<td>" + datosp.curp + "</td>" +
                "<td>" + datosp.mexicanos_por + "</td>" +
                "<td>" + datosp.nombre_ape_padre + "</td>" +
                "<td>" + datosp.nombre_ape_madre + "</td>" +
                "<td>" + datosp.estado_civil + "</td>" +
                "<td>" + datosp.ocupacion + "</td>" +
                "<td>" + datosp.leer_escribir + "</td>" +
                "<td>" + datosp.grado_maximo_estudio + "</td>" +
                "<td>" + datosp.domicilio + "</td>" +
                "<td>" + datosp.fecha_exped + "</td>" +
                "</tr>";
            $(newRow).appendTo("#tablajson tbody"); //Insertar una nueva fila enla tabla segun 
            //su id
        });

    });
}

function valor(){//funcion que asigna el valor del input con id buscar a otro oculto
    var matricula = document.querySelector('#buscar').value;
    document.querySelector('#valor').value = matricula;//asigna el valor del input con id buscar a este input
}

function inputVision(){//funcion que sirve para mostrar u ocultar un boton con id=imprimir
    //dependiendo de  si hay algo escrito en el input de id=buscar del documento tabla_prueba.php
    var matricula = document.querySelector('#buscar').value;
    if(matricula.length < 9 ){
        document.getElementById('imprimir').style.visibility = "hidden"; // hide
    }else if(matricula.length == 9 ){
        document.getElementById('imprimir').style.visibility = "visible"; // show
    }
}