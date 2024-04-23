<?php

namespace Controllers;

use Model\Noticia;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class NoticiaController{


    public static function crear (Router $router){
        $errores = Noticia::getErrores();

        $noticia = new Noticia;

        if($_SERVER["REQUEST_METHOD"]=== "POST"){
            //Crea una nueva Instancia
            $noticia = new Noticia($_POST["noticia"]);
            
            /**Subida de archivos */
            
            //Generar un nombre único
            $nombreImagen = md5(uniqid( rand(), true )).".jpg";

            if($_FILES["noticia"]["tmp_name"]["imagen"]){
                $image = Image::make($_FILES["noticia"]["tmp_name"]["imagen"])->fit(800,600);
                $noticia->setImagen($nombreImagen);
            }

             //Validar
            $errores = $noticia->validar();

            //Revisar que el array de errores este vacio
            if(empty($errores)){
            
                //Crear la caperta para subir imagenes
                if(!is_dir(CARPETA_IMAGENES)){
                    mkdir(CARPETA_IMAGENES);
                }

                //Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGENES . $nombreImagen);

                //Guarda en la base de datos
                $noticia->guardar();

            }
        }

        $router->render("noticias/crear", [
            "errores"=> $errores,
            "noticia"=>$noticia
        ]);
    }


    public static function actualizar (Router $router){
             //Arrego con mensaje de errores
             $errores = Noticia::getErrores();
             $id = validarORedireccionar("/admin");
     
             //Obtener datos del profesional a actualizar
             $noticia = Noticia::find($id);
     
             if($_SERVER["REQUEST_METHOD"]=== "POST"){
                 //Asignar los atributos
                 $args = $_POST["noticia"];
       
                 $noticia->sincronizar($args);
         
                 //Validacion
                 $errores = $noticia->validar();
          
               //Subida de archivos
               //Generar un nombre único
                 $nombreImagen = md5(uniqid( rand(), true )).".jpg";
         
                 if($_FILES["noticia"]["tmp_name"]["imagen"]){
                     $image = Image::make($_FILES["noticia"]["tmp_name"]["imagen"])->fit(800,600);
                     $noticia->setImagen($nombreImagen);
                 }
         
                 //Revisar que el array de errores este vacio
                 if(empty($errores)){
                     //Almacenar la imagen
                     if ($_FILES['noticia']['tmp_name']['imagen']){
                         $image->save(CARPETA_IMAGENES . $nombreImagen);
                     }
                     
                     $noticia->guardar();
                    
                 }
           }
     
             $router->render("noticias/actualizar", [
                 "errores"=> $errores,
                 "noticia"=> $noticia
             ]);
    }


    public static function eliminar (){

        if($_SERVER["REQUEST_METHOD"] === "POST"){
            

            //Validar el id
            $id = $_POST["id"];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if($id){
                //Valida el tipo a eliminar
                $tipo = $_SERVER["tipo"];
                

                if(validarTipoContenido($tipo)){
                    $noticia = Noticia::find($id);
                    $noticia->eliminar();
                }
            }
        }
    }
}