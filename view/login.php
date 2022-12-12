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
    <link rel="stylesheet" href="../style/login.css">

    <!--ICONOS de Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
        <!-- SWEET ALERTS -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Login</title>
</head>
<body>
<?php
  session_start();
if (isset($_SESSION['id'])) {
    echo "<script>window.location.href = '../view/principal.php';</script>";
}

?>

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


    <div class="bg-img"></div>
    <div class="container">
      <div class="toggle-btns">
        <div id="toggle"></div>
        <button id="login-toggleBtn" class="login-btn">Login</button>
        <button id="register-toggleBtn" class="register-btn">Registro</button>
      </div>
      <div class="form">
        <form action="../func/iniciar_sesion.php" method="POST" id="login">
          <div class="username">
            <label id="user-label" for="username">Correo</label>
            <input id="username" name="correo" class="input" type="text" required />
          </div>
          <div class="password">
            <label id="pass-label" for="password">Contraseña</label>
            <input id="password" name="pass" class="input" type="password" required />
          </div>
          <!-- <div class="checkbox"><input type="checkbox" id="checkbox" /><label for="checkbox">Remember Me</label></div> -->
          <div class="social-icons form1-icons">
            <div class="logo-apple">
              <div class="circle-1"></div>
              <button><ion-icon name="logo-apple"></ion-icon></button>
            </div>
            <div class="logo-google">
              <div class="circle-2"></div>
              <button><ion-icon name="logo-google"></ion-icon></button>
            </div>
            <div class="logo-facebook">
              <div class="circle-3"></div>
              <button><ion-icon name="logo-facebook"></ion-icon></button>
            </div>
          </div>
          <div class="submit-btn">
            <button id="login-btn">Iniciar sesión</button>
          </div>
        </form>

        <form action="" id="register">
          <div class="username">
            <label id="user-label-reg" for="username">Username</label>
            <input id="username-reg" class="input" type="text" required />
          </div>
          <div class="email">
            <label id="email-label" for="email">Correo</label>
            <input id="email" class="input" type="email" required />
          </div>
          <div class="password">
            <label id="pass-label-reg" for="password">Contraseña</label>
            <input id="password-reg" class="input" type="password" required />
          </div>
          <div class="social-icons form2-icons">
            <div class="logo-apple">
              <div class="circle-1"></div>
              <button><ion-icon name="logo-apple"></ion-icon></button>
            </div>
            <div class="logo-google">
              <div class="circle-2"></div>
              <button><ion-icon name="logo-google"></ion-icon></button>
            </div>
            <div class="logo-facebook">
              <div class="circle-3"></div>
              <button><ion-icon name="logo-facebook"></ion-icon></button>
            </div>
          </div>
          <div class="submit-btn">
            <button id="register-btn">Registrarse</button>
          </div>
        </form>
      </div>
    </div>

    <script src="../js/login.js"></script>



    <!-- SWEET ALERTS -->

<!-- Nombre, contra o ambas incorrectas -->
<?php
if (isset($_GET['error'])) {
if ($_GET['error']=='true') {
    ?>
    <script>
Swal.fire({
    background:'#486b7c',
    color:'white',
    icon: 'error',
    title: 'UPS...',
    text: 'Correo o contraseña incorrectas'


})

    </script>
    <?php
}
}

?>

<!-- Usuario no habilitado -->
<?php
if (isset($_GET['sesion'])) {
if ($_GET['sesion']=='false') {
    ?>
    <script>
Swal.fire({
    background:'#486b7c',
    color:'white',
    icon: 'error',
    title: 'UPS...',
    text: 'Este usuario aún no está habilitado'


})

    </script>
    <?php
}
}

?>


</body>
</html>