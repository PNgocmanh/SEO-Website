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
    if (isset($_POST['comment'])) {
        if (isset($_SESSION['user'])) {
            $username = $_SESSION['user'];
            $result = $mysqli->query("SELECT * FROM user WHERE username='$username'");
            $row = $result->fetch_assoc();
            $user_ID = $row['ID'];
            $product_ID = $ID;
            $t=time()+7*60*60;
            $time_cmt = date('Y-m-d H:i:s',$t);
            $noi_dung = $_POST['noi_dung'];
            $sql = "INSERT INTO comment(user_ID,product_ID,noi_dung,thoi_gian) VALUES ($user_ID,$product_ID,'$noi_dung','$time_cmt')";
            if ($mysqli->query($sql)) {
                header("location:./?ID=$ID");
            }
            else {
                echo "<script> alert('Error!')</script>";
            }
        }
        else {
            header("location:./?ID=$ID");
        }
    }
?>