function ListarPelisCrud() {

    var resultado = document.getElementById('resultado');
    //var frmbusqueda=document.getElementById('frmbusqueda');
    var formdata = new FormData();

    // formdata.append('buscar_nombre', buscar_nombre);


    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../cruds/listar_pelis_crud.php');
    ajax.onload = function() {
        var str = "";
        if (ajax.status == 200) {
            if (ajax.responseText == "sin_resultados") {
                console.log("ups");
                var tabla = '';
                resultado.innerHTML = tabla;
                var error = "<br><p style='font-size:23px ; width: 100%;color:white;'>No se han encontado resultados. </p>";
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

                    str = "<tr><td>" + item.id + "</td>";
                    str = str + "<td style='text-align: center;'>" + item.titulo_peli + "</td>";
                    str += "<td>  <img style='width:60px;' src=" + item.img_peli + " ></td>";

                    str += "<td>" + item.categoria + "</td>";

                    str += "<td>";
                    str = str + " <button type='button' style='background-color:#006d6d;' class='btn btn-success' onclick=" + "Editar(" + item.id + ")>Editar</button>";
                    str += "</td> ";
                    str += "<td>";
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

ListarPelisCrud('');



// Eliminar

function Eliminar(id) {
    Swal.fire({
        title: '¿Quiere eliminar esta película?',
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
            ajax.open('POST', '../cruds/eliminar_peli.php');
            ajax.onload = function() {
                if (ajax.status === 200) {

                    if (ajax.responseText == "ok") {
                        ListarPelisCrud('');
                        Swal.fire({
                            icon: 'success',
                            title: 'Peli eliminada correctamente',
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