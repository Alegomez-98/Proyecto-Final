<fieldset>
    
    <legend>Información General</legend>

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="profesional[nombre]" placeholder="Nombre Profesional" value="<?php echo s ($profesional->nombre); ?>">

    <label for="apellido">Apellido:</label>
    <input type="text" id="apellido" name="profesional[apellido]" placeholder="Apellido Profesional" value="<?php echo s ($profesional->apellido); ?>">
</fieldset>

<fieldset>
    <legend>Información Extra</legend>

    <label for="especializado">Especializado:</label>
    <input type="text" id="especializado" name="profesional[especializado]" placeholder="Especializado en" value="<?php echo s ($profesional->especializado); ?>">

    <label for="graduado">Graduado:</label>
    <input type="text" id="graduado" name="profesional[graduado]" placeholder="Graduado en" value="<?php echo s ($profesional->graduado); ?>">

   <label for="imagen">Imagen:</label>
            <input type="file" id="imagen" accept="image/jpeg, image/png, image/jpg" name="profesional[imagen]">
            <?php if($profesional->imagen): ?>
                <img src="/imagenes/<?php echo $profesional->imagen ?>" class="imagen-small">
            <?php endif; ?> 
            
    <label for="descripcion">Descripción:</label>
    <textarea  id="descripcion" name="profesional[descripcion]"><?php echo s($profesional->descripcion); ?></textarea>

</fieldset>