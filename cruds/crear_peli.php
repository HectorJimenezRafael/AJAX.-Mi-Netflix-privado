<?php
require_once '../conexion/conexion.php';
// $fechaActual = date('d-m-Y H:i:s');



if (empty($_POST['titulo']) || empty($_POST['categoria']) || empty($_POST['descripcion'])    ) {
    
    echo "campos_vacios";
} else if (isset($_POST)) {

$titulo=$_POST['titulo'];

$categoria=$_POST['categoria'];

$descripcion=$_POST['descripcion'];


$nombre_img = $_FILES['imagen']['name']; //obtenemos el nombre de la imagen
$archivo = $_FILES['imagen']['tmp_name'];//archivo
$tipo_archivo = $_FILES['imagen']['type'];//guardar el tipo del archivo

$ruta="../img/".$nombre_img;






$nombre_video = $_FILES['video']['name']; //obtenemos el nombre del video
$archivo_video = $_FILES['video']['tmp_name'];//archivo
$tipo_archivo_video = $_FILES['video']['type'];//guardar el tipo del archivo
$ruta_video="../video/".$nombre_video;


    
if (empty($_POST['idp'])){
    if (empty($_FILES['imagen']['name']) || empty($_FILES['video']['name'] )) {
        echo "campos_vacios";
    }
    else if (($tipo_archivo=="image/jpeg" || $tipo_archivo=="image/jpg" || $tipo_archivo=="image/png" || $tipo_archivo=="image/gif" || $tipo_archivo=="image/webp") && $tipo_archivo_video=="video/mp4" ) {
        
        try {
            $pdo->beginTransaction();
            $query = $pdo->prepare("INSERT INTO `tbl_peli`( `titulo_peli`, `descripcion_peli`, `img_peli`, `categoria`,`video`) 
            VALUES (:titulo,:descripcion,:imagen,:categoria,:video)");
            $query->bindParam(":titulo", $titulo);
            $query->bindParam(":descripcion", $descripcion);
            $query->bindParam(":imagen", $ruta);
            $query->bindParam(":categoria", $categoria);
            $query->bindParam(":video", $ruta_video);
            $query->execute();



            $lastId = $pdo->lastInsertId();
            $ruta="../img/" .$lastId.$nombre_img;
            $ruta_video="../video/".$lastId.$nombre_video;
            $query=$pdo->prepare("UPDATE tbl_peli SET img_peli=:img,video
            =:video WHERE id=:id");
            $query->bindParam(":img", $ruta);
            $query->bindParam(":video", $ruta_video);
            $query->bindParam(":id", $lastId);

          
            $query->execute();
            $pdo->commit();
            move_uploaded_file($archivo,$ruta );
            move_uploaded_file($archivo_video,$ruta_video);
            echo "okis";
        } catch (Exception $e) {
            $pdo->rollBack();
            echo $e->getMessage();
        }
      
   
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
       
        
        $tipo_archivo = $_FILES['imagen']['type'];//guardar el tipo del archivo

        if ($tipo_archivo=="image/jpeg" || $tipo_archivo=="image/jpg" || $tipo_archivo=="image/png" || $tipo_archivo=="image/gif" || $tipo_archivo=="image/webp") {
//holaaaaaaaaaaaaaaaaaaaaa
            try {
                $pdo->beginTransaction();


                $query = $pdo->prepare("SELECT * FROM `tbl_peli` WHERE id=:id");
                $query->bindParam(":id", $id);
                $query->execute();
            
                
                $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($resultado as $usu) {
               
                    $foto=$usu['img_peli'];
                  
                }
                  unlink($foto);
                $ruta="../img/".$id.$nombre_img;
              
             



                $query = $pdo->prepare("UPDATE `tbl_peli` SET titulo_peli=:titulo,descripcion_peli=:descripcion,categoria=:categoria,img_peli=:imagen WHERE id = :id");
                
                $query->bindParam(":titulo", $titulo);
                $query->bindParam(":descripcion", $descripcion);
                
                $query->bindParam(":categoria", $categoria);
                $query->bindParam(":imagen", $ruta);
                $query->bindParam("id", $id);
                move_uploaded_file($archivo,$ruta);
            
                $query->execute();
            
                echo "modificado";

                $pdo->commit();
            } catch (Exception $e) {
                $pdo->rollBack();
                echo $e->getMessage();
            }
              
           
        } else {
            echo "formato_archivo_mal";
        }
        
    }
    else if (!empty($_FILES['video']['name']) && empty($_FILES['imagen']['name'])) {


//video solooooooooooooooooooooooooooooooooooo
    
        $id = $_POST['idp'];
        $nombre_video = $_FILES['video']['name']; //obtenemos el nombre del video
        $archivo_video = $_FILES['video']['tmp_name'];//archivo
        $tipo_archivo_video = $_FILES['video']['type'];//guardar el tipo del archivo
        $ruta_video="../video";
        $ruta_video=$ruta_video."/".$nombre_video;
        if ($tipo_archivo_video=="video/mp4") {

        try {
            $pdo->beginTransaction();

            $query = $pdo->prepare("SELECT * FROM `tbl_peli` WHERE id=:id");
            $query->bindParam(":id", $id);
            $query->execute();
        
            
            $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
            foreach ($resultado as $usu) {
           
                $video=$usu['video'];
              
            }
              unlink($video);

              $ruta_video="../video/".$id.$nombre_video;

             
              $query = $pdo->prepare("UPDATE `tbl_peli` SET titulo_peli=:titulo,descripcion_peli=:descripcion,categoria=:categoria,video=:video WHERE id = :id");
         
              $query->bindParam(":titulo", $titulo);
              $query->bindParam(":descripcion", $descripcion);
              
              $query->bindParam(":categoria", $categoria);
              $query->bindParam(":video", $ruta_video);
              $query->bindParam("id", $id);
             
              $query->execute();
              move_uploaded_file($archivo_video,$ruta_video);
              // $pdo = null;
              echo "modificado";

            $pdo->commit();

        } catch (Exception $e) {
            $pdo->rollBack();
            echo $e->getMessage();
        }
          

          
        } else {
            echo "formato_archivo_mal";
        }
        
    }

    else if (!empty($_FILES['video']['name']) && !empty($_FILES['imagen']['name'])) {


// modificar video e imagen


    
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
            
            try {

                $pdo->beginTransaction();
                $query = $pdo->prepare("SELECT * FROM `tbl_peli` WHERE id=:id");
                $query->bindParam(":id", $id);
                $query->execute();
            
                
                $resultado=$query->fetchAll(PDO::FETCH_ASSOC);
                foreach ($resultado as $usu) {
                   
                    $foto=$usu['img_peli'];
                    $video=$usu['video'];
                }
                unlink($foto);
                unlink($video);
                $ruta_video="../video/".$id.$nombre_video;
                $ruta="../img/".$id.$nombre_img;
               
                $query = $pdo->prepare("UPDATE `tbl_peli` SET titulo_peli=:titulo,descripcion_peli=:descripcion,categoria=:categoria,video=:video,img_peli=:imagen WHERE id = :id");
           
                $query->bindParam(":titulo", $titulo);
                $query->bindParam(":descripcion", $descripcion);
                
                $query->bindParam(":categoria", $categoria);
                $query->bindParam(":video", $ruta_video);
                $query->bindParam(":imagen", $ruta);
                $query->bindParam("id", $id);
               
                $query->execute();
                move_uploaded_file($archivo_video,$ruta_video);
                move_uploaded_file($archivo,$ruta);
                // $pdo = null;
                echo "modificado";

                $pdo->commit();
            } catch (Exception $e) {
                $pdo->rollBack();
                echo $e->getMessage();
            }
           
        } else {
            echo "formato_archivo_mal";
        }
        
    }
}

}