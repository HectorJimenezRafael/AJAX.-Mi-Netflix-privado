<?php
require_once '../conexion/conexion.php';


$consulta = $pdo->prepare("SELECT p.id,p.titulo_peli,p.descripcion_peli,p.img_peli,c.nombre_cat FROM tbl_peli p INNER JOIN tbl_categoria c ON c.id=p.categoria ORDER BY p.id ASC;");
$consulta->execute();

$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($resultado);