<main class="contenedor seccion">
        <h1>Crear Cuenta</h1>

<?php  
    include_once __DIR__ . "/../templates/errores.php";
?>

<form method="POST" class="formulario" action= "/crear-cuenta">
    
      <fieldset>
        <legend>Llena el siguiente formulario para crear una cuenta</legend>
      <label for="nombre">Nombre</label>
        <input 
            type="text"
            id="nombre"
            name="nombre"
            placeholder="Tu Nombre"
        />

        <label for="apellido">Apellido</label>
        <input 
            type="text"
            id="apellido"
            name="apellido"
            placeholder="Tu Apellido"
           
        />

        <label for="telefono">Teléfono</label>
        <input 
            type="tel"
            id="telefono"
            name="telefono"
            placeholder="Tu Teléfono"
        
        />

        <label for="email">Email</label>
        <input 
            type="email"
            id="email"
            name="email"
            placeholder="Tu Email"
         
        />

        <label for="password">Password</label>
        <input 
            type="password"
            id="password"
            name="password"
            placeholder="Tu Password"
        />
      </fieldset>
      <input type="submit" value="Crear Cuenta" class="boton-block">

</form>

<div class="acciones">
    <a href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/olvide">¿Olvidaste tu contraseña?</a>
</div>

</main>