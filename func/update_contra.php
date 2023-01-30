<?php

session_start();

require_once '../conexion/conexion.php';



if (empty($_POST['correo']) || empty($_POST['contra_antigua']) || empty($_POST['contra_nueva'])) {
    ?>
    <script>location.href = '../view/perfil.php?vacio=true'</script>
 <?php

}

$correo=$_POST['correo'];

$contra_antigua=$_POST['contra_antigua'];

$contra_antigua = hash('sha256', $contra_antigua);

$contra_nueva=$_POST['contra_nueva'];

$sql= "SELECT * FROM tbl_usuarios WHERE correo=:correo and contra=:pass;";

$stmt=$pdo->prepare($sql);

$stmt->bindParam(":correo",$correo);

$stmt->bindParam(":pass",  $contra_antigua);

$stmt->execute();

$resultado=$stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($resultado as $usu) {
   
    $id_usu=$usu['id'];
   
}


$corresponde=count($resultado);


if ($corresponde==1) {
    $contra_nueva= hash('sha256', $contra_nueva);

    $sql="UPDATE tbl_usuarios SET contra=:nueva_pass WHERE id=:id";
    $stmt=$pdo->prepare($sql);
    $stmt->bindParam(":nueva_pass", $contra_nueva);
    $stmt->bindParam(":id",  $id_usu);
    $stmt->execute();
    ?>
    <script>location.href = '../view/perfil.php?good=true'</script>
 <?php
} else {
    ?>
        <script>location.href = '../view/perfil.php?mal=true'</script>
     <?php
}