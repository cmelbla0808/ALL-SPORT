<body>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Register page</title>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

        <script src="https://kit.fontawesome.com/41cb8446c6.js" crossorigin="anonymous"></script>

        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

        <link href="../css/login.css" rel="stylesheet" type="text/css">


    </head>
    </head>

    <body>

        <?php
        //Definimos el destino de el formulario
        $url_destino = "../controller/registerController.php";
        ?>

        <div class="register-popUp">
            <div class="web-left">
                <header>
                    <h1>ALL SPORTS</h1>
                    <div>Please create an account to start</div>
                </header>

                <form id="basic-form" method="POST" action="<?= $url_destino ?>" class="register">
                    <input type="text" placeholder="First Name" id="nombre" name="nombre" value='' minlength="3" required />
                    <input type="text" placeholder="Last Name" id="apellido" name="apellido" value='' minlength="3" required />
                    <input type="email" placeholder="E-mail" id="email" name="email" value='' required />
                    <input type="password" placeholder="Password" id="password" name="password" value='' minlength="8" required />
                    <input type="password" placeholder="Confirmar Password" id="passwordConfirm" name="passwordConfirm" value='' minlength="8" required />
                    <input name="imagen" id="imagen" type="hidden" class="form-control" value="noFoto.jpg">

                    <div class=" form-group row mb-sm-2 mt-sm-2 ">
                        <label for="edad" style="color: #d3aaa2;" class="col-lg-3 col-form-label">Edad</label>
                        <select class="form-control w-75" id="edad" name="edad">
                            <?php
                            //Generamos las option del select edad
                            for ($i = 1; $i <= 120; $i++) {
                                print("<option value='$i'>$i</option>\n ");
                            }
                            ?>
                        </select>
                    </div>

                    <br>
                    <button href="../views/confirmUser.php" align="center" onclick="enviarCorreo()">Register</button>
                </form>

                <!--
            <div class="join-with-sns">
                <div>Or join us with social networks</div>
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-google"></i></a>
            </div>
            -->
                <br>

                <div class="log-in">Already have an account?
                    <a href="../views/login.php" id="log-in">Login</a>
                </div>
            </div>
            <div class="web-right">
                <img src="../images/login-allsports.png" alt="wallpaper">
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $("#basic-form").validate();
            });
        </script>
    </body>