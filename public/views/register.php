<!DOCTYPE html>
<html>
<head>
    <title>REGISTRATION</title>
    <?php include 'headPage.php'?>
    <script src="public/js/validationRegister.js" defer></script>
</head>
<body>
    <?php include 'header_login.php' ?>
    <div class="container">
        <div class="container-header" >
            <a class="header-item non-active" onclick="redirect('loginpage')" style="margin-right: 5px">Logowanie</a>
            <div class="header-item active" >Rejestracja</div>
        </div>
        <div class="container-content">
            <form class="register-form" action="register" method="POST">
                <input id="email" class="email center" name="email" type="text" placeholder="email">
                <input id="password" class="password center" name="password" type="password" placeholder="hasło">
                <input id="confirm-password" class="confirm-password center" name="confirm-password" type="password" placeholder="powtórz hasło">
                <div class="messages">
                    <?php if(isset($messages)){
                        foreach($messages as $message)
                        {
                            echo $message;
                        }
                    }
                    ?>
                </div>
                <button id="registbtn" class="registration-btn center">Zarejestruj się</button>
            </form>
        </div>
    </div>
</body>
</html>