<fieldset>
    
    <legend>Información General</legend>
    
    <label for="titulo">Título:</label>
    <textarea id="titulo" name="noticia[titulo]"><?php echo s($noticia->titulo); ?></textarea>

    <label for="cabecera">Cabecera:</label>
    <textarea id="cabecera" name="noticia[cabecera]"><?php echo s($noticia->cabecera); ?></textarea>



</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png, image/jpg" name="noticia[imagen]">
            <?php if($noticia->imagen): ?>
                <img src="/imagenes/<?php echo $noticia->imagen ?>" class="imagen-small">
            <?php endif; ?> 

    <label for="autor">Autor:</label>
    <input type="text" id="autor" name="noticia[autor]" placeholder="Autor" value="<?php echo s ($noticia->autor); ?>">

    <label for="fecha">Fecha:</label>
    <input type="text" id="fecha" name="noticia[fecha]" placeholder="Fecha" value="<?php echo s ($noticia->fecha); ?>">

    <label for="descripcion">Descripción:</label>
    <textarea  id="descripcion" name="noticia[descripcion]"><?php echo s($noticia->descripcion); ?></textarea>

</fieldset>