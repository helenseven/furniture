<?php
$servername = "mysql";
$username = "root";
$password = "root";

session_start();
if (!empty($_POST)) {
    if (isset($_POST['email']) && isset($_POST['password'])) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        // достать с БД

        $sql = "SELECT * FROM users WHERE email = '" . $_POST['email'] . "' AND password = '" . $_POST['password']."'";
        $result = $conn->query($sql);
        $user = $result->fetch();
        if ($user == null){
            echo 'Such user not already exists' . "</br>";
        } else {
            $_SESSION['user']['name'] = $user['name'];
            $_SESSION['user']['email'] = $_POST['email'];
            $_SESSION['user']['password'] = $_POST['password'];
            header('Location: index.php');
        }
    }
}

include_once 'header.php';
?>

<body>
<section class="vh-100 bg-image"
         style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Sign in</h2>

                            <form method="post" action="authorization.php">

                                <div class="form-outline mb-4">
                                    <input type="email" id="form3Example3cg" class="form-control form-control-lg" name="email" />
                                    <label class="form-label" for="form3Example3cg">Your Email</label>
                                </div>

                                <div class="form-outline mb-4">
                                    <input type="password" id="form3Example4cg" class="form-control form-control-lg" name="password" />
                                    <label class="form-label" for="form3Example4cg">Password</label>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit"
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Log in</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Don`t have already an account? <a href="register.php"
                                                                                                        class="fw-bold text-body"><u>Register  here</u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
<!---->
<!--<html><body>-->
<!--<form method="post" action="/unit1less5/authorization.php">-->
<!--    <table>-->
<!---->
<!--        <td><label for="emailField">Email</label></td>-->
<!--        <td><input id="emailField" type="email" name="email"></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td><label for="passwordField">Пароль</label></td>-->
<!--            <td><input id="passwordField" type="password" name="password"></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td colspan="2" style="text-align: center"><input type="submit" value="Войти"></td>-->
<!--        </tr>-->
<!--    </table>-->
<!--</form>-->
<!--</body>-->
<!--</html>-->
<!---->
