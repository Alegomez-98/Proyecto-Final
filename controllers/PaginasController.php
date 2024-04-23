<?php

namespace Controllers;


use Model\Entrada;
use MVC\Router;
use Model\Noticia;
use Model\Producto;
use Model\Profesional;
use Model\Servicio;
use PHPMailer\PHPMailer\PHPMailer;


class PaginasController{

    public static function index(Router $router){
        
        $profesionales = Profesional::all();
        $noticias = Noticia::get(3);

        $blogs = Entrada::all();

        $productos = Producto::all();
        
        $router->render("paginas/index", [
            "noticias"=> $noticias,
            "profesionales"=>$profesionales,
            "blogs"=> $blogs,
            "productos"=>$productos
        ]);
    }


    public static function profesional(Router $router){
        
        $id = validarORedireccionar("/noticias");

        //Buscar la noticia por su id
        $profesional = Profesional::find($id);

        $servicios = Servicio::all();

        $router->render("paginas/profesional",[
            "profesional"=>$profesional,
            "servicios"=> $servicios
        ]);
    }


    public static function servicios(Router $router){

        $profesionales = Profesional::all();
        
        $router->render("paginas/servicios", [
            "profesionales"=>$profesionales
        ]);
    }

    public static function noticias(Router $router){

        $noticias = Noticia::all();

        $router->render("paginas/noticias", [
            "noticias"=> $noticias
        ]);
    }

    public static function noticia(Router $router){

        $id = validarORedireccionar("/noticias");

        //Buscar la noticia por su id
        $noticia = Noticia::find($id);

        $parrafo = nl2br($noticia->descripcion); 


        $router->render("paginas/noticia", [
            "noticia"=> $noticia,
            "parrafo"=> $parrafo
        ]);
    }

    public static function blog(Router $router){
        
        $blogs = Entrada::all();

        $router->render("paginas/blog", [
            "blogs"=> $blogs
        ]);
    }

    public static function entrada(Router $router){
        
        $id = validarORedireccionar("/blog");

        //Buscar el blog por su id
        $blog = Entrada::find($id);

        $parrafo = nl2br($blog->descripcion); 
        
        $router->render("paginas/entrada", [
            "blog"=> $blog,
            "parrafo"=> $parrafo
        ]);
    }

    public static function contacto(Router $router){

        $mensaje = null;

        if ($_SERVER["REQUEST_METHOD"]== "POST"){

            $respuestas = $_POST["contacto"];


            //Crear una instancia de PHPMailer

            $mail = new PHPMailer();

            //Configurar SMTP
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Port = 2525;
            $mail->Username = '8203d642ab1614';
            $mail->Password = '7095aa2c3c96aa';
            $mail->SMTPSecure = "tls";
        
            //Configurar el contenido del email
            $mail->setFrom("admin@nutriplus.com");
            $mail->addAddress("admin@nutriplus.com", "NutriPlus.com");
            $mail->Subject= "Tienes un Nuevo Mensaje";

            //Habilitar HTML
            $mail->isHTML(true);
            $mail->CharSet = "UTF-8";

            //Definir el contenido
            $contenido = '<html>';
            $contenido.= '<p>Tienes un nuevo mensaje</p>';
            $contenido.= '<p>Nombre: ' . $respuestas["nombre"] . '</p>';
            

            //Enviar de forma condicional
            if ($respuestas["contacto"] === "telefono"){
                $contenido .= '<p>Eligió ser contactado por Teléfono:</p>';
                $contenido.= '<p>Teléfono: ' . $respuestas["telefono"] . '</p>';
                $contenido.= '<p>Fecha Contacto: ' . $respuestas["fecha"] . '</p>';
                $contenido.= '<p>Hora Contacto: ' . $respuestas["hora"] . '</p>';
            }else{
                //Es email
                $contenido .= '<p>Eligió ser contactado por Email:</p>';
                $contenido.= '<p>Email: ' . $respuestas["email"] . '</p>';
            }
            
            $contenido.= '<p>Mensaje: ' . $respuestas["mensaje"] . '</p>';
            $contenido.= '<p>Prefiere ser contactado por: ' . $respuestas["contacto"] . '</p>';
            
            $contenido.= '<p>Desea ser contactado por: ' . $respuestas["persona"] . '</p>';
            $contenido.= '</html>';


            $mail->Body = $contenido;
            $mail->AltBody = "Esto es texto alternativo";

            //Enviar el email
            if ($mail->send()){
                $mensaje =  "Mensaje Enviado correctamente";
            } else{
                $mensaje=  "El mensaje no se pudo enviar";
            }



        }
        $router->render("paginas/contacto", [
            "mensaje"=> $mensaje
        ]); 
    }

  


}