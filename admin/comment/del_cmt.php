<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("location:../");
        exit;
    }
    if ($_SESSION['user']!=='admin') {
        header("location:../");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        extract($_REQUEST);
        $mysqli = new mysqli("localhost","root","","mydb");
        if ($mysqli -> connect_error) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }
        $result = $mysqli->query("SELECT * FROM comment WHERE ID=$ID");
        $row = $result->fetch_assoc();
        $link = $row['product_ID'];
        if ($mysqli->query("DELETE FROM comment WHERE ID=$ID")) {
            echo "<script> alert('Success!')</script>";
        }
        else {
            echo "<script> alert('",$ID,"')</script>";
        }
        header("location:./");
    ?>
</body>
</html>