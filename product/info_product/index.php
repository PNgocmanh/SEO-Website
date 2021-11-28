<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Thông tin sản phẩm</title>
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
<!--
    
TemplateMo 561 Purple Buzz

https://templatemo.com/tm-561-purple-buzz

-->
</head>

<body>
    <?php
        extract($_REQUEST);
        if (!isset($ID)) {
            $ID = 2;
        }
        $mysqli = new mysqli("localhost","root","","mydb");
        if ($mysqli -> connect_error) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }
    ?>

    <!-- Header -->
    <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand h1" href="../../">
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
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../../">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../../about">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../../news">Tin tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../../product/">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../../contact">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <a class="nav-link" href="../../cart/"><i class='bx bx-cart bx-sm text-primary'></i></a>
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
                                echo "<a class='nav-link' href='../../info/'><img class='recent-work-img card-img' src='../../assets/img/user/",$row['anh'],"' alt='Card image' style='width: 25px; height:25px; object-fit: cover; object-position: 50% 50%; border-radius: 50%;'></a>";
                            }
                            else {
                                echo "<a class='nav-link' href='../../info'><i class='bx bx-user-circle bx-sm text-primary'></i></a>";
                            }
                        }
                        else {
                            echo "<a class='nav-link' href='../../signin/'>Đăng nhập</a>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->

    <section class="container overflow-hidden py-5">
        <div class="row gx-5 gx-sm-3 gx-lg-5 gy-lg-5 gy-3 pb-3 projects">
            <?php
                $result = $mysqli->query("SELECT * FROM product WHERE ID=$ID");
                $row = $result->fetch_assoc();
            ?>
            
            <div class='col-5'>
                <img class='service card-img' src='../../assets/img/product/<?=$row['anh']?>' alt='Card image'>
            </div>

            <div class="col-6">
                
                <form class="contact-form row" method="post" action="./add_cart.php?ID=<?=$ID?>" role="form" enctype='multipart/form-data'>

                    <div class="col-lg-12 mb-4">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300" id="ten" name="ten" placeholder="Tên sản phẩm" value="<?=$row['ten']?>"readonly>
                            <label for="ten light-300">Tên sản phẩm</label>
                        </div>
                    </div><!-- End Input Name -->

                    <?php
                        $tong = intval($row['gia'])*(100-$row['sale'])/100;
                        $gia = '';
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

                    <div class="col-lg-12 mb-4">
                        <div class="form-floating">
                            <input readonly type="text" class="form-control form-control-lg light-300" id="gia" name="gia" placeholder="Giá (VND)" value="<?=$gia?>">
                            <label for="gia light-300">Giá (VND)</label>
                        </div>
                    </div><!-- End Input Email -->

                    <div class="col-lg-12 mb-4">
                        <div class="form-floating">
                            <input type="number" class="form-control form-control-lg light-300" id="so_luong" name="so_luong" placeholder="Số lượng" value="0" min="1" max="<?=$row['so_luong']?>">
                            <label for="so_luong light-300">Số lượng</label>
                        </div>
                    </div><!-- End Input Email -->

                    

                    <div class="col-md-12 col-12 m-auto text-end">
                        <button type="submit" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300" name="add_cart" id="add_cart">Thêm vào giỏ hàng</button>
                    </div>

                </form>
                
            </div>
            <p class="worksingle-footer py-3 text-muted light-300">
                    Xuất xứ: <?php echo $row['origin']; ?><br/>
                    Loại sản phẩm: Chính hãng<br/>
                    Lứa tuổi: <?php echo $row['age']; ?><br/>
                    Số người chơi: <?php echo $row['player']; ?> người<br/>
                    Nhập và phân phối đến bạn bởi: Boardgame TMĐ<br/>
                    Năm sản xuất: 2021. <br>
                    Mô tả: <?php echo $row['mo_ta']; ?>
                </p>
        </div>
        <div class="row">
            <div class="col-8 m-auto rounded" style="border: 1px solid #dee2e6;">
                <h4 class="h5 mt-1 pb-2">Bình luận</h4>
                <?php
                    if (isset($_SESSION['user'])) {
                        $username = $_SESSION['user'];
                        $result2 = $mysqli->query("SELECT * FROM user WHERE username='$username'");
                        $row2 = $result2->fetch_assoc();
                    }
                    $result = $mysqli->query("SELECT * FROM comment WHERE product_ID=$ID");
                    while ($row = $result->fetch_assoc()) {
                        $user_ID = $row['user_ID'];
                        $result1 = $mysqli->query("SELECT * FROM user WHERE ID=$user_ID");
                        $row1 = $result1->fetch_assoc()
                ?>
                    <div class="d-flex pb-4">
                        <div class="pe-2">
                            <img src="../../assets/img/user/<?=$row1['anh']?>" style="width:50px; height:50px; object-fit: cover; object-position: 50% 50%; border-radius: 50%;" alt="">
                        </div>
                        <div class="">
                            <div class="d-flex">
                                <h5 class="h6"><?=$row1['ho_ten']?></h5>
                                <?php if (isset($_SESSION['user'])) if ($row['user_ID']===$row2['ID']) {?>
                                    <div class='ms-4'><a href='del_cmt.php?ID=<?=$row['ID']?>'>Delete</a></div>
                                <?php } ?>
                            </div>
                            <p class="text-muted light-300 mb-1"><?=$row['thoi_gian']?></p>
                            <div class="card-body border light-300"><?=$row['noi_dung']?></div>
                        </div>
                    </div>
                <?php
                    }
                ?>

                <form class="contact-form row pb-3" method="post" action="comment.php?ID=<?=$ID?>" role="form">
                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <textarea class="form-control light-300" rows="8" placeholder="Bình luận của bạn" id="floatingtextarea" name="noi_dung" required></textarea>
                            <label for="floatingtextarea light-300">Bình luận của bạn</label>
                        </div>
                        <div class="col-lg-12 col-12 m-auto text-end">
                            <button type="submit" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300" name="comment" id="comment">Bình luận</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!-- End Contact -->


    <!-- Start Footer -->
    <footer class="bg-secondary pt-4">
        <div class="container">
            <div class="row py-4">

                <div class="col-lg-4 col-12 align-left">
                    <a class="navbar-brand" href="../../">
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
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light" href="../../">Trang chủ</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="../../about/">Giới thiệu</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="../../news/">Tin tức</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i><a class="text-decoration-none text-light py-1" href="../../product/">Sản phẩm</a>
                            </li>
                            <li class="pb-2">
                                <i class='bx-fw bx bxs-chevron-right bx-xs'></i></i><a class="text-decoration-none text-light py-1" href="../../contact/">Liên hệ</a>
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
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Templatemo -->
    <script src="../../assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="../../assets/js/custom.js"></script>

</body>

</html>