<?php
        include("../views/commons/header.php");
?>
    
    <!-- ==================== END OF NAV ==================== -->

    <div class="containerForm">
        <div class="item">
            <div class="contactForm">
                <div class="firstText">Let`s get in touch</div>
                <img src="../images/contactUs-vector.png" class="imagenForm">
            </div>
            <div class="submitForm">
                <h4 class="thirdText textStyle">Contact Us</h4>
                <form class="styleForm" action="">
                    <div class="input-box">
                        <input type="text" class="inputForm" required>
                        <label for="">Name</label>
                    </div>
                    <div class="input-box">
                        <input type="email" class="inputForm" required>
                        <label for="">Email</label>
                    </div>
                    <div class="input-box">
                        <input type="number" class="inputForm" required>
                        <label for="">Phone</label>
                    </div>
                    <div class="input-box">
                        <textarea name="" id="message" cols="30" rows="10" class="inputForm" required></textarea>
                        <label for="">Message</label>
                    </div>
                    <button type="submit" class="btnForm">Enviar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- ==================== END OF CATEGORY BUTTONS ==================== -->

    <?php
        include("../views/commons/footer.php");
    ?>

    <!-- ==================== END OF FOOTER ==================== -->

    <script src="./script/main.js"></script>

</body>
</html>