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



    
if (empty($_POST['idp'])){
    if (empty($_FILES['imagen']['name'])) {
        echo "campos_vacios";
    }
    else if ($tipo_archivo=="image/jpeg" || $tipo_archivo=="image/jpg" || $tipo_archivo=="image/png" || $tipo_archivo=="image/gif" || $tipo_archivo=="image/webp") {
        move_uploaded_file($archivo,$ruta);
        $query = $pdo->prepare("INSERT INTO `tbl_peli`( `titulo_peli`, `descripcion_peli`, `img_peli`, `categoria`) 
        VALUES (:titulo,:descripcion,:imagen,:categoria)");
        $query->bindParam(":titulo", $titulo);
        $query->bindParam(":descripcion", $descripcion);
        $query->bindParam(":imagen", $ruta);
        $query->bindParam(":categoria", $categoria);
        
       
        $query->execute();
        // $pdo = null;
        echo "ok";
   
    } else {
        echo "formato_archivo_mal";
    }

      
  
} else {
    if (empty($_FILES['imagen']['name'])) {
        $id = $_POST['idp'];
        $query = $pdo->prepare("UPDATE `tbl_peli` SET titulo_peli=:titulo,descripcion_peli=:descripcion,categoria=:categoria WHERE id = :id");
       
        $query->bindParam(":titulo", $titulo);
        $query->bindParam(":descripcion", $descripcion);
        
        $query->bindParam(":categoria", $categoria);
        $query->bindParam("id", $id);
        $query->execute();
        // $pdo = null;
        echo "modificado";
    } else if (!empty($_FILES['imagen']['name'])) {



    
        $id = $_POST['idp'];
        $nombre_img = $_FILES['imagen']['name']; //obtenemos el nombre de la imagen
         $archivo = $_FILES['imagen']['tmp_name'];//archivo
        $ruta="../assets/img/mesas";
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
}

}