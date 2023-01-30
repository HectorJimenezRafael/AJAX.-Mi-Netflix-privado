<?php
require_once '../conexion/conexion.php';


if(!empty($_POST['buscar_nombre']) ){
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_id=$_POST['buscar_id'];
    $flitro_categoria=$_POST['buscar_categoria'];
     if(($_POST['buscar_likes'])=="1" ){
       
     $consulta = $pdo->prepare("SELECT p.id,p.titulo_peli,p.descripcion_peli,p.img_peli,c.nombre_cat,p.peli_likes FROM tbl_peli p INNER JOIN tbl_categoria c ON c.id=p.categoria WHERE p.titulo_peli LIKE '%".$flitro_nombre."%' AND p.categoria LIKE '%".$flitro_categoria."%' AND p.id LIKE '%".$flitro_id."%' ORDER BY p.peli_likes ASC;");
        $consulta->execute();
    } else if(($_POST['buscar_likes'])=="2" ){
       
     $consulta = $pdo->prepare("SELECT p.id,p.titulo_peli,p.descripcion_peli,p.img_peli,c.nombre_cat,p.peli_likes FROM tbl_peli p INNER JOIN tbl_categoria c ON c.id=p.categoria WHERE p.titulo_peli LIKE '%".$flitro_nombre."%' AND p.categoria LIKE '%".$flitro_categoria."%' AND p.id LIKE '%".$flitro_id."%' ORDER BY p.peli_likes DESC;");
        $consulta->execute();
    } else {
        $consulta = $pdo->prepare("SELECT p.id,p.titulo_peli,p.descripcion_peli,p.img_peli,c.nombre_cat,p.peli_likes FROM tbl_peli p INNER JOIN tbl_categoria c ON c.id=p.categoria WHERE p.titulo_peli LIKE '%".$flitro_nombre."%' AND p.categoria LIKE '%".$flitro_categoria."%' AND p.id LIKE '%".$flitro_id."%' ORDER BY p.id ASC;");
    $consulta->execute();
    }
 
} else if(!empty($_POST['buscar_id']) ){
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_id=$_POST['buscar_id'];
    $flitro_categoria=$_POST['buscar_categoria'];
     if(($_POST['buscar_likes'])=="1" ){
       
     $consulta = $pdo->prepare("SELECT p.id,p.titulo_peli,p.descripcion_peli,p.img_peli,c.nombre_cat,p.peli_likes FROM tbl_peli p INNER JOIN tbl_categoria c ON c.id=p.categoria WHERE p.titulo_peli LIKE '%".$flitro_nombre."%' AND p.categoria LIKE '%".$flitro_categoria."%' AND p.id LIKE '%".$flitro_id."%' ORDER BY p.peli_likes ASC;");
        $consulta->execute();
    } else if(($_POST['buscar_likes'])=="2" ){
       
     $consulta = $pdo->prepare("SELECT p.id,p.titulo_peli,p.descripcion_peli,p.img_peli,c.nombre_cat,p.peli_likes FROM tbl_peli p INNER JOIN tbl_categoria c ON c.id=p.categoria WHERE p.titulo_peli LIKE '%".$flitro_nombre."%' AND p.categoria LIKE '%".$flitro_categoria."%' AND p.id LIKE '%".$flitro_id."%' ORDER BY p.peli_likes DESC;");
        $consulta->execute();
    } else {
        $consulta = $pdo->prepare("SELECT p.id,p.titulo_peli,p.descripcion_peli,p.img_peli,c.nombre_cat,p.peli_likes FROM tbl_peli p INNER JOIN tbl_categoria c ON c.id=p.categoria WHERE p.titulo_peli LIKE '%".$flitro_nombre."%' AND p.categoria LIKE '%".$flitro_categoria."%' AND p.id LIKE '%".$flitro_id."%' ORDER BY p.id ASC;");
    $consulta->execute();
    }
} else if(!empty($_POST['buscar_categoria']) ){
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_id=$_POST['buscar_id'];
    $flitro_categoria=$_POST['buscar_categoria'];
     if(($_POST['buscar_likes'])=="1" ){
       
     $consulta = $pdo->prepare("SELECT p.id,p.titulo_peli,p.descripcion_peli,p.img_peli,c.nombre_cat,p.peli_likes FROM tbl_peli p INNER JOIN tbl_categoria c ON c.id=p.categoria WHERE p.titulo_peli LIKE '%".$flitro_nombre."%' AND p.categoria LIKE '%".$flitro_categoria."%' AND p.id LIKE '%".$flitro_id."%' ORDER BY p.peli_likes ASC;");
        $consulta->execute();
    } else if(($_POST['buscar_likes'])=="2" ){
       
     $consulta = $pdo->prepare("SELECT p.id,p.titulo_peli,p.descripcion_peli,p.img_peli,c.nombre_cat,p.peli_likes FROM tbl_peli p INNER JOIN tbl_categoria c ON c.id=p.categoria WHERE p.titulo_peli LIKE '%".$flitro_nombre."%' AND p.categoria LIKE '%".$flitro_categoria."%' AND p.id LIKE '%".$flitro_id."%' ORDER BY p.peli_likes DESC;");
        $consulta->execute();
    } else {
        $consulta = $pdo->prepare("SELECT p.id,p.titulo_peli,p.descripcion_peli,p.img_peli,c.nombre_cat,p.peli_likes FROM tbl_peli p INNER JOIN tbl_categoria c ON c.id=p.categoria WHERE p.titulo_peli LIKE '%".$flitro_nombre."%' AND p.categoria LIKE '%".$flitro_categoria."%' AND p.id LIKE '%".$flitro_id."%' ORDER BY p.id ASC;");
    $consulta->execute();
    }
} else if(($_POST['buscar_likes'])=="1" ){
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_id=$_POST['buscar_id'];
    $flitro_categoria=$_POST['buscar_categoria'];
 $consulta = $pdo->prepare("SELECT p.id,p.titulo_peli,p.descripcion_peli,p.img_peli,c.nombre_cat,p.peli_likes FROM tbl_peli p INNER JOIN tbl_categoria c ON c.id=p.categoria WHERE p.titulo_peli LIKE '%".$flitro_nombre."%' AND p.categoria LIKE '%".$flitro_categoria."%' AND p.id LIKE '%".$flitro_id."%' ORDER BY p.peli_likes ASC;");
    $consulta->execute();
} else if(($_POST['buscar_likes'])=="2" ){
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_id=$_POST['buscar_id'];
    $flitro_categoria=$_POST['buscar_categoria'];
 $consulta = $pdo->prepare("SELECT p.id,p.titulo_peli,p.descripcion_peli,p.img_peli,c.nombre_cat,p.peli_likes FROM tbl_peli p INNER JOIN tbl_categoria c ON c.id=p.categoria WHERE p.titulo_peli LIKE '%".$flitro_nombre."%' AND p.categoria LIKE '%".$flitro_categoria."%' AND p.id LIKE '%".$flitro_id."%' ORDER BY p.peli_likes DESC;");
    $consulta->execute();
} else if (empty($_POST['buscar_nombre']) && empty($_POST['buscar_categoria']) && empty($_POST['buscar_categoria']) && empty($_POST['buscar_likes']) ){
    $consulta = $pdo->prepare("SELECT p.id,p.titulo_peli,p.descripcion_peli,p.img_peli,c.nombre_cat,p.peli_likes FROM tbl_peli p INNER JOIN tbl_categoria c ON c.id=p.categoria ORDER BY p.id ASC;");
    $consulta->execute();
}



$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);


if (count($resultado)==0) {
    echo"sin_resultados";
 }else {
     echo json_encode($resultado);
 }