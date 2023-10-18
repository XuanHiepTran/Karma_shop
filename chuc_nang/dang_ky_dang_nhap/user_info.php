
<?php
	include('connect.php');
	$sl= "select * from thanh_vien where username='".$_SESSION['username']."'";
	$exec= mysqli_query($connect, $sl);
	$row= mysqli_fetch_array($exec);
?>
<div class="panel panel-primary" style="width: 186px; margin-left: -16px;">
<div class="panel-heading">Thành viên</div>
<table class="table">
	<tr>
		<td><p style="padding-left: 2px;font-weight: bold;">KH: <a href="?menu=thanh_vien" style=""><?php echo $row['hoten']; ?></a></p></td>
	</tr>
	<tr>
		<td><p style="text-align: center;font-weight: bold;"><a href="?menu=change_password">Đổi mật khẩu</a></p></td>
	</tr>
	<tr>
	</tr>
		<td><p style="padding-left: 2px;font-weight: bold;">Giỏ hàng: <a href="?menu=gio_hang"><?php echo $cart; ?></a> SP</p></td>
	</tr>
	<tr>
		<td><p style="text-align: center;"><a class="btn btn-primary" href="?menu=logout">Đăng xuất</a></p></td>
	</tr>
</table>
</div>
