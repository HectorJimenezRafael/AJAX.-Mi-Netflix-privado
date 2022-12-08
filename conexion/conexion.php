<?php


require_once 'config.php';

$conexion = mysqli_connect(BD['servidor'], BD['usuario'], BD['password'], BD['bd']);

if (!$conexion) {
    echo "<script>alert('Error conectando con la base de datos!')</script>";
    // echo "<script>window.location.href = '../view/login.html';</script>";
    exit();
}

try {
    $servidor = "mysql:host=".BD['servidor'].";dbname=".BD['bd'];
    $pdo = new PDO($servidor,BD['usuario'],BD['password'],array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES UTF8"));
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     //echo "<script>alert('conexion establecida con exito')</script>";   
 } catch(Exception $e) {
     echo $e->getMessage();
    
 }