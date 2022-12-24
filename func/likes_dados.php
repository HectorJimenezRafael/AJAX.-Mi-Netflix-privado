<?php
require_once '../conexion/conexion.php';
session_start();



$id_usu=$_SESSION['id'];


$query = $pdo->prepare("SELECT * FROM `tbl_like` WHERE usuario_fk=:usu");
$query->bindParam(":usu", $id_usu);

$query->execute();

$resultado = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);