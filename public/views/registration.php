<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>REGISTRATION</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
    <?php include 'header_login.php' ?>
    <div class="container">
        <div class="container-header" >
            <a class="header-item" href="login.php" style="margin-right: 5px">Logowanie</a>
            <div class="header-item active" >Rejestracja</div>
        </div>
        <div class="container-content" >
            <input id="email" class="email center" name="email" type="text" placeholder="email">
            <input id="password" class="password center" name="password" type="password" placeholder="hasło">
            <input id="confirm-password" class="confirm-password center" name="confirm-password" type="password" placeholder="powtórz hasło">
            <button id="registbtn" class="registration-btn center">Zarejestruj się</button>
            <form class="register-form" action="register" method="POST">
                <div class="message">
                    <?php if(isset($messages)){
                        foreach($messages as $message)
                        {
                            echo $message;
                        }
                    }
                    ?>
                </div>
            </form>
        </div>
    </div>
    <script>
        const langPl = document.querySelector('.lang-wrap');
        const link = document.querySelectorAll('a');
        const langEn = document.querySelector('');

    </script>
</body>
</html>