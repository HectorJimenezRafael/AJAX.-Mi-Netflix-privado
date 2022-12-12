<?php
require_once '../conexion/conexion.php';


$consulta = $pdo->prepare("SELECT * FROM `tbl_peli`   ");
$consulta->execute();

$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($resultado);