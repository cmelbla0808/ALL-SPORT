<?php
        include("../views/commons/header.php");

        
?>
    
    <!-- ==================== END OF NAV ==================== -->

    <section class="form__section">
        <div class="container form__section-container">
            <h2 style="color: orange;">Edit Category</h2>
            <form action="../controller/updateCategory.php" method="POST">
                <input type="hidden" name="id" id="id" placeholder="Title" value="<?= (isset($datosCategoria) ? $datosCategoria["id"] : "") ?>">
                <input type="text" name="nombre" id="nombre" placeholder="Title" value="<?= (isset($datosCategoria) ? $datosCategoria["nombre"] : "") ?>">
                <input rows="4" name="descripcion" id="descripcion" placeholder="Description" value="<?= (isset($datosCategoria) ? $datosCategoria["descripcion"] : "") ?>"></input>
                <input type="file" name="imagen" id="imagen" placeholder="Image" value="<?= (isset($datosCategoria) ? $datosCategoria["descripcion"] : "") ?>">
                <button type="submit" class="btn">Edit Category</button>
            </form>
        </div>
    </section>

    <!-- ==================== END OF SECTION ==================== -->

    <?php
        include("../views/commons/footer.php");
    ?>

    <!-- ==================== END OF FOOTER ==================== -->

    <script src="./script/main.js"></script>



</body>
</html>