<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title>Меблі</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|700" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
<!-- TOP LINE -->
<div class="row top-line">
    <div class="container">
        <div class="logo">
            <a class="logo__link" href="/">
                <img class="logo__img" src="img/logo.png" alt="logo">
            </a>
        </div>
        <nav class="navigation">
            <ul class="menu">
                <li class="menu__item">
                    <a href="#catalog" class="menu__link">catalog</a>
                </li>
                <li class="menu__item">
                    <a href="#shipping" class="menu__link">shipping</a>
                </li>
                <li class="menu__item">
                    <a href="#about" class="menu__link">about</a>
                </li>
                <li class="menu__item">
                    <a href="#contacts" class="menu__link">contact</a>
                </li>
                <li class="menu__item">
                <div class="basket">
                    <a href="basket.php" class="menu__link"><span>Basket</span>
                    <img class="img_basket" src="img/bin.png" alt=""></a>
                </div>
                </li>
                <?php if(isset($_SESSION['user'])):?>
                <li class="menu__item">
                    <div class="authorization">
                        <a class="menu__link"><span><?php echo $_SESSION['user']['name'] ?></span>
                            <img class="img_basket" src="img/user.png" alt=""></a>
                    </div>
                </li>
                <?php else: ?>
                <li class="menu__item">
                    <div class="authorization">
                        <a href="authorization.php" class="menu__link"><span>authorization</span>
                            <img class="img_basket" src="img/user.png" alt=""></a>
                    </div>
                </li>
                <?php endif?>
            </ul>
        </nav>
    </div>

</div>
<!-- END TOP LINE -->

<!-- first screen -->
<header class="first-screen" id="first-screen">
    <div class="container">

        <div class="row">
            <h1 class="title">CLEARANCE JUST GOT BETTER</h1>
            <h2 class="subtitle">New lines added</h2>
            <h2 class="subtitle">Up to 50% off</h2>
            <div class="btn_shop">
                <a class="btn_shop_link" href="/">Shop now</a>
            </div>
        </div>
    </div>
</header>
<!-- end first screen -->

<section class="catalog" id="catalog">
    <div class="container">

        <div class="row">
            <ul class="catalog__tabs">
                <li class="catalog__tabs-item">
                    <a href="#" class="catalog__tabs-link active">Item1</a>
                </li>
                <li class="catalog__tabs-item">
                    <a href="#" class="catalog__tabs-link">Item2</a>
                </li>
                <li class="catalog__tabs-item">
                    <a href="#" class="catalog__tabs-link">Item3</a>
                </li>
                <li class="catalog__tabs-item">
                    <a href="#" class="catalog__tabs-link">Item4</a>
                </li>
                <li class="catalog__tabs-item">
                    <a href="#" class="catalog__tabs-link">Item5</a>
                </li>
            </ul>
        </div>

        <div class="row">
            <ul class="catalog__list">

<?php foreach ($goods as $good): ?>
                <li class="catalog__item small">
                    <a href="#" class="catalog__link">
                        <img class="catalog__img" src="<?php echo $good['image'] ?>" alt="catalog item" >
                        <p class="catalog__text"><?php echo $good['name'] ?><span><?php echo $good['description'] ?></span><span> £<?php echo $good['price']?></span>
                        </p>
                    </a>
                </li>
<?php endforeach; ?>

<!--                                <li class="catalog__item">-->
<!--                                    <a href="#" class="catalog__link">-->
<!--                                        <img class="catalog__img" src="img/item-2.jpg" alt="catalog item" >-->
<!--                                        <p class="catalog__text">Clover<span>Acacia Wood 22 Bottle Wall Mounted Wine Rack, Natural Ash Wood</span><span>-->
<!--                £ 78</span>-->
<!--                                        </p>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li class="catalog__item small">-->
<!--                                    <a href="#" class="catalog__link">-->
<!--                                        <img class="catalog__img" src="img/item-3.jpg" alt="catalog item" >-->
<!--                                        <p class="catalog__text">Lomond<span>Lift Top Coffee Table with Storage, Mango Wood and Black</span><span>-->
<!--                £ 425</span>-->
<!--                                        </p>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                                <li class="catalog__item">-->
<!--                                    <a href="#" class="catalog__link">-->
<!--                                        <img class="catalog__img" src="img/item-4.jpg" alt="catalog item" >-->
<!--                                        <p class="catalog__text">Damien<span>Bedside Table, Oak Effect & Black</span><span>-->
<!--                £ 170</span>-->
<!--                                        </p>-->
<!--                                    </a>-->
<!--                                </li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!---->
<!--                    </div>-->
                </section>

                <footer class="footer">
                    <div class="container">
                        <div class="row">

                            <nav class="social">
                                <ul class="social__menu">
                                    <li class="social__item">
                                        <a href="#" class="social__link twitter" target="_blank"></a>
                                    </li>
                                    <li class="social__item">
                                        <a href="#" class="social__link instagram" target="_blank"></a>
                                    </li>
                                    <li class="social__item">
                                        <a href="#" class="social__link facebook" target="_blank"></a>
                                    </li>
                                </ul>
                            </nav>

                        </div>
                    </div>
                </footer>

                </body>
                </html>
