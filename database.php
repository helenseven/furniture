<?php
function getCategories($conn) {
    $sql = "SELECT * FROM categories";
    $result = $conn->query($sql);
    return $result->fetchAll();
}

function getGoods($conn) {
    $sql = "SELECT * FROM goods";
    $result = $conn->query($sql);
    return $result->fetchAll();
}

function connectToDB() {
    $servername = "mysql";
    $username = "root";
    $password = "root";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    return $conn;
}
