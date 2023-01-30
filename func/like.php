<?php
require_once '../conexion/conexion.php';
session_start();
if (empty($_SESSION['id'])) {
    echo "sin_sesion";
} else {
    $id_peli=$_POST['id'];

$id_usu=$_SESSION['id'];
// echo $id_usu;
$query = $pdo->prepare("SELECT * FROM `tbl_like` WHERE usuario_fk=:usu AND pelicula_fk=:peli ");
$query->bindParam(":usu", $id_usu);
$query->bindParam(":peli", $id_peli);
$query->execute();

$resultado = $query->fetchAll(PDO::FETCH_ASSOC);

$sql= "SELECT * FROM `tbl_usuarios`  WHERE id=:usu";
$stmt=$pdo->prepare($sql);
$stmt->bindParam(":usu", $id_usu);
$stmt->execute();
$resultado_usu = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultado_usu as $usu) {
    
   
    $es_admin=$usu['admin'];
   
}

if ( $es_admin==0) {
    if (count($resultado)==0) {

        try {
            $pdo->beginTransaction();
            $query = $pdo->prepare("INSERT INTO `tbl_like` (`usuario_fk`, `pelicula_fk`) VALUES (:usu,:peli) ");
            $query->bindParam(":usu", $id_usu);
            $query->bindParam(":peli", $id_peli);
            $query->execute();
        
            $query = $pdo->prepare("UPDATE `tbl_peli` SET peli_likes=peli_likes+1 WHERE id=:id");
            $query->bindParam(":id", $id_peli);
            $query->execute();
            echo "ok";
            
            $pdo->commit();
        } catch (Exception $e) {
            $pdo->rollBack();
            echo $e->getMessage();
        }
    } else {
    
    try{
        $pdo->beginTransaction();
        $query = $pdo->prepare("DELETE FROM `tbl_like` WHERE usuario_fk=:usu AND pelicula_fk=:peli");
        $query->bindParam(":usu", $id_usu);
        $query->bindParam(":peli", $id_peli);
        $query->execute();
    
        $query = $pdo->prepare("UPDATE `tbl_peli` SET peli_likes=peli_likes-1 WHERE id=:id");
        $query->bindParam(":id", $id_peli);
        $query->execute();
        echo "ok";
        $pdo->commit();
    }
        catch (Exception $e) {
            $pdo->rollBack();
            echo $e->getMessage();
        }
        
       
    }
} else {
    echo "admin"; 
}


}
