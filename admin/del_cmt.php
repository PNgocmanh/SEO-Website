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
        $mysqli = new mysqli("localhost","root","","seo-website");
        if ($mysqli -> connect_error) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }
        $result = $mysqli->query("SELECT * FROM comments WHERE id=$ID");
        $row = $result->fetch_assoc();
        if ($mysqli->query("DELETE FROM comments WHERE id=$ID")) {
            echo "<script> alert('Success!')</script>";
        }
        else {
            echo "<script> alert('",$ID,"')</script>";
        }
        header("location:./baiviet.php");
    ?>
</body>
</html>