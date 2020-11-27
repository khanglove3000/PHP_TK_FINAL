<?php
include("../classes/db.php");
$p=new csdl();
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Admin</title>
<script src="../SpryAssets/SpryValidationSelect.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationSelect.css" rel="stylesheet" type="text/css">
</head>

<body>
<form method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="500" height="380" border="1" align="center" cellpadding="5" cellspacing="0">
    <tbody>
      <tr align="center" valign="middle">
        <td colspan="2"><strong>QUẢN LÝ SẢN PHẨM</strong></td>
      </tr>
      <tr>
        <td width="166">Công ty sản xuất</td>
        <td width="318">
         <?php
        	$p->combocongty("select * from congty");
		?>
        </td>
       
      </tr>
      <tr>
        <td>Tên sản phẩm</td>
        <td><label for="tensp"></label>
        <input type="text" name="tensp" id="tensp"></td>
      </tr>
      <tr>
        <td>Giá</td>
        <td><label for="gia"></label>
        <input type="text" name="gia" id="gia"></td>
      </tr>
      <tr>
        <td>Mô tả</td>
        <td><label for="mota"></label>
        <textarea name="mota" id="mota">`</textarea></td>
      </tr>
      <tr>
        <td>Hình đại diện</td>
        <td><label for="file"></label>
        <input type="file" name="file" id="file"></td>
      </tr>
      <tr>
        <td colspan="2" align="center"><input type="submit" name="nut" id="nut" value="Thêm sản phẩm"></td>
      </tr>
    </tbody>
  </table>
  <div align="center">
  	<?php
    	switch($_POST['nut'])
		{
			case 'Thêm sản phẩm':
			{
				$name = $_FILES['file']['name'];
				$local = $_FILES['file']['tmp_name'];
				$tensp = $_REQUEST['tensp'];
				$gia = $_REQUEST['gia'];
				$mota = $_REQUEST['mota'];
				$congty = $_REQUEST['congty'];
				if($name != '')
				{
					if($tensp != '' && $gia != '')
					{
						if($p->uploadfile($local,"../hinh",$name) == 1)
						{
							if($p->themxoasua("insert into sanpham(tensp, gia, monta, hinh, id_congty ) values ('$tensp', '$gia','$mota', '$name', '$congty')") == 1)
							{
								echo 'Thêm sản phẩm thành công';
							}
							else
							{
								echo 'Thêm sản phẩm không thành công';
							
							}
						}
						else
						{
							echo 'Upload hình không thành công';	
						}
					}
					else
					{
						echo 'Vui lòng nhập thông tin sản phẩm';	
					}
				}
				else
				{
					echo 'Vui lòng chọn hình đại điện';
				}
				break;	
			}	
		}
	?>
  </div>
  
  <hr>
  <?php
  $p->loaddssanpham("select * from sanpham order by id desc");
  
  ?>
</form>

</body>
</html>