<?php

$servername = "mysql";
$username = "root";
$password = "root";

if (!empty($_POST)) {
    if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])) {
        try {
            $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
        // достать с БД
        $sql = "SELECT * FROM users WHERE email = '" . $_POST['email'] . "'";
        $result = $conn->query($sql);
        var_dump($sql);
        if ($result->fetch() != null) {
            echo 'Such email already exists';
        } else {
            $statement = $conn->prepare('INSERT INTO users (name, email, password)
                                               VALUES (:name, :email, :password)');

            $statement->execute([
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
            ]);

            echo 'User ' . $_POST['name'] . ' saved!';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex">
    <title>Register</title>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato|700" rel="stylesheet">
    <link rel="stylesheet" href="css/register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</head>
<body>
<section class="vh-100 bg-image"
         style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Create an account</h2>

                            <form method="post" action="register.php">

                                <div class="form-outline mb-4">
                                    <input type="text" id="form3Example1cg" class="form-control form-control-lg" name="name"/>
                                    <label class="form-label" for="form3Example1cg">Your Name</label>
                                </div>

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
                                            class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Register</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="authorization.php"
                                                                                                        class="fw-bold text-body"><u>Login here</u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--<html><body>-->
<!--<form method="post" action="/unit1less5/register.php">-->
<!--    <table>-->
<!--        <tr>-->
<!--            <td><label for="nameField">Логин</label></td>-->
<!--            <td><input id="nameField" type="text" name="name"></td>-->
<!--        </tr>-->
<!--        <tr>-->
<!--            <td><label for="emailField">Email</label></td>-->
<!--            <td><input id="emailField" type="email" name="email"></td>-->
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
</body>
</html>