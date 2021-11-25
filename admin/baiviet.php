<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("location:../");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>work</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
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
                            echo "<a class='nav-link' href='../logout.php'><i class='bx bx-user-circle bx-sm text-primary'></i></a>";
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


    <!-- Start Banner Hero -->
    <div id="work_single_banner" class="bg-light w-100">
        <div class="container-fluid text-light d-flex justify-content-center align-items-center border-0 rounded-0 p-0 py-5">
            <div class="banner-content col-lg-8 m-lg-auto text-center py-5 px-3">
                <h1 class="banner-heading h2 pb-5 typo-space-line-center">Digital Marketing</<h1>
                </h1>
                <h3 class="h4 pb-2 light-300">Voluptatem accusantium doloremque</h3>
                <p class="banner-footer light-300">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna
                    aliqua. Integer ut ipsum eu libero venenatis euismod.
                </p>
            </div>
        </div>
    </div>
    <!-- End Banner Hero -->

    <!-- Start Work Sigle -->
    <section class="container py-5">

        <div class="row pt-5">
            <div class="worksingle-content col-lg-8 m-auto text-left justify-content-center">
                <h2 class="worksingle-heading h3 pb-3 light-300 typo-space-line">Digital Marketing Service</h2>
                <p class="worksingle-footer py-3 text-muted light-300">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>
            </div>
        </div><!-- End Blog Cover -->

        <div class="row justify-content-center pb-4">
            <div class="col-lg-8">
                <div id="templatemo-slide-link-target" class="card mb-3">
                    <img class="img-fluid border rounded" src="./assets/img/work-slide-04.jpg" alt="Card image cap">
                </div>
                <div class="worksingle-slide-footer row">

                    <!--Start Controls-->
                    <div class="col-1 align-self-center">
                        <a href="#multi-item-example" role="button" data-bs-slide="prev">
                            <i class='bx bxs-chevron-left bx-sm text-dark'></i>
                        </a>
                    </div>
                    <!--End Controls-->

                    <!--Start Carousel Wrapper-->
                    <div id="multi-item-example" class="col-10 carousel slide" data-bs-ride="carousel">
                        <!--Start Slides-->
                        <div class="carousel-inner" role="listbox">

                            <!--First slide-->
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-06.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-06-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-05.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-05-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-04.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-04-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-03.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-03-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="./assets/img/work-slide-01.jpg">
                                            <img class="img-fluid border rounded" src="./assets/img/work-slide-01-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.First slide-->

                            <!--Second slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="../assets/img/work-slide-01.jpg">
                                            <img class="img-fluid border rounded" src="../assets/img/work-slide-01-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="../assets/img/work-slide-03.jpg">
                                            <img class="img-fluid border rounded" src="../assets/img/work-slide-03-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="../assets/img/work-slide-02.jpg">
                                            <img class="img-fluid border rounded" src="../assets/img/work-slide-02-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="../assets/img/work-slide-01.jpg">
                                            <img class="img-fluid border rounded" src="../assets/img/work-slide-01-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="../assets/img/work-slide-06.jpg">
                                            <img class="img-fluid border rounded" src="../assets/img/work-slide-06-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.Second slide-->

                            <!--Second slide-->
                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="../assets/img/work-slide-01.jpg">
                                            <img class="img-fluid border rounded" src="../assets/img/work-slide-01-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="../assets/img/work-slide-03.jpg">
                                            <img class="img-fluid border rounded" src="../assets/img/work-slide-03-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="../assets/img/work-slide-02.jpg">
                                            <img class="img-fluid border rounded" src="../assets/img/work-slide-02-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="../assets/img/work-slide-01.jpg">
                                            <img class="img-fluid border rounded" src="../assets/img/work-slide-01-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                    <div class="col">
                                        <a class="templatemo-slide-link" href="../assets/img/work-slide-06.jpg">
                                            <img class="img-fluid border rounded" src="../assets/img/work-slide-06-small.jpg" alt="Product Image">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!--/.Second slide-->

                        </div>
                        <!--End Slides-->
                    </div>
                    <!--End Carousel Wrapper-->

                    <!--Start Controls-->
                    <div class="col-1 align-self-center text-end">
                        <a href="#multi-item-example" role="button" data-bs-slide="next">
                            <i class='bx bxs-chevron-right bx-sm text-dark'></i>
                        </a>
                    </div>
                    <!--End Controls-->

                </div>
            </div>
        </div><!-- End Slider -->

        <div class="row">
            <div class="col-md-8 m-auto text-left justify-content-center">
                <p class="pt-5 text-muted light-300">
                    You are permitted to download, modify and use Purple Buzz template for your websites. You are <strong>not permitted</strong> to re-distribute this template ZIP file on any other template websites. It is super easy to simply copy and repost the ZIP file on any <a rel="nofollow" href="https://www.google.com/search?q=free+css" target="_blank">Free CSS</a> template websites.
                </p>
            </div>
        </div><!-- End Paragrph -->


        <div class="row">
            <div class="col-md-8 m-auto text-left justify-content-center">
                <p class="display-6 py-4 ps-4 border border-5 border-top-0 border-end-0 border-bottom-0 border-start">
                    <i>
                          "Vestibulum vestibulum est eu lorem laoreet suscipit. Duis auctor,
                          metus vel sollicitudin hendrerit, elit neque pulvinar magna, non
                          sodales orci turpis blandit quam."
                      </i>
                </p>
                <p class="text-muted light-300">
                    Nam tortor quam, aliquet vel nibh sit amet, faucibus bibendum nisl.
                    Donec vehicula nulla justo, vel sodales massa vestibulum nec. Praesent
                    non orci sed massa fringilla rutrum at et odio. Quisque est orci,
                    elementum sed neque ac, suscipit consectetur leo. Cras fermentum luctus
                    cursus. Ut porta, augue vel tempus congue, augue purus vulputate ex,
                    lacinia lobortis arcu metus sed lectus.
                </p>
            </div>
        </div><!-- End Qute -->


        <div class="row justify-content-center">
            <div class="col-lg-8 pt-4 pb-4">
                <div class="ratio ratio-16x9">
                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/1z--ZRS5x5U" allowfullscreen></iframe>
                </div>
            </div>
        </div><!-- End Video -->

        <div class="row justify-content-center">
            <div class="col-lg-8 ml-auto mr-auto pt-3 pb-4">
                <p class="text-muted light-300">
                    Ed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas
                    accumsan lacus vel facilisis. Lorem ipsum dolor sit amet, consectetur
                    adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore
                    magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                    laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor
                    in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla.
                </p>
            </div>
        </div>
        <!-- End Work Sigle -->

        <!-- Start Comment -->
        <div class="row justify-content-center">
            <div class="worksingle-comment-heading col-8 m-auto pb-3">
                <h4 class="h5">Bình Luận</h4>
            </div>
        </div>
        <?php
            if (isset($_SESSION['user'])) {
                $conn = mysqli_connect('localhost', 'root', '', 'seo-website'); 
                $username = $_SESSION['user'];
                $result = mysqli_query($conn,"SELECT * FROM user");
                //$result = $mysqli->query("SELECT * FROM user WHERE username='$username'");
                $row = $result->fetch_assoc();
                $name = $row['username'];
                $image = $row['anh'];
                if(isset($_POST['send-comment'])){
                    $noidung = $_POST['noidung'];
                    $result1 = mysqli_query($conn, "INSERT INTO comments (username, noidung, image) VALUES ('$name', '$noidung', '$image')");
                    //header('location: ../work-single.php');
                }
                $sql = "SELECT * FROM comments";
                $query = mysqli_query($conn, $sql);
                while($row1=mysqli_fetch_assoc($query)){
                    ?>
                        <div class="row pb-4">
                            <div class="worksingle-comment-body col-md-8 m-auto">
                                <div class="d-flex">
                                    <div>
                                        <img class="rounded-circle" style="width: 50px;" src="../assets/img/user/<?php echo $row1['image']; ?>">
                                    </div>
                                    <div class="comment-body">
                                        <div class="comment-header d-flex justify-content-between ms-3">
                                            <div class="header text-start">
                                                <h5 class="h6"><?php echo $row1['username'] ?></h5>
                                                <p class="text-muted light-300"><?php echo $row1['time'] ?></p>
                                            </div>
                                            <a href="#" class="text-decoration-none text-secondary"><i class='bx bxs-share me-2'></i>Reply</a>
                                            <a href="#" class="text-decoration-none text-secondary"><i class='bx me-2'></i>Delete</a>   
                                        </div>
                                        <div class="footer">
                                            <div class="card-body border ms-3 light-300">
                                                <?php echo $row1['noidung']; ?>
                                            </div>
                                        </div>                                        
                                    </div>                                    
                                </div>
                            </div>
                        </div>
                    <?php
                }
            }  
        ?>

        <!--Viết bình luận-->
        <div class="row pb-4">
            <div class="worksingle-comment-footer col-lg-8 m-auto">
                <!-- <h4 class="h5">Leave Comment</h4> -->
                <form class="col-md-12 m-auto" method="POST" action="#" role="form" enctype="multipart/form-data">

                    <div class="form-group">
                        <label class="pb-2 pt-sm-0 pt-4 light-300" for="inputmessage">Bình luận của bạn</label>
                        <textarea class="form-control form-control-lg light-300" id="noidung" name="noidung" placeholder="Viết bình luận" rows="5"></textarea>
                    </div>

                    <div class="form-row pt-2">
                        <div class="col-md-12 col-10 text-end">
                            <button type="submit" name="send-comment" class="btn btn-secondary text-white px-md-4 px-2 py-md-3 py-1 radius-0 light-300">Gửi Bình Luận</button>
                        </div>
                    </div>
                </form>
            </div>
        </div><!-- End Comment Form -->


    </section>
    <!-- End Work Sigle -->

    <!-- Start Related Post -->
    <article class="container-fluid bg-light">
        <div class="container">
            <div class="worksingle-related-header row">
                <h1 class="h2 py-5">Related Post</h1>
                <div class="col-md-12 text-left justify-content-center">
                    <div class="row gx-5">


                        <div class="col-sm-6 col-lg-4 mb-5">
                            <a href="#" class="related-content card text-decoration-none overflow-hidden h-100">
                                <img class="related-img card-img-top" src="../assets/img/related-post-01.jpg" alt="Card image cap">
                                <div class="related-body card-body p-4">
                                    <h5 class="card-title h6 m-0 semi-bold-600 text-dark">Digital Marketing</h5>
                                    <p class="card-text pt-2 mb-1 light-300 text-dark">
                                        Lorem ipsum dolor sit amet, consectetur.
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-primary light-300">Read more</span>
                                        <div class="light-300">
                                            <i class='bx-fw bx bx-heart me-1'></i>5
                                            <i class='bx-fw bx bx-chat    ms-1 me-1'></i>3
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <a href="#" class="related-content card text-decoration-none overflow-hidden h-100">
                                <img class="related-img card-img-top" src="../assets/img/related-post-02.jpg" alt="Card image cap">
                                <div class="related-body card-body p-4">
                                    <h5 class="card-title h6 m-0 semi-bold-600 text-dark">App Development</h5>
                                    <p class="card-text pt-2 mb-1 light-300 text-dark">
                                        Tempor incididunt ut labore et dolore.
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-primary light-300">Read more</span>
                                        <div class="light-300">
                                            <i class='bx-fw bx bx-heart me-1'></i>11
                                            <i class='bx-fw bx bx-chat    ms-1 me-1'></i>9
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <a href="#" class="related-content card text-decoration-none overflow-hidden h-100">
                                <img class="related-img card-img-top" src="../assets/img/related-post-03.jpg" alt="Card image cap">
                                <div class="related-body card-body p-4">
                                    <h5 class="card-title h6 m-0 semi-bold-600 text-dark">Digital Marketing</h5>
                                    <p class="card-text pt-2 mb-1 light-300 text-dark">
                                        Consectetur adipiscing elit.
                                    </p>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-primary light-300">Read more</span>
                                        <div class="light-300">
                                            <i class='bx-fw bx bx-heart me-1'></i>31
                                            <i class='bx-fw bx bx-chat    ms-1 me-1'></i>2
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

    </article>
    <!-- End Related Post -->


<!-- Start Footer -->
<?php
        include("../footer.php");    
    ?>
    <!-- End Footer -->

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Load jQuery require for Page Script -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Page Script -->
    <script>
        $(window).load(function() {
            // Slide
            $('.templatemo-slide-link').click(function() {
                var this_href = $(this).attr('href');
                $('#templatemo-slide-link-target img').attr('src', this_href);
                return false;
            });
            // End Slide
        });
    </script>
    <!-- Templatemo -->
    <script src="assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="assets/js/custom.js"></script>

</body>

</html>