<?php
  require_once '../conexion/conexion.php';

    $id=$_POST['id'];
    // $id=8;
    $query = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE id = :id");
    $query->bindParam(":id", $id);
    $query->execute();
    $resultado = $query->fetch(PDO::FETCH_ASSOC);
    
   
      
        $estado=$resultado['habilitado'];
     
  

    if ($estado==0) {
        $query = $pdo->prepare("UPDATE tbl_usuarios SET habilitado=1 WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        echo"ok";
    } elseif ($estado==1) {
        $query = $pdo->prepare("UPDATE tbl_usuarios SET habilitado=0 WHERE id = :id");
        $query->bindParam(":id", $id);
        $query->execute();
        echo"ok";

    }
?>