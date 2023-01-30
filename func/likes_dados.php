<?php
require_once '../conexion/conexion.php';

session_start();

if (!empty($_SESSION['id'])) {


    $id_usu=$_SESSION['id'];
    // $query = $pdo->prepare("SELECT * FROM `tbl_like` WHERE usuario_fk=:usu");
if (!empty($_POST['buscar_nombre'])) {
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_categoria=$_POST['buscar_categoria'];
   

    $query = $pdo->prepare("SELECT p.id FROM `tbl_peli` p Inner join tbl_like l on l.pelicula_fk=p.id WHERE l.usuario_fk=:usu AND p.titulo_peli LIKE '%".$flitro_nombre."%' AND p.categoria LIKE '%".$flitro_categoria."%' ORDER BY p.peli_likes DESC;");
    $query->bindParam(":usu", $id_usu);
    
    $query->execute();
} else if (!empty($_POST['buscar_categoria'])) {
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_categoria=$_POST['buscar_categoria'];

    $query = $pdo->prepare("SELECT p.id FROM `tbl_peli` p Inner join tbl_like l on l.pelicula_fk=p.id WHERE l.usuario_fk=:usu AND p.titulo_peli LIKE '%".$flitro_nombre."%' AND p.categoria LIKE '%".$flitro_categoria."%' ORDER BY p.peli_likes DESC;");
    $query->bindParam(":usu", $id_usu);
    
    $query->execute();
}  else if (!empty($_POST['buscar_likes'])){
    $query = $pdo->prepare("SELECT p.id FROM `tbl_peli` p Inner join tbl_like l on l.pelicula_fk=p.id WHERE l.usuario_fk=:usu ORDER BY p.peli_likes DESC;");
    $query->bindParam(":usu", $id_usu);
    
    $query->execute();
    
}  else if(empty($_POST['buscar_nombre']) && empty($_POST['buscar_categoria']) ) {
    $query = $pdo->prepare("SELECT p.id FROM `tbl_peli` p Inner join tbl_like l on l.pelicula_fk=p.id WHERE l.usuario_fk=:usu ORDER BY p.peli_likes DESC;");
$query->bindParam(":usu", $id_usu);

$query->execute();
}

    





$resultado = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);




} else {
    echo "sin_sesion";
}