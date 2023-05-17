<?php
    include("../views/commons/header.php");
?>
    
    <!-- ==================== END OF NAV ==================== -->

    <section class="form__section">
        <div class="container form__section-container">
            <h2 style="color: orange;">Add User</h2>
            <form id="basic-form" action="../controller/add-user.php" method="POST">
                <input name="nombre" id="nombre" type="text" placeholder="Name" minlength="3" required>
                <input name="apellido" id="apellido" type="text" placeholder="Last name" minlength="3" required>
                <input type="email" placeholder="E-mail" id="email" name="email" value='' required />
                <input type="hidden" placeholder="Password" id="password" name="password" value='123456789' minlength="8" required />

                <label style="color: #252b42; font-weight: bold;" for="admin" style="color: #d3aaa2;" class="col-lg-3 col-form-label">Admin</label>
                <select class="form-control w-75" id="admin" name="admin">
                    <option value='0'>No</option>
                    <option value='1'>Si</option>
                </select>

                <label style="color: #252b42; font-weight: bold;" for="edad" style="color: #d3aaa2;" class="col-lg-3 col-form-label">Edad</label>
                <select class="form-control w-75" id="edad" name="edad">
                    <?php
                    //Generamos las option del select edad
                    for ($i = 1; $i <= 120; $i++) {
                        print("<option value='$i'>$i</option>\n ");
                    }
                    ?>
                </select>

                <input name="imagen" id="imagen" type="hidden" class="form-control" value="foto1.avif">

                <button type="submit" class="btn">Add User</button>
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