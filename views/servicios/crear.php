<main class="contenedor seccion">
    <h1>Crear</h1>

    <?php foreach ($errores as $error): ?>
            <div class="alerta error">
                <?php echo $error; ?>
            </div>
        <?php endforeach; ?>

    <a href="/admin" class="boton-inlineblock">Volver</a>
    <form method="POST" class="formulario">
    <?php include __DIR__ . "/formulario.php";?>

    <input type="submit" value="Crear Servicio" class="boton-inlineblock">
    </form>

    
    
</main>   