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

    <title>ALL SPORTS</title>
</head>

<body>

    <main>
        <div class="container">
            <section class="menu" style="-webkit-box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.75); -moz-box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.75); box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.75);">
                <header>
                    <h3>Chats</h3>
                </header>
                <div class="members">
                    <ul>
                        <?php
                        if (count($datosChat) != 0) {
                            for ($i = 0; $i < count($datosChat); $i++) {
                                print("<li class='member'>");
                                    print("<img src='../images/". $datosChat[$i]['imagen'] . "' alt=''>");
                                    print("<div class='name'>");
                                        print("<h3>". $datosChat[$i]['nombreProducto'] ."</h3>");
                                        print("<p>Seller = " . $datosChat[$i]['nombreVendedor'] . "</p>");
                                        print("<span style='color: white; display: flex; justify-content: space-between; width: 70px; align-items: center;' class='date'>
                                                <a href='../controller/mensageChat.php?id=" . $datosChat[$i]['id'] . "' style='background: #ff7b47; border-radius: 10px; font-size: 15px; padding: 8px; cursor: pointer;'>
                                                    <i style='color: white;' class='uil uil-chat'></i>
                                                </a>
                                                <a href='../controller/borrarChat.php?id=" . $datosChat[$i]['id'] . "' style='background: #ff7b47; border-radius: 10px; font-size: 15px; padding: 8px; cursor: pointer;'>
                                                    <i style='color: white;' class='uil uil-multiply'></i>
                                                </a>
                                            </span>");
                                    print("</div>");
                                print("</li>");
                            }
                        } else {
                            if($_SESSION['id'] == '' || $_SESSION['nombre'] == ''){
                                print("<h2 style='text-align: center; color:black; text-transform: uppercase;'>Sign in to access the chats</h2>");
                            } else {
                                print("<h2 style='text-align: center; color:black; text-transform: uppercase;'>Your chat list is empty</h2>");
                            }
                        }

                        
                        ?>
                    </ul>
                </div>
                <div style="text-align: center; margin-top: 50px;">
                    <a class="goHome" href="../controller/mainController.php">HOME</a>
                </div>
            </section>
        </div>
    </main>

</body>


</html>