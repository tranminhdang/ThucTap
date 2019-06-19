<html>
    <head>
        <title>Danh mục mã chế phẩm</title>
        
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
        <script type="text/javascript">
            function time() {
                var today = new Date();
                var weekday=new Array(7);
                weekday[0]="Sunday";
                weekday[1]="Monday";
                weekday[2]="Tuesday";
                weekday[3]="Wednesday";
                weekday[4]="Thursday";
                weekday[5]="Friday";
                weekday[6]="Saturday";
                var day = weekday[today.getDay()];
                var dd = today.getDate();
                var mm = today.getMonth()+1; //January is 0!
                var yyyy = today.getFullYear();
                var h = today.getHours();
                var m = today.getMinutes();
                var s = today.getSeconds();
                m = checkTime(m);
                s = checkTime(s);
                nowTime = h+":"+m+":"+s;
                if(dd < 10){dd = '0'+dd} if(mm < 10){mm = '0'+mm} today = day+', '+dd+'/'+mm+'/'+yyyy;

                tmp = '<span class="date">'+today+' | '+nowTime+'</span>';

                document.getElementById("clock").innerHTML = tmp;

                clocktime = setTimeout("time()", "1000", "JavaScript");
                function checkTime(i)
                {
                    if(i < 10){
                        i = "0" + i;
                    }
                    return i;
                }
            }

        </script>
        <script>
            function myFunction(){
                var ok = true;
                var mamau = document.forms["form-info"]["txtmamau"].value;
                var pattern_mamau = /^[A-Za-z0-9]{1,10}$/;

                if(pattern_mamau.test(mamau)){
                    console.log("OK");
                }
                else{
                    document.getElementById("injection").innerHTML = "Mã máu chỉ dài tối đa 10 ký tự thôi nhe.";
                    ok = false;
                }
                return ok;
            }
        </script>
        <script>
            function test(str){
                var xmlhttp;
                if(str==""){
                    document.getElementById("thongbao").innerHTML="";
                    return;
                }
                else{
                    if(window.XMLHttpRequest){
                        xmlhttp = new XMLHttpRequest();
                    }
                    else{
                        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                    }
                    xmlhttp.onreadystatechange=function(){
                        if(xmlhttp.readyState==4 && xmlhttp.status==200){
                            document.getElementById("thongbao").innerHTML=xmlhttp.responseText;
                        }
                    };
                    xmlhttp.open("GET", "tb_ten.php?name="+str, true);
                    xmlhttp.send();
                }
            }
        </script>
        <!-- định  bảng--><!--
      <script   
      src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js">
       </script>
       <script>
   
       function scrolify(tblAsJQueryObject, height){
           var oTbl = tblAsJQueryObject;
   
           // for very large tables you can remove the four lines below
           // and wrap the table with <div> in the mark-up and assign
           // height and overflow property  
           var oTblDiv = $("<div/>");
           oTblDiv.css('height', height);
           oTblDiv.css('overflow','scroll');               
           oTbl.wrap(oTblDiv);
   
           // save original width
           oTbl.attr("data-item-original-width", oTbl.width());
           oTbl.find('thead tr td').each(function(){
               $(this).attr("data-item-original-width",$(this).width());
           }); 
           oTbl.find('tbody tr:eq(0) td').each(function(){
               $(this).attr("data-item-original-width",$(this).width());
           });                 
   
   
           // clone the original table
           var newTbl = oTbl.clone();
   
           // remove table header from original table
           oTbl.find('thead tr').remove();                 
           // remove table body from new table
           newTbl.find('tbody tr').remove();   
   
           oTbl.parent().parent().prepend(newTbl);
           newTbl.wrap("<div/>");
   
           // replace ORIGINAL COLUMN width                
           newTbl.width(newTbl.attr('data-item-original-width'));
           newTbl.find('thead tr td').each(function(){
               $(this).width($(this).attr("data-item-original-width"));
           });     
           oTbl.width(oTbl.attr('data-item-original-width'));      
           oTbl.find('tbody tr:eq(0) td').each(function(){
               $(this).width($(this).attr("data-item-original-width"));
           });                 
       }
   
       $(document).ready(function(){
           scrolify($('#tblNeedsScrolling'), 110); // 160 is height
       });
  
       </script>-->
       <!--cố định bản -->
        <style type="text/css">
            #thongbao{
                color: red;
            }
            #injection{
                color: red;
            }
        </style>
    </head>
    <body onload = "time()">
	<?php 
		$conn = mysqli_connect("localhost","root","","thuctap");
		mysqli_set_charset($conn,"utf8");
		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		//echo "Connected successfully";
		//mysqli_close($conn);
	?>
        <div id = "wrap">
            <div id = "header">
                <div class = "logo">
                    <img src = "image/hospital.png" alt = "logo" width = 110px height = 80px>
                </div>
                <div class = "title">
                    <h3>QUẢN LÝ DANH MỤC MÃ CHẾ PHẨM</h3>
                </div>
                <div class = "btn-exit">
                    <button class = "btn-gen"><a href = "/"><i class="fa fa-home"></i>Trang chủ</a></button>
                    <button class = "btn-gen"><a href = "/"><i class="fa fa-sign-out"></i>Thoát</a></button>
                </div>
            </div>
            <div id = "content">
                <div class = "content-top">
                    <div class = "form-info">
                        <div id = "clock"></div>
                        <form name = "form-info" action = "xuly_form.php" method = "POST" enctype="multipart/form-data" onsubmit = "return myFunction()">
                            <h4>Tạo danh mục máu, chế phẩm</h4>
                            <table class = "table-info">
                                <tr>
                                    <th>Nhập mã máu</th>
                                    <td><input type = "text" autofocus = "autofocus" placeholder="Nhập mã máu..." class = "input" name = "txtmamau" required="required" onchange = "test(this.value)"/><br>
                                        <span id="thongbao"></span>
                                        <span id="injection"></span>
                                    </td>
                                    <th>Tên máu</th>
                                    <td>
                                        <select class = "input" name = "tenmau" required="required">
                                            <option value = "">-- --</option>
                                            <option>Huyết thanh</option>
                                            <option>Huyết tương</option>
                                        </select>
                                    </td>
									<th>Loại máu</th>
                                    <td>
                                        <select class = "input" name = "loaimau" required="required">
                                            <option value = "">-- --</option>
                                            <option>Máu nguyên chất</option>
                                            <option>Chế phẩm máu</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Nhóm máu</th>
                                    <td>
                                        <select class = "input" name = "nhommau" required="required">
                                            <option value = "">-- --</option>
                                            <option>A</option>
                                            <option>B</option>
                                            <option>O</option>
                                            <option>AB</option>
                                        </select>
                                    </td>
                                    <th>Nhóm RH</th>
                                    <td>
                                        <select class = "input" name = "nhomrh" required="required">
                                            <option value = "">-- --</option>
                                            <option>A+</option>
                                            <option>A-</option>
                                            <option>B+</option>
                                            <option>B-</option>
                                            <option>O+</option>
                                            <option>O-</option>
                                            <option>AB+</option>
                                            <option>AB-</option>
                                        </select>
                                    </td>
									<th>Đơn vị tính</th>
                                    <td>
                                        <select class = "input" name = "donvitinh" required="required">
                                            <option value = "">-- --</option>
                                            <option>Túi (200ml)</option>
                                            <option>Túi (300ml)</option>
                                        </select>
                                    </td>
                                </tr>
								<tr>
									<th>Ngày sản xuất</th>
									<td><input type = "date" class = "input" name = "ngaysanxuat" required="required"></td>
									<th>Ngày hết hạn</th>
									<td><input type = "date" class = "input" name = "ngayhethan" required="required"></td>
                                    <th>Loại sản phẩm</th>
                                    <td>
                                        <select class = "input" name = "loaisanpham" required="required">
                                            <option value = "">-- --</option>
                                            <?php
                                                $sql = "SELECT * FROM loaisanpham";
                                                $result = mysqli_query($conn, $sql);
                                            ?>
                                            <?php
                                                while ($rows = mysqli_fetch_array($result)){
                                            ?>
                                            <option value = "<?php echo $rows['Ma_san_pham'] ?>">
                                                <?php echo $rows['Ten_san_pham'] ?>
                                            </option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" border="1">
                                        <button class = "btn-table button1" type = "submit" name = "them"><i class="fa fa-plus"></i>Thêm</button>
                                        <button class = "btn-table button4" type = "reset"><i class="fa fa-refresh"></i>Làm lại</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
                <div class = "content-down">
                    <table class="table-show" border="1">
						<tr class = "table-title" style = "border: 1px solid white; border-left: none; border-right: none;">
                            <th>Mã máu</th>
                            <th>Tên máu</th>
							<th>Loại máu</th>
                            <th>Nhóm máu</th>
                            <th>Nhóm RH</th>
							<th>Đơn vị tính</th>
							<th>Ngày sản xuất</th>
							<th>Ngày hết hạn</th>
                            <th>Loại sản phẩm</th>
                            <th colspan = "3">Lựa chọn</th>
                        </tr>
                        <?php
                            if(isset($_GET["mamau"])&&$_GET["mamau"]==$mamau){            
                                header("location:sua.php?name=$sua");                   
                            }
                        ?>
                            <?php
                                $result = mysqli_query($conn, "SELECT * FROM danhmucmau as dmm, loaisanpham as lsp WHERE dmm.Ma_san_pham = lsp.Ma_san_pham");
                                while($rows = mysqli_fetch_array($result)){
                                    $mamau = $rows["Ma_mau"];
                                    ?>
                        <tr style = "text-align: center;">
                                    <td style="text-align: center;"><?php echo $rows['Ma_mau'];?></td>
                                    <td><?php echo $rows['Ten_mau'];?></td>
                                    <td><?php echo $rows['Loai_mau'];?></td>
                                    <td><?php echo $rows['Nhom_mau'];?></td>
                                    <td><?php echo $rows['Nhom_Rh'];?></td>
                                    <td><?php echo $rows['Don_vi_tinh'];?></td>
                                    <td><?php echo $rows['Ngay_san_xuat'];?></td>
                                    <td><?php echo $rows['Ngay_het_han'];?></td>
                                    <td><?php echo $rows['Ten_san_pham'];?></td>
                                    <td><i class = "fa fa-eye"></i></td>
                                    <td><a href = "sua.php?edit=<?php echo $rows['Ma_mau'] ?>"><i class = "fa fa-edit"></i></a></td>
                                    <td><i class = "fa fa-trash"></i></td>
                        
                            <?php
                                }
                            ?>
                        </tr>
                    </table>
                </div>
            </div>
            <div id = "footer">
                <div class = "footer-contact">
                    <marquee>Hỗ trợ hệ thống - Liên hệ: 070xxxxx - Website: vnptit.vn</marquee>
                </div>
                <div class = "footer-copyright">
                    Copyright &copy; 2019 by VNPT
                </div>
            </div>
        </div>
    </body>
</html>
