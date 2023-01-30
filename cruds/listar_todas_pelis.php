<?php
require_once '../conexion/conexion.php';
session_start();
if(!empty($_POST['buscar_nombre']) ){
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_categoria=$_POST['buscar_categoria'];
    $id_usu=$_POST['buscar_likes'];
    if ($_POST['buscar_likes']==$_SESSION['id']) {
        $consulta = $pdo->prepare("SELECT p.id,p.titulo_peli,p.img_peli,p.peli_likes FROM `tbl_peli` p Inner join tbl_like l on l.pelicula_fk=p.id WHERE l.usuario_fk=$id_usu AND p.titulo_peli LIKE '%".$flitro_nombre."%' AND p.categoria LIKE '%".$flitro_categoria."%' ORDER BY p.peli_likes DESC  ");
        $consulta->execute();
    } else if ($_POST['buscar_likes']==2) {
        $flitro_nombre=$_POST['buscar_nombre'];
        $flitro_categoria=$_POST['buscar_categoria'];
        $id_usu=$_SESSION['id'];
        $consulta = $pdo->prepare("SELECT * FROM `tbl_peli` WHERE id NOT IN (SELECT pelicula_fk from tbl_like WHERE usuario_fk=$id_usu) AND titulo_peli LIKE '%".$flitro_nombre."%' AND categoria LIKE '%".$flitro_categoria."%' ORDER BY peli_likes DESC  ;");
        $consulta->execute();
    } else {
        $consulta = $pdo->prepare("SELECT * FROM `tbl_peli` WHERE titulo_peli LIKE '%".$flitro_nombre."%' AND categoria LIKE '%".$flitro_categoria."%' ORDER BY peli_likes DESC  ");
        $consulta->execute();
    }

    
    
    
} else if (!empty($_POST['buscar_categoria'])) {
    $flitro_nombre=$_POST['buscar_nombre'];
    $flitro_categoria=$_POST['buscar_categoria'];
    $id_usu=$_POST['buscar_likes'];
    if ($_POST['buscar_likes']==$_SESSION['id']) {
        $consulta = $pdo->prepare("SELECT p.id,p.titulo_peli,p.img_peli,p.peli_likes,p.visual_peli FROM `tbl_peli` p Inner join tbl_like l on l.pelicula_fk=p.id WHERE l.usuario_fk=$id_usu AND p.titulo_peli LIKE '%".$flitro_nombre."%' AND p.categoria LIKE '%".$flitro_categoria."%' ORDER BY p.peli_likes DESC  ");
        $consulta->execute();
    } else if ($_POST['buscar_likes']==2) {
        $flitro_nombre=$_POST['buscar_nombre'];
        $flitro_categoria=$_POST['buscar_categoria'];
        $id_usu=$_SESSION['id'];
        $consulta = $pdo->prepare("SELECT * FROM `tbl_peli` WHERE id NOT IN (SELECT pelicula_fk from tbl_like WHERE usuario_fk=$id_usu) AND titulo_peli LIKE '%".$flitro_nombre."%' AND categoria LIKE '%".$flitro_categoria."%' ORDER BY peli_likes DESC  ;");
        $consulta->execute();
    } else {
        $consulta = $pdo->prepare("SELECT * FROM `tbl_peli` WHERE titulo_peli LIKE '%".$flitro_nombre."%' AND categoria LIKE '%".$flitro_categoria."%' ORDER BY peli_likes DESC  ");
        $consulta->execute();
    }

}
elseif (!empty($_POST['buscar_likes'])) {
    if ($_POST['buscar_likes']==$_SESSION['id']) {
        $flitro_nombre=$_POST['buscar_nombre'];
        $flitro_categoria=$_POST['buscar_categoria'];
       $id_usu=$_POST['buscar_likes'];
            $consulta = $pdo->prepare("SELECT p.id,p.titulo_peli,p.img_peli,p.peli_likes,p.peli_visitas FROM `tbl_peli` p Inner join tbl_like l on l.pelicula_fk=p.id WHERE l.usuario_fk=$id_usu AND p.titulo_peli LIKE '%".$flitro_nombre."%' AND p.categoria LIKE '%".$flitro_categoria."%' ORDER BY p.peli_likes DESC  ");
        $consulta->execute();
    } else if ($_POST['buscar_likes']==2) {
        $flitro_nombre=$_POST['buscar_nombre'];
        $flitro_categoria=$_POST['buscar_categoria'];
        $id_usu=$_SESSION['id'];
        $consulta = $pdo->prepare("SELECT * FROM `tbl_peli` WHERE id NOT IN (SELECT pelicula_fk from tbl_like WHERE usuario_fk=$id_usu) AND titulo_peli LIKE '%".$flitro_nombre."%' AND categoria LIKE '%".$flitro_categoria."%' ORDER BY peli_likes DESC  ;");
        $consulta->execute();
    }
   
    
}
 else if(empty($_POST['buscar_nombre']) && empty($_POST['buscar_categoria']) && empty($_POST['buscar_likes'])){
    $consulta = $pdo->prepare("SELECT * FROM `tbl_peli` ORDER BY peli_likes DESC ");
    $consulta->execute();
    
   
}



$resultado = $consulta->fetchAll(PDO::FETCH_ASSOC);
    
    
if (count($resultado)==0) {
    echo"sin_resultados";
 }else {
     echo json_encode($resultado);
 }

