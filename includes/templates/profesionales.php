<?php
    
    use App\Profesional;

    $id = $_GET["id"];
    $id = filter_var($id, FILTER_VALIDATE_INT);

    if (!$id){
        header("Location: /");
    }

    
    //Obtener los datos deL profesional
    $profesional = Profesional::find($id);


?>

<div class="imagen">
    <img loading="lazy" src="/imagenes/<?php echo $profesional->imagen; ?>" alt="imagen profesional">
</div>
<div class="texto-profesional">
    <h3><?php echo $profesional->nombre . " " . $profesional->apellido; ?></h3>
    <h4>Especializado en <?php echo $profesional->especializado; ?></h4>
    <p>Graduado en <?php echo $profesional->graduado; ?></p>
    <p><?php echo $profesional->descripcion; ?></p>
                
</div>