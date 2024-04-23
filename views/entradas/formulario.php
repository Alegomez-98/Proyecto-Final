<fieldset>
    
    <legend>Información General</legend>
    
    <label for="titulo">Título:</label>
    <textarea id="titulo" name="blog[titulo]"><?php echo s($blog->titulo); ?></textarea>

    <label for="fecha">Fecha:</label>
    <input type="date" id="fecha" name="blog[fecha]" placeholder="Fecha" value="<?php echo s ($blog->fecha); ?>">

    <label for="cabecera">Cabecera:</label>
    <textarea id="cabecera" name="blog[cabecera]"><?php echo s($blog->cabecera); ?></textarea>



</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png, image/jpg" name="blog[imagen]">
            <?php if($blog->imagen): ?>
                <img src="/imagenes/<?php echo $blog->imagen ?>" class="imagen-small">
            <?php endif; ?> 


    <label for="descripcion">Descripción:</label>
    <textarea  id="descripcion" name="blog[descripcion]"><?php echo s($blog->descripcion); ?></textarea>

</fieldset>