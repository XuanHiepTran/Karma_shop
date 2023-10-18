<?php
	if(!isset($login)){exit();}
?>
<table>
	<tr>
		<td><label>Tên sản phẩm</label></td>
		<td><label>Giá sản phẩm</label></td>
		<td><label>Hình ảnh</label></td>
		<td><label>Loại sản phẩm</label></td>
		<td width="100px"><label>Chi tiết</label></td>
		<td colspan="2" align="center"><a  style="text-decoration: none; padding: 5px 15px; background-color: #1D388F; color: #fffafa;"  href="?menu=them_sp">Thêm</a></td>
	</tr>
<?php 
	include('../connect.php');
	$sl= "select * from san_pham";
	$exec= mysqli_query($connect, $sl);
	while($row= mysqli_fetch_array($exec)){
?>
	<tr>
		<td><?php echo $row['tensp']; ?></td>
		<td><?php echo number_format($row['giasp'],0,",",".")."đ"; ?></td>
		<td>
			<img src="../images/<?php echo $row['img']; ?>"  width="60px" height="80px" alt="">
			<img src="../images/<?php echo $row['img1']; ?>"  width="60px" height="80px" alt="">
			<img src="../images/<?php echo $row['img2']; ?>"  width="60px" height="80px" alt="">
			<img src="../images/<?php echo $row['img3']; ?>"  width="60px" height="80px" alt="">
			<img src="../images/<?php echo $row['img4']; ?>"  width="60px" height="80px" alt="">
		</td>
		<td><?php echo $row['loaisp']; ?></td>
		<td><a style="text-decoration: none; padding: 5px 15px; background-color: #1D388F; color: #fffafa;"  href="?menu=chi_tiet&masp=<?php echo $row['masp']; ?>">Chi tiết</a></td>
		<td><a  style="text-decoration: none; padding: 5px 15px; background-color: #1D388F; color: #fffafa;"  href="?menu=sua_sp&masp=<?php echo $row['masp']; ?>">Sửa</a></td>
		<td><a  style="text-decoration: none; padding: 5px 15px; background-color: #1D388F; color: #fffafa;" onclick="return confirm('Bạn có muốn xóa không?');" href="?menu=xoa_sp&masp=<?php echo $row['masp']; ?>">Xóa</a></td>
	</tr>
<?php  } ?>
</table>