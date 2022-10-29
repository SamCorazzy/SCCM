var guardar = document.getElementById('guardar');

var data = [];//variable de tipo array

guardar.addEventListener("click", agregar);//elemento que espera un clic en el elemento  y asi ejecutar la funcion a usar


function agregar() {//funcion
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
    var grado_maximo_estudio = document.querySelector('#grado_maximo_estudio').value;
    // var grado_estudios = document.querySelector('#grado_estudios').value;
    var domicilio = document.querySelector('#domicilio').value;
    var fecha_exped = document.querySelector('#fecha_exped').value;
    var clase = document.querySelector('#clase').value;
    //console.log(domicilio);
    //agrega elementos al arreglo
    data.push(//guardado de datos en array
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
        //   "grado_estudios": grado_estudios,
          "domicilio": domicilio,
          "fecha_exped": fecha_exped,
          "clase": clase,
        }
    );

    if(matricula == '' || nombre_apellidos == '' || fecha_nac == '' || lugar_nac == '' || curp == '' || mexicanos_por == '' || nombre_ape_padre == '' || nombre_ape_madre == '' || estado_civil == '' || ocupacion == '' || leer_escribir == '' || grado_maximo_estudio == '' || domicilio == '' || fecha_exped == '' || clase == ''){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'NEL!',
            showConfirmButton: false,
            timer: 1500
          })
    } else {
        alerta();
    }


}




function alerta(){
    var mensaje;
    var opcion = confirm("¿DESEA GUARDAR?");
    if (opcion == true) {
        save();
        mensaje = Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'OK?',
            showConfirmButton: false,
            timer: 1500
          })
	} else {
        mensaje = Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'NEL!',
            showConfirmButton: false,
            timer: 1500
          })
	}
}



 function save() {
     var json = JSON.stringify(data);//variable para guardar los datos contenidos en el array data
     $.ajax({
         type: "POST",//sentencia de tipo POST
         url: "api.php",//elemento en donde se ejecutara la sentencia
         data: "json=" + json,//datos que se usaran en la sentencia
         success: function (respo) {
             location.reload();//si todo sale bien se recarga la pagina
         }

     });
 }