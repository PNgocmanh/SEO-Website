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
    <title>Bình Luận</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../../assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.ico">
    <!-- Load Require CSS -->
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="../../assets/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="../../assets/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../assets/css/custom.css">
</head>

<body>

    <!-- Header -->
    <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand h1" href="../">
                <i class='bx bx-music bx-sm text-dark'></i>
                <span class="text-dark h4">Board Game</span> <span class="text-primary h4">TMĐ</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="navbar-toggler-success">
                <div class="flex-fill mx-xl-5 mb-2">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../">Người dùng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../product/">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../comment/">Bình luận</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../contact/">Liên Hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../news/">Tin tức</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <a class="nav-link" href="#"><i class='bx bx-bell bx-sm bx-tada-hover text-primary'></i></a>
                    
                    <?php
                        if (isset($_SESSION['user'])) {
                            $mysqli = new mysqli("localhost","root","","mydb");
                            if ($mysqli -> connect_error) {
                                echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                                exit();
                            }
                            $username = $_SESSION['user'];
                            $result = $mysqli->query("SELECT * FROM user WHERE username='$username'");
                            $row = $result->fetch_assoc();
                            if ($row['anh']!==NULL) {
                                echo "<a class='nav-link' href='../logout.php'><img class='recent-work-img card-img' src='../../assets/img/user/",$row['anh'],"' alt='Card image' style='width: 25px; height:25px; object-fit: cover; object-position: 50% 50%; border-radius: 50%;'></a>";
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->

    <?php
        extract($_REQUEST);
        if (!isset($ID)) {
            $ID = 1;
        }
        $mysqli = new mysqli("localhost","root","","mydb");
        if ($mysqli -> connect_error) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }
        $result = $mysqli->query("SELECT * FROM product WHERE ID=$ID");
        $row = $result->fetch_assoc();
    ?>
    <section class="container overflow-hidden py-5">
        
        <div class="row">
            <div class="col-8 m-auto rounded" style="border: 1px solid #dee2e6;">
                <h4 class="h5 mt-1 pb-2">Tất cả bình luận</h4>
                <?php
                    $result = $mysqli->query("SELECT * FROM comment");
                    while ($row = $result->fetch_assoc()) {
                        $user_ID = $row['user_ID'];
                        $result1 = $mysqli->query("SELECT * FROM user WHERE ID=$user_ID");
                        $row1 = $result1->fetch_assoc();
                ?>
                    <div class="d-flex pb-4">
                        <div class="pe-2">
                            <img src="../../assets/img/user/<?=$row1['anh']?>" style="width:50px; height:50px; object-fit: cover; object-position: 50% 50%; border-radius: 50%;" alt="">
                        </div>
                        <div>
                            <div class="d-flex">
                                <h5 class="h6"><?=$row1['ho_ten']?></h5>
                                <div class="ms-4"><a href="del_cmt.php?ID=<?=$row['ID']?>">Delete</a></div>
                            </div>
                            <p class="text-muted light-300 mb-1"><?=$row['thoi_gian']?></p>
                            <div class="card-body border light-300"><?=$row['noi_dung']?></div>
                        </div>
                    </div>
                <?php
                    }
                ?>

            </div>
        </div>
    </section>
    <!-- End Contact -->

    <!-- Bootstrap -->
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Templatemo -->
    <script src="../../assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="../../assets/js/custom.js"></script>

</body>

</html>