    
 <main class="contenedor seccion contenido-centrado">   
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

    </main>