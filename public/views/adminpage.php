<!DOCTYPE html>
<html lang="en">
<head>
    <title>ADMIN PAGE</title>
    <meta charset="utf-8">
    <?php include 'headPage.php'?>
</head>
<body>
    <?php include 'header_adminpage.php'?>
    <div class="container">
        <form class="container-content" action="addCar" method="POST" ENCTYPE="multipart/form-data">
            <input id="car-name" class="center" name="car_name" type="text" placeholder="type car name">
            <input id="car-year" class="center" name="car_year" type="text" placeholder="type car year">
            <input id="car-specification" class="center" name="car_specification" type="text" placeholder="type car gear">
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