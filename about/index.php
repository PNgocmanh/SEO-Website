<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Giới Thiệu</title>
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
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../about">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../news">Tin tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../product/">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../contact">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
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
                                echo "<a class='nav-link' href='../info/'><img class='recent-work-img card-img' src='../assets/img/user/".$row['anh']."' alt='Card image' style='width: 25px; height:25px; object-fit: cover; object-position: 50% 50%; border-radius: 50%;'></a>";
                            }
                            else {
                                echo "<a class='nav-link' href='../info'><img class='recent-work-img card-img' src='../assets/img/user/admin.jpg' alt='Card image' style='width: 25px; height:25px; object-fit: cover; object-position: 50% 50%; border-radius: 50%;'></a>";
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

    <!-- Start Banner Hero -->
    <section class="bg-light w-100">
        <div class="container">
            <div class="row d-flex align-items-center py-5">
                <div class="col-lg-6 text-start">
                    <h1 class="h2 py-5 text-primary typo-space-line">Chúng tôi là</h1>
                    <p class="light-300">
                        Thành lập ngày 20/11/2020, Hiện Board Game TMĐ là công ty cung cấp các loại trò chơi hàng đầu tại Việt Nam.
                    </p>
                </div>
                <div class="col-lg-6">
                    <img src="../assets/img/banner-img-02.svg">
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Hero -->


    <!-- Start Team Member -->
    <section class="container py-5">
        <div class="pt-5 pb-3 d-lg-flex align-items-center gx-5">

            <div class="col-lg-3">
                <h2 class="h2 py-5 typo-space-line">Ban điều hành</h2>
                <p class="text-muted light-300">
                    Các thành viên thực hiện dự án.
                </p>
            </div>

            <div class="col-lg-9 row">
                <div class="team-member col-md-4">
                    <img class="team-member-img img-fluid rounded-circle p-4" src="../assets/img/team1.jpg" alt="Card image">
                    <ul class="team-member-caption list-unstyled text-center pt-4 text-muted light-300">
                        <li>Huỳnh Phương Thức</li>
                        <li>1513403</li>
                    </ul>
                </div>
                <div class="team-member col-md-4">
                    <img class="team-member-img img-fluid rounded-circle p-4" src="../assets/img/team-03.jpg" alt="Card image">
                    <ul class="team-member-caption list-unstyled text-center pt-4 text-muted light-300">
                        <li>Huỳnh Ngô Trường Đạt</li>
                        <li>1710056</li>
                    </ul>
                </div>
                <div class="team-member col-md-4">
                    <img class="team-member-img img-fluid rounded-circle p-4" src="../assets/img/team.jpg" alt="Card image">
                    <ul class="team-member-caption list-unstyled text-center pt-4 text-muted light-300">
                        <li>Phạm Ngọc Mạnh</li>
                        <li>1813045</li>
                    </ul>
                </div>
            </div>

        </div>
    </section>
    <!-- End Team Member -->

    <!-- Start Our Partner -->
    <section class="bg-secondary py-3">
        <div class="container py-5">
            <h2 class="h2 text-white text-center py-5">Đơn vị cộng tác</h2>
            <div class="row text-center">
                <div class="col-md-3 mb-3">
                    <div class="card partner-wap py-5">
                        <a href="#"><i class='display-1 text-white bx bxs-buildings'></i></a>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card partner-wap py-5">
                        <a href="#"><i class='display-1 bx text-white bxs-check-shield bx-lg'></i></a>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card partner-wap py-5">
                        <a href="#"><i class='display-1 text-white bx bxs-bolt-circle'></i></a>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="card partner-wap py-5">
                        <a href="#"><i class='display-1 text-white bx bxs-spa'></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End Our Partner-->

    <!-- Start Choice -->
    <section class="why-us banner-bg bg-light">
        <div class="container my-4">
            <div class="row">
                <div class="banner-img col-lg-5">
                    <img src="../assets/img/work.svg" class="rounded img-fluid" alt="">
                </div>
                <div class="banner-content col-lg-7 align-self-end">
                    <h3 class="h3 pb-3">Tại sạo bạn nên chọn dịch vụ của chúng tôi?</h3>
                    <p class="text-muted pb-5 light-300">
                    Chúng tôi cam kết mang lại chất lượng sản phẩm <strong>tốt nhất</strong> cho cộng đồng. Thủ tục tìm sản phẩm và thanh toán nhanh chóng. Đảm bảo hàng hóa không bị hư hỏng khi đến tay người nhận. Thời gian giao hàng nhanh
                   
                </div>
            </div>
        </div>
    </section>
    <!-- End Choice -->

    <!-- Start Aim -->
    <section class="banner-bg bg-white py-5">
        <div class="container my-4">
            <div class="row text-center">

                <div class="objective col-lg-4">
                    <div class="objective-icon card m-auto py-4 mb-2 mb-sm-4 bg-secondary shadow-lg">
                        <i class="display-4 bx bxs-bulb text-light"></i>
                    </div>
                    <h2 class="objective-heading h3 mb-2 mb-sm-4 light-300">Giá trị cốt lõi</h2>
                    <p class="light-300">
                        Chất lượng sản phẩm và dịch vụ. Sự hài lòng của bạn là hạnh phúc của chúng tôi.
                    </p>
                </div>

                <div class="objective col-lg-4 mt-sm-0 mt-4">
                    <div class="objective-icon card m-auto py-4 mb-2 mb-sm-4 bg-secondary shadow-lg">
                        <i class='display-4 bx bx-revision text-light'></i>
                    </div>
                    <h2 class="objective-heading h3 mb-2 mb-sm-4 light-300">Sứ mệnh</h2>
                    <p class="light-300">
                        Luôn cam kết cung cấpchất lượng cao từ sự trân trọng có cả tình yêu cũng như trách nhiệm mang tới cho cộng đồng.
                    </p>
                </div>

                <div class="objective col-lg-4 mt-sm-0 mt-4">
                    <div class="objective-icon card m-auto py-4 mb-2 mb-sm-4 bg-secondary shadow-lg">
                        <i class="display-4 bx bxs-select-multiple text-light"></i>
                    </div>
                    <h2 class="objective-heading h3 mb-2 mb-sm-4 light-300">Mục Tiêu</h2>
                    <p class="light-300">
                        Mang lại dịch vụ tốt nhất cho khách hàng.
                    </p>
                </div>

            </div>
        </div>
    </section>
    <!-- End Aim -->

    <!-- Start Footer -->
    <footer class="bg-secondary pt-4">
        <div class="container">
            <div class="row py-4">
                <div class="col-lg-4 col-12 align-left">
                    <a class="navbar-brand" href="../">
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
                    <h3 class="h4 pb-lg-3 text-light light-300">Shop của chúng tôi</h3>
                        <ul class="list-unstyled text-light light-300">
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light" href="../">Trang chủ</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="../about/">Giới thiệu</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="../news/">Tin tức</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="../product/">Sản phẩm</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i></i><a class="text-decoration-none text-light py-1" href="../contact/">Liên hệ</a>
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
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Templatemo -->
    <script src="../assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="../assets/js/custom.js"></script>

</body>

</html>