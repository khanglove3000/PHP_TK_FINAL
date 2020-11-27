<?php include 'classes/db.php';
$p = new csdl();
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
<div id="container">
	<div id="banner"></div>
	<div id="menu"></div>
    <div id="main">
    	<div id="main_left">
        	<?php			
            $p->xuatcongty("select * from congty order by tencty asc");
			
			?>
        </div>
        <div id="main_right">
        	<?php
				$conty = $_REQUEST['id'];
				if($conty != '')
				{
					$p->xuatsanpham("select * from sanpham where id_congty='$conty' order by gia asc ");
				}
				else
				{
            		$p->xuatsanpham(" select * from sanpham order by gia asc");
				}
			?>   
        
        </div>
    </div>
    <div id="footer"></div>
</div>

</body>
</html>