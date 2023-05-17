<?php
        include("../views/commons/header.php");
?>
    
    <!-- ==================== END OF NAV ==================== -->

    <div style="margin-top: 15rem; margin-bottom: 15rem;" class="container cart-page">

    <?php
    if (count($datosCarrito) != 0) {
        print("<table style='box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);'>");
            print("<tr>");
                print("<th>Product</th>");
                print("<th>Price</th>");
                print("<th>Delete</th>");
            print("</tr>");
        for($i = 0; $i < count($datosCarrito); $i++) {
            print("<tr style='border-bottom: 1px solid rgba(0, 0, 0, 0.2);'>");
                print("<td>");
                    print("<div class='cart-info'>");
                        print("<img src='../images/". $datosCarrito[$i]["imagen"] ."'>");
                        print("<div style='padding: 15px 5px;'>");
                            print("<h4 style='color: black;'><a href='../controller/product.php?id=" . $datosCarrito[$i]["idProducto"] . "'>". $datosCarrito[$i]["nombre"] ."</a></h4>");
                        print("</div>");
                    print("<div>");
                print("</td>");
                print("<td style='font-weight: bold;'>" . $datosCarrito[$i]["precio"] . " € </td>");
                
                print("<form action='../controller/borrarProductoCarrito.php' method='POST'>");
                    print("<input type='hidden' name='id' id='id' value='" . $datosCarrito[$i]["id"] . "'/>");
                    print("<td><button style='cursor: pointer;' type='submit' class='btn'><i class='uil uil-multiply'></i></button></td>");
                print("</form>");
            print("</tr>");
            
            }
        print("</table>");
    }else {
        if($_SESSION['id'] == '' || $_SESSION['nombre'] == ''){
            print("<h2 style='text-align: center; color:black; text-transform: uppercase;'>Sign in to access the list of featured products</h2>");
        } else {
            print("<h2 style='text-align: center; color:black; text-transform: uppercase;'>Your featured products list is empty</h2>");
        }
        
    }
        
    ?>
    </div>

    <!-- ==================== END OF CATEGORY BUTTONS ==================== -->

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