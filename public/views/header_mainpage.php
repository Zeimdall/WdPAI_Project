<!DOCTYPE html>
<html>
<head>
    <title>MAIN PAGE</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="public/css/style.css">
</head>
<body>
    <div id="app-header">
        <nav class="nav-container">
            <a id="compname" class="nav_comp_name">CAR RENTAL</a>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list" id="nav-list">
                    <li class="nav__item">
                        <a onclick="redirect('mainpage')" class="nav__link">Strona główna</a>
                    </li>
                    <li class="nav__item">
                        <a onclick="redirect('services')" class="nav__link">Usługi</a>
                    </li>
                    <li class="nav__item">
                        <a onclick="redirect('choosecar')" class="nav__link">Pojazdy</a>
                    </li>
                    <li class="nav__item">
                        <a onclick="redirect('contact')" class="nav__link">Kontakt</a>
                    </li>
                    <li class="nav__item">
                        <a onclick="redirect('logout')" class="nav__link">Wyloguj się</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</body>