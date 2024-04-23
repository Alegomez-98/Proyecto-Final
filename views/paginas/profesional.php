<main class="contenedor">
           
           <h1>Servicios</h1>
   
           <div class="contenedor-profesional">
           <div class="imagen">
            <img loading="lazy" src="/imagenes/<?php echo $profesional->imagen; ?>" alt="imagen profesional">
                </div>
                <div class="texto-profesional">
                    <h3><?php echo $profesional->nombre . " " . $profesional->apellido; ?></h3>
                    <h4>Especializado en <?php echo $profesional->especializado; ?></h4>
                    <p>Graduado en <?php echo $profesional->graduado; ?></p>
                    <p><?php echo $profesional->descripcion; ?></p>
                                
                </div>
           </div>
   
           <section class="contenedor seccion">
               <h2>Los precios de mis asesorías online</h2>
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
           </section>
           
         
           
       </main>