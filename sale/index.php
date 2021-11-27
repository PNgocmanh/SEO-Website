<?php
    session_start();
    extract($_REQUEST);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Purple Buzz - Contact Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <!-- Load Require CSS -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="../assets/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="../assets/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/css/custom.css">
<!--
    
TemplateMo 561 Purple Buzz

https://templatemo.com/tm-561-purple-buzz

-->
</head>

<body>

    <!-- Header -->
    <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand h1" href="../">
                <i class='bx bx-music bx-sm text-dark'></i>
                <span class="text-dark h4">XYSP</span> <span class="text-primary h4">Music Shop</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="navbar-toggler-success">
                <div class="flex-fill mx-xl-5 mb-2">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../product/">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../sale/">Khuyến mãi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../news/">Tin tức</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <a class="nav-link" href="#"><i class='bx bx-bell bx-sm bx-tada-hover text-primary'></i></a>
                    <a class="nav-link" href="../cart/"><i class='bx bx-cart bx-sm text-primary'></i></a>
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
                                echo "<a class='nav-link' href='../info/'><img class='recent-work-img card-img' src='../assets/img/user/",$row['anh'],"' alt='Card image' style='width: 25px; height:25px; object-fit: cover; object-position: 50% 50%; border-radius: 50%;'></a>";
                            }
                            else {
                                echo "<a class='nav-link' href='../info'><i class='bx bx-user-circle bx-sm text-primary'></i></a>";
                            }
                        }
                        else {
                            echo "<a class='nav-link' href='../signin/'>Đăng nhập</a>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->

    <section class="service-wrapper py-0">
        <div class="service-tag py-5 bg-secondary">
            <div class="col-md-12">
                <ul class="nav d-flex justify-content-center">
                    <li class="nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary <?php if (!isset($loai)) echo "active shadow";?> rounded-pill text-light px-4 light-300" href="./" data-filter=".project">All</a>
                    </li>
                    <li class="nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary <?php if ($loai==='guitar') echo "active shadow";?> rounded-pill text-light px-4 light-300" href="./?loai=guitar" data-filter=".guitar">Guitar</a>
                    </li>
                    <li class="filter-btn nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary <?php if ($loai==='piano') echo "active shadow";?> rounded-pill text-light px-4 light-300" href="./?loai=piano" data-filter=".piano">Piano</a>
                    </li>
                    <li class="nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary <?php if ($loai==='organ') echo "active shadow";?> rounded-pill text-light px-4 light-300" href="./?loai=organ" data-filter=".organ">Organ</a>
                    </li>
                    <li class="nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary <?php if ($loai==='ukulele') echo "active shadow";?> rounded-pill text-light px-4 light-300" href="./?loai=ukulele" data-filter=".ukulele">Ukulele</a>
                    </li>
                    <li class="nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary <?php if ($loai==='other') echo "active shadow";?> rounded-pill text-light px-4 light-300" href="./?loai=other" data-filter=".other">Nhạc cụ khác</a>
                    </li>
                    <li class="filter-btn nav-item mx-lg-4">
                        <a class="filter-btn nav-link btn-outline-primary <?php if ($loai==='phukien') echo "active shadow";?> rounded-pill text-light px-4 light-300" href="./?loai=phukien" data-filter=".phukien">Phụ kiện</a>
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <?php
        $mysqli = new mysqli("localhost","root","","mydb");
        if ($mysqli -> connect_error) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }
        if (isset($loai)) {
            $result = $mysqli->query("SELECT * FROM product WHERE loai='$loai' AND sale>0");
        }
        else {
            $result = $mysqli->query("SELECT * FROM product WHERE sale>0");
        }
    ?>

    <section class="container overflow-hidden py-5">
        <div class="row gx-5 gx-sm-3 gx-lg-5 gy-lg-5 gy-3 pb-3 projects">
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

                    <div class='col-xl-3 col-md-4 col-sm-6 project <?=$row['loai']?>'>
                        <a href='../product/info_product/?ID=<?=$row['ID']?>' class='service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0'>
                            <img class='service card-img' src='../assets/img/product/<?=$row['anh']?>' alt='Card image'>
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


    <!-- Start Footer -->
    <footer class="bg-secondary pt-4">
        <div class="container">
            <div class="row py-4">

                <div class="col-lg-3 col-12 align-left">
                    <a class="navbar-brand" href="../">
                        <i class='bx bx-music bx-sm text-light'></i>
                        <span class="text-light h5">XYSP</span> <span class="text-light h5 semi-bold-600">Music Shop</span>
                    </a>
                    <p class="text-light my-lg-4 my-2">
                        Các trang liên kết
                    </p>
                    <ul class="list-inline footer-icons light-300">
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="http://facebook.com/">
                                <i class='bx bxl-facebook-square bx-md'></i>
                            </a>
                        </li>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="https://www.linkedin.com/">
                                <i class='bx bxl-linkedin-square bx-md'></i>
                            </a>
                        </li>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="https://www.whatsapp.com/">
                                <i class='bx bxl-whatsapp-square bx-md'></i>
                            </a>
                        </li>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="https://www.flickr.com/">
                                <i class='bx bxl-flickr-square bx-md'></i>
                            </a>
                        </li>
                        <li class="list-inline-item m-0">
                            <a class="text-light" target="_blank" href="https://www.medium.com/">
                                <i class='bx bxl-medium-square bx-md' ></i>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 my-sm-0 mt-4">
                    <h3 class="h4 pb-lg-3 text-light light-300">Shop của chúng tôi</h2>
                        <ul class="list-unstyled text-light light-300">
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light" href="../">Trang chủ</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="../product/">Sản phẩm</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="../sale/">Khuyến mãi</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i></i><a class="text-decoration-none text-light py-1" href="../news/">Tin tức</a>
                            </li>
                        </ul>
                </div>

                <div class="col-lg-3 col-md-4 my-sm-0 mt-4">
                    <h2 class="h4 pb-lg-3 text-light light-300">Sản phẩm</h2>
                    <ul class="list-unstyled text-light light-300">
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="../product/?loai=guitar">Guitar</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="../product/?loai=piano">Piano</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="../product/?loai=organ">Organ</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="../product/?loai=ukulele">Ukulele</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="../product/?loai=other">Nhạc cụ khác</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="../product/?loai=phukien">Phụ kiện</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 my-sm-0 mt-4">
                    <h2 class="h4 pb-lg-3 text-light light-300">Liên hệ với chúng tôi</h2>
                    <ul class="list-unstyled text-light light-300">
                        <li class="pb-2">
                            <i class='bx-fw bx bx-phone bx-xs'></i><a class="text-decoration-none text-light py-1" href="tel:038-517-0741">038-517-0741</a>
                        </li>
                        <li class="pb-2">
                            <i class='bx-fw bx bx-mail-send bx-xs'></i><a class="text-decoration-none text-light py-1" href="mailto:dathuynhyl91@gmail.com">dathuynhyl91@gmail.com</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>

        <div class="w-100 bg-primary py-3">
            <div class="container">
                <div class="row pt-2">
                    <div class="col-lg-6 col-sm-12">
                        <p class="text-lg-start text-center text-light light-300">
                            © Copyright 2021 Purple Buzz Company. All Rights Reserved.
                        </p>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <p class="text-lg-end text-center text-light light-300">
                            Designed by <a rel="sponsored" class="text-decoration-none text-light" href="https://templatemo.com/" target="_blank"><strong>TemplateMo</strong></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->

    <!-- Bootstrap -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Templatemo -->
    <script src="../assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="../assets/js/custom.js"></script>

</body>

</html>