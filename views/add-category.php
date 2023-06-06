<?php
        include("../views/commons/header.php");

        
?>
    
    <!-- ==================== END OF NAV ==================== -->

    <section class="form__section">
        <div class="container form__section-container">
            <h2 style="color: orange;">Add Category</h2>
            <form action="../controller/add-category.php" method="POST">
                <input type="text" name="nombre" id="nombre" placeholder="Title">
                <textarea rows="4" name="descripcion" id="descripcion" placeholder="Description"></textarea>
                <input type="file" name="imagen" id="imagen" placeholder="Image">
                <button type="submit" class="btn">Add Category</button>
            </form>
        </div>
    </section>

    <!-- ==================== END OF SECTION ==================== -->

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