<?php
	include('chuc_nang/quan_tri/security.php');
	if(!isset($login)){exit();}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Quản trị</title>
	<link rel="stylesheet" href="style/Style.css">
</head>
<body>
	<div class="navbar">
		<ul>
			<li><a href="index.php">Trang chủ</a></li>
			<li><a href="?menu=view_user">Thành viên</a></li>
			<li><a href="?menu=ql_sanpham">Sản phẩm</a></li>
			<li><a href="?menu=quan_ly_admin">Quản trị</a></li>
			<li><a href="?menu=hoa_don">Hóa đơn</a></li>
			<li><a href="?menu=logout">Đăng xuất</a></li>

			
		</ul>
	</div>
	<div class="content">
		<?php include('menu.php'); ?>
	</div>
</body>
</html>