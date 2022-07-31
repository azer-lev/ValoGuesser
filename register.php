<?php
require_once('inc/layouts/navbar.php');


if(isset($_GET['register'])) {
    //Captcha validation
    $request = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=6LeWWykhAAAAALscNWNgMltzKOxM8iNE3_5-HX30&response=" . $_POST["token"]);
    $request = json_decode($request);
    if($request->success == true) {
        if($request->score >= 0.7) {
            $error = false;
            $errorMsg = "";
            $username = trim($_POST['username']);
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $password_verify = trim($_POST['password-verify']);
        
            if(strlen($username) < 4) {
                $error = true;
                $errorMsg = "Username too short!";
            }
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = true;
                $errorMsg = "Insert a valid email!";
            }
            if(strlen($password) < 6) {
                $error = true;
                $errorMsg = "Insert a strong password!";
            }
            if($password != $password_verify) {
                $error = true;
                $errorMsg = "Passwords mismatching!";
            }
        
            if(strlen($errorMsg > 1)) {
                echo("<script>alert('" . $errorMsg . "');</script>");
            }
        
            if(!$error) {
                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                $currentTimestamp = time();
                echo("<script>console.log('".$username. $email . $password_hash  . " " . $currentTimestamp ."');</script>");
                $stmt = $dbpdo->prepare("INSERT INTO `userstorage` (`user_username`, `user_email`, `user_passwordhash`, `user_created_at`, `user_last_login`) VALUES (:user_username, :user_email, :user_passwordhash, :user_created_at, :user_last_login)");
                $result = $stmt->execute(array("user_username" => $username, "user_email" => $email, "user_passwordhash" => $password_hash, "user_created_at" => $currentTimestamp, "user_last_login" => $currentTimestamp));
                if($result) {
                    header("Location: " . $urlLoginPage);
                }else {
                    $errorMsg = "Error while saving your credentials! Try again later.";
                }
            }
        }else {
            echo("SPAM VERDACHT");
            die();
        }
    }else {
        echo("Internal captcha error! Try again later...");
        die();
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Valorant Rank Guesser - Landing Page</title>
        <link rel="stylesheet" href="assets/css/navbar.css"/>
        <link rel="stylesheet" href="assets/css/register.css"/>

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&family=Oswald&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    </head>

    <body>

        <div class="container">
            <div class="login-wrapper">
                <div class="login-wrapper-heading">
                    Register ValoGuesser
                </div>
                <div class="login-wrapper-inputs">
                    <form action="?register=1" method="post">
                        <input type="hidden" name="token" id="token"/>
                        <div class="login-wrapper-username">
                            <input type="text" name="username" id="username" placeholder="Username"/>
                        </div>
                        <div class="login-wrapper-email">
                            <input type="email" name="email" id="email" placeholder="E-Mail"/>
                        </div>
                        <div class="login-wrapper-password">
                            <input type="password" name="password" id="password" placeholder="Password"/>
                        </div>
                        <div class="login-wrapper-repeat-password">
                            <input type="password" name="password-verify" id="password-verify" placeholder="Repeat password"/>
                        </div>
                        <script src="https://www.google.com/recaptcha/enterprise.js?render=6LcqSCohAAAAAC4jJyBJGfxalR4MbRnSAVK9xxyt"></script>
                        <script src="https://www.google.com/recaptcha/enterprise.js?render=6LeWWykhAAAAAIEmF_dyU4sZpduuBQqD3NFdWJ9g"></script>

                        <div class="wrapper-button">
                            <button class="login-btn" id="registerbtn">
                                <div class="login-btn-c">
                                    Register
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="error-dialog" id="error-dialog">
                <div class="error-close" id="error-close">X</div>
                <div class="error-msg">Username bereits vergeben!</div>
            </div>
        </div>
        <div class="captcha">
            <script>
            grecaptcha.enterprise.ready(function() {
                grecaptcha.enterprise.execute('6LeWWykhAAAAAIEmF_dyU4sZpduuBQqD3NFdWJ9g', {action: 'login'}).then(function(token) {
                    document.getElementById("token").value = token;
                });
            });
            </script>
        </div>
        <script src="assets/js/register.js"></script>
    </body>
</html>