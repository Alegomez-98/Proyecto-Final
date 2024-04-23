<?php

use App\Blog;


    $id = $_GET["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id){
        header("Location: /");
    }

    //Obtener los datos deL profesional
    $blog = Blog::find($id);

    $parrafo = nl2br($blog->descripcion); //Función para crear los párrafos


?>

<section class="blog-superior">
            <h1> <?php echo $blog->titulo ;?> </h1>
            <h3><?php echo $blog->cabecera ;?></h3>
            <div class="imagen-entradablog">
            <img loading="lazy" src="/imagenes/<?php echo $blog->imagen; ?>" alt="Imagen Blog">
            </div>
            <p>Escrito el: <span><?php echo $blog->fecha ;?></span> por: <span>Admin</span></p>
        </section>
        
            <div class="blog-inferior">
                <p><?php echo $parrafo ;?></p>
            </div>
