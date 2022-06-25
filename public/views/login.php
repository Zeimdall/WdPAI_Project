<!DOCTYPE html>
<html>
<head>
    <title>LOGIN PAGE</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
    <script src="public/js/redirect.js" defer></script>
</head>
<body>
    <?php include 'header_login.php' ?>
    <div class="container">
        <div class="container-header">
            <div class="header-item active" style="margin-right: 5px">Logowanie</div>
            <a class="header-item" href="registration.php">Rejestracja</a>
        </div>
        <div class="container-content">
            <form class="login" action="login" method="POST">
                <input id="email" class="email center" name="email" type="text" placeholder="email">
                <input id="password" class="password center" name="password" type="password" placeholder="hasło">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <button id="loginbtn" class="login-btn center">Zaloguj się</button>

            </form>
        </div>
    </div>
</body>
</html>