<?php
	include ("connect.php");

	$masp = $_GET['masp'];
	$soluong= $_GET['soluong'];
	
	$select_soLuongSP = "select soluong from san_pham where masp=".$masp."";
	$query_soLuong = mysqli_query($connect,$select_soLuongSP);
	$row_soLuong = mysqli_fetch_array($query_soLuong);
	
	$soLuongSPCon = $row_soLuong['soluong'];
	if ( $soLuongSPCon < $soluong ) {
		echo "<script> alert('Sản phẩm đã hết hàng, xin lỗi vì sự bất tiện này!'); location.href='?menu=san_pham'; </script>";
		exit;
	}

	$sp= 0;
	if(isset($_SESSION['giohang'][$masp])){
		$sp= $_SESSION['giohang'][$masp] + $soluong;
	}
	else{
		$sp= $soluong;
	}
	$_SESSION['giohang'][$masp]=$sp;
	echo "<script> alert('Thêm vào giỏ hàng thành công'); location.href='?menu=san_pham'; </script>";
?>