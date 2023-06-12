<?php

namespace views;

session_start();
error_reporting(0);

$url_avatar = "../images/" . $_SESSION['imagen'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" type="image/jpg" href="../images/favIcon.webp"/>

    <link href="../css/chat.css" rel="stylesheet" type="text/css">

    <!-- ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Document</title>
</head>

<body>

    <main>
        <div class="container" id="miTabla" style="-webkit-box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.75); -moz-box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.75); box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.75);">
            
            <section class="menu">
                <header>
                    <form action="">
                        <input type="text" id="search" name="search" placeholder="Search">
                    </form>
                    <div class="create">
                        <i class="far fa-edit"></i>
                    </div>
                </header>
                <div class="members">
                    <ul>
                        <?php
                        for ($i = 0; $i < count($datosChat); $i++) {
                            print("<a href='../controller/mensageChat.php?id=" . $datosChat[$i]['id'] . "' class='chatIzq''>");
                            print("<li class='member'>");
                            print("<img src='../images/". $datosChat[$i]['imagen'] ."' alt=''>");
                            print("<div class='name' >");
                            print("<h3 class='name2' style='color: black;'>" . $datosChat[$i]['nombreProducto']  . "</h3>");
                            print("<p>" . $datosChat[$i]['nombreVendedor'] . "</p>");
                            print("</div>");
                            print("</li>");
                            print("</a>");
                        }
                        ?>
                    </ul>
                </div>
            </section>

            <section class="chat">
                <header style="display: flex; flex-direction:row; justify-content: space-between;">
                    <h3><span class="to">To:</span><?php echo $chat['nombreProducto']  ?></h3>
                    <a style="color:orange; text-decoration:none" href="../controller/mainController.php">BACK</a>
                </header>
                <div class="chat-page">
                    
                    <div class="messages" id="miTabla">
                        <?php

                        for ($i = 0; $i < (count($mensage) - 2); $i++) {

                            if ($mensage[$i]['idUsuario'] == $_SESSION['id']) {
                                print("<p class='me'>" . $mensage[$i]['mensage'] . "</p>");
                            }else {
                                print("<p class='friend'>" . $mensage[$i]['mensage'] . "</p>");
                            }
                        }

                        ?>

                    </div>
                    <form action="../controller/add-mensage.php" method="POST" class="send">
                        <i class="fas fa-paperclip"></i>
                        <input type="text" id="message" name="message">
                        <?php
                        print("<input type='hidden' name='idUsuario' id='idUsuario' value='" . $_SESSION['id'] . "'/>");
                        print("<input type='hidden' name='idChat' id='idChat' value='" . $chat['id'] . "'/>");
                        ?>
                        <i class="far fa-smile"></i>
                        <button type="submit">
                            <i class="uil uil-message"></i>
                        </button>
                    </form>
                </div>
            </section>
        </div>
    </main>
    
    <script>
        document.addEventListener("keyup", e=>{

            if (e.target.matches("#search")) {

                document.querySelectorAll(".chatIzq").forEach(articulo => {
                    articulo.querySelector(".name2").textContent.toLocaleLowerCase().includes(e.target.value.toLocaleLowerCase())
                    ?articulo.classList.remove("filtro")
                    :articulo.classList.add("filtro")
                })
            }
        })
    </script>

</body>

</html>