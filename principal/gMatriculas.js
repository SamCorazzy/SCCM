var guardarMaExtr = document.getElementById('guardarMaExtr');//variable para obtener un elemento html por su id
var guardarMaInut = document.getElementById('guardarMaInut');//variable para obtener un elemento html por su id

var dataextr = []; //variable de tipo array
var dataInut = []; //variable de tipo array

guardarMaExtr.addEventListener("click", guardarMatriculaExtr); //elemento que espera un clic en el elemento  y asi ejecutar la funcion a usar
guardarMaInut.addEventListener("click", guardarMatriculaInut);//elemento que espera un clic en el elemento  y asi ejecutar la funcion a usar

//función que sirve para guardar una matricula extraviada
function guardarMatriculaExtr() {
    var matriculaExt = document.querySelector('#matriculaExt').value;//obtiene el valor de un elemento html y lo guarda en una variable
    dataextr.push({//guardado de datos en array y convirtiendo en mayusculas las variables que contienen cadenas
        "matricula": matriculaExt,
    });
    var json = JSON.stringify(dataextr); //variable para guardar los datos contenidos en el array data
    $.ajax({
        type: "POST", //sentencia de tipo POST
        url: "guardarMatriculaExtr.php", //elemento en donde se ejecutara la sentencia
        data: "json=" + json, //datos que se usaran en la sentencia
        success: function (respo) {
            // console.log(respo);
            document.querySelector('#matriculaExt').value = "";//en caso que todo se ejecuter correctamente se vaciaran los datos y mandara una alerta que todo salio exitosamente
            mensaje = Swal.fire({//alerta de todo salio exitosamente
                position: 'center',
                icon: 'success',
                title: 'INFORMACIÓN GUARDADA',
                showConfirmButton: false,
                timer: 1500
            })
        }

    });
}

//función que sirve para guardar una matricula inutilizada
function guardarMatriculaInut() {
    var matriculaInt = document.querySelector('#matriculaInt').value;//obtiene el valor de un elemento html y lo guarda en una variable
    dataInut.push({//guardado de datos en array y convirtiendo en mayusculas las variables que contienen cadenas
        "matricula": matriculaInt,
    });
    var json = JSON.stringify(dataInut); //variable para guardar los datos contenidos en el array data
    $.ajax({
        type: "POST", //sentencia de tipo POST
        url: "guardarMatriculaInut.php", //elemento en donde se ejecutara la sentencia
        data: "json=" + json, //datos que se usaran en la sentencia
        success: function (respo) {
            // console.log(respo);
            document.querySelector('#matriculaInt').value = "";//en caso que todo se ejecuter correctamente se vaciaran los datos y mandara una alerta que todo salio exitosamente
            mensaje = Swal.fire({//alerta de todo salio exitosamente
                position: 'center',
                icon: 'success',
                title: 'INFORMACIÓN GUARDADA',
                showConfirmButton: false,
                timer: 1500
            })
        }

    });
}
