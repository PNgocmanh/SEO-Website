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
    
    if (isset($_POST['change_info'])) {
        extract($_REQUEST);
        $mysqli = new mysqli("localhost","root","","mydb");
        if ($mysqli -> connect_error) {
            echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
            exit();
        }
        $result = $mysqli->query("SELECT * FROM product WHERE ID=$ID");
        $row = $result->fetch_assoc();

        $check = true;
        $ten = $_POST['ten'];
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
            if ($image==="") {
                $image = $row['anh'];
            }
            $sql = "UPDATE product SET gia=$gia,so_luong=$so_luong,mo_ta='$mo_ta', age='$age',player='$player',origin='$origin',anh='$image',sale=$sale WHERE ID=$ID";
            if ($mysqli->query($sql)) {
                header("location:../");
            }
        }
    }
?>