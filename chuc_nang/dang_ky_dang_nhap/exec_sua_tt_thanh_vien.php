<?php
	if(isset($_POST['submit'])){
	include('connect.php');
	$cmnd= $_POST['cmnd'];
	$hoten = $_POST['hoten'];
	$ngaysinh = "'".$_POST['nam']."-".$_POST['thang']."-".$_POST['ngay']."'";
	$gioitinh = $_POST['gioitinh'];
	$email = $_POST['email'];
	$sdt = $_POST['sdt'];
	$diachi = $_POST['diachi'];
	$sl="update thanh_vien set cmnd='".$cmnd."',hoten='".$hoten."',ngaysinh=".$ngaysinh.",gioitinh='".$gioitinh."',email='".$email."',sdt='".$sdt."',diachi='".$diachi."' where username='".$_SESSION['username']."'";
	$exec= mysqli_query($connect,$sl);
	if($exec){ ?>
		<p class="alert alert-success">Chỉnh sửa thông tin thành công..<br>Bấm<a href="?menu=thanh_vien"> vào đây </a> để xem</p>
	<?php }
	else{
		echo $sl;
		echo "Chỉnh sửa thất bại <br>";
		echo 'Bấm<a href="javascript:history.back(-1);"> vào đây </a> để quay lại trang sửa chữa';
	}
	}
	if(isset($_POST['cancel'])){
	echo "<script> location.href='index.php'; </script>";
}
?>