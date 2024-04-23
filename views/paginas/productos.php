<?php foreach ($productos as $producto): ?>
<div class="producto">
    <img loading="lazy" src="/imagenes/<?php echo $producto->imagen; ?>" alt="Imagen Noticia 1">
    <div class="contenido-noticia">
    <p><?php echo $producto->titulo . "<br>" . $producto->descripcion; ?></p>
    <p>¿Dónde encotrarlo? <span><?php echo $producto->encontrado; ?></span></p>
</div>
</div>
<?php endforeach; ?>