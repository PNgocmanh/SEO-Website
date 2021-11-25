<?php
    $conn = mysqli_connect('localhost', 'root', '', 'seo-website');

    if(isset($_POST['send-feedback'])){
        $check = true;

		$name = $_POST['name'];
        if (strlen($name)<2 || strlen($name)>40) {
            echo "<script> alert('Chỉ chấp nhận 2-40 kí tự!')</script>";
            $check = false;
        }
        $email = $_POST['email'];
        if (!preg_match ("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+\.[A-Za-z]{2,6}$/", $email)) {
            echo "<script> alert('Sai định dạng email!')</script>";
            $check = false;
        }
        $sdt = $_POST['sdt'];

        $diachi = $_POST['diachi'];

        $chude = $_POST['chude'];
        if (strlen($chude)<0) {
            echo "<script> alert('Điền chủ đề!')</script>";
            $check = false;
        }
        $noidung = $_POST['noidung'];

        if($check){
            $result = mysqli_query($conn, "INSERT INTO contacts (name, email, sdt, diachi, chude, noidung) VALUES ('$name', '$email', '$sdt', '$diachi', '$chude', '$noidung')");
            echo "<script>alert('Gửi phản hồi thành công!')</script>";
		    header('location: ./contact.php');
        }

		
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Liên Hệ</title>
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


    <!-- Start Banner Hero -->
    <section class="bg-light">
        <div class="container py-4">
            <div class="row align-items-center justify-content-between">
                <div class="contact-header col-lg-4">
                    <h1 class="h2 pb-3 text-primary">Liên Hệ</h1>
                    <h3 class="h4 regular-400">Thành phố Hồ Chí Minh</h3>
                    <p class="light-300">
                        Đóng góp của bạn giúp chúng tôi trưởng thành hơn.
                    </p>
                </div>
                <div class="contact-img col-lg-5 align-items-end col-md-4">
                    <img src="./assets/img/banner-img-01.svg">
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Hero -->


    <!-- Start Contact -->
    <section class="container py-5">

        <h1 class="col-12 col-xl-8 h2 text-left text-primary pt-3">Cùng chúng tôi tạo nên các dịch vụ chất lượng hơn!</h1>
        <!--<h2 class="col-12 col-xl-8 h4 text-left regular-400">Elit, sed do eiusmod tempor </h2>-->
        <p class="col-12 col-xl-8 h6 text-left text-muted pb-5 light-300">
           Mọi thắc mắc, phản hồi hoặc muốn được biết thêm thông tin về các dịch vụ thì hãy liên hệ với chúng tôi.
        </p>

        <div class="row pb-4">
            <div class="col-lg-4">

                <div class="contact row mb-4">
                    <div class="contact-icon col-lg-3 col-3">
                        <div class="py-3 mb-2 text-center border rounded text-secondary">
                            <i class='display-6 bx bx-news'></i>
                        </div>
                    </div>
                    <ul class="contact-info list-unstyled col-lg-9 col-9  light-300">
                        <li class="h5 mb-0">Thông Tin</li>
                        <li class="text-muted">Mr. Thức</li>
                        <li class="text-muted">010-020-0340</li>
                    </ul>
                </div>

                <div class="contact row mb-4">
                    <div class="contact-icon col-lg-3 col-3">
                        <div class="border py-3 mb-2 text-center border rounded text-secondary">
                            <i class='bx bx-laptop display-6' ></i>
                        </div>
                    </div>
                    <ul class="contact-info list-unstyled col-lg-9 col-9 light-300">
                        <li class="h5 mb-0">Hệ Thống</li>
                        <li class="text-muted">Mr. Đạt</li>
                        <li class="text-muted">010-020-0340</li>
                    </ul>
                </div>

                <div class="contact row mb-4">
                    <div class="contact-icon col-lg-3 col-3">
                        <div class="border py-3 mb-2 text-center border rounded text-secondary">
                            <i class='bx bx-money display-6'></i>
                        </div>
                    </div>
                    <ul class="contact-info list-unstyled col-lg-9 col-9 light-300">
                        <li class="h5 mb-0">Sản Phẩm</li>
                        <li class="text-muted">Mr. Mạnh</li>
                        <li class="text-muted">010-020-0340</li>
                    </ul>
                </div>

            </div>


            <!-- Start Contact Form -->
            <div class="col-lg-8 ">
                <form class="contact-form row" method="post" action="#" role="form">

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300" id="name" name="name" placeholder="Họ và Tên" required>
                            <label for="floatingname light-300">Họ và Tên</label>
                        </div>
                    </div><!-- End Input Name -->

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300" id="email" name="email" placeholder="Email" required>
                            <label for="floatingemail light-300">Email</label>
                        </div>
                    </div><!-- End Input Email -->

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300" id="sdt" name="sdt" placeholder="Số điện thoại" required>
                            <label for="floatingphone light-300">Số điện thoại</label>
                        </div>
                    </div><!-- End Input Phone -->

                    <div class="col-lg-6 mb-4">
                        <div class="form-floating">
                            <input type="text" class="form-control form-control-lg light-300" id="diachi" name="diachi" placeholder="Địa chỉ" required>
                            <label for="floatingcompany light-300">Địa chỉ</label>
                        </div>
                    </div><!-- End Input Company Name -->

                    <div class="col-12">
                        <div class="form-floating mb-4">
                            <input type="text" class="form-control form-control-lg light-300" id="chude" name="chude" placeholder="Chủ đề">
                            <label for="floatingsubject light-300">Chủ đề</label>
                        </div>
                    </div><!-- End Input Subject -->

                    <div class="col-12">
                        <div class="form-floating mb-3">
                            <textarea class="form-control light-300" rows="8" placeholder="Tin nhắn" id="noidung" name="noidung" required></textarea>
                            <label for="floatingtextarea light-300">Nội dung</label>
                        </div>
                    </div><!-- End Textarea Message -->

                    <div class="col-md-12 col-12 m-auto text-end">
                        <button type="submit" name="send-feedback" class="btn btn-secondary rounded-pill px-md-5 px-4 py-2 radius-0 text-light light-300">Gửi phản hồi</button>
                    </div>

                </form>
            </div>
            <!-- End Contact Form -->
        </div>
    </section>
    <!-- End Contact -->

    <!-- Start Footer -->
    <?php
        include("./footer.php");    
    ?>
    <!-- End Footer -->

    <!-- Bootstrap -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <!-- Templatemo -->
    <script src="assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="assets/js/custom.js"></script>

</body>

</html>