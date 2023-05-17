<?php
        include("../views/commons/header.php");

        use \model\Utils;
        use \model\Categoria;


        require_once("../model/Utils.php");
        require_once("../model/Categoria.php");


        $gestorCategoria = new Categoria();

        // Nos conectamos a la Bd
        $conexPDO = Utils::conectar();

        $datosCategoria = $gestorCategoria->getAllCategories($conexPDO);

        
?>
    
    <!-- ==================== END OF NAV ==================== -->

    <section class="form__section">
        <div class="container form__section-container">
            <h2 style="color: orange;">Add Product</h2>
            <form action="../controller/add-product.php" method="POST">
                <input type="text" name="nombre" id="nombre" placeholder="Title">
                <textarea rows="4" name="descripcion" id="descripcion" placeholder="Description"></textarea>
                <input type="number" name="precio" id="precio" placeholder="Price">
                <?php
                    print("<select name='categoria_id' id='categoria_id'>");
                    print("<option value=''>Category</option>");
                    for ($i = 0; $i < count($datosCategoria); $i++) {
                        print("<option value=" . $datosCategoria[$i]["id"] .">". $datosCategoria[$i]['nombre'] . "</option>");
                    }
                    print("</select>");
                ?>
                <input type="file" name="imagen" id="imagen" placeholder="Image">
                <input type="hidden" name="usuarios_id" id="usuarios_id" value="<?php echo $_SESSION['id'] ?>">
                <input type="hidden" name="name" id="name" value="<?php echo $_SESSION['nombre'] ?>">
                <input type="hidden" name="lastName" id="lastName" value="<?php echo $_SESSION['apellido'] ?>">
                <input type="hidden" name="imagenUser" id="imagenUser" value="<?php echo $_SESSION['imagen'] ?>">
                <button type="submit" class="btn">Add Product</button>
            </form>
        </div>
    </section>



    <!-- ==================== END OF CATEGORY BUTTONS ==================== -->

    <footer>
        <div class="footer__socials">
            <a href="" target="_blank"><i class="uil uil-youtube"></i></a>
            <a href="" target="_blank"><i class="uil uil-twitter"></i></a>
            <a href="" target="_blank"><i class="uil uil-instagram-alt"></i></a>
        </div>
        <div class="container footer__container">
            <article>
                <h4>Categories</h4>
                <ul>
                    <li><a href="">Business</a></li>
                    <li><a href="">Business</a></li>
                    <li><a href="">Business</a></li>
                    <li><a href="">Business</a></li>
                </ul>
            </article>
            <article>
                <h4>Support</h4>
                <ul>
                    <li><a href="">Business</a></li>
                    <li><a href="">Business</a></li>
                    <li><a href="">Business</a></li>
                    <li><a href="">Business</a></li>
                </ul>
            </article>
            <article>
                <h4>Blog</h4>
                <ul>
                    <li><a href="">Business</a></li>
                    <li><a href="">Business</a></li>
                    <li><a href="">Business</a></li>
                    <li><a href="">Business</a></li>
                </ul>
            </article>
            <article>
                <h4>Permalinks</h4>
                <ul>
                    <li><a href="">Business</a></li>
                    <li><a href="">Business</a></li>
                    <li><a href="">Business</a></li>
                    <li><a href="">Business</a></li>
                </ul>
            </article>
        </div>
        <div class="footer__copyright">
            <small style="color: white;">Copyright &copy; 2023 CARLOS MELERO</small>
        </div>
    </footer>

    <!-- ==================== END OF FOOTER ==================== -->

    <script src="./script/main.js"></script>

</body>
</html>