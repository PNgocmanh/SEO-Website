<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("location:../");
        exit;
    }
    if ($_SESSION['user']==='admin') {
        header("location:../");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Shopping Cart</title>
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

    <section class="container py-5">

        <h1 class="col-12 col-xl-12 h2 text-left text-primary pt-3 pb-4">Giỏ hàng của bạn</h1>

        <?php
            if (isset($_POST['ban'])) {
                $ID = $_POST['ban'];
                header("location:ban_user.php?ID=$ID");
            }
            if (isset($_POST['del'])) {
                $ID = $_POST['del'];
                header("location:del_user.php?ID=$ID");
            }
        ?>

        <?php
            $mysqli = new mysqli("localhost","root","","mydb");
            if ($mysqli -> connect_error) {
                echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                exit();
            }
            $username = $_SESSION['user'];
            $result = $mysqli->query("SELECT * FROM user WHERE username= '$username'");
            $row = $result->fetch_assoc();
            $ID = $row['ID'];
            $result = $mysqli->query("SELECT * FROM cart WHERE user_ID= $ID");
            while ($row = $result->fetch_assoc()) {
                $product_ID = $row['product_ID'];
                $result1 = $mysqli->query("SELECT * FROM product WHERE ID=$product_ID");
                $row1 = $result1->fetch_assoc();
                $tong = (intval($row1['gia'])*(100-$row1['sale'])/100)*$row['so_luong'];
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
                        <div class='row pb-4'>
                            <div class='col-lg-12 '>
                                <form class='contact-form row' method='post' action='del_cart.php/?ID=<?=$row['ID']?>' role='form'>
                
                                    <div class='col-1 me-4'>
                                        <div class='form-floating mb-4'>
                                            <img src="../assets/img/product/<?=$row1['anh']?>" style="height: 100px; width: 100px;object-fit: cover; object-position: 50% 50%; border-radius: 50%;" alt="">
                                        </div>
                                    </div>
                
                                    <div class='col-3'>
                                       <div class='form-floating mb-4'>
                                            <input type='text' class='form-control form-control-lg light-300' id='username' name='username' placeholder='username' value="<?=$row1['ten']?>" readonly>
                                            <label for='username light-300'>Tên sản phẩm</label>
                                        </div>
                                    </div>

                                    <div class='col-2'>
                                        <div class='form-floating mb-4'>
                                            <input type='text' class='form-control form-control-lg light-300' id='lien_he' name='lien_he' placeholder='lien_he' value="<?=$row1['gia']?>" readonly>
                                            <label for='lien_he light-300'>Giá</label>
                                        </div>
                                    </div>

                                    <div class='col-2'>
                                        <div class='form-floating mb-4'>
                                            <input type='number' class='form-control form-control-lg light-300' id='lien_he' name='lien_he' placeholder='lien_he' value="<?=$row['so_luong']?>" readonly>
                                            <label for='lien_he light-300'>Số lượng</label>
                                        </div>
                                    </div>
                
                                    <div class='col-2'>
                                        <div class='form-floating mb-4'>
                                            <input type='text' class='form-control form-control-lg light-300' id='lien_he' name='lien_he' placeholder='lien_he' value="<?=$gia?>" readonly>
                                            <label for='lien_he light-300'>Tổng</label>
                                        </div>
                                    </div>
                
                                    <div class='col-1'>
                                        <button type='submit' class='btn btn-danger rounded-pill radius-0 text-light light-300' id='del' name='del' style='max-width: 100%;' value="<?=$row['ID']?>">Delete</button>
                                    </div>
                                </form>
                            </div>
            
                        </div>
                <?php
            }    ?>
    </section>
    <!-- End Contact -->

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