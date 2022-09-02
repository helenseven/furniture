<?php
session_start();
include_once 'database.php';

$conn = connectToDB();
$categories = getCategories($conn);

include_once 'header.php';

if(isset($_GET['logOut']))
{
    session_destroy();
    header('Location: index.php');
    exit;
}

if(isset($_GET['category_id'])) {
    $goods = getGoodsByCategory($conn, $_GET['category_id']);
} else {
    $goods = getGoods($conn);
}

?>
<body>
<!-- TOP LINE -->
<div class="row top-line">
    <div class="container">
        <div class="logo">
            <a class="logo__link" href="index.php">
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

                <?php if (isset($_SESSION['user'])): ?>
                    <li class="menu__item">
                        <div class="authorization">
                            <a class="menu__link"><span class="menu_auto"><?php echo $_SESSION['user']['name'] ?></span>
                                <img class="img_basket" src="img/user.png" alt=""></a>
                        </div>
                        <a href="?logOut" class="menu__link">Log Out</a>
                    </li>
                <?php else: ?>
                    <li class="menu__item">
                        <div class="authorization">
                            <a href="authorization.php" class="menu__link"><span class="menu_auto">authorization</span>
                                <img class="img_basket" src="img/user.png" alt=""></a>
                        </div>
                    </li>
                <?php endif ?>

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
                <a class="btn_shop_link" href="#catalog">Shop now</a>
            </div>
        </div>
    </div>
</header>
<!-- end first screen -->

<!-- catalog screen -->
<section class="catalog" id="catalog">
    <div class="container">

        <div class="row">
            <ul class="catalog__tabs">

                <?php foreach ($categories as $category): ?>
                <li class="catalog__tabs-item">
                    <a href="?category_id=<?php echo $category['id']?>" class="catalog__tabs-link active"><?php echo $category['title'] ?></a>
                </li>
                <?php endforeach; ?>

            </ul>
        </div>

        <div class="row">
            <ul class="catalog__list">

                <?php foreach ($goods as $good): ?>
                    <li class="catalog__item small">
                        <a href="product.php?id=<?php echo $good['id']?>" class="catalog__link">
                            <img class="catalog__img" src="<?php echo $good['image'] ?>" alt="catalog item">
                            <p class="catalog__text"><?php echo $good['name'] ?>
                                <span><?php echo $good['description'] ?></span><span> £<?php echo $good['price'] ?></span>
                            </p>
                        </a>
                    </li>
                <?php endforeach; ?>

</section>
<!-- end catalog screen -->

<!-- shipping  -->
<section class="shipping" id="shipping">
    <div class="container">
        <div class="row">
            <div class="shipping__block">

                <img class="shipping_img" height="100" width="100" src="img/shipping.svg" alt="shipping" >
                <h2 class="shipping__title">Delivery</h2>
                <p class="shipping__text">
                    As long as all your items are with the same carrier, and the difference in lead times isn't too much, grouped delivery will be given as an option at the checkout for you to pick if you would like to do this and have all items delivered together.
                </p>
                <a class="shipping__btn" href="https://novaposhta.ua/" target="_blank">Nova Poshta</a>

            </div>
        </div>
    </div>
</section>
<!-- end shipping  -->

<!--about -->
<section class="about" id="about">
    <div class="container">
        <div class="row">
            <div class="about__block">
                <h2 class="about__title">We’re different by design </h2>
                <p class="about__text">
                    Our story started with a problem (the best ideas usually do). Some ten years ago, our founder was furnishing his flat. Frustrated at the lack of well-designed, good quality and affordable sofas, he set about redefining the process. The concept was clear: collaborate with independent designers and makers to create pieces you’ll love, minus the mark-up. The destination for creating your dream home.
                </p>
                <a class="about__btn" href="#contacts">contact</a>
            </div>
        </div>
    </div>
</section>
<!-- end about -->

<!--contacts -->
<section class="contacts" id="contacts">
    <div class="container">
        <h2 class="contacts__title">Contact</h2>
        <form action="" class="contacts__form">
            <div class="input-row">
                <label for="1" class="contacts__label">
                    <input type="text" id="1" class="contacts__input" placeholder="Name">
                </label>
                <label for="2" class="contacts__label">
                    <input type="text" id="2" class="contacts__input" placeholder="Email">
                </label>
            </div>

            <label for="3" class="contacts__textarea-label">
                <textarea class="contacts__textarea" name="" id="3" placeholder="Message"></textarea>
            </label>

            <input type="submit" value="Send a question">
        </form>
    </div>
</section>
<!-- end contacts -->


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
