<?php

namespace Controllers;

use Model\Entrada;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;


class EntradaController{
    public static function crear (Router $router){
        $errores = Entrada::getErrores();

        $entrada = new Entrada;

        if($_SERVER["REQUEST_METHOD"]=== "POST"){
            //Crea una nueva Instancia
            $entrada = new Entrada($_POST["entrada"]);
 
            /**Subida de archivos */
            
            //Generar un nombre único
            $nombreImagen = md5(uniqid( rand(), true )).".jpg";
  
          //Setear la imagen
          //Realiza un resize a la imagen con intervention
          if($_FILES["entrada"]["tmp_name"]["imagen"]){
              $image = Image::make($_FILES["entrada"]["tmp_name"]["imagen"])->fit(800,600);
              $entrada->setImagen($nombreImagen);
          }
  
          //Validar
          $errores = $entrada->validar();
        
  
          //Revisar que el array de errores este vacio
          if(empty($errores)){
          
              //Crear la caperta para subir imagenes
              if(!is_dir(CARPETA_IMAGENES)){
                  mkdir(CARPETA_IMAGENES);
              }
  
              //Guarda la imagen en el servidor
              $image->save(CARPETA_IMAGENES . $nombreImagen);
  
              //Guarda en la base de datos
              $entrada->guardar();
  
          }
     }

     $router->render("entradas/crear", [
        "errores"=> $errores,
        "entrada"=>$entrada
    ]);
    }

    public static function actualizar (Router $router){
                //Arrego con mensaje de errores
                $errores = Entrada::getErrores();
                $id = validarORedireccionar("/admin");
        
                //Obtener datos del profesional a actualizar
                $entrada = Entrada::find($id);
        
                if($_SERVER["REQUEST_METHOD"]=== "POST"){
                    //Asignar los atributos
                    $args = $_POST["entrada"];
          
                    $entrada->sincronizar($args);
            
                    //Validacion
                    $errores = $entrada->validar();
             
                  //Subida de archivos
                  //Generar un nombre único
                    $nombreImagen = md5(uniqid( rand(), true )).".jpg";
            
                    if($_FILES["entrada"]["tmp_name"]["imagen"]){
                        $image = Image::make($_FILES["entrada"]["tmp_name"]["imagen"])->fit(800,600);
                        $entrada->setImagen($nombreImagen);
                    }
            
                    //Revisar que el array de errores este vacio
                    if(empty($errores)){
                        //Almacenar la imagen
                        if ($_FILES['entrada']['tmp_name']['imagen']){
                            $image->save(CARPETA_IMAGENES . $nombreImagen);
                        }
                        
                        $entrada->guardar();
                       
                    }
              }
        
                $router->render("entradas/actualizar", [
                    "errores"=> $errores,
                    "entrada"=> $entrada
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
                    $entrada = Entrada::find($id);
                    $entrada->eliminar();
                }
            }
        }
    }
}