<fieldset>
    
    <legend>Información General</legend>
    
    <label for="titulo">Título:</label>
    <textarea id="titulo" name="producto[titulo]"><?php echo s($producto->titulo); ?></textarea>

    <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png, image/jpg" name="producto[imagen]">
            <?php if($producto->imagen): ?>
                <img src="/imagenes/<?php echo $producto->imagen ?>" class="imagen-small">
            <?php endif; ?> 

    
</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="descripcion">Descripción:</label>
    <textarea  id="descripcion" name="producto[descripcion]"><?php echo s($producto->descripcion); ?></textarea>

    <label for="encontrado">Encontrado en:</label>
    <input type="text" id="encontrado" name="producto[encontrado]" placeholder="Encontrado en" value="<?php echo s ($producto->encontrado); ?>">

</fieldset>