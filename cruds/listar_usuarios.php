<?php
require_once '../conexion/conexion.php';


$consulta = $pdo->prepare("SELECT * FROM `tbl_usuarios` WHERE `admin`=0");
$consulta->execute();

$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($resultado);