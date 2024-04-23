<main class="contenedor seccion contenido-centrado">
           
           <h1>Iniciar Sesión</h1>
  <?php  
    include_once __DIR__ . "/../templates/errores.php";
?>
   
           <form method="POST" class="formulario" action="/login">
           <fieldset>
                 <legend>Email y Password</legend>
   
                 <label for="email">Email</label>
                 <input type="email" name="email" placeholder="Tu Email" id="email" >
   
                 <label for="password">Password</label>
                 <input type="password" name="password" placeholder="Tu Password" id="password" >
   
               </fieldset>
   
               <input type="submit" value="Iniciar Sesión" class="boton-block">
           </form>

           

           <div class="acciones">
                <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crea una</a>
                <a href="/olvide-password">¿Olvidaste tu contraseña?</a>
            </div>
          
           
       </main>
