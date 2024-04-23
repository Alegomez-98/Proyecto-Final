<?php

namespace Controllers;
use MVC\Router;
use Model\Profesional;
use Intervention\Image\ImageManagerStatic as Image;

class ProfesionalController{

    public static function crear (Router $router){

        $errores = Profesional::getErrores();

        $profesional = new Profesional;

        if($_SERVER["REQUEST_METHOD"]=== "POST"){
            //Crea una nueva Instancia
            $profesional = new Profesional($_POST["profesional"]);
 
            /**Subida de archivos */
            
            //Generar un nombre único
            $nombreImagen = md5(uniqid( rand(), true )).".jpg";
  
          //Setear la imagen
          //Realiza un resize a la imagen con intervention
          if($_FILES["profesional"]["tmp_name"]["imagen"]){
              $image = Image::make($_FILES["profesional"]["tmp_name"]["imagen"])->fit(800,600);
              $profesional->setImagen($nombreImagen);
          }
  
          //Validar
          $errores = $profesional->validar();
        
  
          //Revisar que el array de errores este vacio
          if(empty($errores)){
          
              //Crear la caperta para subir imagenes
              if(!is_dir(CARPETA_IMAGENES)){
                  mkdir(CARPETA_IMAGENES);
              }
  
              //Guarda la imagen en el servidor
              $image->save(CARPETA_IMAGENES . $nombreImagen);
  
              //Guarda en la base de datos
              $profesional->guardar();
  
          }
     }

        $router->render("profesionales/crear", [
            "errores"=> $errores,
            "profesional"=>$profesional
        ]);
    }

    public static function actualizar (Router $router){
        
        //Arrego con mensaje de errores
        $errores = Profesional::getErrores();
        $id = validarORedireccionar("/admin");

        //Obtener datos del profesional a actualizar
        $profesional = Profesional::find($id);

        if($_SERVER["REQUEST_METHOD"]=== "POST"){
            //Asignar los atributos
            $args = $_POST["profesional"];
  
            $profesional->sincronizar($args);
    
            //Validacion
            $errores = $profesional->validar();
     
          //Subida de archivos
          //Generar un nombre único
            $nombreImagen = md5(uniqid( rand(), true )).".jpg";
    
            if($_FILES["profesional"]["tmp_name"]["imagen"]){
                $image = Image::make($_FILES["profesional"]["tmp_name"]["imagen"])->fit(800,600);
                $profesional->setImagen($nombreImagen);
            }
    
            //Revisar que el array de errores este vacio
            if(empty($errores)){
                //Almacenar la imagen
                if ($_FILES['profesional']['tmp_name']['imagen']){
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                
                $profesional->guardar();
               
            }
      }

        $router->render("profesionales/actualizar", [
            "errores"=> $errores,
            "profesional"=> $profesional
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
                    $profesional = Profesional::find($id);
                    $profesional->eliminar();
                }
            }
        }
    }
}
