function cambiaForm2(seleccion) {
    var SinEstudios = ["SIN ESTUDIOS"];
    var Preescolar = ["PRIMER GRADO", "SEGUNDO GRADO", "TERCERO GRADO", "CONCLUIDO"];
    var Primaria = ["PRIMER GRADO", "SEGUNDO GRADO", "TERCER GRADO", "CUARTO GRADO", "QUINTO GRADO", "SEXTO GRADO", "CONCLUIDO"];
    var Secundaria = ["PRIMER AÑO", "SEGUNDO AÑO", "TERCER AÑO", "CONCLUIDO"];
    var Bachillerato = ["PRIMER SEMESTRE", "SEGUNDO SEMESTRE", "TERCER SEMESTRE", "CUARTO SEMESTRE", "QUINTO SEMESTRE", "SEXTO SEMESTRE", "CONCLUIDO"];
    var Licenciatura = ["PRIMER SEMESTRE", "SEGUNDO SEMESTRE", "TERCER SEMESTRE", "CUARTO SEMESTRE", "QUINTO SEMESTRE", "SEXTO SEMESTRE", "SEPTIMO SEMESTRE", "OCTAVO SEMESTRE", "NOVENO SEMESTRE", "CONCLUIDO"];

    var select2 = document.getElementById("grado");

    select2.innerHTML = "";

    switch (seleccion) {
        case "SinEstudios":
            for (i in SinEstudios) {
                var opcion = document.createElement("option");
                opcion.value = SinEstudios[i];
                var texto = document.createTextNode(SinEstudios[i]);
                opcion.appendChild(texto);
                select2.appendChild(opcion);
            }

            break;
        case "Preescolar":
            for (i in Preescolar) {
                var opcion = document.createElement("option");
                opcion.value = Preescolar[i];
                var texto = document.createTextNode(Preescolar[i]);
                opcion.appendChild(texto);
                select2.appendChild(opcion);
            }

            break;

        case "Primaria":
            for (i in Primaria) {
                var opcion = document.createElement("option");
                opcion.value = Primaria[i];
                var texto = document.createTextNode(Primaria[i]);
                opcion.appendChild(texto);
                select2.appendChild(opcion);
            }
            break;

        case "Secundaria":
            for (i in Secundaria) {
                var opcion = document.createElement("option");
                opcion.value = Secundaria[i];
                var texto = document.createTextNode(Secundaria[i]);
                opcion.appendChild(texto);
                select2.appendChild(opcion);
            }
            break;

        case "Bachillerato":
            for (i in Bachillerato) {
                var opcion = document.createElement("option");
                opcion.value = Bachillerato[i];
                var texto = document.createTextNode(Bachillerato[i]);
                opcion.appendChild(texto);
                select2.appendChild(opcion);
            }
            break;

        case "Licenciatura":
            for (i in Licenciatura) {
                var opcion = document.createElement("option");
                opcion.value = Licenciatura[i];
                var texto = document.createTextNode(Licenciatura[i]);
                opcion.appendChild(texto);
                select2.appendChild(opcion);
            }
            break;
    }
}