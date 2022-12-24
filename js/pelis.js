ListarPelisTop('');
color_likes('');

function ListarPelisTop() {

    var resultado = document.getElementById('top5');
    //var frmbusqueda=document.getElementById('frmbusqueda');
    var formdata = new FormData();

    // formdata.append('buscar_nombre', buscar_nombre);


    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../cruds/listar_pelis_top_5.php');
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

                    str = "<div class='column-5 padding-s'>";
                    str = str + "<img class='imagen_peque' src=" + item.img_peli + "><p style='text-align:center;font-size:20px;'>" + item.titulo_peli + "</p></div>";


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


ListarTodasPelis('');

function ListarTodasPelis() {

    var resultado = document.getElementById('pelis');
    //var frmbusqueda=document.getElementById('frmbusqueda');
    var formdata = new FormData();

    // formdata.append('buscar_nombre', buscar_nombre);


    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../cruds/listar_todas_pelis.php');
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

                    str = "<div class='column-3 padding-mobile'>";
                    str = str + "<a href='pelicula.php?id_peli=" + item.id + "'><img class='imagen_mediana' src=" + item.img_peli + "></a><p style='text-align:center;'>" + item.titulo_peli + "</p> <p style='text-align:center;'>Likes : " + item.peli_likes + " <i style='color:red;' class='fa-solid fa-heart opacidad'></i></p>";
                    str = str + "<div style='text-align:center;';' class='padding-m'>";
                    str = str + "  <button class='btn btn-light m-1' onclick=" + "Fav(" + item.id + ") ><i class='fa-solid fa-plus opacidad'></i></button>";
                    str = str + "  <button id='" + item.id + "'  class='btn btn-light m-1' onclick=" + "Like(" + item.id + ")><i class='fa-solid fa-heart opacidad'></i></button>";

                    str = str + "</div>";
                    str = str + "</div>";

                    tabla += str;
                });
                resultado.innerHTML = tabla;

                color_likes('');
            }
        } else {
            resultado.innerText = 'Error';
        }
    }
    ajax.send(formdata);




}


function Like(id) {

    var formdata = new FormData();
    formdata.append('id', id);
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../func/like.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            if (ajax.responseText == "ok") {

                // var json = JSON.parse(ajax.responseText);
                ListarTodasPelis('');

            } else if (ajax.responseText == "sin_sesion") {
                Swal.fire({
                    icon: 'error',
                    title: 'Inicia sesión para Dar Likes',
                    showConfirmButton: false,
                    background: '#006d6d',
                    color: 'white',
                    timerProgressBar: true,

                    timer: 3500
                })
            }
            // alert(json);

            // document.getElementById('lugar').value = json.id_lugar;
            // document.getElementById('capacidad').value = json.capacidad;


        }
    }
    ajax.send(formdata);

}




function color_likes() {

    var formdata = new FormData();
    var ajax = new XMLHttpRequest();
    ajax.open('POST', '../func/likes_dados.php');
    ajax.onload = function() {
        if (ajax.status == 200) {
            var json = JSON.parse(ajax.responseText);
            json.forEach(function(item) {
                document.getElementById(item.pelicula_fk).style.backgroundColor = "#CC0033";
                document.getElementById(item.pelicula_fk).style.borderColor = "#CC0033";

            })




        }
    }
    ajax.send(formdata);


}