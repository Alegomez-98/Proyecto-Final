<?php

namespace Classes;

use PHPMailer\PHPMailer\PHPMailer;

class Email{

    public $email;
    public $nombre;
    public $token;

    public function __construct($nombre, $email, $token)
    {

        $this->nombre = $nombre;
        $this->email = $email;
        $this->token = $token;
    }


    public function enviarConfirmacion(){
        
        //Crear el objeto de email
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->Host = $_ENV["EMAIL_HOST"];
        $mail->SMTPAuth = true;
        $mail->Port = $_ENV["EMAIL_PORT"];
        $mail->Username = $_ENV["EMAIL_USER"];
        $mail->Password = $_ENV["EMAIL_PASS"];

        $mail->setFrom("cuentas@nutriplus.com");
        $mail->addAddress("cuentas@nutriplus.com", "NutriPlus.com");
        $mail->Subject = "Confirma tu cuenta";

        //Set HTML
        $mail->isHTML(TRUE);
        $mail->CharSet= "UTF-8";

        $contenido = "<html>";
        $contenido.="<p><strong>Hola " . $this->nombre . "</strong> Has creado tu cuenta en Nutri Plus, sólo debes confirmarla presionando el siguiente enlace</p>";
        $contenido.= "<p>Presiona aquí: <a href='" . $_ENV["APP_URL"]  ."/confirmar-cuenta?token="
        . $this->token . "'>Confirmar Cuenta</a> </p>";
        $contenido.= "<p>Si tu no solicitaste esta confirmación, puedes ignorar el mensaje</p>";
        $contenido .= "</html>";
        $mail->Body = $contenido;

        //Enviar el Email
        $mail->send();
    }

public function enviarInstrucciones(){
    //Crear el objeto de email
    $mail = new PHPMailer();
    $mail->isSMTP();
    $mail->Host = $_ENV["EMAIL_HOST"];
    $mail->SMTPAuth = true;
    $mail->Port = $_ENV["EMAIL_PORT"];
    $mail->Username = $_ENV["EMAIL_USER"];
    $mail->Password = $_ENV["EMAIL_PASS"];

    $mail->setFrom("cuentas@nutriplus.com");
    $mail->addAddress("cuentas@nutriplus.com", "NutriPlus.com");
    $mail->Subject = "Restablece tu password";

    //Set HTML
    $mail->isHTML(TRUE);
    $mail->CharSet= "UTF-8";

    $contenido = "<html>";
    $contenido.="<p><strong>Hola " . $this->nombre . "</strong> Has solicitado restablecer tu password, sigue el siguiente enlace para hacerlo</p>";
    $contenido.= "<p>Presiona aquí: <a href='" . $_ENV["APP_URL"]  ."/recuperar?token="
    . $this->token . "'>Restablecer Password</a> </p>";
    $contenido.= "<p>Si tu no solicitaste este cambio, puedes ignorar el mensaje</p>";
    $contenido .= "</html>";
    $mail->Body = $contenido;

    //Enviar el Email
    $mail->send();
}

}


?>