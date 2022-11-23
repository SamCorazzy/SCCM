var exp;
var inu;
var ext;
var url = 'generarGrafico.php';

function mostrarResultados() {
    var data = []; //variable de tipo array
    var año = document.querySelector('#año').value;
    var mes = document.querySelector('#mes').value;

    data.push({
        "año": parseInt(año),
        "mes": parseInt(mes),
    });

    $('.resultados').html('<canvas id="grafico"></canvas>');
    var json = JSON.stringify(data);
    $.ajax({
        type: 'POST',
        url: 'generarGrafico.php',
        data: "json=" + json,
        success: imprimir()
    });
    return false;
}

function imprimir() {
    $.getJSON(url, function (dataTipo) {
        $.each(dataTipo, function (i, dataTipo) {
            exp = dataTipo.expedidas;
            inu = dataTipo.expedidas;
            ext = dataTipo.expedidas;
            console.log(dataTipo);
        });
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
            responsive: true
        });
        Barra.clear();
    })
}