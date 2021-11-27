<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("location:../");
        exit;
    }
    extract($_REQUEST);
    $mysqli = new mysqli("localhost","root","","mydb");
    if ($mysqli -> connect_error) {
        echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
        exit();
    }
    if (isset($_POST['add_cart'])) {
        $username = $_SESSION['user'];
        $result = $mysqli->query("SELECT * FROM user WHERE username= '$username'");
        $row = $result->fetch_assoc();
        $user_ID = $row['ID'];
        $product_ID = $ID;
        $so_luong = $_POST['so_luong'];
        $sql = "INSERT INTO cart(user_ID,product_ID,so_luong) VALUES ('$user_ID','$product_ID',$so_luong)";
        if ($mysqli->query($sql)) {
            header("location:../");
        }
    }
?>