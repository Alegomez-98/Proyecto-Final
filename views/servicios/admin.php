<main class="contenedor-admin seccion">
        <h1>Administrador de NutriPlus</h1>
        <?php 
        if ($resultado){
          $mensaje = mostrarNotificación(intval($resultado));
          if ($mensaje){ ?>
            <p class="alerta exito"><?php echo s ($mensaje); ?></p>
          <?php } 
           } ?>
            
        <div class="botones-admin">
        <a href="/servicios/crear" class="boton-inlineblock">Nuevo Servicio</a>
        <a href="/profesionales/crear" class="boton-inlineblock">Nuevo(a) Profesional</a>
        <a href="/noticias/crear.php" class="boton-inlineblock">Nueva Noticia</a>
        <a href="/entradas/crear.php" class="boton-inlineblock">Nueva Entrada de Blog</a>
        <a href="/productos/crear.php" class="boton-inlineblock">Nuevo Producto</a>
        </div>

        <h2>Servicios</h2>

        <table class="servicios"> 
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Precio</th>
                    <th>Menú</th>
                    <th>Pautas</th>
                    <th>Revisión</th>
                    <th>Contacto</th>
                    <th>Lista</th>
                    <th>Receta</th>
                    <th>Acciones</th>
                </tr>
            </thead>

            <tbody> <!-- Mostrar los resultados -->
                <?php foreach ($servicios as $servicio): ?>
                <tr>
                    <td> <?php echo $servicio->id;?> </td>
                    <td> <?php echo $servicio->titulo;?> </td>
                    <td> $<?php echo $servicio->precio;?> </td>
                    <td> <?php echo $servicio->menu; ?> </td>
                    <td> <?php echo $servicio->pautas; ?> </td>
                    <td> <?php echo $servicio->revision; ?> </td>
                    <td> <?php echo $servicio->contacto; ?> </td>
                    <td> <?php echo $servicio->lista; ?> </td>
                    <td> <?php echo $servicio->receta; ?> </td>
                    <td>
                        <form method="POST" class="w-100" action="/servicios/eliminar">
                            <input type="hidden" name="id" value="<?php echo $servicio->id; ?>">
                            <input type="hidden" name="tipo" value="servicio">
                            <input type="submit" value="Eliminar" class="boton-rojo">
                        </form>
                        
                        <a href="/servicios/actualizar?id=<?php echo $servicio->id; ?>" class="boton-amarillo">Actualizar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h2>Profesionales</h2>

    <table class="profesionales"> 
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Especializado</th>
                <th>Graduado</th>
                <th>Imagen</th>
                <th>Descripción</th>
                <th>Acciones</th>
            </tr>
        </thead>

        <tbody> <!-- Mostrar los resultados -->
            <?php foreach ($profesionales as $profesional): ?>
            <tr>
                <td> <?php echo $profesional->id;?> </td>
                <td> <?php echo $profesional->nombre;?> </td>
                <td> <?php echo $profesional->apellido;?> </td>
                <td> <?php echo $profesional->especializado; ?> </td>
                <td> <?php echo $profesional->graduado; ?> </td>
                <td> <img src="../imagenes/<?php echo $profesional->imagen; ?>" class="imagen-tabla"></td>
                <td> <?php echo $profesional->descripcion; ?> </td>
                
                <td>
                    <form method="POST" class="w-100" action="/profesionales/eliminar">
                        <input type="hidden" name="id" value="<?php echo $profesional->id; ?>">
                        <input type="hidden" name="tipo" value="profesional">
                        <input type="submit" value="Eliminar" class="boton-rojo">
                    </form>
                    
                    <a href="/profesionales/actualizar?id=<?php echo $profesional->id; ?>" class="boton-amarillo">Actualizar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Noticias</h2>

<table class="noticias"> 
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Cabecera</th>
            <th>Imagen</th>
            <th>Autor</th>
            <th>Fecha</th>
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody> <!-- Mostrar los resultados -->
        <?php foreach ($noticias as $noticia): ?>
        <tr>
            <td> <?php echo $noticia->id;?> </td>
            <td> <?php echo $noticia->titulo;?> </td>
            <td> <?php echo $noticia->cabecera;?> </td>
            <td> <img src="../imagenes/<?php echo $noticia->imagen; ?>" class="imagen-tabla"></td>
            <td> <?php echo $noticia->autor; ?> </td>
            <td> <?php echo $noticia->fecha; ?> </td>
            <td> <?php echo $noticia->descripcion; ?> </td>
            
            <td>
                <form method="POST" class="w-100" action="/noticias/eliminar">
                    <input type="hidden" name="id" value="<?php echo $noticia->id; ?>">
                    <input type="hidden" name="tipo" value="noticias">
                    <input type="submit" value="Eliminar" class="boton-rojo">
                </form>
                
                <a href="/noticias/actualizar?id=<?php echo $noticia->id; ?>" class="boton-amarillo">Actualizar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h2>Blog</h2>

<table class="blog"> 
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Fecha</th>
            <th>Cabecera</th>
            <th>Imagen</th>                    
            <th>Descripción</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody> <!-- Mostrar los resultados -->
        <?php foreach ($blogs as $blog): ?>
        <tr>
            <td> <?php echo $blog->id;?> </td>
            <td> <?php echo $blog->titulo;?> </td>
            <td> <?php echo $blog->fecha;?> </td>
            <td> <?php echo $blog->cabecera; ?> </td>
            <td> <img src="../imagenes/<?php echo $blog->imagen; ?>" class="imagen-tabla"></td>
            <td> <?php echo $blog->descripcion; ?> </td>
            
            <td>
                <form method="POST" class="w-100" action="/entradas/eliminar">
                    <input type="hidden" name="id" value="<?php echo $blog->id; ?>">
                    <input type="hidden" name="tipo" value="blog">
                    <input type="submit" value="Eliminar" class="boton-rojo">
                </form>
                
                <a href="/entradas/actualizar?id=<?php echo $blog->id; ?>" class="boton-amarillo">Actualizar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h2>Productos</h2>

<table class="productos"> 
    <thead>
        <tr>
            <th>ID</th>
            <th>Título</th>
            <th>Imagen</th>
            <th>Descripción</th>
            <th>Encontrado</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody> <!-- Mostrar los resultados -->
        <?php foreach ($productos as $producto): ?>
        <tr>
            <td> <?php echo $producto->id;?> </td>
            <td> <?php echo $producto->titulo;?> </td>
            <td> <img src="../imagenes/<?php echo $producto->imagen; ?>" class="imagen-tabla"></td>
            <td> <?php echo $producto->descripcion; ?> </td>
            <td> <?php echo $producto->encontrado; ?> </td>
            
            
            <td>
                <form method="POST" class="w-100" action="/productos/eliminar">
                    <input type="hidden" name="id" value="<?php echo $producto->id; ?>">
                    <input type="hidden" name="tipo" value="productos">
                    <input type="submit" value="Eliminar" class="boton-rojo">
                </form>
                
                <a href="/productos/actualizar?id=<?php echo $producto->id; ?>" class="boton-amarillo">Actualizar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</main>