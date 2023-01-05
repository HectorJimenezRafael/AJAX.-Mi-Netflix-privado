<?php

require_once '../conexion/conexion.php';




$correo=$_POST['correo'];
$pass=$_POST['pass'];


// encriptamos la contraseña
$pass = hash('sha256', $pass);

// echo $correo;
// echo $pass;


$sql= "SELECT * FROM `tbl_usuarios` WHERE contra=:contra AND correo=:correo";

$stmt=$pdo->prepare($sql);

$stmt->bindParam(':contra',$pass);
$stmt->bindParam(':correo',$correo);



$stmt->execute();

$resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultado as $usu) {
    $nom_usu=$usu['nombre_usu'];
    $id_usu=$usu['id'];
    $correo_usu=$usu['correo'];
    $habilitado=$usu['habilitado'];
    $es_admin=$usu['admin'];
    $perfil_foto=$usu['img_perfil'];
}
// var_dump($resultado);

  $un_usuario=count($resultado);

//   echo  $un_usuario;
if ($un_usuario==1) {
    if ($habilitado==1) {
        session_start();
        $_SESSION['nombre_usu'] = $nom_usu;

        $_SESSION['id'] =  $id_usu;
    
        $_SESSION['correo'] = $correo_usu;

        // $_SESSION['habilitado'] = $habilitado;

        $_SESSION['admin'] = $es_admin;
        $_SESSION['img_perfil'] = $perfil_foto;

        ?>
    <script>location.href = '../view/principal.php?sesion=true'</script>
        <?php

    } else {
        ?>
    <script>location.href = '../view/login.php?sesion=false'</script>
        <?php
    }

} else {
    ?>
    <script>location.href = '../view/login.php?error=true'</script>
 <?php
}