<?php 
	$conn = mysqli_connect("localhost","root","","thuctap");
	mysqli_set_charset($conn,"utf8");
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	//echo "Connected successfully";
	//mysqli_close($conn);
?>

<?php
	$mamau = $_POST['mamau'];
	$tenmau = $_POST['tenmau'];
	$loaimau = $_POST['loaimau'];
	$nhommau = $_POST['nhommau'];
	$nhomrh = $_POST['nhomrh'];
	$donvitinh = $_POST['donvitinh'];
	$ngaysanxuat = $_POST['ngaysanxuat'];
	$ngayhethan = $_POST['ngayhethan'];

	$sql_update = "UPDATE danhmucmau SET Ma_mau = '$mamau', Ten_mau = '$tenmau', Loai_mau = '$loaimau', Nhom_mau = '$nhommau', Nhom_Rh = '$nhomrh', Don_vi_tinh = '$donvitinh', Ngay_san_xuat = '$ngaysanxuat', Ngay_het_han = '$ngayhethan' WHERE Ma_mau = '$mamau'";
	$result_update = mysqli_query($conn, $sql_update);

	if($conn->query($sql_update) === TRUE){
		header("location: qldmmcp.php");
	}
	else{
		echo "Update faild";
	}
?>