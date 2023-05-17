<?php
        include("../views/commons/header.php");

        use \model\Categoria;
        use \model\Utils;

        // Añadimos el código del modelo
        require_once("../model/Categoria.php");
        require_once("../model/Utils.php");

        $gestorCat = new Categoria();

        $datosCategorias = $gestorCat->getAllCategories($conexPDO);

        
?>
    
    <!-- ==================== END OF NAV ==================== -->

    <section class="featured">
        <div class="container feautured__container">
            <div class="post__thumbnail">
                <img src="../images/wallpaper-index-2.jpg">
            </div>
            <div class="post__info">
                <!--
                <a href="#" class="category__button">CLOTHE</a>
                -->
                <h2 class="post__title"><a href="#">WELCOME TO ALL SPORTS</a></h2>
                <p class="post__body">
                Bienvenido a ALL SPORTS, la tienda en línea especializada en productos deportivos de todo tipo.
                <br><br>
                En ALL SPORTS, no solo ofrecemos una amplia selección de productos deportivos de alta calidad, sino que también permitimos que las personas suban sus propios productos para venderlos a otros clientes.
                <br><br>
                En nuestra tienda encontrarás una gran variedad de productos deportivos, desde equipos para deportes de equipo como fútbol, baloncesto, voleibol y béisbol, hasta productos para deportes individuales como running, natación, ciclismo y yoga. También tenemos una selección de ropa deportiva, zapatos, accesorios y suplementos deportivos.
                </p>
                <!--
                <div class="post__author">
                    <div class="post__author-avatar">
                        <img src="../images/foto1.avif">
                    </div>
                    <div class="post__author-info">
                        <h5>By: Carlos Melero </h5>
                        <small>Marzo 27 2023 - 18:13</small>
                    </div>
                </div>
                -->
            </div>
        </div>
    </section>

    <!-- ==================== END OF FEATURED ==================== -->

    <section class="posts">
        <div class="container posts__container"">
            <?php
                for ($i = 0; $i < count($datosProductos); $i++) {
                $idProducto[$i] = $datosProductos[$i]['id'];
                /*print("<form action='../controller/product.php' method='POST'>");*/
                    print("<article class='post'>");
                        print("<div class='post__thumbnail'>");
                            print("<a href='../controller/product.php?id=$idProducto[$i]'><img href='../controller/producto.php?id=$idProducto[$i]' class='image_post' src='../images/" . $datosProductos[$i]["imagen"] ."'></a>");
                        print("</div>");
                        print("<div class='post__info'>");
                        print("<a href='../controller/product.php?id=$idProducto[$i]' class='category__button'>". $datosProductos[$i]["precio"] . "€" ."</a> ");
                        print("<a style='background: transparent; color: #252b42; font-size: 1.5rem;' href='../controller/add-product-carrito.php?id=$idProducto[$i]' class='category__button'><i class='uil uil-heart'></i></a> ");
                        print("<h3 class='post__title'><a href='../controller/product.php?id=$idProducto[$i]'>" . $datosProductos[$i]["nombre"] . "</a></h3>");
                        print("<p class='post__body'>");
                        print(substr($datosProductos[$i]["descripcion"], 0, 90) . "...");
                        print("</p>");
                        print("<div class='post__author'>");
                            print("<div class='post__author-avatar'>");
                                print("<img src='../images/" . $datosProductos[$i]["imagenUser"] ."'>");
                            print("</div>");
                            print("<div class='post__author-info'>");
                                print("<h5 style='color: orange;'>By: " . $datosProductos[$i]["name"] . " " . $datosProductos[$i]["lastName"] . "</h5>");
                                print("<small>" . $datosProductos[$i]["fecha_registro"] . "</small>");
                            print("</div>");
                        print("</div>");
                        print("</div>");
                    print("</article>");
                /*print("</form>");*/
                }
            ?>
        </div>
    </section>

    <!-- ==================== END OF POSTS ==================== -->

    <section class="category__buttons">
        <div class="container category__buttons-container">
            <?php
            for ($i = 0; $i < count($datosCategorias); $i++) {
                print("<a href='' class='category__button'>". $datosCategorias[$i]["nombre"] . "</a>");
            }

            ?>
        </div>
    </section>

    <!-- ==================== END OF CATEGORY BUTTONS ==================== -->

    <?php
        include("../views/commons/footer.php");
    ?>

    <!-- ==================== END OF FOOTER ==================== -->

    <div class="floating-container">
        <a href="../controller/chatUser.php"><div class="floating-button"><i font-size: 2rem;" class='uil uil-chat'></i></div></a>
    </div>

    <!-- ==================== END OF FLOATING BUTTON ==================== -->

    <script src="./script/main.js"></script>

</body>
</html>