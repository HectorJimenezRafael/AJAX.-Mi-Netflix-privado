<?php
require_once '../conexion/conexion.php';



if (empty($_POST['titulo']) || empty($_POST['categoria']) || empty($_POST['descripcion'])    ) {
    
    echo "campos_vacios";
} else if (isset($_POST)) {

$titulo=$_POST['titulo'];

$categoria=$_POST['categoria'];

$descripcion=$_POST['descripcion'];


$nombre_img = $_FILES['imagen']['name']; //obtenemos el nombre de la imagen
$archivo = $_FILES['imagen']['tmp_name'];//archivo
$tipo_archivo = $_FILES['imagen']['type'];//guardar el tipo del archivo
$ruta="../img";
$ruta=$ruta."/".$nombre_img;

$nombre_video = $_FILES['video']['name']; //obtenemos el nombre del video
$archivo_video = $_FILES['video']['tmp_name'];//archivo
$tipo_archivo_video = $_FILES['video']['type'];//guardar el tipo del archivo
$ruta_video="../video";
$ruta_video=$ruta_video."/".$nombre_video;

    
if (empty($_POST['idp'])){
    if (empty($_FILES['imagen']['name']) || empty($_FILES['video']['name'] )) {
        echo "campos_vacios";
    }
    else if (($tipo_archivo=="image/jpeg" || $tipo_archivo=="image/jpg" || $tipo_archivo=="image/png" || $tipo_archivo=="image/gif" || $tipo_archivo=="image/webp") && $tipo_archivo_video=="video/mp4" ) {
        move_uploaded_file($archivo,$ruta);
        move_uploaded_file($archivo_video,$ruta_video);
        $query = $pdo->prepare("INSERT INTO `tbl_peli`( `titulo_peli`, `descripcion_peli`, `img_peli`, `categoria`,`video`) 
        VALUES (:titulo,:descripcion,:imagen,:categoria,:video)");
        $query->bindParam(":titulo", $titulo);
        $query->bindParam(":descripcion", $descripcion);
        $query->bindParam(":imagen", $ruta);
        $query->bindParam(":categoria", $categoria);
        $query->bindParam(":video", $ruta_video);
       
        $query->execute();
      
        echo "okis";
   
    } else {
        echo "formato_archivo_mal";
    }

      
  
} else {
    if (empty($_FILES['imagen']['name']) && empty($_FILES['video']['name'])) {
        $id = $_POST['idp'];
        $query = $pdo->prepare("UPDATE `tbl_peli` SET titulo_peli=:titulo,descripcion_peli=:descripcion,categoria=:categoria WHERE id = :id");
       
        $query->bindParam(":titulo", $titulo);
        $query->bindParam(":descripcion", $descripcion);
        
        $query->bindParam(":categoria", $categoria);
        $query->bindParam("id", $id);
        $query->execute();
        // $pdo = null;
        echo "modificado";
    } else if (!empty($_FILES['imagen']['name']) && empty($_FILES['video']['name'])) {



    
        $id = $_POST['idp'];
        $nombre_img = $_FILES['imagen']['name']; //obtenemos el nombre de la imagen
         $archivo = $_FILES['imagen']['tmp_name'];//archivo
        $ruta="../img";
        $ruta=$ruta."/".$nombre_img;
        $tipo_archivo = $_FILES['imagen']['type'];//guardar el tipo del archivo
        if ($tipo_archivo=="image/jpeg" || $tipo_archivo=="image/jpg" || $tipo_archivo=="image/png" || $tipo_archivo=="image/gif" || $tipo_archivo=="image/webp") {
            move_uploaded_file($archivo,$ruta);
            $query = $pdo->prepare("UPDATE `tbl_peli` SET titulo_peli=:titulo,descripcion_peli=:descripcion,categoria=:categoria,img_peli=:imagen WHERE id = :id");
       
            $query->bindParam(":titulo", $titulo);
            $query->bindParam(":descripcion", $descripcion);
            
            $query->bindParam(":categoria", $categoria);
            $query->bindParam(":imagen", $ruta);
            $query->bindParam("id", $id);
           
            $query->execute();
            // $pdo = null;
            echo "modificado";
        } else {
            echo "formato_archivo_mal";
        }
        
    }
    else if (!empty($_FILES['video']['name']) && empty($_FILES['imagen']['name'])) {



    
        $id = $_POST['idp'];
        $nombre_video = $_FILES['video']['name']; //obtenemos el nombre del video
        $archivo_video = $_FILES['video']['tmp_name'];//archivo
        $tipo_archivo_video = $_FILES['video']['type'];//guardar el tipo del archivo
        $ruta_video="../video";
        $ruta_video=$ruta_video."/".$nombre_video;
        if ($tipo_archivo_video=="video/mp4") {
            move_uploaded_file($archivo_video,$ruta_video);
            $query = $pdo->prepare("UPDATE `tbl_peli` SET titulo_peli=:titulo,descripcion_peli=:descripcion,categoria=:categoria,video=:video WHERE id = :id");
       
            $query->bindParam(":titulo", $titulo);
            $query->bindParam(":descripcion", $descripcion);
            
            $query->bindParam(":categoria", $categoria);
            $query->bindParam(":video", $ruta_video);
            $query->bindParam("id", $id);
           
            $query->execute();
            // $pdo = null;
            echo "modificado";
        } else {
            echo "formato_archivo_mal";
        }
        
    }

    else if (!empty($_FILES['video']['name']) && !empty($_FILES['imagen']['name'])) {



    
        $id = $_POST['idp'];
        $nombre_video = $_FILES['video']['name']; //obtenemos el nombre del video
        $archivo_video = $_FILES['video']['tmp_name'];//archivo
        $tipo_archivo_video = $_FILES['video']['type'];//guardar el tipo del archivo
        $ruta_video="../video";
        $ruta_video=$ruta_video."/".$nombre_video;


        $nombre_img = $_FILES['imagen']['name']; //obtenemos el nombre de la imagen
        $archivo = $_FILES['imagen']['tmp_name'];//archivo
       $ruta="../img";
       $ruta=$ruta."/".$nombre_img;
       $tipo_archivo = $_FILES['imagen']['type'];//guardar el tipo del archivo

        if (($tipo_archivo=="image/jpeg" || $tipo_archivo=="image/jpg" || $tipo_archivo=="image/png" || $tipo_archivo=="image/gif" || $tipo_archivo=="image/webp") && $tipo_archivo_video=="video/mp4" )  {
            move_uploaded_file($archivo_video,$ruta_video);
            move_uploaded_file($archivo,$ruta);
            $query = $pdo->prepare("UPDATE `tbl_peli` SET titulo_peli=:titulo,descripcion_peli=:descripcion,categoria=:categoria,video=:video,img_peli=:imagen WHERE id = :id");
       
            $query->bindParam(":titulo", $titulo);
            $query->bindParam(":descripcion", $descripcion);
            
            $query->bindParam(":categoria", $categoria);
            $query->bindParam(":video", $ruta_video);
            $query->bindParam(":imagen", $ruta);
            $query->bindParam("id", $id);
           
            $query->execute();
            // $pdo = null;
            echo "modificado";
        } else {
            echo "formato_archivo_mal";
        }
        
    }
}

}