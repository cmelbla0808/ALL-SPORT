<?php
        include("../views/commons/header.php");

        use \model\Categoria;
        use \model\Utils;

        // Añadimos el código del modelo
        require_once("../model/Categoria.php");
        require_once("../model/Utils.php");

        $gestorCat = new Categoria();

        // Nos conectamos a la Bd
        $conexPDO = Utils::conectar();
        $datosCategorias = $gestorCat->getAllCategories($conexPDO);
    ?>
    
    <!-- ==================== END OF NAV ==================== -->

    <section class="search__bar">
        <form class="container search__bar-container" action="">
            <div>
                <i class="uil uil-search"></i>
                <input type="search" name="" placeholder="Search">
            </div>
            <button type="submit" class="btn">Go</button>
        </form>
    </section>

    <!-- ==================== END OF SEARCH BAR ==================== -->


    <section class="posts">
        <div class="container posts__container">
        <?php

        for ($i = 0; $i < count($datosCategorias); $i++) {
            print("<article class='post'>");
                print("<div class='post__thumbnail'>");
                    print("<img class='image_post' src=../images/" . $datosCategorias[$i]["imagen"] .">");
                print("</div>");
                print("<div class='post__info'>");
                //print("<a href='#' class='category__button'>". $datosCategorias[$i]["nombre"] ."</a>");
                print("<h3 class='post__title'><a href='post.php'>". $datosCategorias[$i]["nombre"] . "</a></h3>");
                print("<p class='post__body'>");
                    print($datosCategorias[$i]["descripcion"]);
                print("</p>");
                /*
                print("<div class='post__author'>");
                    print("<div class='post__author-avatar'>");
                        print("<img src='../images/foto1.avif'>");
                    print("</div>");
                    print("<div class='post__author-info'>");
                        print("<h5>By: Carlos Melero </h5>");
                        print("<small>Marzo 27 2023 - 18:13</small>");
                    print("</div>");
                print("</div>");
                */
                print("</div>");
            print("</article>");
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