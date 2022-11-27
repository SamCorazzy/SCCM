
//función para imprimir un gafico con las matriculas expedidas,inutilizadas y extraviadas segun año y mes
function mostrarResultados() {
    var data = []; //variable de tipo array
    var año = document.querySelector('#año').value;//obtiene el valor del select con id=año
    var mes = document.querySelector('#mes').value;//obtiene el valor del select con id=mes

    data.push({//se guardan en el array data
        "año": parseInt(año),
        "mes": parseInt(mes),
    });
    // console.log(data);
    $('.resultados').html('<canvas id="grafico"></canvas>');//se fija en donde se usaran los datos a obtener
    var json = JSON.stringify(data);
    $.ajax({
        type: 'POST',
        url: 'generarGraficoExpedidas.php',
        data: "json=" + json,
        success: function (dataTipo) {//en caso que todo se ejecuter correctamente se alamacenaran los datos en variables las cuales se usaran para poder realizar el grafico
            var exp;
            var inu;
            var ext;
            exp = dataTipo[2];//el array obtenido en la respuesta no se obtiene de manera correcta es mas como una cadena de texto simple por lo cual el primer dato se encuentra en la posicion 2 
            inu = dataTipo[6];//y de ahi va aumentando de 4 en 4, por lo que la siguiente posicion es en el 6
            ext = dataTipo[10];//10
            var Datos = {
                labels: ['Expedidas', 'Inutilizadas', 'Extraviadas'],
                datasets: [{
                    fillColor: 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
                    strokeColor: 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
                    highlightFill: 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                    highlightStroke: 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                    data: [exp, inu, ext],//datos obtenidos que se usaran en la grafica
                }]
            }
            var contexto = document.getElementById('grafico').getContext('2d');
            window.Barra = new Chart(contexto).Bar(Datos, {//se generara en el contexto que es el elemento de tipo canvas con id de grafico
                responsive: true,
                maintainAspectRatio: false
            });
            Barra.clear();
        },
        error: function (jqXHR, textStatus, errorThrown) {//mostrara un error si no hay conexion
            alert('Error!!:  ');
        }
    });

    return false;
}

//función para imprimir un gafico con las matriculas espedidas segun año y mes
function matriculas() {
    var data = []; //variable de tipo array
    var año = document.querySelector('#año').value;//obtiene el valor del select con id=año

    data.push({//se guardan en el array data
        "año": parseInt(año),
    });
    // console.log(data);
    $('.resultados2').html('<canvas id="grafico2"></canvas>');//se fija en donde se usaran los datos a obtener
    var json = JSON.stringify(data);
    $.ajax({
        type: 'POST',
        url: 'generarGraficoMatriculas.php',
        data: "json=" + json,
        success: function (dataTipo) {//en caso que todo se ejecuter correctamente se alamacenaran los datos en variables las cuales se usaran para poder realizar el grafico
            // console.log(dataTipo[2]," ",dataTipo[6]," ",dataTipo[10]," ",dataTipo[14]," ",dataTipo[18]," ",dataTipo[22]," ",dataTipo[26]," ",dataTipo[30]," ",dataTipo[34]," ",dataTipo[38]," ",dataTipo[42]," ");
            var ene = dataTipo[2]; //el array obtenido en la respuesta no se obtiene de manera correcta es mas como una cadena de texto simple por lo cual el primer dato se encuentra en la posicion 2 
            var feb = dataTipo[6];//y de ahi va aumentando de 4 en 4, por lo que la siguiente posicion es en el 6
            var mar = dataTipo[10];//10
            var abr = dataTipo[14];
            var may = dataTipo[18];
            var jun = dataTipo[22];
            var jul = dataTipo[26];
            var ago = dataTipo[30];
            var sep = dataTipo[34];
            var oct = dataTipo[38];
            var nov = dataTipo[42];
            var dic = dataTipo[46];
            var Datos = {
                labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                datasets: [{
                    fillColor: 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
                    strokeColor: 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
                    highlightFill: 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                    highlightStroke: 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                    data: [ene, feb, mar, abr, may, jun, jul, ago, sep, oct, nov, dic],//datos obtenidos que se usaran en la grafica
                }]
            }
            var contexto = document.getElementById('grafico2').getContext('2d');
            window.Barra = new Chart(contexto).Bar(Datos, {//se generara en el contexto que es el elemento de tipo canvas con id de grafico
                responsive: true,
                maintainAspectRatio: false
            });
            Barra.clear();
        },
        error: function (jqXHR, textStatus, errorThrown) {//mostrara un error si no hay conexion
            alert('Error!!:  ');
        }
    });

    return false;
}

//función para imprimir un gafico con loas grados maximos de estudios segun año
function gradoMax() {
    var data = []; //variable de tipo array
    var año = document.querySelector('#año').value;//obtiene el valor del select con id=año

    data.push({//se guardan en el array data
        "año": parseInt(año),
    });
    // console.log(data);
    $('.resultados3').html('<canvas id="grafico3"></canvas>');//se fija en donde se usaran los datos a obtener
    var json = JSON.stringify(data);
    $.ajax({
        type: 'POST',
        url: 'generarGraficoGradoMax.php',
        data: "json=" + json,
        success: function (dataTipo) {//en caso que todo se ejecuter correctamente se alamacenaran los datos en variables las cuales se usaran para poder realizar el grafico
            var sin = dataTipo[2]; //el array obtenido en la respuesta no se obtiene de manera correcta es mas como una cadena de texto simple por lo cual el primer dato se encuentra en la posicion 2
            var pre = dataTipo[6];//y de ahi va aumentando de 4 en 4, por lo que la siguiente posicion es en el 6
            var pri = dataTipo[10];//10
            var sec = dataTipo[14];
            var bac = dataTipo[18];
            var lic = dataTipo[22];
            var Datos = {
                labels: ['Sin Estudios', 'Preescolar', 'Primaria', 'Secundaria', 'Bachillerato', 'Licenciatura'],
                datasets: [{
                    fillColor: 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
                    strokeColor: 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
                    highlightFill: 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                    highlightStroke: 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                    data: [sin, pre, pri, sec, bac, lic],//datos obtenidos que se usaran en la grafica
                }]
            }
            var contexto = document.getElementById('grafico3').getContext('2d');
            window.Barra = new Chart(contexto).Bar(Datos, {//se generara en el contexto que es el elemento de tipo canvas con id de grafico
                responsive: true,
                maintainAspectRatio: false
            });
            Barra.clear();
        },
        error: function (jqXHR, textStatus, errorThrown) {//mostrara un error si no hay conexion
            alert('Error!!:  ');
        }
    });

    return false;
}