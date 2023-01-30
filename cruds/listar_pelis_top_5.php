<?php
require_once '../conexion/conexion.php';


$consulta = $pdo->prepare("SELECT * FROM `tbl_peli` ORDER BY peli_visitas DESC LIMIT 5 ");
$consulta->execute();

$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($resultado);