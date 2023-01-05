<?php
require_once '../conexion/conexion.php';
$data = $_POST['id'];




if (!empty($_FILES['imagen']['name'])) {
    $nombre_img = $_FILES['imagen']['name']; //obtenemos el nombre de la imagen
    $archivo = $_FILES['imagen']['tmp_name'];//archivo
   $ruta="../img";
   $ruta=$ruta."/".$nombre_img;
   $tipo_archivo = $_FILES['imagen']['type'];//guardar el tipo del archivo
if ($tipo_archivo=="image/jpeg" || $tipo_archivo=="image/jpg" || $tipo_archivo=="image/png" || $tipo_archivo=="image/gif" || $tipo_archivo=="image/webp") {
    move_uploaded_file($archivo,$ruta);
    $consulta = $pdo->prepare("UPDATE tbl_usuarios SET img_perfil=:imagen WHERE id=:id");
    $consulta->bindParam(":id", $data);
    $consulta->bindParam(":imagen", $ruta);
    $consulta->execute();
    $_SESSION['img_perfil'] = $ruta;
    echo "<script>window.location.href = '../view/perfil.php?';</script>";
    
    
} else {
    echo "<script>window.location.href = '../view/perfil.php?mal=si';</script>";

}


} else{
    echo "<script>window.location.href = '../view/perfil.php?vacio=si';</script>";
}
