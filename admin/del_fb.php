<?php
	$conn = mysqli_connect('localhost', 'root', '', 'seo-website');  
	if(isset($_POST['id'])){
		$id=$_POST['id'];
		$res = mysqli_query($conn, "DELETE FROM contacts where id = $id");
	}
?>