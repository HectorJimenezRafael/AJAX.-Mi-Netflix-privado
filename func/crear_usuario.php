<?php

require_once '../conexion/conexion.php';




if (empty($_POST['nombre'])  || empty($_POST['correo2'])  || empty($_POST['pass2'])  ) {
        ?>
        <script>location.href = '../view/login.php?campos=none'</script>
        <?php
} else if (!filter_var($_POST['correo2'], FILTER_VALIDATE_EMAIL)) {
        ?>
        <script>location.href = '../view/login.php?campos=mal'</script>
        <?php
} else {




    $nombre=$_POST['nombre'];
    $correo=$_POST['correo2'];
    $pass=$_POST['pass2'];


    $pass = hash('sha256', $pass);


    $query = $pdo->prepare("SELECT * FROM `tbl_usuarios` WHERE  correo=:correo ");

    $query->bindParam(":correo", $correo);
    $query->execute();
    $resultado=$query->fetchAll(PDO::FETCH_ASSOC);

    $existe=count($resultado);


if ($existe==0) {
    $creacion=0;

    $sql= "INSERT INTO `tbl_usuarios`( `nombre_usu`, `correo`, `contra`, `admin`, `habilitado`)
     VALUES (:nombre,:correo,:contra,:adm,:ha)";

    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(':nombre',$nombre);
    $stmt->bindParam(':contra',$pass);
    $stmt->bindParam(':correo',$correo);
    $stmt->bindParam(':adm',$creacion);
    $stmt->bindParam(':ha',$creacion);


    $stmt->execute();


        ?>
        <script>location.href = '../view/login.php?cre=good'</script>
        <?php
} else {
    ?>
        <script>location.href = '../view/login.php?cre=rep'</script>
        <?php
}


}