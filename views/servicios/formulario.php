<fieldset>
                <legend>Información General</legend>

                <label for="titulo">Título:</label>
                <input type="text" id="titulo" name="servicio[titulo]" placeholder="Título Servicio" value="<?php echo s ($servicio->titulo); ?>">

                <label for="precio">Precio:</label>
                <input type="number" id="precio" name="servicio[precio]" placeholder="Precio Servicio" value="<?php echo s($servicio->precio); ?>">

                <label for="menu">Menú:</label>
                <textarea  id="menu" name="servicio[menu]"><?php echo s($servicio->menu); ?></textarea>

                <label for="pautas">Pautas:</label>
                <textarea  id="pautas" name="servicio[pautas]"><?php echo s($servicio->pautas); ?></textarea>

                <label for="revision">Revisión:</label>
                <textarea  id="revision" name="servicio[revision]"><?php echo s($servicio->revision); ?></textarea>

                <label for="contacto">Contacto:</label>
                <textarea  id="contacto" name="servicio[contacto]"><?php echo s($servicio->contacto); ?></textarea>

                <label for="lista">Lista:</label>
                <textarea  id="lista" name="servicio[lista]"><?php echo s($servicio->lista); ?></textarea>

                <label for="receta">Receta:</label>
                <textarea  id="receta" name="servicio[receta]"><?php echo s($servicio->receta); ?></textarea>
                
            </fieldset>

            <fieldset>
                <legend>Profesionales</legend>
                
                <label for="profesional">Profesional</label>
                <select name="servicio[profesionales_id]" id="profesional"> 
                    <option selected value=""">-- Seleccione --</option>
                    <?php foreach ($profesionales as $profesional):  ?>
                        <option 
                        <?php echo $servicio->profesionales_id === $profesional->id ? "selected": "";  ?>
                        value="<?php echo s($profesional->id); ?>"> <?php echo s($profesional->nombre) . " " . s($profesional->apellido)  ;?></option>
                    <?php endforeach; ?>
                </select>
            </fieldset>