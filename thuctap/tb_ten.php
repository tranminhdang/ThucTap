<?php
	$name=$_GET['name'];
	$conn = mysqli_connect("localhost","root","","thuctap");
	mysqli_set_charset($conn,"utf8");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	//echo "Connected successfully";
	//mysqli_close($conn);
	$sql="SELECT * FROM danhmucmau WHERE Ma_mau='$name'";
	$result=$conn->query($sql);
	$row=$result->num_rows;
	if($row==1){
		echo "Mã máu đã tồn tại rồi mù sao còn đặt nữa hả!!!";
	}
	$conn->close();
?>