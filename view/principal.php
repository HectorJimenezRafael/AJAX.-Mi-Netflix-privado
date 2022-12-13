<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



        <!--estilos de Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


    <!-- estilos css -->
    <link rel="stylesheet" href="../style/principal.css">

    <!--ICONOS de Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
        <!-- SWEET ALERTS -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Principal</title>
</head>
<body style="background-color: #f47141;;color:#17263D;">

<?php

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./intro.php">GO-VIDEO <i class="fa-solid fa-play"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 50vh;">
                    <li class="nav-item">
                    <?php
                    session_start();
                    if (isset($_SESSION['id'])) {
                        if ($_SESSION['admin']==1) {
                            ?>
                            <a class="nav-link active" style="text-align: center;" href="./pelis.php">Películas <i class="fa-solid fa-file-video"></i></a>
                            </li>
                            <li class="nav-item">
                             <a class="nav-link active " style="text-align: center;" href="./usuarios.php">Usuarios <i class="fa-solid fa-users"></i></a>
                            </li>
                            <?php
                        }
                    }
                    
                ?>
                                     
                </ul>

                <form class="d-flex">
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                    <!-- <button class="btn btn-light form-control me-1" type="submit"><i class="fa-solid fa-plus opacidad"></i></button> -->
                    <?php
                    if (!isset($_SESSION['id'])) {
                        ?>
                         <a class="btn btn-light form-control ms-1" href="./login.php">Inicia sesión <i class="fa-solid fa-up-right-from-square"></i></a>
                        <?php

                       
                    } else {
                        ?>
                         <a class="btn btn-light form-control ms-1" href="../func/cerrar_sesion.php">Cerrar sesión <i class="fa-solid fa-arrow-right-from-bracket"></i></a>
                        <?php
                    }
                        ?>
                   
                   
                </form>
            </div>
        </div>
    </nav>


       <!-- Top -->
       <div class="row-c padding-m">
        <h4 id="lol" class="column-1 padding-m">Top 5 <i class="fa-solid fa-ranking-star"></i></h4>

        <div  id="top5" class="column-1 padding-s">
            <!-- <div class="column-5 padding-s">
                <img src="./img/keila-hotzel-lFmuWU0tv4M-unsplash.jpg" alt="" class="imagen_peque">
            </div>
            <div class="column-5 padding-s">
                <img src="./img/susanna-marsiglia-Yjr6EafseQ8-unsplash.jpg" alt="" class="imagen_peque">
            </div>
            <div class="column-5 padding-s">
                <img src="./img/dan-cristian-padure-QQkQcaz7qmY-unsplash.jpg" alt="" class="imagen_peque">
            </div>
            <div class="column-5 padding-s">
                <img src="./img/nick-fewings-EkyuhD7uwSM-unsplash.jpg" alt="" class="imagen_peque">
            </div>
            <div class="column-5 padding-s">
                <img src="./img/etienne-girardet-j2Soo4TfFMk-unsplash.jpg" alt="" class="imagen_peque">
            </div> -->

        </div>

    </div>


    <div id="pelis" class="row-c">


    </div>

    
<!-- Sesión cerrada -->
<?php
if (isset($_GET['sesion'])) {
if ($_GET['sesion']=='close') {
    ?>
    <script>
 Swal.fire({
                            icon: 'success',
                            title: 'Sesión cerrada correctamente',
                            showConfirmButton: false,
                            background: '#17263D',
                            color: 'white',
                            timerProgressBar: true,

                            timer: 3500
                        })

    </script>
    <?php
}
}

?>


<!-- Sesión iniciada -->
<?php
if (isset($_GET['sesion'])) {
if ($_GET['sesion']=='true') {
    ?>
    <script>
 Swal.fire({
                            icon: 'success',
                            title: 'Bienvenido usuario',
                            showConfirmButton: false,
                            background: '#17263D',
                            color: 'white',
                            timerProgressBar: true,

                            timer: 3500
                        })

    </script>
    <?php
}
}

?>
    <script src="../js/pelis.js"></script>
</body>
</html>