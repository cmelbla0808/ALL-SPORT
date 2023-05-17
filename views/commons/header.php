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
    <title>ALL SPORTS</title>

    <!-- CUSTOM STYLESHEET -->
    <link href="../css/style.css" rel="stylesheet" type="text/css">
    <link href="../css/dashboard.css" rel="stylesheet" type="text/css">
    <link href="../css/shoppingCart.css" rel="stylesheet" type="text/css">
    <link href="../css/contactUs.css" rel="stylesheet" type="text/css">
    
    <!-- ICONSCOUT CDN -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- GOOGLE FONTS (MONTSERRAT) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    

</head>
<body>

    <nav>
        <div class="container nav__container">
            <a href="../controller/mainController.php" class="nav__logo">ALL SPORTS</a>
            <ul class="nav__items">
                <li><a href="../controller/mainController.php"></i>Home</a></li>
                <li><a href="../views/search.php">Search</a></li>
                <?php
                if ($_SESSION['nombre'] != "" || $_SESSION['nombre'] != null) {
                    echo "<li><a href='../controller/controller-manageShoppingCart.php'>Favorites</a></li>";
                }
                ?>
                <li><a href="../views/contactUs.php">Contact</a></li>
                <?php
                if ($_SESSION['nombre'] == "" || $_SESSION['nombre'] == null) {
                    echo "<li><a href='../views/login.php'>Sign In</a></li>";
                } else {
                    echo "<li class='nav__profile'>";
                        echo "<div class='avatar'>";
                            echo "<img src='$url_avatar' alt=''>";
                        echo "</div>";
                        echo "<ul>";
                            echo "<li><a href='../controller/controller-manageProduct.php'>Dashboard</a></li>";
                            echo "<li><a href='../views/settings.php'>Settings</a></li>";
                            echo "<li><a href='../controller/cerrarSesion.php'>Logout</a></li>";
                        echo "</ul>";
                    echo "</li>";
                }
                ?>
            </ul>

            <button id="open__nav-btn"><i style="color: #252b42;" class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i style="color: #252b42;" class="uil uil-multiply"></i></button>
        </div>
    </nav>

    <script>
        const navItems = document.querySelector('.nav__items');
        const openNavBtn = document.querySelector('#open__nav-btn');
        const closeNavBtn = document.querySelector('#close__nav-btn');

        /* opens nav dropdown */
        const openNav = () => {
            navItems.style.display = 'flex';
            openNavBtn.style.display = 'none';
            closeNavBtn.style.display = 'inline-block';
        }

        /* close nav dropdown */
        const closeNav = () => {
            navItems.style.display = 'none';
            openNavBtn.style.display = 'inline-block';
            closeNavBtn.style.display = 'none';
        }

        openNavBtn.addEventListener('click', openNav);
        closeNavBtn.addEventListener('click', closeNav);
    </script>