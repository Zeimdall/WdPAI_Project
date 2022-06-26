<!DOCTYPE html>
<html>
<head>
    <title>LOGIN PAGE</title>
    <?php include 'headPage.php'?>
</head>
<body>
    <?php include 'header_login.php' ?>
    <div class="container">
        <div class="container-header">
            <div class="header-item active" style="margin-right: 5px">Sign in</div>
            <a class="header-item non-active" onclick="redirect('register')">Sign up</a>
        </div>
        <div class="container-content">
            <form class="login" action="login" method="POST">
                <input id="email" class="email center" name="email" type="text" placeholder="email">
                <input id="password" class="password center" name="password" type="password" placeholder="password">
                <div class="messages">
                    <?php
                    if(isset($messages)){
                        foreach($messages as $message) {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <button id="loginbtn" class="login-btn center">Sign in</button>
            </form>
        </div>
    </div>
</body>
</html>