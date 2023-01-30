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
    <link rel="stylesheet" href="../style/pelis.css">

    <!--ICONOS de Font Awesome -->
    <script src="https://kit.fontawesome.com/e0b63cee0f.js" crossorigin="anonymous"></script>
        <!-- SWEET ALERTS -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Solicitudes</title>
</head>
<body style=" background-image: url('https://i0.wp.com/imgs.hipertextual.com/wp-content/uploads/2022/07/Posters.png?fit=1200%2C900&quality=60&strip=all&ssl=1');">



<?php
                    session_start();
                    if (!isset($_SESSION['id'])) {
                        echo "<script>window.location.href = '../view/principal.php';</script>";
                    }


                    if (!$_SESSION['admin']==1) {
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
                    <?php
                       require_once '../conexion/conexion.php';
                    $consulta = $pdo->prepare("SELECT * FROM `tbl_usuarios` WHERE nuevo=1");
                    $consulta->execute();
                    
                    $resultado =  $consulta->fetchAll(PDO::FETCH_ASSOC);
                    $usuarios_new=count($resultado);
                   
                    if (isset($_SESSION['id'])) {
                      
                        if ($_SESSION['admin']==1) {
                            ?> <div class="seccion" style='background-color:  #f47141;border-radius:100px;margin:8px'>
                            <a class="nav-link active " style="text-align: center;" href="./pelis.php">Películas <i class="fa-solid fa-file-video"></i></a>
                            </div>
                            </li>
                            <li class="nav-item">
                            <div class="seccion"  style='background-color: #f47141;border-radius:100px;margin:8px'>
                             <a class="nav-link active " style="text-align: center;" href="./usuarios.php">Usuarios <i class="fa-solid fa-users-gear"></i></a>
                             </div>
                            </li>
                            <li class="nav-item">
                            <div class="seccion"  style='background-color: #f54121;border-radius:100px;margin:8px'>
                             <a class="nav-link active " style="text-align: center;" href="./solicitudes.php">Solicitudes <i class="fa-solid fa-user-plus"></i> <?php if($usuarios_new>0){echo  " <span style='background-color: red;border-radius:100px;'>    $usuarios_new";}   ?></span></a>
                             </div>
                            </li>
                            <?php
                        } elseif ($_SESSION['admin']==0) {
                          $id_usuario= $_SESSION['id'];
                            ?>
                            <li class="nav-item">
                            <?php
                           echo "<a class='nav-link active ' style='text-align: center;' href='./perfil.php?id=$id_usuario'>Perfil <i class='fa-solid fa-user-pen'></i></a>"
                            ?>
                           </li>
                           <?php
                        }
                        // echo "  <li style='color:white;margin-top:7px;text-align: center; ' class='nav-item'>";
                        // echo   "Bienvenido ".$_SESSION['nombre_usu'];
                        // echo"</li>";
                    }
                   
                ?>
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
                            $sql="SELECT * FROM tbl_categoria;";

                            $query = $pdo->prepare($sql);

                            $query->execute();

                            $categorias = $query->fetchAll(PDO::FETCH_ASSOC);


                            ?>
    <div class="row-c ">

<!-- 
<div class="column-2 padding-mobile"><div class="contact" style="text-align: center;">
			<h3 style="text-align: center;">Usuarios <i class="fa-solid fa-users"></i></h3>

			<form action="" method="post" id="form_peli"  enctype="multipart/form-data">

				<p>
                <input type="hidden" name="idp" id="idp" value="">
					<label>Username</label>
					<input type="text" name="nombre"  id="nombre" >
				</p>

				<p>
					<label>Estado</label>
				<input type="number" name="categoria" id="categoria"> -->


				<!-- <p>
					<label>E-mail Address</label>
					<input type="email" name="correo" id="correo" required>
				</p> -->

				<!-- <p>
					<label>Carátula</label>
					<input type="file" name="imagen" id="imagen">
				</p>

                <p>
					<label>Video</label>
					<input type="file" name="video" id="video">
				</p> -->

				<!-- <p class="full">
					<label>Correo</label>
					<textarea name="descripcion" rows="5" id="descripcion"></textarea> -->
                 
          

			<!-- End #contact-form -->
		<!-- </div></div>  -->

<div style="text-align: center;" class=" padding-mobile">

<div class="column1" style="text-align: center;background-color:aliceblue;">
<br>
    <input style="width: 120px; border-radius:30px;" type="number" placeholder="Id" name="buscar_id" id="buscar_id">
    <input style="width: 120px;border-radius:30px;"  type="text" placeholder="Username"  name="buscar_nombre" id="buscar_nombre">
    <input style="width: 120px;border-radius:30px;"  type="text" placeholder="Correo"  name="buscar_correo" id="buscar_correo">
    <select name="buscar_estado" id="buscar_estado" style="margin-top: 5px;border-radius:30px;">
        <option value="">Estado <i class="fa-solid fa-arrow-down-z-a"></i></option>
        <option value="1">Activo</option>
        <option value="0">No activo</option>
    </select>
    <br>
    <br>

<div class="table-wrapper"  style="width: 100%;">
<table class="container" >
	<thead >
		<tr>
			<th ><h1 style="text-align: center;">Id</h1></th>
			<th><h1 style="text-align: center;">Username</h1></th>
			<th><h1 style="text-align: center;">Correo</h1></th>
          
            <th><h1 style="text-align: center;">Estado</h1></th>
           
            <th><h1 style="text-align: center;">Eliminar</h1></th>
		</tr>
	</thead>
	<tbody style="color:white; "  id="resultado">
	
	</tbody>



</table></div></div></div>



    </div>
    <script src="../js/solicitudes.js"></script>
</body>
</html>