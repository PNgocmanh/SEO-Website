<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tin Tức</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">
    <!-- Load Require CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font CSS -->
    <link href="assets/css/boxicon.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&display=swap" rel="stylesheet">
    <!-- Load Tempalte CSS -->
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">

</head>

<body>
    <!-- Header -->
    <?php
        include("./header.php");
    ?>
    <!-- Close Header -->

    <!-- Start Our Work -->
    <section class="container py-5">
        <div class="row projects gx-lg-5">
            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'seo-website');
                $sql = "SELECT * FROM news";
                $query = mysqli_query($conn, $sql);       
                while($row = mysqli_fetch_assoc($query)){
                ?>       
                    <a href="<?php echo $row['source']; ?>" style="margin-bottom: 50px;" class="col-sm-6 col-lg-4 text-decoration-none project marketing social business">
                        <div class="service-work overflow-hidden card mb-5 mx-5 m-sm-0">
                            <img class="card-img-top" src="./assets/img/<?php echo $row['image']; ?>" alt="...">
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
                        </div>
                    </a>
                <?php
                }
            ?>
        </div>
        
        <div class="row">
            <div class="btn-toolbar justify-content-center pb-4" role="toolbar" aria-label="Toolbar with button groups">
                <div class="btn-group me-2" role="group" aria-label="First group">
                    <button type="button" class="btn btn-secondary text-white">Trang trước</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-light">1</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-secondary text-white">2</button>
                </div>
                <div class="btn-group me-2" role="group" aria-label="Second group">
                    <button type="button" class="btn btn-light">3</button>
                </div>
                <div class="btn-group" role="group" aria-label="Third group">
                    <button type="button" class="btn btn-secondary text-white">Trang sau</button>
                </div>
            </div>

    
        </div>
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
                            <img class="img-fluid" src="./assets/img/feature-work-1.jpg">
                        </a>
                        <a class="col" data-type="image" data-fslightbox="gallery" href="./assets/img/feature-work-2-large.jpg">
                            <img class="img-fluid" src="./assets/img/feature-work-2.jpg">
                        </a>
                    </div>
                    <div class="row pt-4">
                        <a class="col" data-type="image" data-fslightbox="gallery" href="./assets/img/feature-work-3-large.jpg">
                            <img class="img-fluid" src="./assets/img/feature-work-3.jpg">
                        </a>
                        <a class="col" data-type="image" data-fslightbox="gallery" href="./assets/img/feature-work-4-large.jpg">
                            <img class="img-fluid" src="./assets/img/feature-work-4.jpg">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Feature Work -->

    <!-- Start Footer -->
    <?php
        include("./footer.php");    
    ?>
    <!-- End Footer -->

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Lightbox -->
    <script src="assets/js/fslightbox.js"></script>
    <script>
        fsLightboxInstances['gallery'].props.loadOnlyCurrentSource = true;
    </script>
    <!-- Load jQuery require for isotope -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Isotope -->
    <script src="assets/js/isotope.pkgd.js"></script>
    <!-- Page Script -->
    <script>
        $(window).load(function() {
            // init Isotope
            var $projects = $('.projects').isotope({
                itemSelector: '.project',
                layoutMode: 'fitRows'
            });
            $(".filter-btn").click(function() {
                var data_filter = $(this).attr("data-filter");
                $projects.isotope({
                    filter: data_filter
                });
                $(".filter-btn").removeClass("active");
                $(".filter-btn").removeClass("shadow");
                $(this).addClass("active");
                $(this).addClass("shadow");
                return false;
            });
        });
    </script>
    <!-- Templatemo -->
    <script src="assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="assets/js/custom.js"></script>

</body>

</html>