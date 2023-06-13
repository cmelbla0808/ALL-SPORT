<?php
            use \model\Categoria;
            use \model\Utils;
    
            // Añadimos el código del modelo
            require_once("../model/Categoria.php");
            require_once("../model/Utils.php");
    
            $gestorCat = new Categoria();
    
            $datosCategorias = $gestorCat->getAllCategories($conexPDO);
?>

<footer>
        <div class="footer__socials">
            <a href="https://www.youtube.com/" target="_blank"><i class="uil uil-youtube"></i></a>
            <a href="https://twitter.com/?lang=es" target="_blank"><i class="uil uil-twitter"></i></a>
            <a href="https://www.instagram.com/" target="_blank"><i class="uil uil-instagram-alt"></i></a>
        </div>
        <div class="container footer__container">
            <article>
                <h4>Categories</h4>
                <ul>
                    <?php
                        for ($i = 0; $i < count($datosCategorias); $i++) {
                            print("<li><a href='../controller/productsForCategory.php?id=$idCategoria[$i]'>" . $datosCategorias[$i]['nombre'] . "</a></li>");
                        }
                    ?>
                </ul>
            </article>
            <article>
                <h4>Support</h4>
                <ul>
                    <li><a href="">Frequent questions</a></li>
                    <li><a href="">Policies and terms of use</a></li>
                    <li><a href="">Company information</a></li>
                </ul>
            </article>
            <article>
                <h4>Permalinks</h4>
                <ul>
                    <li><a href="../controller/mainController.php">Home</a></li>
                    <li><a href="../views/search.php">Search</a></li>
                    <li><a href="../controller/controller-manageShoppingCart.php">Favorites</a></li>
                    <li><a href="../views/contactUs.php">Contact</a></li>
                </ul>
            </article>
        </div>
        <div class="footer__copyright">
            <small style="color: white;">Copyright &copy; 2023 CARLOS MELERO</small>
        </div>
    </footer>