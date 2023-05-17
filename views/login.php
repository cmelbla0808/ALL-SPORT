<body>

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login page</title>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

        <script src="https://kit.fontawesome.com/41cb8446c6.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link href="../css/login.css" rel="stylesheet" type="text/css">
    </head>
    </head>

    <body>

        <div class="register-popUp">
            <div class="web-left">
                <header>
                    <h1>ALL SPORTS</h1>
                    <div>Login to start</div>
                </header>

                <form id="basic-form" method="POST" action="../controller/loginController.php" class="register">
                    <input type="email" class="un" id="email" placeholder="Enter Email" name="email">
                    <input type="password" class="pass" id="password" placeholder="Enter password" name="password" minlength="8">
                    <br>
                    <button href="../views/index.php" align="center">Login</button>
                    <br>
                    <p class="forgot" align="center"><a href="../views/forgotPassword.php">Forgot Password?</a></p>
                </form>

                <!--
                <div class="join-with-sns">
                    <div>Or join us with social networks</div>
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-google"></i></a>
                </div>
                -->
                
                <div class="log-in">You do not have an account?
                    <!--<button style="background-color: transparent !important; border:none;" type="submit">-->
                    <a href="../views/register.php" id="log-in">Sign up</a>
                    <!--</button>-->
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