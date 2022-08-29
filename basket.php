<?php
session_start();

if (!empty($_POST)) {
    echo "Ваш заказ :" . "</br>";
    foreach ($_POST as $name => $order) {
        foreach ($order as $good) {
            if ($name == $good['name']) {
                if ($order >= $good['numberOf']) {
                    echo 'нет на складе' . ' ' . $good['name'] . "</br>";
                } else {
                    echo "Цена за мебель: " . 'За ' . $good['name'] . ' ' . $good['price'] * $order . "</br>";
                }
            }
        }
    }
}

include_once 'database.php';

$conn = connectToDB();
$goods = getGoods($conn);


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title>Basket</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|700" rel="stylesheet">
    <link rel="stylesheet" href="css/basket.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa"
            crossorigin="anonymous"></script>
</head>
<body>
<section class="h-100 h-custom" style="background-color: #3c4955;">
    <form method="post" action="basket.php">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h1 class="fw-bold mb-0 text-black">Shopping Cart</h1>
                                            <h6 class="mb-0 text-muted"><?php echo count($goods) ?> items</h6>
                                        </div>

                                        <hr class="my-4">

                                        <?php foreach ($goods as $name => $good): ?>
                                                <div class="row mb-4 d-flex justify-content-between align-items-center">
                                                    <div class="col-md-2 col-lg-2 col-xl-2">
                                                        <img src="<?php echo $good['image'] ?>" class="img-fluid rounded-3"
                                                             alt="Cotton T-shirt">
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-3">
                                                        <h6 class="text-muted"><?php echo $good['title'] ?></h6>
                                                        <h6 class="text-black mb-0"><?php echo $good['name'] ?></h6>
                                                    </div>
                                                    <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                        <button class="btn btn-link px-2"
                                                                onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                                                            <i class="fas fa-minus"></i>
                                                        </button>

                                                        <input id="form1" min="0" name="quantity"
                                                               value="<?php echo $good['numberOf'] ?>" type="number"
                                                               class="form-control form-control-sm"/>
                                                        <?php if ($good['numberOf'] > $good['numberOf']): ?>
                                                            <a> Not in stock <?php echo $good['name']?> </a> </br>
                                                        <?php endif;?>

                                                        <button class="btn btn-link px-2"
                                                                onclick="this.parentNode.querySelector('input[type=submit]').stepUp()">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                        <h6 class="mb-0">£ <?php echo $good['price'] ?></h6>
                                                    </div>
                                                </div>
                                            <?php endforeach; ?>
                                        <hr class="my-4">

                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="index.php" class="text-body"><i
                                                            class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 bg-grey">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Summary</h3>
                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-4">
                                            <h5 class="text-uppercase">items <?php echo count($goods) ?></h5>
                                        </div>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Total price</h5>
                                            <h5>£ <?php echo $good['price'] * $order?></h5>
                                        </div>

                                        <button type="button" class="btn btn-dark btn-block btn-lg"
                                                data-mdb-ripple-color="dark">Register
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</section>
</body>
</html>
