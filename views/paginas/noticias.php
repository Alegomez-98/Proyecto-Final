<main class="contenedor seccion">
           
           <h1>Noticias de alimentación, nutrición y dietética</h1>
   
           <div class="seccion-noticias">
           <?php foreach ($noticias as $noticia): ?>
               <div class="contenedor-noticia">
               
                   <img loading="lazy" src="/imagenes/<?php echo $noticia->imagen; ?>" alt="Imagen Noticia 1">
                   <div class="texto-noticia">
                       <h4> <?php echo $noticia->titulo; ?> </h4>
                       <a href="/noticia?id=<?php echo $noticia->id;?>" class="boton-inlineblock">Leer más</a>
                   </div>
               </div>
           <?php endforeach; ?>
   
           </div> <!-- .contenedor-noticias-->
   
           <section class="texto-noticias">
                   <h4>Noticias de NutriPlus</h4>
                   <h4>¿Quieres estar al tanto de todo lo que ocurre en nuestro centro Nutrium?</h4> 
                   <h4>¿Te gustaría mantenerte informado sobre actualizaciones y noticias importantes en materia de nutrición? Ésta es tu sección. </h4>
                   <p>En este apartado “noticias” es el lugar donde nuestros lectores podrán mantenerse informado acerca de todas estas actividades y nuevos proyectos en los que nos vamos embarcando cada año, porque si algo nos gusta es la creatividad y en la imaginación no hay límites. Por este motivo, consideramos que a la hora de trabajar tampoco hay topes, siempre se puede hacer algo nuevo y contarlo. </p>
                   <p>Todo aquello que a nosotros nos resulta interesante lo compartimos para nuestra familia virtual, porque consideramos que la información hoy en día es fundamental, no sólo para cuidar la salud de la población sino también para dar a conocer nuestro trabajo, nuestro modo de ver la educación nutricional, nuestro equipo y nuestros contenidos. </p>
           </section>
   
           
          
           
       </main>