<?php
    session_start();
    if (isset($_SESSION['user'])) {
        if ($_SESSION['user']==='admin') {
            header("location:./admin/");
            exit;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Trang chủ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Load Require CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="assets/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="./assets/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./assets/css/custom.css">
</head>

<body>
    <!-- Header -->
    <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand h1" href="./">
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
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="./">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="./about">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="./news">Tin tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="./product/">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="./contact">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <a class="nav-link" href="./cart/"><i class='bx bx-cart bx-sm text-primary'></i></a>
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
                                echo "<a class='nav-link' href='./info/'><img class='recent-work-img card-img' src='./assets/img/user/",$row['anh'],"' alt='Card image' style='width: 25px; height:25px; object-fit: cover; object-position: 50% 50%; border-radius: 50%;'></a>";
                            }
                            else {
                                echo "<a class='nav-link' href='./info'><i class='bx bx-user-circle bx-sm text-primary'></i></a>";
                            }
                        }
                        else {
                            echo "<a class='nav-link' href='./signin/'>Đăng nhập</a>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->


    <!-- Start Banner Hero -->
    <div class="banner-wrapper bg-light">
        <div id="index_banner" style="background-image: url('./assets/img/banner boardgame.jpg');" class="banner-vertical-center-index container-fluid pt-5">

            <!-- Start slider -->
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"></li>
                    <li data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">

                        <div class="py-5 row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                                <h1 class="banner-heading h1 text-secondary display-3 mb-0 pb-5 mx-0 px-0 light-300 typo-space-line">
                                    Chất lượng sản phẩm hàng đầu Việt Nam
                              </h1>
                                <p class="banner-body text-muted py-3 mx-0 px-0">
                                    Chúng tôi cam kết chất lượng sản phẩm luôn đạt chuẩn, hài lòng mọi khách hàng đã trải nghiệm.
                              </p>
                                <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="./product/" role="button">Sản phẩm</a>
                            </div>
                        </div>

                    </div>
                    <div class="carousel-item">

                        <div class="py-5 row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                                <h1 class="banner-heading h1 text-secondary display-3 mb-0 pb-3 mx-0 px-0 light-300">
                                    Liên hệ chúng tôi để có trải nghiệm tốt nhất
                                </h1>
                                <p class="banner-body text-muted py-3">
                                    Chúng tôi luôn sẵn lòng giải đáp thắc mắc của khách hàng, để khách hàng có trải nghiệp tốt nhất.
                                </p>
                                <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="./contact/" role="button">Liên hệ ngay</a>
                            </div>
                        </div>

                    </div>
                    <div class="carousel-item">

                        <div class="py-5 row d-flex align-items-center">
                            <div class="banner-content col-lg-8 col-8 offset-2 m-lg-auto text-left py-5 pb-5">
                                <h1 class="banner-heading h1 text-secondary display-3 mb-0 pb-3 mx-0 px-0 light-300">
                                    Tin Tức mới nhất về cửa hàng
                                </h1>
                                <p class="banner-body text-muted py-3">
                                    Chúng tôi đem lại những thông tin mới nhất về board game một cách nhanh chóng nhất
                                </p>
                                <a class="banner-button btn rounded-pill btn-outline-primary btn-lg px-4" href="./news/" role="button">Tin tức</a>
                            </div>
                        </div>

                    </div>
                </div>
                <a class="carousel-control-prev text-decoration-none" href="#carouselExampleIndicators" role="button" data-bs-slide="prev">
                    <i class='bx bx-chevron-left'></i>
                    <span class="visually-hidden">Previous</span>
                </a>
                <a class="carousel-control-next text-decoration-none" href="#carouselExampleIndicators" role="button" data-bs-slide="next">
                    <i class='bx bx-chevron-right'></i>
                    <span class="visually-hidden">Next</span>
                </a>
            </div>
            <!-- End slider -->

        </div>
    </div>
    <!-- End Banner Hero -->

    <!-- Start Service -->
    <section class="service-wrapper py-3">
        <div class="container-fluid pb-3">
            <div class="row">
                <a href="about.php" style="text-decoration: none;">
                    <h2 class="h2 text-center col-12 py-5 semi-bold-600">CHÚNG TÔI LÀ Board Game TMĐ</h2>
                </a>
                <div class="service-header col-2 col-lg-3 text-end light-300">
                    <i class='bx bx-gift h3 mt-1'></i>
                </div>               
                <div class="service-heading col-10 col-lg-9 text-start float-end light-300">
                    <h2 class="h3 pb-4 typo-space-line">Make Success for future</h2>
                </div>               
            </div>
            <h5 class="service-footer col-10 offset-2 col-lg-9 offset-lg-3 text-start pb-3 text-muted px-2">
                Thành lập ngày 20/11/2020, Hiện Board Game TMĐ là công ty cung cấp các game hàng đầu tại Việt Nam.
            </h5>
        </div>

        <div class="service-tag py-5 bg-secondary">
            <div class="col-md-12">
                <div class="nav d-flex justify-content-center text-center">                  
                    <div class="col-lg-7 col-12 text-light pt-2">
                        <a href="news.php" style="text-decoration: none;">
                            <h2 class=" text-light text-center">TIN TỨC NỔI BẬT</h2>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="container overflow-hidden py-5">
        <div class="row gx-5 gx-sm-3 gx-lg-5 gy-lg-5 gy-3 pb-3 projects">
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'mydb');
                $sql = "SELECT * FROM news WHERE status=1";
                $query = mysqli_query($conn, $sql);       
                while($row = mysqli_fetch_assoc($query)){
                ?>       
                    <div class="col-xl-3 col-md-4 col-sm-6 project ui branding">
                        <a href="<?=$row['source']?>" class="service-work card border-0 text-white shadow-sm overflow-hidden mx-5 m-sm-0">
                            <img class="service card-img" src="./assets/img/<?php echo $row['image']; ?>" alt="Card image">
                            <div class="service-work-vertical card-img-overlay d-flex align-items-end">
                                <div class="service-work-content text-left text-light">
                                    <span class="btn btn-outline-light rounded-pill mb-lg-3 px-lg-4 light-300"><?php echo $row['name']; ?></span>
                                    <p class="card-text"><?php echo $row['description']; ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
            ?>
        </div>
    </section>
    <!-- End Service -->

    <!-- Xem sản phẩm -->
    <section class="bg-secondary">
        <div class="container py-5">
            <div class="row d-flex justify-content-center text-center">
                <div class="col-lg-2 col-12 text-light align-items-center">
                    <i class='display-1 bx bxs-box bx-lg'></i>
                </div>
                <div class="col-lg-7 col-12 text-light pt-2">
                    <h3 class="h4 light-300">Thoải thích với nhiều sự lựa chọn.</h3>
                    <p class="light-300">Với nhiều ưu đãi hấp dẫn.</p>
                </div>
                <div class="col-lg-3 col-12 pt-4">
                    <a href="work.php" class="btn btn-primary rounded-pill btn-block shadow px-4 py-2">Xem sản phẩm</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Start view hot product -->
    <section class="py-5 mb-5">
        <div class="container">
            <div class="recent-work-header row text-center pb-5">
                <h2 class="col-md-6 m-auto h2 semi-bold-600 py-5">Đang Giảm Giá</h2>
            </div>
            <div class="row gy-5 g-lg-5 mb-4">
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'mydb');
                $sql = "SELECT * FROM product WHERE sale>0";
                $query = mysqli_query($conn, $sql);       
                while($row = mysqli_fetch_assoc($query)){
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
                    <div class="col-md-4 mb-3">
                        <a href="./product/info_product/?ID=<?=$row['ID']?>" class="recent-work card border-0 shadow-lg overflow-hidden">
                            <img class="recent-work-img card-img" src="./assets/img/product/<?=$row['anh']?>" alt="Card image">
                            <div class="recent-work-vertical card-img-overlay d-flex align-items-end">
                                <div class="recent-work-content text-start mb-3 ml-3 text-dark">
                                    <h3 class="card-title light-300"><?php echo $row['ten'] ?></h3>
                                    <p class="card-text">
                                    <?php 
                                        if ($row['sale']>0) echo "<del>";?><?=$gia?>
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
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                }
            ?>
            </div>
        </div>
    </section>
    <!-- End view hot products -->

    <!-- Start Footer -->
    <footer class="bg-secondary pt-4">
        <div class="container">
            <div class="row py-4">

                <div class="col-lg-4 col-12 align-left">
                    <a class="navbar-brand" href="./">
                        <i class='bx bx-music bx-sm text-light'></i>
                        <span class="text-light h5">Board Game</span> <span class="text-light h5 semi-bold-600">TMĐ</span>
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

                <div class="col-lg-4 col-md-4 my-sm-0 mt-4">
                    <h3 class="h4 pb-lg-3 text-light light-300">Shop của chúng tôi</h2>
                        <ul class="list-unstyled text-light light-300">
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light" href="./">Trang chủ</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="./about/">Giới thiệu</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="./news/">Tin tức</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="./product/">Sản phẩm</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i></i><a class="text-decoration-none text-light py-1" href="./contact/">Liên hệ</a>
                            </li>
                        </ul>
                </div>

                

                <div class="col-lg-4 col-md-4 my-sm-0 mt-4">
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
                            © Copyright 2021 Board Game TMĐ Company. All Rights Reserved.
                        </p>
                    </div>
                    <div class="col-lg-6 col-sm-12">
                        <p class="text-lg-end text-center text-light light-300">
                            Designed by <a rel="sponsored" class="text-decoration-none text-light" href="" target="_blank"><strong>TMĐ</strong></a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </footer>
    <!-- End Footer -->


    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Load jQuery require for isotope -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Isotope -->
    <script src="assets/js/isotope.pkgd.js"></script>
    <!-- Page Script -->
    <script>
        $(window).load(function() {
            // init Isotope
            var $projects = $('.projects').isotope({
                itemSelector: '.project',
                layoutMode: 'fitRows'
            });
            $(".filter-btn").click(function() {
                var data_filter = $(this).attr("data-filter");
                $projects.isotope({
                    filter: data_filter
                });
                $(".filter-btn").removeClass("active");
                $(".filter-btn").removeClass("shadow");
                $(this).addClass("active");
                $(this).addClass("shadow");
                return false;
            });
        });
    </script>
    <!-- Templatemo -->
    <script src="assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="assets/js/custom.js"></script>

</body>

</html>