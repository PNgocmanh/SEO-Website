<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("location:../");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Purple Buzz - Contact Page</title>
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

    <!-- Header -->
    <nav id="main_nav" class="navbar navbar-expand-lg navbar-light bg-white shadow">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand h1" href="./">
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
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="./">Khách hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../news">Tin Tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../product">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="pricing.php">Bảng Giá</a>
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
                            echo "<a class='nav-link' href='../info'><img class='recent-work-img card-img' src='../assets/img/user/admin.jpg' alt='Card image' style='width: 25px; height:25px; object-fit: cover; object-position: 50% 50%; border-radius: 50%;'></a>";
                        }
                        else {
                            echo "<a class='nav-link' href='../'>Đăng nhập</a>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Header -->

    <section class="container py-5">

        <h1 class="col-12 col-xl-8 h2 text-left text-primary pt-3 pb-4">Chào quản trị viên đây là user của shop!</h1>

        <?php
            if (isset($_POST['ban'])) {
                $ID = $_POST['ban'];
                header("location:ban.php?ID=$ID");
            }
            if (isset($_POST['del'])) {
                $ID = $_POST['del'];
                header("location:del.php?ID=$ID");
            }
        ?>

        <?php
            $mysqli = new mysqli("localhost","root","","seo-website");
            if ($mysqli -> connect_error) {
                echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                exit();
            }
            $result = $mysqli->query("SELECT * FROM user");
            while ($row = $result->fetch_assoc()) {
                if ($row['quyen']!=='0') {
                    $ban = 'Ban';
                    if ($row['quyen']==='2') {
                        $ban = 'Unban';
                    }

                    echo "
                        <div class='row pb-4'>
                            <div class='col-lg-12 '>
                                <form class='contact-form row' method='post' action='#' role='form'>
                
                                    <div class='col-1'>
                                        <div class='form-floating mb-4'>
                                            <input type='text' class='form-control form-control-lg light-300' id='id' name='id' placeholder='id' value=",$row['ID']," readonly>
                                            <label for='id light-300'>ID</label>
                                        </div>
                                    </div>
                
                                    <div class='col-3'>
                                        <div class='form-floating mb-4'>
                                            <input type='text' class='form-control form-control-lg light-300' id='username' name='username' placeholder='username' value=",$row['username']," readonly>
                                            <label for='username light-300'>Username</label>
                                        </div>
                                    </div>
                
                                    <div class='col-3'>
                                        <div class='form-floating mb-4'>
                                            <input type='email' class='form-control form-control-lg light-300' id='email' name='email' placeholder='email' value=",$row['email']," readonly>
                                            <label for='email light-300'>Email</label>
                                        </div>
                                    </div>
                
                                    <div class='col-3'>
                                        <div class='form-floating mb-4'>
                                            <input type='text' class='form-control form-control-lg light-300' id='lien_he' name='lien_he' placeholder='lien_he' value='",$row['lien_he'],"' readonly>
                                            <label for='lien_he light-300'>Địa chỉ</label>
                                        </div>
                                    </div>
                                    
                                    <div class='col-1'>
                                        <button type='submit' class='btn btn-secondary rounded-pill radius-0 text-light light-300' id='ban' name='ban' style='max-width: 100%;' value=",$row['ID'],">",$ban,"</button>
                                    </div>
                
                                    <div class='col-1'>
                                        <button type='submit' class='btn btn-secondary rounded-pill radius-0 text-light light-300' id='del' name='del' style='max-width: 100%;' value=",$row['ID'],">Delete</button>
                                    </div>
                                </form>
                            </div>
            
                        </div>";
                }
            }
        ?>
    </section>
    <!-- End Contact -->


    <!-- Start Footer -->
    <?php
        include("../footer.php");
    ?>
    <!-- End Footer -->


    <!-- Bootstrap -->
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Templatemo -->
    <script src="../../assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="../../assets/js/custom.js"></script>

</body>

</html>