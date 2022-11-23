var guardarMaExtr = document.getElementById('guardarMaExtr');
var guardarMaInut = document.getElementById('guardarMaInut');

var dataextr = []; //variable de tipo array
var dataInut = []; //variable de tipo array

guardarMaExtr.addEventListener("click", guardarMatriculaExtr); //elemento que espera un clic en el elemento  y asi ejecutar la funcion a usar
guardarMaInut.addEventListener("click", guardarMatriculaInut);

function guardarMatriculaExtr(){
    var matriculaExt = document.querySelector('#matriculaExt').value;
    dataextr.push(
        {
            "matricula" : matriculaExt,
        }
    );
    var json = JSON.stringify(dataextr); //variable para guardar los datos contenidos en el array data
    $.ajax({
        type: "POST", //sentencia de tipo POST
        url: "guardarMatriculaExtr.php", //elemento en donde se ejecutara la sentencia
        data: "json=" + json, //datos que se usaran en la sentencia
        success: function (respo) {
            // console.log(respo);
            document.querySelector('#matriculaExt').value = "";
            mensaje = Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'INFORMACIÓN GUARDADA',
                showConfirmButton: false,
                timer: 1500
            })
        }

    });
}

function guardarMatriculaInut(){
    var matriculaInt = document.querySelector('#matriculaInt').value;
    dataInut.push(
        {
            "matricula" : matriculaInt,
        }
    );
    var json = JSON.stringify(dataInut); //variable para guardar los datos contenidos en el array data
    $.ajax({
        type: "POST", //sentencia de tipo POST
        url: "guardarMatriculaInut.php", //elemento en donde se ejecutara la sentencia
        data: "json=" + json, //datos que se usaran en la sentencia
        success: function (respo) {
            // console.log(respo);
            document.querySelector('#matriculaInt').value = "";
            mensaje = Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'INFORMACIÓN GUARDADA',
                showConfirmButton: false,
                timer: 1500
            })
        }

    });
}