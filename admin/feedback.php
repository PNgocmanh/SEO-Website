<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header("location:../");
    }
    if ($_SESSION['user']!=='admin') {
        header("location:../");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Feedback</title>
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
                            <a class="nav-link btn-outline-primary rounded-pill px-3" href="../admin/index.php">Khách hàng</a>
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
                            echo "<a class='nav-link' href='logout.php'><i class='bx bx-user-circle bx-sm text-primary'></i></a>";
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
        <h1 class="col-12 col-xl-8 h2 text-left text-primary pt-3 pb-4">Phản hồi từ khách hàng</h1>
        <?php
            $conn = mysqli_connect('localhost', 'root', '', 'seo-website');
            $sql = "SELECT * FROM contacts";
            $query = mysqli_query($conn, $sql);
            while($row =  mysqli_fetch_assoc($query)){?>
                <div class="card" style="margin-bottom: 20px;">
                    <div class="card-body">
                        <table class="table table-light">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Tên Khách Hàng</th>
                                    <th>Email</th>
                                    <th>SĐT</th>
                                    <th>Địa Chỉ</th>
                                    <th>Chủ Đề</th>
                                    <th width="60px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $row['id']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php echo $row['sdt']; ?></td>
                                    <td><?php echo $row['diachi']; ?></td>
                                    <td><?php echo $row['chude']; ?></td>
                                    <td>
                                        <button data-id_xoa="<?php echo $row['id']; ?>" class="btn btn-danger text-light del-fb" id="del-fb" name="del-fb">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div><?php echo $row['noidung']; ?></div>
                    </div>
                </div>
                                
            <?php 
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
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <!-- Templatemo -->
    <script src="../assets/js/templatemo.js"></script>
    <!-- Custom -->
    <script src="../assets/js/custom.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // xoa record
            $(document).on('click', '.del-fb', function(){
                option = confirm('Bạn có muốn xoá record này không?')
                if(!option) {
                    return;
                }
                var id = $(this).data('id_xoa');
                $.ajax({
                        url: "../admin/del_fb.php",
                        method: "POST",
                        data: {id:id},
                        success: function(data){
                            alert("Xóa thành công!");
                            window.open('../admin/feedback.php', '_self');
                        }
                });
            });
        });
    </script>
</body>

</html>