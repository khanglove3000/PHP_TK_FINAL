<?php
class csdl
{
	public function connect()
	{
		$con = mysql_connect("localhost","root","");
		if(!$con)
		{
			echo "không kết nối được csdl";	
			exit();
		}	
		else
		{
			mysql_select_db("dbbanhang");
			mysql_query("SET NAMES UTF8");	
			return $con;
		}
	}	
	
	public function xuatsanpham($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if($i>0)
		{
			while($row = mysql_fetch_array($ketqua))
			{
				$i = $row['id'];
				$tensp=$row['tensp'];
				$gia=$row['gia'];
				$hinh=$row['hinh'];	
				
				echo '<div id="sanpham">
            	<div id="sanpham_ten">'.$tensp.'</div>
  				<div id="sanpham_hinh"><img src="hinh/'.$hinh.'" width="150" height="150"/></div>
                <div id="sanpham_gia">Giá: '.$gia.'</div>
            </div>  ';
			}	
		}
		else
		{
			
			echo 'đang cập nhật sản phẩm';
		}
	}

	public function xuatcongty($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if($i>0)
		{
			while($row = mysql_fetch_array($ketqua))
			{
				$i = $row['id'];
				$tencty=$row['tencty'];
				echo '<a href="index.php?id='.$i.'">'.$tencty.'</a>';
				echo '<br>';
				
			
			}	
		}
		else
		{
			
			echo 'đang cập nhật công ty';
		}
	}


	public function combocongty($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if($i>0)
		{
			
			echo '<select name="congty" id="congty">
				<option value="0">Mời chọn chọn công ty</option>';
			while($row = mysql_fetch_array($ketqua))
			{
				$id = $row['id'];
				$tencty=$row['tencty'];
				echo '<option value="'.$id.'">'.$tencty.'</option>';
			}
			echo '</select>';	
		}
		else
		{
			
			echo 'đang cập nhật công ty';
		}
	}

	public function loaddssanpham($sql)
	{
		$link = $this->connect();
		$ketqua = mysql_query($sql, $link);
		$i = mysql_num_rows($ketqua);
		if($i>0)
		{
			
			echo  '<table width="717" border="1" align="center" cellpadding="0" cellspacing="0">
		<tbody>
		  <tr align="center">
			<th width="93" scope="col"><strong>STT</strong></th>
			<th width="185" scope="col"><strong>Tên sản phâm</strong></th>
			<th width="122" scope="col"><strong>Giá</strong></th>
			<th width="289" scope="col"><strong>Mô tả</strong></th>
		  </tr>';
			
			$dem = 1;
			while($row = mysql_fetch_array($ketqua))
			{
				$i = $row['id'];
				$tensp=$row['tensp'];
				$gia=$row['gia'];
				$mota=$row['monta'];	
				
				echo '  <tr>
					<td align="left" valign="middle">'.$dem.'</td>
					<td align="left" valign="middle">'.$tensp.'</td>
					<td align="left" valign="middle">'.$gia.'</td>
					<td align="left" valign="middle">'.$mota.'</td>
				  </tr>';
				  $dem++;	
			}	
			echo '</tbody>
					</table>';
		}
		else
		{
			
			echo 'đang cập nhật sản phẩm';
		}
	}

	public function uploadfile($local, $folder, $name)
	{
		if($local != '' && $folder != '' && $name != '')
		{
			$newname = $folder.'/'.$name;	
			if(move_uploaded_file($local, $newname))
			{
				return 1;	
			}
			else
			{
				return 0;	
			}
			
		}
		else	
		{
			return 0;	
		}
	}
	

	public function themxoasua($sql)
	{
		$link = $this->connect();
		if(mysql_query($sql, $link))
		{
			return 1;	
		}	
		{
			return 0;	
		}
	}

}


?>