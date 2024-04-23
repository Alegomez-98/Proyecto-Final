<h1>Recuperar Password</h1>

<?php
    include_once __DIR__ . "/../templates/errores.php";
?>
<?php if ($error) return; ?>

<main class="contenedor seccion">
<form class="formulario" method="POST">

        <fieldset>
        <legend>Coloca tu nuevo password a continuación</legend>
        <label for="password">Password</label>
        <input 
            type="password"
            id="password"
            name="password"
            placeholder="Tu Nuevo Password"
        />

        </fieldset>
    
    <input type="submit" class="boton-block" value="Guardar Nuevo Password">

</form>

<div class="acciones">
    <a href="/login">¿Ya tienes cuenta? Iniciar Sesión</a>
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crea una</a>
</div>

</main>