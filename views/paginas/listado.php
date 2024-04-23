
<?php foreach ($noticias as $noticia): ?>
    <div class="noticia">
    <img loading="lazy" src="/imagenes/<?php echo $noticia->imagen; ?>" alt="Imagen Noticia 1">
 
    <div class="contenido-noticia">
    <h4> <?php echo $noticia->titulo; ?> </h4>
    <a href="/noticia?id=<?php echo $noticia->id;?> " class="boton-inlineblock">Ver noticia</a>
    </div>
</div>
<?php endforeach; ?>