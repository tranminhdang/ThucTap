<?php
    $conn = mysqli_connect("localhost","root","","thuctap");
    mysqli_set_charset($conn, "utf8");
    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";
    //mysqli_close($conn);
?>

<?php
    $mamau = $_POST['txtmamau'];
    //echo $mamau."<br>";
    $tenmau = $_POST['tenmau'];
    //echo $tenmau."<br>";
    $loaimau = $_POST['loaimau'];
    //echo $loaimau."<br>";
    $nhommau = $_POST['nhommau'];
    //echo $nhommau."<br>";
    $nhomrh = $_POST['nhomrh'];
    //echo $nhomrh."<br>";
    $donvitinh = $_POST['donvitinh'];
    //echo $donvitinh."<br>";
    $ngaysanxuat = $_POST['ngaysanxuat'];
    //echo $ngaysanxuat."<br>";
    $ngayhethan = $_POST['ngayhethan'];
    //echo $ngayhethan."<br>";
    $loaisanpham = $_POST['loaisanpham'];
    //echo $loaisanpham;
    $sql = "INSERT INTO danhmucmau(Ma_mau, Ten_mau, Loai_mau, Nhom_mau, Nhom_Rh, Don_vi_tinh, Ngay_san_xuat, Ngay_het_han, Ma_san_pham) VALUES ('$mamau', '$tenmau', '$loaimau', '$nhommau', '$nhomrh', '$donvitinh', '$ngaysanxuat', '$ngayhethan', '$loaisanpham')";
    $result = mysqli_query($conn, $sql);
    header("location: qldmmcp.php");
?>
                                    