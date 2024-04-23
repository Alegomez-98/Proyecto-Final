<?php
    if (!isset($_SESSION)){
        session_start();
    }

    $auth = $_SESSION["login"] ?? false;

if (isset($inicio)){
    $inicio = false;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nutri Plus</title>
    <link rel="stylesheet" href="../build/css/app.css">
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
                    <a href="/servicios">Servicios</a>
                    <a href="/noticias">Noticias</a>
                    <a href="/blog">Blog</a>
                    <a href="/contacto">Contacto</a>
                    <a href="/login">Inciar Sesión</a>
                    <?php if ($auth): ?>
                        <a href="/logout">Cerrar Sesión</a>
                    <?php endif; ?>
                </nav>
               </div> 

            </div> <!-- .barra -->

        
        </div>
    </header>

    <?php echo $contenido;  ?>

    <footer class="footer seccion">
        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="">Servicios</a>
                <a href="">Noticias</a>
                <a href="">Blog</a>
                <a href="">Contacto</a>
            </nav>
        </div>

        <p class="copyright">Todos los derechos reservados <?php echo date("Y"); ?> &copy</p>
    </footer>
    
    <script src="../build/js/bundle.min.js"></script>
</body>
</html>
