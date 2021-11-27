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
    <title>Thêm sản phẩm</title>
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
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../../">Người dùng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../../product/">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../../comment/">Bình luận</a>
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
        if (isset($_POST['submit'])) {
            $check = true;

            $ten = $_POST['ten'];
            if (strlen($ten)<2 || strlen($ten)>50) {
                echo "<script> alert('Chỉ chấp nhận tên sản phẩm 2-50 kí tự!')</script>";
                $check = false;
            }
            $gia = $_POST['gia'];
            $so_luong = $_POST['so_luong'];
            $mo_ta = $_POST['mo_ta'];
            $xuat_xu = $_POST['origin'];
            $age = $_POST['age'];
            $player = $_POST['player'];
            if (strlen($mo_ta)<2 || strlen($mo_ta)>2000) {
                echo "<script> alert('Chỉ chấp nhận mô tả 2-2000 kí tự!')</script>";
                $check = false;
            }
            $sale = $_POST['sale'];
            
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
            $target = "../../../assets/img/product/".basename($image);
            if (move_uploaded_file($_FILES['anh']['tmp_name'], $target)) {
                echo '<script language="javascript">alert("Đã upload thành công!");</script>';
            }else{
                echo '<script language="javascript">alert("Đã upload thất bại!");</script>';
            }

            if ($check) {
                $mysqli = new mysqli("localhost","root","","mydb");
                if ($mysqli -> connect_error) {
                    echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
                    exit();
                }
                $result = $mysqli->query("SELECT * FROM product WHERE ten='$ten'");
                $row = $result->fetch_assoc();
                if (isset($row)) {
                    echo "<script> alert('Tên sản phẩm " , $ten , " đã tồn tại')</script>";
                }
                else {
                    $sql = "INSERT INTO product(ten,gia,mo_ta,so_luong,anh,sale,age,player,origin) VALUES ('$ten','$gia','$mo_ta',$so_luong,'$image','$sale','$age','$player','$origin')";
                    if ($mysqli->query($sql)) {
                        header("location:../");
                    }
                }
            }
        }
    ?>

    <section class="container overflow-hidden py-5">
        <div class="row gx-5 gx-sm-3 gx-lg-5 gy-lg-5 gy-3 pb-3 projects">

            
        <div class="col-lg-8 ">
                <form class="contact-form row" method="post" action="#" role="form" enctype='multipart/form-data'>

                    <div class="col-lg-12 mb-4">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300" id="ten" name="ten" placeholder="Tên sản phẩm" required>
                            <label for="ten light-300">Tên sản phẩm</label>
                        </div>
                    </div><!-- End Input Name -->

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <input type="number" class="form-control form-control-lg light-300" id="gia" name="gia" placeholder="Giá (VND)" min="1000" required>
                            <label for="gia light-300">Giá (VND)</label>
                        </div>
                    </div><!-- End Input Email -->

                    <div class="col-lg-6">
                        <div class="form-floating mb-4">
                            <input type="number" class="form-control form-control-lg light-300" id="so_luong" name="so_luong" placeholder="Số lượng" min="1" required>
                            <label for="so_luong light-300">Số lượng</label>
                        </div>
                    </div><!-- End Input Subject -->

                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <textarea class="form-control light-300" rows="8" placeholder="Mô tả" id="floatingtextarea" name="mo_ta" required></textarea>
                            <label for="floatingtextarea light-300">Mô tả</label>
                        </div>
                    </div><!-- End Textarea Message -->

                    <div class="col-lg-12 mb-4">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300" id="age" name="age" placeholder="Độ tuổi" required>
                            <label for="ten light-300">Độ tuổi</label>
                        </div>
                    </div><!-- End Input Name -->

                    <div class="col-lg-12 mb-4">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300" id="player" name="player" placeholder="Số người chơi" required>
                            <label for="ten light-300">Số người chơi</label>
                        </div>
                    </div><!-- End Input Name -->

                    <div class="col-lg-12 mb-4">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300" id="origin" name="origin" placeholder="Xuất xứ" required>
                            <label for="ten light-300">Xuất xứ</label>
                        </div>
                    </div><!-- End Input Name -->

                    <div class="col-lg-12 mb-4">
                        <div class="form-floating">
                            <input type="number" class="form-control form-control-lg light-300" id="sale" name="sale" placeholder="Khuyến mãi (%)" min="0" max="90" value="0">
                            <label for="sale light-300">Khuyến mãi (%)</label>
                        </div>
                    </div><!-- End Input Email -->

                    <div class="col-12">
                        <label for="anh">Tải ảnh mới của sản phẩm</label><br>
                        <input type="hidden" name="size" value="1000000"> 
                        <input type="file" id="anh" name="anh" required>
                    </div><!-- End Input Subject -->

                    <div class="col-lg-12 col-12 m-auto text-end">
                        <button type="submit" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300" name="submit" id="submit">Thêm sản phẩm mới</button>
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