<?php
	//insert
	$conn = mysqli_connect('localhost', 'root', '', 'mydb'); 
	if(isset($_POST['add-save'])){
		$name = $_POST['name'];
		$description = $_POST['description'];
        $status = $_POST['status'];
        $source = $_POST['source'];
        $image = $_POST['image'];

		$result = mysqli_query($conn, "INSERT INTO news (name, description, status, source, image) VALUES ('$name', '$description', '$status', '$source', '$image')");
		header('location: ./');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h2 class="text-center">Thêm tin tức</h2>
			</div>
			<div class="panel-body">
				<form method="post" id="add-record">
					<div class="form-group">
					  <label for="">Name:</label>
					  <input type="text" class="form-control" id="name" name="name" required pattern=".{5,40}" title="5 to 40 characters.">
					</div>
					<div class="form-group">
					  <label for="">Description:</label>
					  <input type="text" class="form-control" id="description" name="description" required>
					</div>
                    <div class="form-group">
					  <label for="">Status:</label>
					  <input type="text" class="form-control" id="status" name="status" required>
					</div>
                    <div class="form-group">
					  <label for="">Source:</label>
					  <input type="file" class="form-control" id="source" name="source" required>
					</div>
                    <div class="form-group">
					  <label for="">Image:</label>
					  <input type="file" class="form-control" id="image" name="image" required>
					</div>
					<button class="btn btn-success" name="add-save" id="button-add">Add</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>