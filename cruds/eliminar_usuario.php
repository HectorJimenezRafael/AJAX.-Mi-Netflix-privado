<?php
require_once '../conexion/conexion.php';
    $data = $_POST['id'];

    try {
        $pdo->beginTransaction();
    $query = $pdo->prepare("SELECT * FROM `tbl_like` WHERE usuario_fk=:usu");
    $query->bindParam(":usu", $data);
    $query->execute();

    $resultado=$query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultado as $peli) {
        $id_peli=$peli['pelicula_fk'];
        $query = $pdo->prepare("UPDATE `tbl_peli` SET peli_likes=peli_likes-1 WHERE id=:id");
        $query->bindParam(":id", $id_peli);
        $query->execute();
    }
    $pdo->commit();}
    catch (Exception $e) {
        $pdo->rollBack();
        echo $e->getMessage();
    }


    try {
        $pdo->beginTransaction();
    $query = $pdo->prepare("SELECT * FROM `tbl_visitas` WHERE usuario_fk=:usu");
    $query->bindParam(":usu", $data);
    $query->execute();

    $resultado=$query->fetchAll(PDO::FETCH_ASSOC);

    foreach ($resultado as $peli) {
        $id_peli=$peli['pelicula_fk'];
        $query = $pdo->prepare("UPDATE `tbl_peli` SET peli_visitas=peli_visitas-1 WHERE id=:id");
        $query->bindParam(":id", $id_peli);
        $query->execute();
    }
    $pdo->commit();}
    catch (Exception $e) {
        $pdo->rollBack();
        echo $e->getMessage();
    }


    
    $query = $pdo->prepare("DELETE FROM tbl_usuarios WHERE id = :id");
    $query->bindParam(":id", $data);
    $query->execute();
    echo "ok";


?>