function mostrarResultados() {
    var data = []; //variable de tipo array
    var año = document.querySelector('#año').value;
    var mes = document.querySelector('#mes').value;

    data.push({
        "año": parseInt(año),
        "mes": parseInt(mes),
    });
    // console.log(data);
    $('.resultados').html('<canvas id="grafico"></canvas>');
    var json = JSON.stringify(data);
    $.ajax({
        type: 'POST',
        url: 'generarGraficoExpedidas.php',
        data: "json=" + json,
        success: function (dataTipo) {
            // console.log(dataTipo[0]);
            var exp;
            var inu;
            var ext;
            exp = dataTipo[2];
            inu = dataTipo[6];
            ext = dataTipo[10];
            // console.log(exp,inu,ext);
            var Datos = {
                labels: ['Expedidas', 'Inutilizadas', 'Extraviadas'],
                datasets: [{
                    fillColor: 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
                    strokeColor: 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
                    highlightFill: 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                    highlightStroke: 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                    data: [exp, inu, ext],
                }]
            }
            var contexto = document.getElementById('grafico').getContext('2d');
            window.Barra = new Chart(contexto).Bar(Datos, {
                responsive: true,
                maintainAspectRatio: false
            });
            Barra.clear();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error!!:  ');
        }
    });

    return false;
}

function matriculas() {
    var data = []; //variable de tipo array
    var año = document.querySelector('#año').value;

    data.push({
        "año": parseInt(año),
    });
    // console.log(data);
    $('.resultados2').html('<canvas id="grafico2"></canvas>');
    var json = JSON.stringify(data);
    $.ajax({
        type: 'POST',
        url: 'generarGraficoMatriculas.php',
        data: "json=" + json,
        success: function (dataTipo) {
            // console.log(dataTipo[2]," ",dataTipo[6]," ",dataTipo[10]," ",dataTipo[14]," ",dataTipo[18]," ",dataTipo[22]," ",dataTipo[26]," ",dataTipo[30]," ",dataTipo[34]," ",dataTipo[38]," ",dataTipo[42]," ");
            var ene = dataTipo[2]; 
            var feb = dataTipo[6];
            var mar = dataTipo[10];
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
                    data: [ene, feb, mar, abr, may, jun, jul, ago, sep, oct, nov, dic],
                }]
            }
            var contexto = document.getElementById('grafico2').getContext('2d');
            window.Barra = new Chart(contexto).Bar(Datos, {
                responsive: true,
                maintainAspectRatio: false
            });
            Barra.clear();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error!!:  ');
        }
    });

    return false;
}

function gradoMax() {
    var data = []; //variable de tipo array
    var año = document.querySelector('#año').value;

    data.push({
        "año": parseInt(año),
    });
    // console.log(data);
    $('.resultados3').html('<canvas id="grafico3"></canvas>');
    var json = JSON.stringify(data);
    $.ajax({
        type: 'POST',
        url: 'generarGraficoGradoMax.php',
        data: "json=" + json,
        success: function (dataTipo) {
            console.log(dataTipo[2]," ",dataTipo[6]," ",dataTipo[10]," ",dataTipo[14]," ",dataTipo[18]," ",dataTipo[22]);
            var sin = dataTipo[2]; 
            var pre = dataTipo[6];
            var pri = dataTipo[10];
            var sec = dataTipo[14];
            var bac = dataTipo[18];
            var lic = dataTipo[22];
            // console.log(exp,inu,ext);
            var Datos = {
                labels: ['Sin Estudios', 'Preescolar', 'Primaria', 'Secundaria', 'Bachillerato', 'Licenciatura'],
                datasets: [{
                    fillColor: 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
                    strokeColor: 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
                    highlightFill: 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                    highlightStroke: 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                    data: [sin, pre, pri, sec, bac, lic],
                }]
            }
            var contexto = document.getElementById('grafico3').getContext('2d');
            window.Barra = new Chart(contexto).Bar(Datos, {
                responsive: true,
                maintainAspectRatio: false
            });
            Barra.clear();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            alert('Error!!:  ');
        }
    });

    return false;
}