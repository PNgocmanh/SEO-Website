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
    <title>Thông tin sản phẩm</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="../../../assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../../assets/img/favicon.ico">
    <!-- Load Require CSS -->
    <link href="../../../assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="../../../assets/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="../../../assets/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../../../assets/css/custom.css">
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
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../../">Người dùng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../../product/">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../../comment/">Bình luận</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../../contact/">Liên hệ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../../news/">Tin tức</a>
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
                                echo "<a class='nav-link' href='../../logout.php'><img class='recent-work-img card-img' src='../../../assets/img/user/",$row['anh'],"' alt='Card image' style='width: 25px; height:25px; object-fit: cover; object-position: 50% 50%; border-radius: 50%;'></a>";
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
        <div class="row gx-5 gx-sm-3 gx-lg-5 gy-lg-5 gy-3 pb-3 projects">

            
            <div class='col-5'>
                <img class='service card-img' src='../../../assets/img/product/<?=$row['anh']?>' alt='Card image'>
            </div>

            <div class="col-6">
                
                <form class="contact-form row" method="post" action="./change_info.php?ID=<?=$ID?>" role="form" enctype='multipart/form-data'>

                    <div class="col-lg-12 mb-4">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300" id="ten" name="ten" placeholder="Tên sản phẩm" value="<?=$row['ten']?>"readonly>
                            <label for="ten light-300">Tên sản phẩm</label>
                        </div>
                    </div><!-- End Input Name -->

                    <div class="col-lg-12 mb-4">
                        <div class="form-floating">
                            <input type="number" class="form-control form-control-lg light-300" id="gia" name="gia" placeholder="Giá (VND)" value="<?=$row['gia']?>" min="1000">
                            <label for="gia light-300">Giá (VND)</label>
                        </div>
                    </div><!-- End Input Email -->

                    <div class="col-lg-12 mb-4">
                        <div class="form-floating">
                            <input type="number" class="form-control form-control-lg light-300" id="so_luong" name="so_luong" placeholder="Số lượng" value="<?=$row['so_luong']?>" min="0">
                            <label for="so_luong light-300">Số lượng</label>
                        </div>
                    </div><!-- End Input Email -->

                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <textarea class="form-control light-300" rows="8" placeholder="Mô tả" id="floatingtextarea" name="mo_ta"><?=$row['mo_ta']?></textarea>
                            <label for="floatingtextarea light-300">Mô tả</label>
                        </div>
                    </div><!-- End Textarea Message -->

                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-lg light-300" id="origin" name="origin" placeholder="Xuất xứ" min="0" max="90" value="<?=$row['origin']?>">
                            <label for="sale light-300">Xuất xứ</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-lg light-300" id="age" name="age" placeholder="Độ tuổi" min="0" max="90" value="<?=$row['age']?>">
                            <label for="sale light-300">Độ tuổi</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control form-control-lg light-300" id="player" name="player" placeholder="Số người chơi" min="0" max="90" value="<?=$row['player']?>">
                            <label for="sale light-300">Số người chơi</label>
                        </div>
                    </div>


                    <div class="col-lg-12 mb-4">
                        <div class="form-floating">
                            <input type="number" class="form-control form-control-lg light-300" id="sale" name="sale" placeholder="Khuyến mãi (%)" min="0" max="90" value="<?=$row['sale']?>">
                            <label for="sale light-300">Khuyến mãi (%)</label>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="anh">Tải ảnh mới của sản phẩm</label><br>
                        <input type="hidden" name="size" value="1000000"> 
                        <input type="file" id="anh" name="anh">
                    </div><!-- End Input Subject -->

                    <div class="col-md-12 col-12 m-auto text-end">
                        <button type="submit" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300" name="change_info" id="change_info">Đổi thông tin</button>
                    </div>

                </form>
            </div>

        </div>

        <div class="row">
            <div class="col-8 m-auto rounded" style="border: 1px solid #dee2e6;">
                <h4 class="h5 mt-1 pb-2">Bình luận</h4>
                <?php
                    $result = $mysqli->query("SELECT * FROM comment WHERE product_ID=$ID");
                    while ($row = $result->fetch_assoc()) {
                        $user_ID = $row['user_ID'];
                        $result1 = $mysqli->query("SELECT * FROM user WHERE ID=$user_ID");
                        $row1 = $result1->fetch_assoc()
                ?>
                    <div class="d-flex pb-4">
                        <div class="pe-2">
                            <img src="../../../assets/img/user/<?=$row1['anh']?>" style="width:50px; height:50px; object-fit: cover; object-position: 50% 50%; border-radius: 50%;" alt="">
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

    <!-- Bootstrap -->
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Templatemo -->
    <script src="../../../assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="../../../assets/js/custom.js"></script>

</body>

</html>