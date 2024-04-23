<main class="contenedor">
           
           <h1>Servicios</h1>   
           
           <section class="contenedor seccion">
               <h2>¿Buscas Nutricionista?</h2>
               <div class="superior">
                   <div class="imagen">
                       <picture>
                           <source srcset="build/img/fotoservicios.webp" type="image/webp">
                           <source srcset="build/img/fotoservicios.jpg" type="image/jpg">
                           <img loading="lazy" src="build/img/fotoservicios.jpg" alt="Imagen Noticia 1">
                       </picture>
                   </div>
                   <div class="texto-servicios">
                       <h3>En Nutrium te ayudamos a planificar tu alimentación on-line</h3>
                       <p>En Nutrium contamos con Dietistas Nutricionistas especializados en diversas áreas de la nutrición. Ofrecemos servicios pérdida de peso, nutrición deportiva, embarazo, pediatría...
                       Puedes solicitar nuestros servicios online a través de nuestro formulario de contacto.</p>
                       <a href="" class="boton-inlineblock">Contáctanos</a>
                   </div>
                   <div class="iconos-servicios">
                       <div class="icono">
                           <img class="icon" src="build/img/cuaderno.svg" alt="Icono Cuaderno" loading="lazy">
                           <p>Menús y pautas semanales personalizados</p>
                       </div>
       
                       <div class="icono">
                           <img class="icon" src="build/img/comunicacion.svg" alt="Icono Comunicación" loading="lazy">
                           <p>Comunicación constante con tu nutricionista.</p>
                       </div>
       
                       <div class="icono">
                           <img class="icon" src="build/img/bascula.svg" alt="Icono Báscula" loading="lazy">
                           <p>Dietas flexibles, no restrictivas.</p>
                       </div>
       
                       <div class="icono">
                           <img class="icon" src="build/img/bolsacompra.svg" alt="Icono Bolsa de la Compra" loading="lazy">
                           <p>Menús con recetas y lista de la compra.</p>
                       </div>
                   </div>
                  
                  
               </div>
           </section>
   
           <div class="contenedor-profesionales">
           <?php foreach($profesionales as $profesional): ?>
               <div class="profesional">
               
                   <picture>
                   <img loading="lazy" src="/imagenes/<?php echo $profesional->imagen; ?>" alt="imagen profesional 1">
                   <h4><?php echo $profesional->especializado; ?></h3>
                       <a class="boton-block" href="/profesional?id=<?php echo $profesional->id;?> ">Ver Profesional</a>
               
               </div>
               <?php endforeach; ?>
           </div>
          
       </main>
   