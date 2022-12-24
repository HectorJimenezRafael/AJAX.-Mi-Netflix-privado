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
    <link rel="stylesheet" href="../style/pelicula.css">

    <!--ICONOS de Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
        <!-- SWEET ALERTS -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Pelicula</title>
</head>
<body >
    


<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="./intro.php">GO-VIDEO <i class="fa-solid fa-play"></i></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 50vh;">
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="./sobrenosotros.html">Películas <i class="fa-solid fa-file-video"></i></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active disabled" aria-current="page" href="./actividades.html">Usuarios <i class="fa-solid fa-users"></i></a>
                    </li> -->
                </ul>
                <form class="d-flex">
                    <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
                    <!-- <button class="btn btn-light form-control me-1" type="submit"><i class="fa-solid fa-plus opacidad"></i></button> -->
                    
                    <a class="btn btn-light form-control ms-1" href="./principal.php">Volver <i class="fa-solid fa-arrow-left"></i></a>
                   
                </form>
            </div>
        </div>
    </nav>

    <?php
                           require_once '../conexion/conexion.php';
                           $id=$_GET['id_peli'];

                            $sql="SELECT * FROM tbl_peli WHERE id=$id;";

                            $query = $pdo->prepare($sql);

                            $query->execute();

                            $pelicula = $query->fetchAll(PDO::FETCH_ASSOC);

                            foreach ( $pelicula as $peli ) {
                                $titulo=$peli['titulo_peli'];
                                $descripcion=$peli['descripcion_peli'];
                                $imagen=$peli['img_peli'];
                                $categoria=$peli['categoria'];
                                $likes=$peli['peli_likes'];
                                $video=$peli['video'];
                                // echo $titulo;
                                // echo $imagen;
                            }

                            ?>

<br>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,600,0,0" />
<center><div id="tv"><div class="scanline" style="width: 560px; height: 315px;"><div id="myDIV">

<video class="video" controls poster="<?php echo$imagen?>">
  <source src="<?php echo$video?>" type="video/mp4" />

  <img src="default.png" alt="Video no soportado" />
  Su navegador no soporta este formato de video.
</video>
<!-- 
    <iframe style="filter: opacity(95%);" width="560" height="315" src="https://www.youtube.com/embed/videoseries?hd1080&autoplay=1&controls=0&rel=0&amp;list=UUq6aw03lNILzV96UvEAASfQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> -->
</div></div> <br><p style="color: white;"> <?php echo  $titulo?> </p></div><div style="background: black; width: 109px; height: 40px;"></div><div style="background: black; width: 459px; height: 80px; border-radius: 10px; padding-top: 10px"><button style="padding-left: 5px;" class="power" onclick="myFunction()"><span style="color: white; font-size: 50px;" class="material-symbols-outlined">power_settings_new</span></button></div></center>



    <script src="../js/boton.js"></script>
</body>
</html>