<!DOCTYPE html>
<html>
<head>
    <title>CHOOSE CAR PAGE</title>
    <?php include 'headPage.php'?>
    <script src="public/js/addRentedCar.js" defer></script>
</head>
<body>
    <?php include_once 'src/repository/UserRepository.php';

    if (Security::$user->getRole() === 'admin') {
        include 'header_adminpage.php';
    } else {
        include 'header_mainpage.php';
    }
    ?>
    <?php include_once 'src/repository/CarRepository.php';
    $carRepository = new CarRepository();
    $cars = $carRepository->getCars();
    foreach($cars as $car):?>
    <div class="tile-container">
        <div class="tile">
            <div class="tile-img">
                <img src="public/uploads/<?=$car->getImage();?>" class="img-content" alt="normal img">
            </div>
            <div class="tile-content">
                <div class="tile-description">
                    <p class="description-name"><?=$car->getCarName(); ?></p>
                    <p class="additional-description"><?=$car->getCarYear(); ?></p>
                    <p class="additional-description"><?=$car->getCarSpecification(); ?></p>
                </div>
                <button onclick=rentCar(<?=$car->getId(); ?>) class="rent-btn">Rent</button>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</body>
</html>