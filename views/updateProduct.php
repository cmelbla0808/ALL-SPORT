<?php
        include("../views/commons/header.php");

    ?>
    
    <!-- ==================== END OF NAV ==================== -->
    
    <section class="form__section">
        <div class="container form__section-container">
            <h2 style="color: orange;">Edit Product</h2>
            <form id="basic-form" action="../controller/updateProduct.php" method="POST">
                <input name="nombre" id="nombre" type="text" placeholder="Title" minlength="3" value="<?= (isset($datosProducto) ? $datosProducto["nombre"] : "") ?>" require>
                <input type="text" name="descripcion" id="descripcion" rows="4" placeholder="Description" minlength="5" maxlength="250" value="<?= (isset($datosProducto) ? $datosProducto["descripcion"] : "") ?>" required></input>
                <input name="precio" id="precio" type="number" placeholder="Price" value="<?= (isset($datosProducto) ? $datosProducto["precio"] : "") ?>" required>
                
                <?php
                    print("<select name='categoria_id' id='categoria_id'>");
                    print("<option value=''>Category</option>");
                    for ($i = 0; $i < count($datosCategoria); $i++) {
                        print("<option value=" . $datosCategoria[$i]["id"] .">". $datosCategoria[$i]['nombre'] . "</option>");
                    }
                    print("</select>");
                ?>

                <input name="imagen" id="imagen" type="file" placeholder="Image" value="<?= (isset($datosProducto) ? $datosProducto["imagen"] : "") ?>" required>

                <input name="id" id="id" type="hidden" class="form-control" value="<?= (isset($datosProducto) ? $datosProducto["id"] : "") ?>">

                <button type="submit" class="btn">Edit Product</button>
            </form>
        </div>
    </section>


    <!-- ==================== END OF CATEGORY BUTTONS ==================== -->

    <?php
        include("../views/commons/footer.php");
    ?>

    <!-- ==================== END OF FOOTER ==================== -->

    <script src="./script/main.js"></script>

    <script>
        $(document).ready(function() {
            $("#basic-form").validate();
        });
    </script>

</body>
</html>