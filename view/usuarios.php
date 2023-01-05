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
    <title>Usuarios</title>
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
    <div class="row-c padding-m">


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
					<!-- <input type="number" name="categoria" id="categoria"> -->

                    <select name="estado" id="estado" >
                               
                              <option value="0">No activo </option>
                              <option value="1">Activo </option>
                                   
                                </select>
				</p>

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

				<p class="full">
					<label>Correo</label>
					<!-- <textarea name="descripcion" rows="5" id="descripcion"></textarea> -->
                    <input type="text" name="correo" id="correo">
				</p>

               

				<p class="full">
                <input type="button" value="Registrar" id="registrar" class="btn btn-primary btn-block boton_in">
				</p>

                
				
                

			</form>
            <br>
            <p class="full">
                <input type="button" onclick="reiniciar()" value="Reiniciar" id="reiniciar" class="btn btn-warning btn-block boton_in">
				</p>
            <br>
          

			<!-- End #contact-form -->
		</div></div>

<div class="column-2 padding-mobile">
<div class="table-wrapper">
<table class="container">
	<thead >
		<tr>
			<th ><h1 style="text-align: center;">Id</h1></th>
			<th><h1 style="text-align: center;">Username</h1></th>
			<th><h1 style="text-align: center;">Correo</h1></th>
            <th><h1 style="text-align: center;">Perfil</h1></th>
            <th><h1 style="text-align: center;">Estado</h1></th>
           
            <th><h1 style="text-align: center;">Editar</h1></th>
            <th><h1 style="text-align: center;">Eliminar</h1></th>
		</tr>
	</thead>
	<tbody style="color:white"  id="resultado">
	
	</tbody>



</table></div></div>



    </div>
    <script src="../js/usuarios.js"></script>
</body>
</html>