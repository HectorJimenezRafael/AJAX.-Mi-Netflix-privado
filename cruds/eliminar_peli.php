<?php
require_once '../conexion/conexion.php';
    $data = $_POST['id'];
    
    $query = $pdo->prepare("DELETE FROM tbl_peli WHERE id = :id");
    $query->bindParam(":id", $data);
    $query->execute();
    echo "ok";
?>