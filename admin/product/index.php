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
    <title>Thông tin</title>
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
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../contact/">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../news/">Tin tức</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
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
        $mysqli = new mysqli("localhost","root","","mydb");
        if ($mysqli -> connect_error) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }
        $result = $mysqli->query("SELECT * FROM product");
        
    ?>

    <section class="container overflow-hidden py-5">
        <div class="row gx-5 gx-sm-3 gx-lg-5 gy-lg-5 gy-3 pb-3 projects">
            <div class="col-md-12 col-12 m-auto text-end">
                <a href="./add_product">
                    <button class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 mt-4 radius-0 text-light light-300">Thêm sản phẩm</button>
                </a>
            </div>
            <?php
                while ($row = $result->fetch_assoc()) {
                    $tong = intval($row['gia']);
                    $gia = 'VND';
                    while ($tong>999) {
                        $du = $tong % 1000;
                        if ($du>99) {
                            $gia = ".".strval($du).$gia;
                        }
                        else {
                            if ($du>9) {
                                $gia = ".0".strval($du).$gia;
                            }
                            else {
                                $gia = ".00".strval($du).$gia;
                            }
                        }
                        $tong = floor($tong/1000);
                    }
                    $gia = strval($tong).$gia;
            ?>

                    <div class='col-xl-3 col-md-4 col-sm-6 project ui branding'>
                        <a href="del_product.php?ID=<?=$row['ID']?>"><button class="btn btn-danger text-light">Xóa</button></a>
                        <a href='./info_product/?ID=<?=$row['ID']?>' class='service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0'>
                            <img class='service card-img' src='./../../assets/img/product/<?=$row['anh']?>' alt='Card image'>
                            <div class='service-work-vertical card-img-overlay d-flex align-items-end'>
                                <?php if ($row['sale']>0) { ?>
                                    <div style="position: absolute; display:flex; text-align:center; top:6px;left:6px; background-color:red;">
                                        <span>-<?=$row['sale']?>%</span>
                                    </div>
                                <?php } ?>
                                <div class='service-work-content text-left text-light'>
                                    
                                    <span class='btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300'>
                                        <?php if ($row['sale']>0) echo "<del>";?><?=$gia?>
                                        <?php if ($row['sale']>0) {
                                            echo "</del>";
                                            $tong = intval($row['gia'])*(100-$row['sale'])/100;
                                                $gia = 'VND';
                                                while ($tong>999) {
                                                    $du = $tong % 1000;
                                                    if ($du>99) {
                                                        $gia = ".".strval($du).$gia;
                                                    }
                                                    else {
                                                        if ($du>9) {
                                                            $gia = ".0".strval($du).$gia;
                                                        }
                                                        else {
                                                            $gia = ".00".strval($du).$gia;
                                                        }
                                                    }
                                                    $tong = floor($tong/1000);
                                                }
                                                $gia = strval($tong).$gia;
                                        }
                                        ?>
                                    </span>

                                    <?php if ($row['sale']>0) {?>
                                        <span class='btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300'><?=$gia?></span>
                                    <?php } ?>
                                    <h4 class='card-title light-300'><?=$row['ten']?></h4>
                                    <p class='card-text' style='height:50px ;overflow: hidden !important;'><?=$row['mo_ta']?></p>
                                </div>
                            </div>
                        </a>
                    </div>
            <?php
                }
            ?>

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