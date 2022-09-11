<?php
require_once('inc/layouts/navbar.php');
global $user;
global $dbpdo;
if($user != "no-login") {
    header("Location: index.php");
}else {
    if(isset($_POST['email']) && isset($_POST['password'])) {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        $stmt = $dbpdo->prepare("SELECT * FROM `userstorage`  WHERE `user_email` = :email LIMIT 1");
        $result = $stmt->execute(array("email" => $email));
        $userres = $stmt->fetch();

        if(password_verify($password, $userres['user_passwordhash'])) {
            setcookie("loggedIn", "true", time() + 3600 * 24* 365);
            $_SESSION['userid'] = $userres['user_id'];
            header("Location: index.php");
            exit;
        }
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Valorant Rank Guesser - Login Page</title>
        <link rel="stylesheet" href="assets/css/navbar.css"/>
        <link rel="stylesheet" href="assets/css/login.css"/>

        <!-- FONTS -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&family=Oswald&family=Source+Sans+Pro&display=swap" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <div class="login-wrapper">
                <div class="login-wrapper-heading">
                    Login ValoGuesser
                </div>
                <div class="login-wrapper-inputs">
                    <form action="#" method="post">
                        <div class="login-wrapper-username">
                            <input type="email" name="email" id="email" placeholder="E-mail"/>
                        </div>
                        <div class="login-wrapper-password">
                            <input type="password" name="password" id="password" placeholder="Password"/>
                        </div>
                        <div class="wrapper-button">
                            <button class="login-btn">
                                <div class="login-btn-c">
                                    Login
                                </div>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <script src="assets/js/login.js"></script>
    </body>
</html>