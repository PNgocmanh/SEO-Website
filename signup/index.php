<?php
    session_start();
    if (isset($_SESSION['user'])) {
        header("location:../");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Đăng Ký</title>
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
            $check = true;

            $username = $_POST['username'];
            if (strlen($username)<2 || strlen($username)>50) {
                echo "<script> alert('Chỉ chấp nhận tài khoản 2-50 kí tự!')</script>";
                $check = false;
            }
            $password = $_POST['password'];
            if (strlen($password)<2 || strlen($password)>50) {
                echo "<script> alert('Chỉ chấp nhận mật khẩu 2-50 kí tự!')</script>";
                $check = false;
            }
            $repassword = $_POST['password'];
            $email = $_POST['email'];
            if (!preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email)) {
                echo "<script> alert('Sai định dạng email!')</script>";
                $check = false;
            }
            $ho_ten = $_POST['ho_ten'];
            if (strlen($ho_ten)<2 || strlen($ho_ten)>50) {
                echo "<script> alert('Chỉ chấp nhận tên hiển thị 2-50 kí tự!')</script>";
                $check = false;
            }
            $lien_he = $_POST['lien_he'];
            if (strlen($lien_he)<2 || strlen($lien_he)>500) {
                echo "<script> alert('Chỉ chấp nhận liên hệ 2-500 kí tự!')</script>";
                $check = false;
            }
            $quyen = 1;
            
            $errors= array();
            $file_name = $_FILES['anh']['name'];
            $file_size = $_FILES['anh']['size'];
            $file_tmp = $_FILES['anh']['tmp_name'];
            $file_type = $_FILES['anh']['type'];
            $file_parts = explode('.',$_FILES['anh']['name']);
            $file_ext= strtolower(end($file_parts));
            $expensions= array("jpeg","jpg","png");
            if(in_array($file_ext,$expensions)=== false){
                $errors[]="Chỉ hỗ trợ upload file JPEG hoặc PNG.";
            }
            if($file_size > 2097152) {
                $errors[]='Kích thước file không được lớn hơn 2MB';
            }
            $image = $_FILES['anh']['name'];
            $target = "../assets/img/user/".basename($image);
            if (move_uploaded_file($_FILES['anh']['tmp_name'], $target)) {
                echo '<script language="javascript">alert("Đã upload thành công!");</script>';
            }else{
                echo '<script language="javascript">alert("Đã upload thất bại!");</script>';
            }

            if ($check) {
                $mysqli = new mysqli("localhost","root","","seo-website");
                if ($mysqli -> connect_error) {
                    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                    exit();
                }
                $result = $mysqli->query("SELECT * FROM user WHERE username='$username'");
                $row = $result->fetch_assoc();
                if (isset($row)) {
                    echo "<script> alert('Username " , $username , " đã được sử dụng')</script>";
                }
                else {
                    if ($password===$repassword) {
                        $password = md5($password);
                        if (isset($_FILES['anh'])) {
                            $sql = "INSERT INTO user(username,password,ho_ten,email,anh,lien_he,quyen) VALUES ('$username','$password','$ho_ten','$email','$image','$lien_he',$quyen)";
                        }
                        else {
                            $sql = "INSERT INTO user(username,password,ho_ten,email,lien_he,quyen) VALUES ('$username','$password','$ho_ten','$email','$lien_he',$quyen)";
                        }
                        if ($mysqli->query($sql)) {
                            $_SESSION['user'] = $username;
                            header("location:../");
                        }
                        else {
                            echo "<script> alert('Error!')</script>";
                        }
                    }
                    else {
                        echo "<script> alert('Nhập lại mật khẩu không trùng khớp')</script>";
                    }
                }
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
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="index.php">Trang chủ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="about.php">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="news.php">Tin tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="work.php">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="pricing.php">Bảng giá</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="contact.php">Liên hệ</a>
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
                            echo "<a class='nav-link' href='../signin'>Đăng nhập</a>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>

    <section class="container py-5">

        <h1 class="col-12 col-xl-8 h2 text-left text-primary pt-3">Vui lòng đăng kí tại đây!</h1>
        <h2 class="col-12 col-xl-8 h4 text-left regular-400">Chào mừng bạn!</h2>

        <div class="row pb-4">
            


            <!-- Start Contact Form -->
            <div class="col-lg-8 ">
                <form class="contact-form row" method="post" action="#" role="form" enctype='multipart/form-data'>

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300" id="username" name="username" placeholder="Tên đăng nhập" required>
                            <label for="username light-300">Tên đăng nhập</label>
                        </div>
                    </div><!-- End Input Name -->

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <input type="email" class="form-control form-control-lg light-300" id="email" name="email" placeholder="Email" required>
                            <label for="email light-300">Email</label>
                        </div>
                    </div><!-- End Input Email -->

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <input type="password" class="form-control form-control-lg light-300" id="password" name="password" placeholder="Mật khẩu" required>
                            <label for="password light-300">Mật khẩu</label>
                        </div>
                    </div><!-- End Input Phone -->

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <input type="password" class="form-control form-control-lg light-300" id="repassword" name="repassword" placeholder="Nhập lại mật khẩu" required>
                            <label for="repassword light-300">Nhập lại mật khẩu</label>
                        </div>
                    </div><!-- End Input Company Name -->

                    <div class="col-12">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-lg light-300" id="ho_ten" name="ho_ten" placeholder="Tên hiển thị" required>
                            <label for="ho_ten light-300">Tên hiển thị</label>
                        </div>
                    </div><!-- End Input Subject -->

                    <div class="col-12">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-lg light-300" id="lien_he" name="lien_he" placeholder="Địa chỉ liên hệ" required>
                            <label for="lien_he light-300">Địa chỉ liên hệ</label>
                        </div>
                    </div><!-- End Input Subject -->

                    <div class="col-12">
                        <label for="anh">Tải ảnh đại diện lên</label><br>
                        <input type="hidden" name="size" value="1000000"> 
                        <input type="file" id="anh" name="anh" >
                    </div><!-- End Input Subject -->

                    <div class="col-lg-12 col-12 m-auto text-end">
                        <button type="submit" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300" name="submit" id="submit">Đăng kí</button>
                    </div>

                </form>
            </div>
            <!-- End Contact Form -->
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