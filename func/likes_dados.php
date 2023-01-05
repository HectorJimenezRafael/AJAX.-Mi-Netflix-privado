<?php
require_once '../conexion/conexion.php';

session_start();

if (!empty($_SESSION['id'])) {
    $id_usu=$_SESSION['id'];


// $query = $pdo->prepare("SELECT * FROM `tbl_like` WHERE usuario_fk=:usu");
$query = $pdo->prepare("SELECT p.id FROM `tbl_peli` p Inner join tbl_like l on l.pelicula_fk=p.id WHERE l.usuario_fk=$id_usu  ORDER BY p.peli_likes DESC ");
$query->bindParam(":usu", $id_usu);

$query->execute();

$resultado = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);
} else {
    echo "sin_sesion";
}