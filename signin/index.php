<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header("location:../");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng Nhập</title>
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
    <?php
        if (isset($_POST['submit'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $mysqli = new mysqli("localhost","root","","seo-website");
            if ($mysqli -> connect_error) {
                echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                exit();
            }
            $result = $mysqli->query("SELECT * FROM user WHERE username='$username'");
            $row = $result->fetch_assoc();
            if (isset($row)) {
                if ($row['password']===md5($password)) {
                    $_SESSION['user'] = $username;
                    if ($row['quyen']==='0') {
                        header("location:../admin/");
                    }
                    else {
                        if ($row['quyen']==='1') {
                            header("location:../");
                        }
                        else {
                            echo "<script> alert('Username ",$username," đã bị cấm!')</script>";
                        }
                    }
                }
                else {
                    echo "<script> alert('Mật khẩu không đúng')</script>";
                }
            }
            else {
                echo "<script> alert('Username ",$username," không tồn tại')</script>";
            }
        }
    ?>

    <!-- Header -->
    <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand h1" href="../">
                <i class='bx bx-buildings bx-sm text-dark'></i>
                <span class="text-dark h4">Purple</span> <span class="text-primary h4">Buzz</span>
            </a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-toggler-success" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="navbar-toggler-success">
                <div class="flex-fill mx-xl-5 mb-2">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-xl-5 text-center text-dark">
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../about.php">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../news.php">Tin tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../work.php">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../pricing.php">Bảng giá</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../contact.php">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <a class="nav-link" href="#"><i class='bx bx-search bx-sm bx-tada-hover text-primary'></i></a>
                    <?php
                        if (isset($_SESSION['user'])) {
                            echo "<i class='bx bx-user-circle bx-sm text-primary'></i>";
                        }
                        else {
                            echo "<a class='nav-link' href='./'>Đăng nhập</a>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->

    <section class="container py-5">

        <h1 class="col-12 col-xl-8 h2 text-left text-primary pt-3">Vui lòng đăng nhập tại đây!</h1>
        <h2 class="col-12 col-xl-8 h4 text-left regular-400">Bạn chưa có tài khoản? </h2>
        <div class="col-12 col-xl-8 h6">
            <a class="text-left" href="../signup/">Đăng kí tại đây</a>
        </div>

        <div class="row pb-4">
            
            <!-- Begin Form sign in -->
            <div class="col-lg-8 ">
                <form class="contact-form row" method="post" action="#" role="form">

                    <div class="col-12">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-lg light-300" id="username" name="username" placeholder="Tên đăng nhập">
                            <label for="username light-300">Tên đăng nhập</label>
                        </div>
                    </div><!-- End Input Username -->

                    <div class="col-12">
                        <div class="form-floating mb-4">
                            <input type="password" class="form-control form-control-lg light-300" id="password" name="password" placeholder="Mật khẩu">
                            <label for="password light-300">Mật khẩu</label>
                        </div>
                    </div><!-- End Input Password -->

                    <div class="col-md-12 col-12 m-auto text-end">
                        <button type="submit" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300" id="submit" name="submit">Đăng nhập</button>
                    </div>

                </form>
            </div>
            <!-- End Form sign in -->


        </div>
    </section>
    <!-- End Contact -->


    <!-- Start Footer -->
    <?php
        include("../footer.php");
    ?>
    <!-- End Footer -->


    <!-- Bootstrap -->
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Templatemo -->
    <script src="../assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="../assets/js/custom.js"></script>

</body>

</html>