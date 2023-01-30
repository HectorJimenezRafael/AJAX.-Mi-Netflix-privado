function reiniciar() {
    // console.log("reiniciar")
    var form = document.getElementById('form_peli');
    form.reset();
    document.getElementById('registrar').value = "Registrar";
}




ListarUsuariosCrud('', '', '', '');

function ListarUsuariosCrud(buscar_id, buscar_nombre, buscar_correo, buscar_estado) {

    var resultado = document.getElementById('resultado');
    //var frmbusqueda=document.getElementById('frmbusqueda');
    var formdata = new FormData();
    formdata.append('buscar_id', buscar_id);
    formdata.append('buscar_nombre', buscar_nombre);
    formdata.append('buscar_correo', buscar_correo);
    formdata.append('buscar_estado', buscar_estado);


    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../cruds/listar_solicitudes.php');
    ajax.onload = function() {
        var str = "";
        if (ajax.status == 200) {
            if (ajax.responseText == "sin_resultados") {
                console.log("ups");
                var tabla = '';
                resultado.innerHTML = tabla;
                var error = "<br><p style='font-size:30px ; width: 100%;color:orange;text-align: center;'>No se han encontado resultados. <i class='fa-solid fa-circle-exclamation'></i> </p>";
                resultado.innerHTML = error;

            } else {
                var json = JSON.parse(ajax.responseText);
                var tabla = '';
                json.forEach(function(item) {
                    // str = "<tr><td>" + item.id + "</td>";
                    // str = str + "<td>" + item.lugar_recurso + "</td>";
                    // str += "<td>  <img style='width:40px;' src=" + item.img_lugar + " ></td>";

                    // str += "<td>";
                    // str = str + " <button type='button' style='background-color:#006d6d;' class='btn btn-success' onclick=" + "Editar(" + item.id + ")>Editar</button>";
                    // str += "</td> ";
                    // str += "<td>";
                    // str = str + " <button type='button' style='background-color:#2f414F;'  class='btn btn-danger' onclick=" + "Eliminar(" + item.id + ")>Eliminar</button>";
                    // str += "</td> ";
                    // str += "</tr>";

                    str = "<tr><td  style='text-align: center;'>" + item.id + "</td>";
                    str = str + "<td style='text-align: center;'>" + item.nombre_usu + "</td>";
                    str = str + "<td style='text-align: center;'>" + item.correo + "</td>";

                    // if (item.img_perfil == "") {
                    //     str += "<td> <img style='width=100px' src='../img/sin_foto.jpg' class='img_perfil'></td>";

                    // } else {
                    //     str += "<td>  <img  class='img_perfil' src=" + item.img_perfil + " ></td>";
                    // }

                    if (item.habilitado == 0) {
                        str = str + "<td style='text-align: center;'> No activo <i style='cursor:pointer;' onclick=" + "Estado(" + item.id + ") class='fa-solid fa-toggle-off'></i></td>";
                    } else if (item.habilitado == 1) {
                        str = str + "<td style='text-align: center;'> Activo <i style='cursor:pointer;' onclick=" + "Estado(" + item.id + ") class='fa-solid fa-toggle-on'></td>";
                    }




                    // str += "<td>";
                    // str = str + " <button type='button' style='background-color:#006d6d;' class='btn btn-success' onclick=" + "Editar(" + item.id + ")>Editar</button>";
                    // str += "</td> ";
                    str += "<td  style='text-align: center;'>";
                    str = str + " <button type='button' style='background-color:#2f414F;'  class='btn btn-danger' onclick=" + "Eliminar(" + item.id + ")>Eliminar</button>";
                    str += "</td> ";
                    str += "</tr>";
                    tabla += str;



                });
                resultado.innerHTML = tabla;
            }
        } else {
            resultado.innerText = 'Error';
        }
    }
    ajax.send(formdata);




}



// FILTRO
buscar_id.addEventListener("keyup", () => {

    const valor_id = buscar_id.value;
    const valor_nombre = buscar_nombre.value;
    const valor_correo = buscar_correo.value;
    const valor_estado = buscar_estado.value;
    if (buscar_id == "" || buscar_nombre == "" || buscar_correo == "" || buscar_estado == "") {
        ListarUsuariosCrud('', '', '', '');
    } else {
        ListarUsuariosCrud(valor_id, valor_nombre, valor_correo, valor_estado);
    }
});


buscar_nombre.addEventListener("keyup", () => {

    const valor_id = buscar_id.value;
    const valor_nombre = buscar_nombre.value;
    const valor_correo = buscar_correo.value;
    const valor_estado = buscar_estado.value;
    if (buscar_id == "" || buscar_nombre == "" || buscar_correo == "" || buscar_estado == "") {
        ListarUsuariosCrud('', '', '', '');
    } else {
        ListarUsuariosCrud(valor_id, valor_nombre, valor_correo, valor_estado);
    }
});


buscar_correo.addEventListener("keyup", () => {

    const valor_id = buscar_id.value;
    const valor_nombre = buscar_nombre.value;
    const valor_correo = buscar_correo.value;
    const valor_estado = buscar_estado.value;
    if (buscar_id == "" || buscar_nombre == "" || buscar_correo == "" || buscar_estado == "") {
        ListarUsuariosCrud('', '', '', '');
    } else {
        ListarUsuariosCrud(valor_id, valor_nombre, valor_correo, valor_estado);
    }
});

buscar_estado.addEventListener("change", () => {

    const valor_id = buscar_id.value;
    const valor_nombre = buscar_nombre.value;
    const valor_correo = buscar_correo.value;
    const valor_estado = buscar_estado.value;
    if (buscar_id == "" || buscar_nombre == "" || buscar_correo == "" || buscar_estado == "") {
        ListarUsuariosCrud('', '', '', '');
    } else {
        ListarUsuariosCrud(valor_id, valor_nombre, valor_correo, valor_estado);
    }
});




// Eliminar

function Eliminar(id) {
    Swal.fire({
        title: '¿Quiere eliminar este usuario?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3894a3',
        cancelButtonColor: '#2f414F',
        confirmButtonText: 'Si',
        background: '#006d6d',
        color: 'white',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {



            var formdata = new FormData();
            formdata.append('id', id);
            var ajax = new XMLHttpRequest();
            ajax.open('POST', '../cruds/eliminar_solicitudes.php');
            ajax.onload = function() {
                if (ajax.status === 200) {

                    if (ajax.responseText == "ok") {
                        ListarUsuariosCrud('', '', '', '');
                        Swal.fire({
                            icon: 'success',
                            title: 'Usuario eliminada correctamente',
                            showConfirmButton: false,
                            background: '#006d6d',
                            color: 'white',
                            timerProgressBar: true,

                            timer: 3500
                        })
                    }
                }
            }
            ajax.send(formdata);
        }
    })



}


// ESTADO
function Estado(id) {
    // console.log("siuu");

    Swal.fire({
        title: '¿Quiere modicar el estado de este usuario?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3894a3',
        cancelButtonColor: '#2f414F',
        confirmButtonText: 'Si',
        background: '#006d6d',
        color: 'white',
        cancelButtonText: 'Cancelar'
    }).then((result) => {
        if (result.isConfirmed) {
            var formdata = new FormData();
            formdata.append('id', id);
            var ajax = new XMLHttpRequest();
            ajax.open('POST', '../cruds/estado_solicitud.php');
            ajax.onload = function() {
                if (ajax.status == 200) {
                    // var json = JSON.parse(ajax.responseText);
                    if (ajax.responseText == "ok") {


                        Swal.fire({
                            icon: 'success',
                            title: 'Estado de usuario modificado',
                            showConfirmButton: false,
                            background: '#006d6d',
                            color: 'white',
                            timerProgressBar: true,

                            timer: 3500
                        })

                        // alert(json);

                        // document.getElementById('lugar').value = json.id_lugar;
                        // document.getElementById('capacidad').value = json.capacidad;

                        ListarUsuariosCrud('', '', '', '');
                    }
                }
            }
            ajax.send(formdata);
        }
    })

}