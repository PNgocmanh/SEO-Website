<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("location:../");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ADMIN</title>
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
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../admin">Khách hàng</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../admin/admin_news.php">Tin Tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../product">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="pricing.php">Bảng Giá</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../admin/feedback.php">Liên hệ</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <a class="nav-link" href="#"><i class='bx bx-search bx-sm bx-tada-hover text-primary'></i></a>
                    <?php
                        if (isset($_SESSION['user'])) {
                            echo "<a class='nav-link' href='./info'><img class='recent-work-img card-img' src='../assets/img/user/admin.jpg' alt='Card image' style='width: 25px; height:25px; object-fit: cover; object-position: 50% 50%; border-radius: 50%;'></a>";
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

    <!-- Start Our Work -->
    <section class="container py-5">
        <h1 class="col-12 col-xl-8 h2 text-left text-primary pt-3 pb-4">Tất cả tin tức</h1>
        <div class="row projects gx-lg-5">
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'seo-website');
                $sql = "SELECT * FROM news";
                $query = mysqli_query($conn, $sql);        
                while($row = mysqli_fetch_assoc($query)){
                ?>       
                    <div style="margin-bottom: 50px;" class="col-sm-6 col-lg-4 text-decoration-none project marketing social business">
                        <div class="service-work overflow-hidden card mb-5 mx-5 m-sm-0">
                            <a href="../admin/baiviet.php" style="text-decoration: none;">
                                <img class="card-img-top" src="../assets/img/<?php echo $row['image']; ?>" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title light-300 text-dark"><?php echo $row['name']; ?></h5>
                                    <p class="card-text light-300 text-dark">
                                        <?php
                                            echo $row['description'];
                                        ?>
                                    </p>
                                    <span class="text-decoration-none text-primary light-300">
                                        Read more <i class='bx bxs-hand-right ms-1'></i> 
                                    </span>
                                </div>
                            </a>
                            <button type="submit" class="btn btn-secondary text-light ">Edit</button>
                            <button type="submit" class="btn btn-danger text-light ">Delete</button>
                            
                        </div>
                    </div>
                <?php
                }
            ?>
        </div>
        
        <!--Admin-->
        <a href="../component/add-news.php" class="btn btn-primary">Add New</a>

    </section>
    <!-- End Our Work -->

    <!-- Start Feature Work -->
    <section class="bg-light py-5">
        <div class="feature-work container my-4">
            <div class="row d-flex d-flex align-items-center">
                <div class="col-lg-5">
                    <h3 class="feature-work-title h4 text-muted light-300">Nổi bật</h3>
                    <h1 class="feature-work-heading h2 py-3 semi-bold-600">Chương trình đặc biệt</h1>
                    <p class="feature-work-body text-muted light-300">
                        Nhân dịp đặc biệt, các sản phẩm sau được giảm 50% để tri ân khách hàng đã ủng hộ chúng tôi thời gian qua.
                        Các bạn tìm sản phẩm sau trong mục sản phẩm để nhận được ưu đãi.
                    </p>
                    <p class="feature-work-footer text-muted light-300">Thời gian chương trình bắt đầu từ ngày 19/11/2021 đến hết ngày 30/11/2021. </p>
                </div>
                <div class="col-lg-6 offset-lg-1 align-left">
                    <div class="row">
                        <a class="col" data-type="image" data-fslightbox="gallery" href="./assets/img/feature-work-1-large.jpg">
                            <img class="img-fluid" src="../assets/img/feature-work-1.jpg">
                        </a>
                        <a class="col" data-type="image" data-fslightbox="gallery" href="./assets/img/feature-work-2-large.jpg">
                            <img class="img-fluid" src="../assets/img/feature-work-2.jpg">
                        </a>
                    </div>
                    <div class="row pt-4">
                        <a class="col" data-type="image" data-fslightbox="gallery" href="./assets/img/feature-work-3-large.jpg">
                            <img class="img-fluid" src="../assets/img/feature-work-3.jpg">
                        </a>
                        <a class="col" data-type="image" data-fslightbox="gallery" href="./assets/img/feature-work-4-large.jpg">
                            <img class="img-fluid" src="../assets/img/feature-work-4.jpg">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Feature Work -->

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