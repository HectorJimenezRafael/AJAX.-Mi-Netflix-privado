<?php
require_once 'conexion.php';




// $query = $pdo->prepare("INSERT INTO `tbl_usuarios`( `nombre_usu`, `correo`, `contra`, `admin`) 
// VALUES (Hector,hector@gmail.com,$pass,1");

// $query->execute();



$pass='qweQWE123';
$pass = hash('sha256',$pass);


$query = $pdo->prepare("INSERT INTO `tbl_usuarios`( `nombre_usu`, `correo`, `contra`, `admin`) 
VALUES ('Hector','hector@gmail.com','$pass','1')");

$query->execute();