<!DOCTYPE html>
<html>
<head>
    <title>CHOOSE CAR PAGE</title>
    <?php include 'headPage.php'?>
</head>
<body>
    <?php include 'header_mainpage.php'?>
    <div class="tile-container">
        <div class="tile">
            <div class="tile-img">
                <?php
                foreach($cars as $car):?>
                <img src="public/uploads/<?=$car->getImage();?>" class="img-content" alt="normal img">
            </div>
            <div class="tile-content">
                <div class="tile-description">
                    <p class="description-name"><?=$car->getCarName(); ?></p>
                    <p class="additional-description"><?=$car->getCarYear(); ?></p>
                    <p class="additional-description"><?=$car->getCarSpecification(); ?></p>
                </div>
                <button class="rent-btn">Rent</button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>