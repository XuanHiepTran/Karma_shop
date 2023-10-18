<?php
	include('connect.php');
	if(isset($_POST['submit'])){
		$tenkh= $_POST['tenkh'];
		$cmnd= $_POST['cmnd'];
		$email= $_POST['email'];
		$sdt= $_POST['sdt'];
		$diachi= $_POST['diachi'];

		if(isset($_SESSION['username'])){
			$sp_mua=$_POST['sp_mua'];
			$_SESSION['sp_mua'] = $sp_mua;
			$list_id= $_POST['list_id'];
		}
		else{
			$xaphuong = $_POST['xaphuong'];
			$sqll= "select ward.type as wardtype, ward.name as wardname , district.type as districttype, district.name districtname, province.type  as provincetype, province.name as provincename from province join district on province.provinceid=district.provinceid join ward on ward.districtid=district.districtid where ward.wardid='".$xaphuong."'";
			$exc= mysqli_query($connect,$sqll);
			$row1= mysqli_fetch_array($exc); 
			$diachi= $diachi.", ".$row1['wardtype']." ".$row1['wardname'].", ".$row1['districttype']." ".$row1['districtname'].", ".$row1['provincetype']." ".$row1['provincename'];
			foreach($_SESSION['giohang'] as $masp=> $sp){
				$id_array[]= $masp;
			}
			$list_id= implode(',',$id_array);
			$sl= 'select * from san_pham where masp in ('.$list_id.')';
			$exec= mysqli_query($connect, $sl);
			$sp_mua="";
			while($row= mysqli_fetch_array($exec)){
				$soluong= $_SESSION['giohang'][$row['masp']];
				$gia_sp = $row['giasp'];
				$sp_mua = $sp_mua.$row['masp'].",".$soluong.",".$gia_sp."|";
			}

		}

	if (isset($_SESSION['sp_mua'])) {
		$san_pham_mua = $_SESSION['sp_mua'];
		$spMua = explode("|", $san_pham_mua);
		for($i=0;$i<count($spMua);$i++){
			if ($spMua[$i] != "") {
				$arr_sp_mua= explode(",",$spMua[$i]);
				$MASP = $arr_sp_mua[0];
				$SOLUONG = $arr_sp_mua[1];
				$GIASP = $arr_sp_mua[2];
			}
		}
	}
	$sql1= "insert into hoa_don(cmnd,tenkh,email,sdt,dia_chi,sp_mua,xu_ly,masp,so_luong,thanh_tien) values('".$cmnd."','".$tenkh."','".$email."','".$sdt."','".$diachi."','".$sp_mua."','Chưa',".$MASP.",".$SOLUONG.",".$GIASP.")";
	$exec1= mysqli_query($connect,$sql1);
	/**
		// TRỪ SỐ LƯỢNG KHI MUA HÀNG
		Khi khách mua xong, thì lấy số lượng mua - số lượng đang có
		select số lượng đang có và get số lượng mua thông qua $post["soLuong"];
		số lượng hiện tại = só lượng đang có - số lượng được mua
		sau đó update số lượng	
	*/
		// Lấy số lượng đang có
		$Select_soLuong = 'select soluong from san_pham where masp ='.$list_id.'';
		$thuc_thi_tim_so_luong = mysqli_query($connect,$Select_soLuong);
		while ($show_ra_so_luong= mysqli_fetch_array($thuc_thi_tim_so_luong)) {
			$row_so_luong = $show_ra_so_luong["soluong"];
			// Lấy số lượng mua
			if (isset($_SESSION['soLuongDuocMua'])) {
				$so_luong_mua = $_SESSION['soLuongDuocMua'];
				$so_luong_sau_khi_mua = $row_so_luong - $so_luong_mua;
				$update_so_luong = 'update san_pham set soluong=('.$so_luong_sau_khi_mua.') where masp in('.$list_id.')';
				mysqli_query($connect,$update_so_luong);
			}
		}
		if($exec1){
			$sql= "update san_pham set mua_nhieu=mua_nhieu + 1 where masp in (".$list_id.")";
			$ex= mysqli_query($connect, $sql);
					unset($_SESSION['giohang']);
				echo '<p class="alert alert-success">Mua hàng thành công.. Vui lòng kiểm tra mail của bạn và luôn giữ liên lạc khi nhân viên giao hàng liên hệ..</p>';
				echo '<p class="alert alert-success">Bấm <a href="?menu=san_pham">vào đây</a> để quay lại mua hàng tiếp</p>';
			/*THỰC HIỆN VIỆC THÊM VÀO CHI TIẾT HÓA ĐƠN*/
			
		}
		else{
			echo "<script> alert('Mua hàng không thành công'); location.href='?menu=san_pham'; </script>";
		}
	}
	else{
		echo "<script> location.href='index.php'; </script>";
	}
?>