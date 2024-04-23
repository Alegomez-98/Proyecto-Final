<?php
    use App\Servicio;

    $servicios = Servicio::all();


?>

<div class="contenedor-asesoria">
    <div class="asesoria">
        <h3>Primera Consulta</h3>
        <h4>50€</h4>
            <ul>
                <li>1 sesión de 1 hora de duración </li>
                <li>Revisión de los habitos alimentarios</li>
                <li>Menú de una semana personalizado</li>
                <li>Pautas de alimentación</li>
                <li>Lista de la compra</li>
                <li>Recetas para elaborar menús</li>
                
            </ul>
    </div>

    <?php foreach($servicios as $servicio): ?>
    <div class="asesoria">
        <h3> <?php echo $servicio->titulo;?> </h3>
        <h4><?php echo $servicio->precio;?> €/mes</h4>
            <ul>
                <li> <?php echo $servicio->menu;?> </li>
                <li> <?php echo $servicio->pautas;?> </li>
                <li> <?php echo $servicio->revision;?> </li>
                <li> <?php echo $servicio->contacto;?> </li>
                <li> <?php echo $servicio->lista;?> </li>
                <li> <?php echo $servicio->receta;?> </li>
            </ul>
    </div>
    <?php endforeach; ?>
</div>

<?php
