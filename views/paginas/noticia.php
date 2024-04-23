<main class="contenedor seccion contenido-centrado">

<section class="parte-superior">
    <h1> <?php echo $noticia->titulo; ?> </h1>
    <h3> <?php echo $noticia->cabecera; ?> </h3>
    <div class="imagen-noticia">
        <img loading="lazy" src="/imagenes/<?php echo $noticia->imagen; ?>" alt="Imagen Noticia 1">
    </div>
    <p><?php echo $noticia->autor; ?></p>
    <p><?php echo $noticia->fecha; ?></p>
</section>

<div class="parte-inferior">
    <p><?php echo $parrafo; ?></p>
</div>

</main>