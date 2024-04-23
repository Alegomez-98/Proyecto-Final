<?php

namespace Controllers;
use MVC\Router;
use Model\Servicio;
use Model\Profesional;


class ServicioController{

    public static function index (Router $router){

        $servicios = Servicio::all();

        $profesionales = Profesional::all();

        //Muestra mensaje condicional
        $resultado = $_GET["resultado"] ?? null;
        
        
       $router->render("servicios/admin" , [
            "servicios" => $servicios,
            "resultado"=> $resultado,
            "profesionales"=> $profesionales
            
       ]); 
    }

    public static function crear (Router $router){

        $servicio = new Servicio;
        $profesionales = Profesional::all();
        //Arreglo con mensaje de errores
        $errores = Servicio::getErrores();

        //Ejecutar el código después de que el admin rellene el formulario
        if($_SERVER["REQUEST_METHOD"]=== "POST"){

            //Crea una nueva instancia
            $servicio = new Servicio($_POST["servicio"]);

            $errores = $servicio->validar();

            //Revisar que el arreglo de errores esté vacío
            if (empty($errores)){
                $servicio->guardar();       
            }
    }

        $router->render("servicios/crear", [
            "servicio" => $servicio,
            "profesionales"=> $profesionales,
            "errores"=> $errores
        ]); 
    }

    public static function actualizar (Router $router){

        $id = validarORedireccionar("/admin");

        $servicio = Servicio::find($id);

        $profesionales = Profesional::all();

        $errores = Servicio::getErrores();

        //Método POST para actualizar
        if($_SERVER["REQUEST_METHOD"]=== "POST"){

            //Asignar los atributos
            $args = $_POST["servicio"];
            
            $servicio->sincronizar($args);
    
            $errores = $servicio->validar();
            
            //Revisar que el arreglo de errores esté vacío
            if (empty($errores)){
                $resultado = $servicio ->guardar();
            }
           
        }

        $router->render("servicios/actualizar", [
            "servicio"=> $servicio,
            "errores"=> $errores,
            "profesionales"=> $profesionales,
        ]); 
        
    }

    public static function eliminar (Router $router){
        if ($_SERVER["REQUEST_METHOD"]==="POST"){

            //Validar por id
            $id = $_POST["id"];
            $id = filter_var($id, FILTER_VALIDATE_INT);
    
            if($id){
    
                $tipo = $_POST["tipo"];
    
                if(validarTipoContenido($tipo)){
                    $servicio = Servicio::find($id);
                    $servicio->eliminar();
        }
    }
    
        }
    }
}