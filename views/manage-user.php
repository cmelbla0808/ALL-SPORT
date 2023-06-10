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
                    <li><a href="../controller/controller-manageProduct.php"><i class="uil uil-postcard"></i>
                        <h5>Manage Product</h5>
                    </a></li>
                    <li><a href="../views/add-category.php"><i class="uil uil-edit"></i>
                        <h5>Add Category</h5>
                    </a></li>
                    <li><a href="../controller/controller-manageCategories.php"><i class="uil uil-list-ul"></i>
                        <h5>Manage Category</h5>
                    </a></li>
                    <li><a href="../views/add-user.php"><i class="uil uil-user-plus"></i>
                        <h5>Add User</h5>
                    </a></li>
                    <li><a href="../controller/controller-manageUser.php" class="active"><i class="uil uil-users-alt"></i>
                        <h5>Manage User</h5>
                    </a></li>
                </ul>
            </aside>
            <main>
                <h2>Manage Users</h2>
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
                            for ($i = 0; $i < count($datosUsuarios); $i++) {
                                print("<tr>");
                                print("<td>" . $datosUsuarios[$i]['nombre']  ."</td>");
                                
                                print("<form action='../controller/showUpdateUserAdmin.php' method='POST'>");
                                print("<input type='hidden' name='id' id='id' value='" . $datosUsuarios[$i]["id"] . "'/>");
                                print("<td><button href='' class='btn sm'>Edit</button></td>");
                                print("</form>");

                                print("<form action='../controller/borrarUser.php' method='POST'>");
                                print("<input type='hidden' name='id' id='id' value='" . $datosUsuarios[$i]["id"] . "'/>");
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