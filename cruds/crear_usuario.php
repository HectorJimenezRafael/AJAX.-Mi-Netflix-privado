<?php
  require_once '../conexion/conexion.php';

if (empty($_POST['nombre']) || empty($_POST['correo'])    ) {
    
    echo "vacio";
} else if ( !filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL)) {
    echo "mal_formato";
}else if (isset($_POST)) {

    $nombre = $_POST['nombre'];
   
    $correo = $_POST['correo'];
    $estado=$_POST['estado'];
    $pass="qweQWE123";
    
    $pass = hash('sha256', $pass);
    
    if (empty($_POST['idp'])){
$query = $pdo->prepare("SELECT * FROM `tbl_usuarios` WHERE correo=:correo ");

$query->bindParam(":correo", $correo);
$query->execute();
$resultado=$query->fetchAll(PDO::FETCH_ASSOC);

if (count($resultado)==0) {
    $query = $pdo->prepare("INSERT INTO tbl_usuarios (nombre_usu,`admin`,correo,contra,habilitado) VALUES (:nombre,0,:correo,:pass,:estado)");
    $query->bindParam(":nombre", $nombre);
    $query->bindParam(":correo", $correo);
    $query->bindParam(":pass", $pass);
    $query->bindParam(":estado", $estado);
    $query->execute();
    // $pdo = null;
    echo "ok";
} else {
    echo "repetido";
}
       
    }else{
        $id = $_POST['idp'];
        $query = $pdo->prepare("SELECT * FROM `tbl_usuarios`  WHERE NOT id=:id AND (correo=:correo) ");
        $query->bindParam(":id", $id);
       
        $query->bindParam(":correo", $correo);
        $query->execute();
        $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
        
        if (count($resultado)==0) {
        $query = $pdo->prepare("UPDATE tbl_usuarios SET nombre_usu = :nombre, correo=:correo,habilitado=:estado WHERE id = :id");
        $query->bindParam(":nombre", $nombre);
     
        $query->bindParam(":correo", $correo);
        $query->bindParam(":estado", $estado);
        $query->bindParam("id", $id);
        $query->execute();
        $pdo = null;
        echo "modificado";
        } else {
            echo "repetido";
        }
    }
    
}
