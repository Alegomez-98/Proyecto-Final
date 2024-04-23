<main class="contenedor seccion contenido-centrado">
        <h1>Contacto</h1>

        <?php
        if ($mensaje){ ?>
            <p class= 'alerta exito'><?php echo $mensaje; ?></p>; 
      <?php  }?>

        <h2>Rellene el Formulario de Contacto</h1>

        <form class="formulario" action="/contacto" method="POST">
            <fieldset>
              <legend>Información Personal</legend>
              <label for="nombre">Nombre</label>
              <input type="text" placeholder="Tu Nombre" id="nombre" name="contacto[nombre]" required>

              <label for="mensaje">Mensaje</label>
              <textarea id="mensaje" name="contacto[mensaje]" required></textarea>
            </fieldset>

            <fieldset>
                <legend>Contacto</legend>
                <p>Como desea ser contactado</p>
                
                <div class="forma-contacto">
                <label for="contactar-telefono">Teléfono</label>
                <input type="radio" value="telefono" id="contactar-telefono" name="contacto[contacto]">

                    <label for="contactar-email">Email</label>
                    <input type="radio" value="email" id="contactar-email" name="contacto[contacto]">
                </div>

                <div id="contacto"></div>

            
                <p>Por quien desea ser contacto</p>
                <select id="opciones" name="contacto[persona]">
                    <option value="" disabled selected>-- Seleccione --</option>
                    <option value="Alejandro">Alejandro</option>
                    <option value="Carla">Carla</option>
                    <option value="Mario">Mario</option>
                </select>
            </fieldset>

            <input type="submit" value="Enviar" class="boton-inlineblock">
        </form>
        
       
        
    </main>