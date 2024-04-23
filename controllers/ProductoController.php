<?php

namespace Controllers;

use Model\Producto;
use MVC\Router;



class ProductoController{
    public static function crear (Router $router){
        $errores = Producto::getErrores();

        $producto = new Producto;

        if($_SERVER["REQUEST_METHOD"]=== "POST"){
            //Crea una nueva Instancia
            $producto = new Producto($_POST["producto"]);
 
            /**Subida de archivos */
            
            //Generar un nombre único
            $nombreImagen = md5(uniqid( rand(), true )).".jpg";
  
          //Setear la imagen
          //Realiza un resize a la imagen con intervention
          if($_FILES["producto"]["tmp_name"]["imagen"]){
              $image = Image::make($_FILES["producto"]["tmp_name"]["imagen"])->fit(800,600);
              $producto->setImagen($nombreImagen);
          }
  
          //Validar
          $errores = $producto->validar();
        
  
          //Revisar que el array de errores este vacio
          if(empty($errores)){
          
              //Crear la caperta para subir imagenes
              if(!is_dir(CARPETA_IMAGENES)){
                  mkdir(CARPETA_IMAGENES);
              }
  
              //Guarda la imagen en el servidor
              $image->save(CARPETA_IMAGENES . $nombreImagen);
  
              //Guarda en la base de datos
              $producto->guardar();
  
          }
     }

        $router->render("productos/crear", [
            "errores"=> $errores,
            "producto"=>$producto
        ]);
    }


    public static function actualizar (Router $router){
        //Arrego con mensaje de errores
        $errores = Producto::getErrores();
        $id = validarORedireccionar("/admin");

        //Obtener datos del profesional a actualizar
        $producto = Producto::find($id);

        if($_SERVER["REQUEST_METHOD"]=== "POST"){
            //Asignar los atributos
            $args = $_POST["producto"];
  
            $producto->sincronizar($args);
    
            //Validacion
            $errores = $producto->validar();
     
          //Subida de archivos
          //Generar un nombre único
            $nombreImagen = md5(uniqid( rand(), true )).".jpg";
    
            if($_FILES["producto"]["tmp_name"]["imagen"]){
                $image = Image::make($_FILES["producto"]["tmp_name"]["imagen"])->fit(800,600);
                $producto->setImagen($nombreImagen);
            }
    
            //Revisar que el array de errores este vacio
            if(empty($errores)){
                //Almacenar la imagen
                if ($_FILES['producto']['tmp_name']['imagen']){
                    $image->save(CARPETA_IMAGENES . $nombreImagen);
                }
                
                $producto->guardar();
               
            }
      }

        $router->render("productos/actualizar", [
            "errores"=> $errores,
            "producto"=> $producto
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
                    $producto = Producto::find($id);
                    $producto->eliminar();
                }
            }
        }
    }
}