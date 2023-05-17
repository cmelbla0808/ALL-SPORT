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

    <link href="../css/chat.css" rel="stylesheet" type="text/css">

    <!-- ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Document</title>
</head>

<body>

    <main>
        <div class="container">
            <!--
            <section class="menu">
                <header>
                    <form action="">
                        <input type="search" name="search" placeholder="Search">
                    </form>
                    <div class="create">
                        <i class="far fa-edit"></i>
                    </div>
                </header>
                <div class="members">
                    <ul>
                        <li class="member">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSImhrk_R9iC1DtID7a9M7ouwDtvB_ourZY5w&usqp=CAU" alt="">
                            <div class="name">
                                <h3>thomas bangalter</h3>
                                <p>i was wondering ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</p>
                                <span class="date">2:09 pm</span>
                            </div>
                        </li>
                        <li class="member">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQy8_l-NUc-I5HoS2FQzrljDd5rrbLQqULorw&usqp=CAU" alt="">
                            <div class="name">
                                <h3>dog woofson</h3>
                                <p>i've forgotten how it felt bbbbbbbbbbbbbbbbbb</p>
                                <span class="date">1:44 pm</span>
                            </div>
                        </li>
                        <li class="member">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpq-D_mNYfW531QWhAc1fVqW2XWdO9fCzO6Q&usqp=CAU" alt="">
                            <div class="name">
                                <h3>louis CK</h3>
                                <p>but we're probably gonna aaaaaaaaaaaaaaaaaaa</p>
                                <span class="date">2:09 pm</span>
                            </div>
                        </li>
                        <li class="member">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaTEJLWAoRb2Iq93oKlvjIkdiDyZ9mGHQ3dw&usqp=CAU" alt="">
                            <div class="name">
                                <h3>bo jackson</h3>
                                <p>it's not that bad ddddddddddddddddddddddddddddddd</p>
                                <span class="date">2:09 pm</span>
                            </div>
                        </li>
                        <li class="member">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVguuSK25N-_2r6B9vp5J-TreN3462dPTQAw&usqp=CAU" alt="">
                            <div class="name">
                                <h3>michael jordan</h3>
                                <p>wasup for the third time li lllllllllllllllllll</p>
                                <span class="date">2:09 pm</span>
                            </div>
                        </li>
                        <li class="member active">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIvNRAu6lhqeqH0fexU5NtocTVa9eW7XZWsA&usqp=CAU" alt="">
                            <div class="name">
                                <h3>drake</h3>
                                <p>howdoyoudospace</p>
                                <span class="date">2:09 pm</span>
                            </div>
                        </li>
                        <li class="member">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSImhrk_R9iC1DtID7a9M7ouwDtvB_ourZY5w&usqp=CAU" alt="">
                            <div class="name">
                                <h3>thomas bangalter</h3>
                                <p>i was wondering ddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd</p>
                                <span class="date">2:09 pm</span>
                            </div>
                        </li>
                        <li class="member">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQy8_l-NUc-I5HoS2FQzrljDd5rrbLQqULorw&usqp=CAU" alt="">
                            <div class="name">
                                <h3>dog woofson</h3>
                                <p>i've forgotten how it felt bbbbbbbbbbbbbbbbbb</p>
                                <span class="date">1:44 pm</span>
                            </div>
                        </li>
                        <li class="member">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTpq-D_mNYfW531QWhAc1fVqW2XWdO9fCzO6Q&usqp=CAU" alt="">
                            <div class="name">
                                <h3>louis CK</h3>
                                <p>but we're probably gonna aaaaaaaaaaaaaaaaaaa</p>
                                <span class="date">2:09 pm</span>
                            </div>
                        </li>
                        <li class="member">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSaTEJLWAoRb2Iq93oKlvjIkdiDyZ9mGHQ3dw&usqp=CAU" alt="">
                            <div class="name">
                                <h3>bo jackson</h3>
                                <p>it's not that bad ddddddddddddddddddddddddddddddd</p>
                                <span class="date">2:09 pm</span>
                            </div>
                        </li>
                        <li class="member">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVguuSK25N-_2r6B9vp5J-TreN3462dPTQAw&usqp=CAU" alt="">
                            <div class="name">
                                <h3>michael jordan</h3>
                                <p>wasup for the third time li lllllllllllllllllll</p>
                                <span class="date">2:09 pm</span>
                            </div>
                        </li>
                        <li class="member">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIvNRAu6lhqeqH0fexU5NtocTVa9eW7XZWsA&usqp=CAU" alt="">
                            <div class="name">
                                <h3>drake</h3>
                                <p>howdoyoudospace</p>
                                <span class="date">2:09 pm</span>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
-->

            <section class="chat" style="-webkit-box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.75); -moz-box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.75); box-shadow: 0px 0px 25px 0px rgba(0,0,0,0.75);">
                <header style="display: flex; flex-direction:row; justify-content: space-between;">
                    <h3><span class="to">To:</span><?php echo $chat['nombreProducto']  ?></h3>
                    <a style="color:orange; text-decoration:none" href="../controller/chatUser.php">BACK</a>
                </header>
                <div class="chat-page">
                    <div class="messages">
                        <?php

                        for ($i = 0; $i < (count($mensage) - 2); $i++) {

                            if ($mensage[$i]['idUsuario'] == $_SESSION['id']) {
                                print("<p class='me'>" . $mensage[$i]['mensage'] . "</p>");
                            }else {
                                print("<p class='friend'>" . $mensage[$i]['mensage'] . "</p>");
                            }
                        }

                        ?>
                        <!--
                        <span class="date">monday,1:27 PM</span>
                        <p class="friend">so, how's your new phone?</p>
                        <p class="friend">you finally have a smartphone :D</p>
                        <p class="me">drake?</p>
                        <p class="me">Why aren't you answering?</p>
                        <p class="friend">howdoyoudospace</p>
                        <p class="friend">so, how's your new phone?</p>
                        <p class="friend">you finally have a smartphone :D</p>
                        <p class="me">drake?</p>
                        <p class="me">Why aren't you answering?</p>
                        <p class="friend">howdoyoudospace</p>
                        <p class="friend">so, how's your new phone?</p>
                        <p class="friend">you finally have a smartphone :D</p>
                        <p class="me">drake?</p>
                        <p class="me">Why aren't you answering?</p>
                        <p class="friend">howdoyoudospace</p>
                    -->
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

</body>

</html>