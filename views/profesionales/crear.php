<main class="contenedor seccion">
           
           <h1>Registrar Profesional</h1>
   
           <a href="/admin" class="boton-inlineblock">Volver</a>
   
           <?php foreach ($errores as $error): ?>
               <div class="alerta error">
                   <?php echo $error; ?>
               </div>
           <?php endforeach; ?>
           
           <form class="formulario" method="POST" action="/profesionales/crear" enctype="multipart/form-data">
                <?php include __DIR__ . "/formulario.php"; ?>
   
               <input type="submit" value="Registrar Profesional" class="boton-inlineblock">
           </form>
           
          
           
       </main>