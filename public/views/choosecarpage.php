<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>CHOOSE CAR PAGE</title>
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
    <div id="app-header">
        <nav class="nav-container">
            <a id="compname" class="nav_comp_name">CAR RENTAL</a>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list" id="nav-list">
                    <li class="nav__item">
                        <a href="mainpage.php" class="nav__link">Strona główna</a>
                    </li>
                    <li class="nav__item">
                        <a href="servicespage.php" class="nav__link">Usługi</a>
                    </li>
                    <li class="nav__item">
                        <a href="choosecarpage.php" class="nav__link">Pojazdy</a>
                    </li>
                    <li class="nav__item">
                        <a href="contactpage.php" class="nav__link">Kontakt</a>
                    </li>
                    <li class="nav__item">
                        <a href="login.php" class="nav__link">Wyloguj się</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="tile-container">
        <div class="tile">
<!--            --><?php //foreach ($)?>
            <div class="tile-img">
                <img src="../img/choose_car.jpg" class="img-content" alt="choose-car-img">
            </div>
            <div class="tile-content">
                <div class="tile-description">
                    <p class="description-name">Ferrari</p>
                    <p class="additional-description">2022</p>
                    <p class="additional-description">Automat</p>
                </div>
                <button class="rent-btn">Wynajmij</button>
            </div>
<!--            --><?php //endforeach; ?>
        </div>
        <div class="tile">
            <div class="tile-img">
                <img src="../img/choose_car.jpg" class="img-content">
            </div>
            <div class="tile-content">
                <div class="tile-description">
                    <p class="description-name">Ferrari</p>
                    <p class="additional-description">2022</p>
                    <p class="additional-description">Automat</p>
                </div>
                <button class="rent-btn">Wynajmij</button>
            </div>
        </div>
        <div class="tile">
            <div class="tile-img">
                <img src="../img/choose_car.jpg" class="img-content">
            </div>
            <div class="tile-content">
                <div class="tile-description">
                    <p class="description-name">Ferrari</p>
                    <p class="additional-description">2022</p>
                    <p class="additional-description">Automat</p>
                </div>
                <button class="rent-btn">Wynajmij</button>
            </div>
        </div>
    </div>
</body>
</html>