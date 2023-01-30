<?php
require_once '../conexion/conexion.php';
if(!empty($_POST['buscar_nombre']) ){
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_correo=$_POST['buscar_correo'];
    $flitro_id=$_POST['buscar_id'];
    $flitro_estado=$_POST['buscar_estado'];
    $consulta = $pdo->prepare("SELECT * FROM `tbl_usuarios` WHERE `admin`=0 AND `new`=1  AND nombre_usu LIKE '%".$flitro_nombre."%' AND correo LIKE '%".$flitro_correo."%' AND id LIKE '%".$flitro_id."%' AND habilitado LIKE '%".$flitro_estado."%'");
    $consulta->execute();

} else if(!empty($_POST['buscar_correo']) ){
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_correo=$_POST['buscar_correo'];
    $flitro_id=$_POST['buscar_id'];
    $flitro_estado=$_POST['buscar_estado'];
    $consulta = $pdo->prepare("SELECT * FROM `tbl_usuarios` WHERE `admin`=0 AND `nuevo`=1  AND nombre_usu LIKE '%".$flitro_nombre."%' AND correo LIKE '%".$flitro_correo."%' AND id LIKE '%".$flitro_id."%' AND habilitado LIKE '%".$flitro_estado."%'");
    $consulta->execute();

}
else if(!empty($_POST['buscar_id']) ){
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_correo=$_POST['buscar_correo'];
    $flitro_id=$_POST['buscar_id'];
    $flitro_estado=$_POST['buscar_estado'];
    $consulta = $pdo->prepare("SELECT * FROM `tbl_usuarios` WHERE `admin`=0 AND `nuevo`=1   AND nombre_usu LIKE '%".$flitro_nombre."%' AND correo LIKE '%".$flitro_correo."%' AND id LIKE '%".$flitro_id."%' AND habilitado LIKE '%".$flitro_estado."%'");
    $consulta->execute();

}
else if(!empty($_POST['buscar_estado']) ){
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_correo=$_POST['buscar_correo'];
    $flitro_id=$_POST['buscar_id'];
    $flitro_estado=$_POST['buscar_estado'];
    $consulta = $pdo->prepare("SELECT * FROM `tbl_usuarios` WHERE `admin`=0 AND `nuevo`=1  AND nombre_usu LIKE '%".$flitro_nombre."%' AND correo LIKE '%".$flitro_correo."%' AND id LIKE '%".$flitro_id."%' AND habilitado LIKE '%".$flitro_estado."%'");
    $consulta->execute();

}else if($_POST['buscar_estado']=="0" ){
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_correo=$_POST['buscar_correo'];
    $flitro_id=$_POST['buscar_id'];
    $flitro_estado=$_POST['buscar_estado'];
    $consulta = $pdo->prepare("SELECT * FROM `tbl_usuarios` WHERE `admin`=0 AND `nuevo`=1  AND nombre_usu LIKE '%".$flitro_nombre."%' AND correo LIKE '%".$flitro_correo."%' AND id LIKE '%".$flitro_id."%' AND habilitado LIKE '%".$flitro_estado."%'");
    $consulta->execute();

}
 elseif (empty($_POST['buscar_nombre']) && empty($_POST['buscar_correo']) && empty($_POST['buscar_estado']) && empty($_POST['buscar_id'])) {
    $consulta = $pdo->prepare("SELECT * FROM `tbl_usuarios` WHERE `admin`=0 AND `nuevo`=1");
$consulta->execute();
}



$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);


if (count($resultado)==0) {
    echo"sin_resultados";
 }else {
     echo json_encode($resultado);
 }


