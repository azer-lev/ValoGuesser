<?php
require_once('inc/layouts/navbar.php');
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Valorant Rank Guesser - Landing Page</title>
        <link rel="stylesheet" href="./assets/css/index.css"/>
        <link rel="stylesheet" href="./assets/css/navbar.css"/>

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&family=Oswald&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <div class="container-text noselect" id="container-text">
                Play ValoGuesser free!
            </div>
            <div class="container-button" id="container-btn">
                <div class="button-wrapper">
                    <button id="playfreebtn">
                        <?php 
                        if(isset($_COOKIE['loggedIn']) && $_COOKIE['loggedIn'] == "true") { 
                            echo('START PLAYING');
                        }
                        else {
                            echo('PLAY FREE');
                        }
                        ?>
                        </button>
                </div>
            </div>
            <video class="video-container" autoplay preload="true" muted loop>
                <source src="assets/vid/background.mp4"/>
            </video>
        </div>

        <script src="assets/js/index.js"></script>
    </body>
</html>