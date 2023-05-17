<?php
        include("../views/commons/header.php");
?>
    
    <!-- ==================== END OF NAV ==================== -->    
    
    <section class="dashboard">
        <div class="container dashboard__container">
            <aside>
                <ul>
                    <li><a href="../views/add-product.php"><i class="uil uil-pen"></i>
                        <h5>Add Product</h5>
                    </a></li>
                    <li><a href="../controller/controller-manageProduct.php" class="active"><i class="uil uil-postcard"></i>
                        <h5>Manage Product</h5>
                    </a></li>
                    <?php
                    if ($_SESSION['admin'] == "1") {
                        echo "<li><a href='../views/add-category.php'><i class='uil uil-edit'></i>";
                            echo "<h5>Add Category</h5>";
                        echo "</a></li>";
                        echo "<li><a href='../controller/controller-manageCategories.php'><i class='uil uil-list-ul'></i>";
                            echo "<h5>Manage Category</h5>";
                        echo "</a></li>";
                        echo "<li><a href='../views/add-user.php'><i class='uil uil-user-plus'></i>";
                            echo "<h5>Add User</h5>";
                        echo "</a></li>";
                        echo "<li><a href='../controller/controller-manageUser.php'><i class='uil uil-users-alt'></i>";
                            echo "<h5>Manage User</h5>";
                        echo "</a></li>";
                    }
                    ?>
                </ul>
            </aside>
            <main>
                <h2>Manage Products</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
                        for ($i = 0; $i < count($datosProductos); $i++) {
                            print("<tr>");
                                
                                print("<td style='color: white';>" . $datosProductos[$i]["nombre"] . "</td>");

                                print("<form action='../controller/showUpdateProduct.php' method='POST'>");
                                print("<input type='hidden' name='id' id='id' value='" . $datosProductos[$i]["id"] . "'/>");
                                /*
                                print("<input type='hidden' name='nombre' id='nombre' value='" . $datosProductos[$i]["nombre"] . "'/>");
                                print("<input type='hidden' name='descripcion' id='descripcion' value='" . $datosProductos[$i]["descripcion"] . "'/>");
                                print("<input type='hidden' name='precio' id='precio' value='" . $datosProductos[$i]["precio"] . "'/>");
                                print("<input type='hidden' name='imagen' id='imagen' value='" . $datosProductos[$i]["imagen"] . "'/>");
                                print("<input type='hidden' name='categoria_id' id='categoria_id' value='" . $datosProductos[$i]["categoria_id"] . "'/>");
                                /*print("<td><button name='modificar' value='false' href='' class='btn sm'>Edit</button></td>");*/
                                print("<td><button class='btn sm'>Update</button></td>");
                                print("</form>");

                                print("<form action='../controller/borrarProducto.php' method='POST'>");
                                print("<input type='hidden' name='id' id='id' value='" . $datosProductos[$i]["id"] . "'/>");
                                print("<td><button href='' class='btn sm danger'>Delete</button></td>");
                                print("</form>");
                            print("</tr>");
                        }   
                        ?>
                    </tbody>
                </table>
            </main>
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