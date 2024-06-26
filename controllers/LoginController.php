<?php

namespace Controllers;

use Classes\Email;
use MVC\Router;
use Model\Usuario;

class LoginController{

    public static function login(Router $router){

        $errores = [];

        if($_SERVER["REQUEST_METHOD"]=== "POST"){
            $auth = new Usuario($_POST);

            $errores = $auth->validarLogin();

            if(empty($alertas)){
                //Comprobar que exista el usuario
                $usuario = Usuario::where("email", $auth->email);

                if($usuario){
                    //Verificar el password
                    if ($usuario->comprobarPasswordAndVerificado($auth->password)){
                        //Autenticar el usuario
                        session_start();

                        $_SESSION["id"] = $usuario->id;
                        $_SESSION["nombre"] = $usuario->nombre . " " . $usuario->apellido;
                        $_SESSION["email"] = $usuario->email;
                        $_SESSION["login"] = true;

                        //Redireccionamiento

                        if ($usuario->admin === "1"){
                            $_SESSION["admin"] = $usuario->admin ?? null;
                            header("Location: /admin");
                        }else{
                            header("Location: /");
                        }
                    }
                }else{
                    Usuario::setErrores("error", "Usuario no encontrado");
                }
            }
        }
        $errores = Usuario::getErrores();
        $router->render("auth/login",[
            "errores"=> $errores,
            
        ]);
    }

    public static function logout(){
        session_start();

        $_SESSION= [];

        header("Location: /");
    }

    public static function olvide(Router $router){

        $errores = [];

        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            $auth = new Usuario($_POST);
            $errores = $auth->validarEmail();

            if(empty($errores)){
                $usuario = Usuario::where("email", $auth->email);

                if($usuario && $usuario->confirmado === "1"){
                    //Generar un token
                    $usuario->crearToken();
                    $usuario->guardar();

                    //Enviar el email
                    $email = new Email($usuario->nombre, $usuario->email, $usuario->token);
                    $email->enviarInstrucciones();

                    //Alerta de éxito
                    Usuario::setErrores("exito", "Revisa tu email");


                }else{
                    Usuario::setErrores("error", "El Usuario no existe o no está confirmado");
                }
            }
        }
            $errores= Usuario::getErrores();
            $router->render("auth/olvide-password", [
            "errores"=> $errores
        ]);
    }


    public static function recuperar(Router $router){
        $errores = [];
        $error = false;

        $token = s($_GET["token"]);
        
        //Buscar usuario por su token
        $usuario = Usuario::where("token", $token);

        if (empty($usuario)){
            Usuario::setErrores("error", "Token No Válido");
            $error = true;
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST"){
            
            //Leer el nuevo password y guardarlo
            $password = new Usuario($_POST);
            $errores = $password->validarPassword();

            if (empty($errores)){
                $usuario->password = null;

                $usuario->password = $password->password;
                $usuario->hashPassword();
                $usuario ->token = null;

                $resultado = $usuario->guardar();

                if ($resultado){
                    header("Location: /");
                }
            }
        }
        $errores = Usuario::getErrores();
        $router->render("auth/recuperar-password", [
            "errores"=> $errores, 
            "error"=> $error

        ]);
    }

    public static function crear(Router $router){

        $usuario = new Usuario;

        //Errores vacíos
        $errores = [];

        if($_SERVER["REQUEST_METHOD"]=== "POST"){

            $usuario->sincronizar($_POST);

            $errores = $usuario->validarNuevaCuenta();
           
            //Revisar que errores esté vacío
            if (empty($errores)){
                //Verificar que el usuario no esté registrado
                $resultado = $usuario->existeUsuario();

                if ($resultado->num_rows){
                    $errores = Usuario::getErrores();
                }else{
                    //Hashear el password
                    $usuario->hashPassword();

                    //Generar un token único
                    $usuario->crearToken();

                    //Enviar el email
                    $email = new Email($usuario-> nombre, $usuario->email, $usuario->token);

                    $email->enviarConfirmacion();

                    //Crear el usuario
                    $resultado = $usuario->guardar();

                    if($resultado){
                        header("Location: /mensaje");
                    }

                }
            }
        }

        $router->render("auth/crear-cuenta", [
            "usuario"=> $usuario,
            "errores"=> $errores
        ]);
    }

 
    public static function mensaje (Router $router){
        $router->render("auth/mensaje");
    }

    public static function confirmar (Router $router){
        $errores = [];
        $token = s($_GET["token"]);
        $usuario = Usuario::where("token", $token);

        if(empty($usuario)){
            //Mostrar mensaje  de error
            Usuario::setErrores("error", "Token No Válido");
        }else{
            //Modificar a usuario confirmado
            $usuario->confirmado = "1";
            $usuario->token = "";
            $usuario->guardar();    
            Usuario::setErrores("exito", "Cuenta Comprobada Correctamente");
        }

        //Obtener errores
        $errores = Usuario::getErrores();
         //Renderizar la vista
         $router->render("auth/confirmar-cuenta", [
            "errores"=> $errores
        ]);
    }
}