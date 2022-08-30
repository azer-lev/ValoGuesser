<?php
session_start();
require_once("inc/config.inc.php");
require_once("inc/functions.inc.php");

$loggedIn = false;
$user = check_user();
if($user != "no-login") {
    $loggedIn = true;
}
?>  
    <link rel="icon" type="image/png" href="./assets/img/icon.png"/>
    <div class="navbar-container">
        <nav id="navbar">
            <div class="logo">
                <div class="logoholder" id="logoholder"></div>
            </div>
            
            <ul>
                <!-- IF LOGGED IN -->
                <li><div class="navcontainer noselect"><a>How to play</a></div></li>
                <li><div class="navcontainer noselect"><a href="leaderboard.php">Leaderboard</a></div></li>
                <?php 
                    if($loggedIn) {
                        echo('<li><div class="navcontainer noselect"><a href="upload.php">Upload video</a></div></li>');
                        echo('<li><div class="navcontainer noselect"><a>History</a></div></li>');
                        echo('<li><div class="navcontainer noselect"><a>Support</a></div></li>');
                        echo('<li><div id="profil" class="navcontainer noselect"><a href="profil.php">Profil</a></div></li>');
                        echo('<li class="loginbtn"><button id="logoutbtn">Logout</button></li>');
                    }else {
                        echo('<li class="loginbtn"><button id="loginbtn">Login</button></li>');
                    }
                ?>
            </ul>
        </nav>
        <div class="container-login" id="login-container">
            <div class="login" id="login-window">
                <div class="close-container">
                    <button id="close-login">
                        <div class="close">
                            <svg class="svg-icon" viewBox="0 0 20 20">
                                <path fill="none" d="M12.71,7.291c-0.15-0.15-0.393-0.15-0.542,0L10,9.458L7.833,7.291c-0.15-0.15-0.392-0.15-0.542,0c-0.149,0.149-0.149,0.392,0,0.541L9.458,10l-2.168,2.167c-0.149,0.15-0.149,0.393,0,0.542c0.15,0.149,0.392,0.149,0.542,0L10,10.542l2.168,2.167c0.149,0.149,0.392,0.149,0.542,0c0.148-0.149,0.148-0.392,0-0.542L10.542,10l2.168-2.168C12.858,7.683,12.858,7.44,12.71,7.291z M10,1.188c-4.867,0-8.812,3.946-8.812,8.812c0,4.867,3.945,8.812,8.812,8.812s8.812-3.945,8.812-8.812C18.812,5.133,14.867,1.188,10,1.188z M10,18.046c-4.444,0-8.046-3.603-8.046-8.046c0-4.444,3.603-8.046,8.046-8.046c4.443,0,8.046,3.602,8.046,8.046C18.046,14.443,14.443,18.046,10,18.046z"></path>
                            </svg>
                        </div>
                    </button>
                </div>
                <div class ="login-content">
                    <div class="login-wrapper-logo">
                        <div class="login-wrapper-logo-container"></div>
                    </div>
                    <div class="c-register">
                        <div class="c-register-text">
                            I'm new to ValoGuesser
                        </div>
                        <button id="registerclick">
                            <div class="c-register-btn">
                                Register
                            </div>
                        </button>
                    </div>
                    <div class="c-login">
                        <div class="c-login-text">
                            I have already played ValoGuesser
                        </div>
                        <button id="loginclick">
                            <div class="c-login-btn">
                                Login
                            </div>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script src="./assets/js/navbar.js"></script>
    </div>