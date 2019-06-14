<html>
    <head>
        <title>Chỉnh sửa</title>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <link rel="stylesheet" type="text/css" href="css/style_qldmmcp.css">
        <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

        <style type="text/css">
        	a{
        		color: black;
        	}
        	a:hover{
        		color: white;
        		text-decoration: none;
        	}
        	body{
        		background: url("image/background.jpg") no-repeat center center fixed;
  				-webkit-background-size: cover;
  				-moz-background-size: cover;
  				-o-background-size: cover;
 				background-size: cover;
  	      	}
  	      	.content{
  	      		width: 100%;
  	      		height: 100%;
  	      	}
  	      	.warning{
  	      		color: red;
  	      		font-size: 16px;
  	      	}
        </style>
    </head>
    <body>
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
		if( isset($_GET['edit'])){	 
			$mamau = $_GET['edit'];
			$result = mysqli_query($conn,"SELECT *FROM danhmucmau where Ma_mau = '$mamau'");
			$rows = mysqli_fetch_array($result);
		}
	?>
        <div id = "wrap">
            <div id = "content">
                <div class = "content-top">
                	<marquee class = "warning">Vui lòng kiểm tra kỹ trước khi chỉnh sửa dữ liệu này.</marquee>
                	<marquee class = "warning" direction = "right">Đảm bảo rằng bạn đang tỉnh táo và không sử dụng chất kích thích.</marquee>
                    <div class = "form-info">
                        <form name = "form-info" method = "POST" action = "xuly_formupdate.php" enctype="multipart/form-data" >
                            <h4>Chỉnh sửa danh mục máu</h4>
                            <table class = "table-info">
                                <tr>
                                    <th>Mã máu</th>
                                    	<?php 
                                    		echo "<td><input type='text' readonly='true' name = 'mamau' class = 'input' value = '".$rows['Ma_mau']."'></td>"; ?>
                                    <th>Tên máu</th>
                                        <?php 
                                        	echo"<td><select name = 'tenmau' class = 'input'>";
        									if($rows['Ten_mau'] == 'Huyết tương'){
												echo    "<option value = 'Huyết tương' selected>Huyết tương</option>
				 										<option value = 'Huyết thanh'>Huyết thanh</option>
                									</select></td>";
											}
        									else {
            									echo"<option value='Huyết tương'>Huyết tương</option>
                 									<option value='Huyết thanh' selected>Huyết thanh</option>";
        									}
											echo"</select></td>";
                                    	?>
									<th>Loại máu</th>
                                    <?php 
                                        	echo"<td><select name = 'loaimau' class = 'input'>";
        									if($rows['Loai_mau'] == 'Chế phẩm máu'){
												echo    "<option value = 'Chế phẩm máu' selected>Chế phẩm máu</option>
				 										<option value = 'Máu nguyên chất'>Máu nguyên chất</option>
                									</select></td>";
											}
        									else {
            									echo"<option value='Chế phẩm máu'>Chế phẩm máu</option>
                 									<option value='Máu nguyên chất' selected>Máu nguyên chất</option>";
        									}
											echo"</select></td>";
                                    	?>
                                </tr>
                                <tr>
                                    <th>Nhóm máu</th>
                                    <?php 
                                        	echo"<td><select name = 'nhommau' class = 'input'>";
        									if($rows['Nhom_mau'] == 'A'){
												echo    "<option value = 'A' selected>A</option>
				 										<option value = 'B'>B</option>
				 										<option value = 'O'>O</option>
				 										<option value = 'AB'>AB</option>
                									</select></td>";
											}
        									else if($rows['Nhom_mau'] == 'B'){
            									echo"<option value='A'>A</option>
                 									<option value='B' selected>B</option>
                 									<option value='O'>O</option>
                 									<option value = 'AB'>AB</option>
                 									</select></td>";
        									}
        									else if($rows['Nhom_mau'] == 'O'){
            									echo"<option value='A'>A</option>
                 									<option value='B'>B</option>
                 									<option value='O' selected>O</option>
                 									<option value = 'AB'>AB</option>
                 									</select></td>";
        									}
        									else {
            									echo"<option value='A'>A</option>
                 									<option value='B'>B</option>
                 									<option value='O'>O</option>
                 									<option value = 'AB' selected>AB</option>
                 									</select></td>";
        									}
											echo"</select></td>";
                                    	?>
                                    <th>Nhóm RH</th>
                                    <?php 
                                        	echo"<td><select name = 'nhomrh' class = 'input'>";
        									if($rows['Nhom_Rh'] == 'A+'){
												echo    "<option value = 'A+' selected>A+</option>
				 										<option value = 'B+'>B+</option>
				 										<option value = 'O+'>O+</option>
				 										<option value = 'AB+'>AB+</option>
				 										<option value = 'A-'>A-</option>
				 										<option value = 'B-'>B-</option>
				 										<option value = 'O-'>O-</option>
				 										<option value = 'AB-'>AB-</option>
                									</select></td>";
											}
        									else if ($rows['Nhom_Rh'] == 'A-'){
												echo    "<option value = 'A-' selected>A-</option>
				 										<option value = 'B+'>B+</option>
				 										<option value = 'O+'>O+</option>
				 										<option value = 'AB+'>AB+</option>
				 										<option value = 'A+'>A+</option>
				 										<option value = 'B-'>B-</option>
				 										<option value = 'O-'>O-</option>
				 										<option value = 'AB-'>AB-</option>
                									</select></td>";
        									}
        									else if ($rows['Nhom_Rh'] == 'B+'){
												echo    "<option value = 'B+' selected>B+</option>
				 										<option value = 'A-'>A-</option>
				 										<option value = 'O+'>O+</option>
				 										<option value = 'AB+'>AB+</option>
				 										<option value = 'A+'>A+</option>
				 										<option value = 'B-'>B-</option>
				 										<option value = 'O-'>O-</option>
				 										<option value = 'AB-'>AB-</option>
                									</select></td>";
                							}
                							else if ($rows['Nhom_Rh'] == 'B-'){
												echo    "<option value = 'B-' selected>B-</option>
				 										<option value = 'A-'>A-</option>
				 										<option value = 'O+'>O+</option>
				 										<option value = 'AB+'>AB+</option>
				 										<option value = 'A+'>A+</option>
				 										<option value = 'B+'>B+</option>
				 										<option value = 'O-'>O-</option>
				 										<option value = 'AB-'>AB-</option>
                									</select></td>";
                							}
                							else if ($rows['Nhom_Rh'] == 'O+'){
												echo    "<option value = 'O+' selected>O+</option>
				 										<option value = 'A-'>A-</option>
				 										<option value = 'B-'>B-</option>
				 										<option value = 'AB+'>AB+</option>
				 										<option value = 'A+'>A+</option>
				 										<option value = 'B+'>B+</option>
				 										<option value = 'O-'>O-</option>
				 										<option value = 'AB-'>AB-</option>
                									</select></td>";
                							}
                							else if ($rows['Nhom_Rh'] == 'AB+'){
												echo    "<option value = 'AB+' selected>AB+</option>
				 										<option value = 'A-'>A-</option>
				 										<option value = 'O+'>O+</option>
				 										<option value = 'B+'>B+</option>
				 										<option value = 'A+'>A+</option>
				 										<option value = 'B-'>B-</option>
				 										<option value = 'O-'>O-</option>
				 										<option value = 'AB-'>AB-</option>
                									</select></td>";
                							}
        									else {
            									echo"<option value='AB-'>AB-</option>
                 									<option value='AB-' selected>AB-</option>
                 									<option value = 'A-'>A-</option>
				 									<option value = 'O+'>O+</option>
				 									<option value = 'B+'>B+</option>
				 									<option value = 'A+'>A+</option>
				 									<option value = 'B-'>B-</option>
				 									<option value = 'O-'>O-</option>
				 									<option value = 'AB+'>AB+</option>
                									</select></td>";
        									}
											echo"</select></td>";
                                    	?>
									<th>Đơn vị tính</th>
                                    <?php 
                                        	echo"<td><select name = 'donvitinh' class = 'input'>";
        									if($rows['Don_vi_tinh'] == 'Túi 200(ml)'){
												echo "<option value = 'Túi 200(ml)' selected>Túi 200(ml)</option>
				 									<option value = 'Túi 300(ml)'>Túi 300(ml)</option>
                									</select></td>";
											}
        									else {
            									echo"<option value = 'Túi 300(ml)' selected>Túi 300(ml)</option>
                 									<option value = 'Túi 200(ml)'>Túi 200(ml)</option>";
        									}
											echo"</select></td>";
                                    	?>
                                </tr>
								<tr>
									<th>Ngày sản xuất</th>
									<?php

										echo "<td><input type = 'date' class = 'input' name = 'ngaysanxuat' value = '".$rows['Ngay_san_xuat']."'></td>";
									?>
									<th>Ngày hết hạn</th>
									<?php

										echo "<td><input type = 'date' class = 'input' name = 'ngayhethan' value = '".$rows['Ngay_het_han']."'></td>";
									?>
									<!--
                                    <th>Loại sản phẩm</th>
                                    <td>
                                        <select class = "input" name = "loaisanpham">
                                            <?php
                                                $sql = "SELECT * FROM loaisanpham";
                                                $result = mysqli_query($conn, $sql);
                                            ?>
                                            <?php
                                                while ($rows = mysqli_fetch_array($result)){
                                            ?>
                                            <option value = "<?php echo $rows['Ma_san_pham'] ?>" selected>
                                                <?php echo $rows['Ten_san_pham'] ?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </td>
                                    -->
                                </tr>
                                <tr>
                                    <td colspan="6" border="1">
                                        <button class = "btn-table button1" type = "submit"><i class="fa fa-refresh"></i>Cập nhật</button>
                                        <button class = "btn-table button3"><i class="fa fa-close"></i><a href = "qldmmcp.php">Hủy</a></button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>