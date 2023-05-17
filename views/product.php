<?php
            include("../views/commons/header.php");
    ?>
    
    <!-- ==================== END OF NAV ==================== -->

    <section class="singlepost">
        <div class="container singlepost__container">
            <h2 style="text-align: center;"><?php echo ($productoView["nombre"]); ?></h2>
            <div class="singlepost__thumbnail">
                <?php
                    print("<img src='../images/" . $productoView["imagen"] ."'>");
                ?>
            </div>
            <div class="post__author">
                <div class="post__author-avatar">
                    <?php
                        print("<img src='../images/" . $productoView["imagenUser"] ."'>");
                    ?>
                </div>
                <div class="post__author-info">
                    <h5>By: <?php echo($productoView["name"] . " " . $productoView["lastName"])  ?></h5>
                    <small style="color: gray;"><?php echo ($productoView["fecha_registro"]) ?></small>
                </div>
                <a style="transform: none;" class='category__button'><?php echo ($productoView["precio"]) ?> €</a>
            </div>
            <p style="margin-bottom: 20px;"><?php echo ($productoView["descripcion"]) ?></p>
            <a style="color: white; display:flex; justify-content: center;" href="../controller/add-chat.php?nombreProducto=<?php echo ($productoView["nombre"]); ?>&imagen=<?php echo ($productoView["imagen"]); ?>&idUsuario1=<?php echo $_SESSION['id'] ?>&idUsuario2=<?php echo $productoView["usuarios_id"] ?>&nombreVendedor=<?php echo ($productoView["name"] . " " . $productoView["lastName"]) ?>"> 
                <p style="background: var(--color-orange); border-radius: 10px; font-size: 15px; padding: 8px; cursor: pointer;"> Chat <i class='uil uil-chat'></i></p>
            </a>
        </div>
    </section>
    
    <!-- ==================== END OF SINGLE POST ==================== -->

    <?php
        include("../views/commons/footer.php");
    ?>

    <!-- ==================== END OF FOOTER ==================== -->

    <div class="floating-container">
        <a href="../controller/chatUser.php"><div class="floating-button"><i font-size: 2rem;" class='uil uil-chat'></i></div></a>
        <!--<a href="./add-product.php"><div class="floating-button"><img src="../images/iconos/plus.png" alt=""></div></a>-->
    </div>

    <!-- ==================== END OF FLOATING BUTTON ==================== -->

    <script src="./script/main.js"></script>
    
</body>
</html>