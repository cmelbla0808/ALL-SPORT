<?php
        include("../views/commons/header.php");

        $idNombreCategoria = $_GET['id'] - 1;
?>
    
    <!-- ==================== END OF NAV ==================== -->

    
    
    <section class="search__bar">
        <div class="container" style="text-align: center;">
                <?php print("<h1 style='color: #252b42;'>" . $datosCategorias[$idNombreCategoria]['nombre'] . "</h1>") ?>
        </div>
    </section>

    <!-- ==================== END OF SEARCH BAR ==================== -->
<?php
    if (count($datosProductos) != 0) {
    print("<section class='posts'>");
        print("<div class='container posts__container'>");
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
                }
        print("</div>");
    print("</section>");
    }else {
        print("<div class='container' style='text-align: center;'>");
            print("<h2 style='color:black; text-transform: uppercase;'>No hay articulos de esta categoria</h2>");
        print("</div>");
    }
            
    ?>

    <!-- ==================== END OF POSTS ==================== -->
    
    
    <section class="category__buttons">
        <div class="container category__buttons-container">
            <?php
            for ($i = 0; $i < count($datosCategorias); $i++) {
                $idCategoria[$i] = $datosCategorias[$i]['id'];
                print("<a href='../controller/productsForCategory.php?id=$idCategoria[$i]' class='category__button'>". $datosCategorias[$i]["nombre"] . "</a>");
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