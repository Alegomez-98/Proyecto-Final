<main class="contenedor seccion">
        <h1>Olvide Password</h1>

<?php  
    include_once __DIR__ . "/../templates/errores.php";
?>

    <form  method="POST" class="formulario">
    <fieldset>
        <legend>Reestablece tu password escribiendo tu email a continuación</legend>
        <label for="email">Email</label>
        <input 
            type="email"
            id="email"
            name="email"
            placeholder="Tu Email"
        />
        </fieldset>

    <input type="submit" class="boton-block" value="Enviar Instrucciones">
</form>

<div class="acciones">
    <a href="/login">¿Ya tienes una cuenta? Inicia Sesión</a>
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crea una</a>
</div>

</main>