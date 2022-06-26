<!DOCTYPE html>
<html lang="en">
<head>
    <title>ADMIN PAGE</title>
    <meta charset="utf-8">
    <?php include 'headPage.php'?>
</head>
<body>
    <div id="app-header">
        <nav class="nav-container">
            <a id="compname" class="nav_comp_name">CAR RENTAL</a>
            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list" id="nav-list">
                    <li class="nav__item">
                        <a onclick="redirect('adminpage')" class="nav__link">Add cars</a>
                    </li>
                    <li class="nav__item">
                        <a onclick="redirect('choosecar')" class="nav__link">Cars</a>
                    </li>
                    <li class="nav__item">
                        <a onclick="redirect('logout')" class="nav__link">Sign out</a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="container">
        <form class="container-content" action="addCar" method="POST" ENCTYPE="multipart/form-data">
            <input id="car-name" class="center" name="car-name" type="text" placeholder="type car name">
            <input id="car-year" class="center" name="car-year" type="text" placeholder="type car year">
            <input id="car-specification" class="center" name="car-specification" type="text" placeholder="email">
            <input id="car-img" class="file-field center" name="file" type="file">
            <div class="messages">
                <?php
                if(isset($messages)){
                    foreach($messages as $message) {
                        echo $message;
                    }
                }
                ?>
            </div>
            <button id="add-car-btn">Add car</button>
        </form>
    </div>
</body>
</html>