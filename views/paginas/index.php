<main class="contenedor seccion">
           
           <h1>¿Quiénes Somos?</h1>
   
           <div class="iconos-nosotros">
               <div class="icono">
                   <img class="icon" src="build/img/manzana.svg" alt="Icono Manzana" loading="lazy">
                   <h3>Profesionales</h3>
                   <p>Somos un grupo de profesionales dedicados al mundo de la nutrición. Nuestro objetivo principal es que las personas consigar cambiar sus hábitos a unos más saludables.</p>
               </div>
               <div class="icono">
                   <img class="icon" src="build/img/reloj.svg" alt="Icono Reloj" loading="lazy">
                   <h3>A Tiempo</h3>
                   <p>Garantizamos unos de los mejores tiempos de respuesta del mercado, tanto a la hora de contestar a vuestros mensajes como en la preparación de la planificación nutricional.</p>
               </div>
               <div class="icono">
                   <img class="icon" src="build/img/empatia.svg" alt="Icono Empatia" loading="lazy">
                   <h3>Empatía</h3>
                   <p>Uno de nuestros puntos a destacar es la relación con el cliente. Desarrollamos una relación de confianza con el mismo, para que se sientan seguros de a la hora de contratar nuestros servicios.</p>
               </div>
           </div>
       </main>
   
       <section class="seccion contenedor">
           <h1>Nuestros Especialistas y Sus Servicios</h1>
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
       </section>
   
       <section class="imagen-contacto">
           <h2>No esperes a cambiar tus hábitos</h2>
           <p>Rellena este formulario de contacto y nos pondremos en contacto contigo</p>
           <a href="contacto.php" class="boton-inlineblock">Contáctanos</a>
       </section>
   
       <section class="seccion contenedor">
           <h1>Noticias</h1>
           <div class="contenedor-noticias">
               
             <?php 
             include "listado.php"; 
             ?>
               
           </div> <!-- .contenedor-noticias-->
   
           <div class="alinear-derecha">
               <a href="/noticias" class="boton-inlineblock">Ver todas</a>
           </div>
   
       </section>
   
       <div class="contenedor seccion seccion-inferior">
           <section class="blog">
               <h3>Nuestro Blog</h3>
   
              <?php include "blog.php"; ?>
              
           </section>
   
           <section class="testimoniales">
               <h3>Testimoniales</h3>
               <div class="testimonial">
                   <blockquote>
                       El equipo de NutriPlus es el mejor en este sector. Te hacen sentir como si los conocieras
                       de toda la vida. Por no hablar de que son los mejores consiguiendo resultados.
                   </blockquote>
                   <p>- Pedro García</p>
               </div>
               <div class="testimonial">
                   <blockquote>
                      Jamás había conseguido cambiar mi estilo de vida, hasta que conocía a los especialistas de NutriPlus.
                      Ojalá todos los profesionales ofrecieran la atención que ofrecen ellos.
                   </blockquote>
                   <p>- Marta Sánchez</p>
               </div>
           </section>
       </div>
   
       <section class="seccion contenedor">
           <h2>Productos Recomendados</h2>
           <div class="contenedor-productos">
           <?php include "productos.php"; ?>
           
   
           </div>
       </section>