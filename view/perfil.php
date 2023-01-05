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
    <link rel="stylesheet" href="../style/perfil.css">


    <!--ICONOS de Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
        <!-- SWEET ALERTS -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Pelicula</title>
</head>
<body style="background-color: #f47141;;color:#17263D;" >
    


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
                    session_start();
                    if (!isset($_SESSION['id'])) {
                        echo "<script>window.location.href = '../view/principal.php';</script>";
                    } elseif ($_SESSION['admin']==1) {
                        echo "<script>window.location.href = '../view/principal.php';</script>";
                    }
                    
                ?>
    <?php
                           require_once '../conexion/conexion.php';
                           $id=$_SESSION['id'];

                           $sql="SELECT * FROM tbl_usuarios WHERE id=:id";
                           $query = $pdo->prepare($sql);
                           $query->bindParam(":id", $id);

                            $query->execute();

                            $resultado=$query->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultado as $perfil) {
    $perfil_nom=$perfil['nombre_usu'];
    
    $perfil_correo=$perfil['correo'];

    $perfil_foto=$perfil['img_perfil'];
   

}
                            ?>

<br>

<aside class="profile-card">
  <header>
    <!-- here’s the avatar -->
    <?php
    if ($perfil_foto=="") {
        ?>
 <img src="../img/sin_foto.jpg" class="img_perfil">
           <?php
    } else {
       echo "<img src='$perfil_foto' class='img_perfil'>";
    }
     ?>
     
   

    <!-- the username -->
    <h1>
    <?php
       echo   $perfil_nom;
          ?>
    </h1>

    <!-- and role or location -->
    <h2>
    <?php
    
          ?> 
            <form action="../func/listar_foto.php" method="post" id="form_perfil"  enctype="multipart/form-data">
                <input type="hidden" id="id" name="id" value="  <?php echo  $id ?>">
               
<input type="file" id="imagen" name="imagen" class="file-select">
<br>
<br>
<input type="submit" id="cambiar" value="Cambiar Imagen">
          </form>

          </h2>
        
  </header>

  <!-- bit of a bio; who are you? -->
  <div class="profile-bio">

    <p style="font-size: 23px;">
    <?php
    echo   "$perfil_correo <i class='fa-solid fa-square-envelope'></i>";
    echo "<br>";
$id_usu=$_SESSION['id'];


$query = $pdo->prepare("SELECT * FROM `tbl_like` WHERE usuario_fk=:usu");
$query->bindParam(":usu", $id_usu);

$query->execute();

$resultado = $query->fetchAll(PDO::FETCH_ASSOC);
$likes_num=count($resultado);
if ($likes_num==1) {
    echo "<br>";
echo "Te ha gustado <i class='fa-solid fa-heart'></i> <br> $likes_num película <i class='fa-solid fa-clapperboard'></i>";
} else {
    echo "<br>";
    echo "Te han gustado <i class='fa-solid fa-heart'></i> <br> $likes_num películas <i class='fa-solid fa-clapperboard'></i>";
}

    ?>
    </p>

  </div>

  <!-- some social links to show off -->
  <ul class="profile-social-links">
    <li>
      <a target="_blank" href="https://www.facebook.com/creativedonut">
        <i class="fa fa-facebook"></i>
      </a>
    </li>
    <li>
      <a target="_blank" href="https://twitter.com/dropyourbass">
        <i class="fa fa-twitter"></i>
      </a>
    </li>
    <li>
      <a target="_blank" href="https://github.com/vipulsaxena">
        <i class="fa fa-github"></i>
      </a>
    </li>
    <li>
      <a target="_blank" href="https://www.behance.net/vipulsaxena">
       
        <i class="fa fa-behance"></i>
      </a>
    </li>
  </ul>
</aside>

<!-- <script src="../js/perfil.js"></script> -->
</body>


<!-- vacio -->
<?php
if (isset($_GET['vacio'])) {
if ($_GET['vacio']=='si') {
    ?>
    <script>
 Swal.fire({
                            icon: 'error',
                            title: 'Archivo vacío',
                            showConfirmButton: false,
                            background: '#17263D',
                            color: 'white',
                            timerProgressBar: true,

                            timer: 2000
                        })

    </script>
    <?php
}
}

?>


<!-- archivo mal -->
<?php
if (isset($_GET['mal'])) {
if ($_GET['mal']=='si') {
    ?>
    <script>
 Swal.fire({
                            icon: 'error',
                            title: 'Formato de archivo incorrecto',
                            showConfirmButton: false,
                            background: '#17263D',
                            color: 'white',
                            timerProgressBar: true,

                            timer: 2000
                        })

    </script>
    <?php
}
}

?>


</html>