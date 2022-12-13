<?php
require_once '../conexion/conexion.php';


$consulta = $pdo->prepare("SELECT * FROM `tbl_peli`");
$consulta->execute();

$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($resultado);

// foreach ($resultado as $peli ) {
//    $peli['id'];
// //    session_start();

//    $query = $pdo->prepare("SELECT * FROM `tbl_like` WHERE usuario_fk=:usu AND pelicula_fk=:peli ");
//     $query->bindParam(":usu", $id_usu);
//     $query->bindParam(":peli", $peli['id']);
//     $query->execute();
//     $likes = $query->fetchAll(PDO::FETCH_ASSOC);
//     echo json_encode($likes);
// }

