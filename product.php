<?php
session_start();
if (isset($_GET["product_name"]) && isset($_GET["numberOf"])&& isset($_GET["price"]))
{
    $product_name = $_SESSION["product_name"];
    $numberOf = $_SESSION["numberOf"];
    $price = $_SESSION["price"];
    var_dump($_SESSION);
}else{
    echo "Bye";
}

var_dump($_SESSION);

include_once 'database.php';

if (isset($_GET['id'])) {
    $conn = connectToDB();
    $good = getGoodById($conn, $_GET['id']);
} else {
    header('Location: /');
}

include_once 'header.php';
?>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <a class="navbar-brand" href="index.php">Furniture</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="index.php#catalog">All Products</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <a class="btn btn-outline-dark" type="submit"href="basket.php">
                    <i class="bi-cart-fill me-1"></i>Cart<span class="badge bg-dark text-white ms-1 rounded-pill">0</span>
                </a>
            </form>
        </div>
    </div>
</nav>
<form method="get" action="product.php">
<div class="container mt-5 mb-5">
    <div class="card">
        <div class="row g-0">
            <div class="col-md-6 border-end">
                <div class="d-flex flex-column justify-content-center">
                    <div class="main_image">
                        <img src="<?php echo $good['image']?>" id="main_product_image" width="350"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-3 right-side">
                    <div class="d-flex justify-content-between align-items-center" id="product_name"><h3><?php echo $good['name']?></h3></i></div>
                    <div class="mt-2 pr-3 content"><p><?php echo $good['description'] ?></p></div>
                    <input id="numberOf" min="0" name="quantity" value="<?php echo $good['numberOf'] ?>" type="number" class="form-control form-control-sm">
                    <h3 id="price">£<?php echo $good['price'] ?></h3>
                    <div class="buttons d-flex flex-row mt-5 gap-3">
                        <a class="btn btn-outline-dark" href="basket.php">Buy Now</a>
                        <a class="btn btn-dark"  href="basket.php">Add to Basket</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</div>
</body>
</html>
