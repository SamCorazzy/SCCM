var bMa = "";
var a;
var datosp = [];
var url;
var doc = "precartilla.php";

function buscarMatricula() {
    var matricula = document.querySelector('#buscar').value;
    bMa = matricula;
    if (matricula != "") {
        $.ajax({
            type: "POST", //sentencia de tipo POST
            url: "buscarMatricula.php", //elemento en donde se ejecutara la sentencia
            data: "json=" + bMa, //datos que se usaran en la sentencia
            dataType: "json",
            success: function (datosp) {
                console.log(datosp);
                var html;
                var i;
                for (i = 0; i < datosp.length; i++) {
                    html += "<tr>" +
                        "<td id='matricula' name='matricula'>" + datosp[i].matricula + "</td>" +
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
                $('#tablajson tbody').html(html);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error...')
            }
        });
    } else {
        imprimirDatos();
    }
}


function imprimirDatos() { //creacion de una variable
    url = "generarTabla.php";
    $("#tablajson tbody").html(""); //definiedo el formato de tabla en html usando un id de 
    //tabla
    $.getJSON(url, function (datosp) {
        //metodo de obtencion de un documento json
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

