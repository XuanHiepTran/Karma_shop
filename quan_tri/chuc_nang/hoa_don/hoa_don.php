<?php
	if(!isset($login)){exit();}
?>
<div class="thongke">

	<h1 style="text-align: center;">THỐNG KÊ ĐƠN HÀNG</h1>
	<table>
		<thead>
			<tr>
				<td align="center"><label>TỔNG ĐƠN HÀNG</label></td>
				<td align="center"><label>TỔNG TIỀN</label></td>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><!-- PHẦN XỬ LÝ PHP -->
					<?php
						include('../connect.php');
						/*TÌM TỔNG HÓA ĐƠN ĐỂ TÍNH TỔNG HÓA ĐƠN ĐÃ XỬ LÝ*/
						$da_xu_ly = "select count(ma_hoadon) as tongDonDaXuLy, count(ma_hoadon) from hoa_don where xu_ly='Đã xử lý'";
						$lay_ra_daxl = mysqli_query($connect,$da_xu_ly);
						$row_daxl = mysqli_fetch_array($lay_ra_daxl);
						echo "<label style='color:green;'>".$row_daxl["tongDonDaXuLy"]." đơn đã xử lý</lable> </br>";

						/*TÌM TỔNG HÓA ĐƠN ĐỂ TÍNH TỔNG HÓA ĐƠN CHƯA XỬ LÝ*/
						$chua_xu_ly = "select count(ma_hoadon) as chuaXuLy, count(ma_hoadon) from hoa_don where xu_ly='Chưa'";
						$lay_ra_chua = mysqli_query($connect,$chua_xu_ly);
						$row_chuaxl = mysqli_fetch_array($lay_ra_chua);
						echo "<label style='color:red;'>".$row_chuaxl["chuaXuLy"]." đơn chưa xử lý</label>";
					?>			
				</td>
				<td>
					<?php
						include('../connect.php');
						$select_tongTien = "SELECT SUM(thanh_tien) as tongTien FROM hoa_don WHERE xu_ly = 'Đã xử lý'";
						$sql_select = mysqli_query($connect,$select_tongTien);
						while ($row = mysqli_fetch_array($sql_select)) {
							echo "<label style='color: red;'>".$row["tongTien"]." vnđ</label></br>";
						}
					?>
				</td>
			</tr>
		</tbody>
	</table>
</div>
<h3 style="text-align: center;">THỐNG KÊ ĐƠN HÀNG</h3>
<table>
	<tr>
		<td><label>Mã hóa đơn</label></td>
		<td><label>Tên khách hàng</label></td>
		<td><label>Ngày mua</label></td>
		<td><label>Xử lý</label></td>
		<td><label>Xóa</label></td>
	</tr>
<?php 
	include('../connect.php');
	$sl="select * from hoa_don";
	$exec= mysqli_query($connect, $sl);
	while($row=mysqli_fetch_array($exec)){ 
?>
	<tr>
		<td><?php echo $row['ma_hoadon']; ?></td>
		<td><a href="?menu=chi_tiet_hoa_don&ma_hoadon=<?php echo $row['ma_hoadon']; ?>"><?php echo $row['tenkh']; ?></a></td>
		<td><?php echo $row['ngay_mua']; ?></td>
		<td><?php echo $row['xu_ly']; ?></td>
		<td><a  style="text-decoration: none; padding: 5px 15px; background-color: #1D388F; color: #fffafa;" onclick="return confirm('Bạn có muốn xóa hóa đơn?');" href="?menu=xoa&ma_hoadon=<?php echo $row['ma_hoadon']; ?>">Xóa</a></td>
	</tr>
	<?php } ?>
</table>

