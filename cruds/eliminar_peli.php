<?php
require_once '../conexion/conexion.php';
    $data = $_POST['id'];
    


try {
    $pdo->beginTransaction();
    $query = $pdo->prepare("SELECT * FROM `tbl_peli` WHERE id=:id");
    $query->bindParam(":id", $data);
    $query->execute();

    
    $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
    foreach ($resultado as $usu) {
       
        $foto=$usu['img_peli'];
        $video=$usu['video'];
    }
    unlink($foto);
    unlink($video);

    

    $query = $pdo->prepare("DELETE FROM tbl_peli WHERE id = :id");
    $query->bindParam(":id", $data);
    $query->execute();




    echo "ok";
    $pdo->commit();
} catch (Exception $e) {
    $pdo->rollBack();
    echo $e->getMessage();
}
  




?>