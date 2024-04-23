<?php
    use App\Blog;
    $blogs = Blog::all();
?>

<?php foreach ($blogs as $blog): ?>
    <article class="entrada-blog">
                <div class="imagen">
                    <img loading="lazy" src="/imagenes/<?php echo $blog->imagen; ?>" alt="Imagen Blog">
                </div>
                <div class="texto-entrada">
                    <a href="entrada-blog.php?id=<?php echo $blog->id;?>">
                        <h4><?php echo $blog->titulo; ?></h4>
                        <p>Escrito el: <span><?php echo $blog->fecha; ?></span> por: <span>Admin</span></p>

                        <p><?php echo $blog->cabecera; ?></p>
                    </a>
                </div>
            </article>
<?php endforeach; ?>