<?php
    if (!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION["login"] ?? false;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutri Plus</title>
    <link rel="stylesheet" href="/build/css/app.css">
</head>
<body>

    <header class="header inicio">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="/">
                <img src="/build/img/Captura.PNG" alt="Imagen Logo">
                </a>

                <div class="mobile-menu">
                    <img src="/build/img/barras.svg" alt="Icono Menu Responsive">
                </div>
               <div class="derecha">
                <img class="dark-mode-boton" src="/build/img/dark-mode.svg">
                <nav class="navegacion">
                    <a href="servicios.php">Servicios</a>
                    <a href="noticias.php">Noticias</a>
                    <a href="blog.php">Blog</a>
                    <a href="contacto.php">Contacto</a>
                    <?php if ($auth): ?>
                        <a href="cerrar-sesion.php">Cerrar Sesión</a>
                    <?php endif; ?>
                </nav>
               </div> 

            </div> <!-- .barra -->

        
        </div>
    </header>
