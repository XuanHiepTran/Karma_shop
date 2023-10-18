<?php
	if(isset($_SESSION['giohang'])){
		if(count($_SESSION['giohang'])==0){
		unset($_SESSION['giohang']);
	?>
	<p class="alert alert-warning">Giỏ hàng bạn trống.. Bấm <a href="?menu=san_pham">vào đây</a> để chọn và mua hàng</p>
<?php
	}else{
		if(isset($_POST['submit'])){
			foreach($_POST['sl_sp'] as $masp => $sp){
				if($sp < 0){
					echo "<script> alert('Mua như bạn thì tôi chịu rồi!');  location.href='?menu=gio_hang';  </script>";
					exit;
				}
				foreach($_SESSION['giohang'] as $maSP=> $sl_SP){
					$id_array[]= $maSP;
					$list_id= implode(',',$id_array);

					$select_soLuongSP = "select soluong from san_pham where masp=".$list_id."";
					$query_soLuong = mysqli_query($connect,$select_soLuongSP);
					$row_soLuong = mysqli_fetch_array($query_soLuong);
					
					$soLuongSPCon = $row_soLuong['soluong'];
					if ( $soLuongSPCon < $sp ) {
						echo "<script> alert('Sản phẩm này chỉ còn ".$soLuongSPCon.", xin mua <= số lượng này!');  location.href='?menu=gio_hang';  </script>";
						exit;
					}
				}
				if($sp == 0 and (is_numberic($sp))){
					unset($_SESSION['giohang'][$masp]);
				}else{
					$_SESSION['giohang'][$masp] = $sp;
				}
				echo "<script> alert('Cập nhật giỏ hàng thành công'); </script>";
			}
		}
?>
<script type="text/javascript">

    $(document).ready(function() {
        document.title = 'Giỏ hàng (<?php echo $cart; ?>)';
    });
</script>
	<div class="cart">
		<form method="post">
			<table class="table">
				<tr style="font-weight: bold;">
					<td>Tên sản phẩm</td>
					<td>Giá sản phẩm</td>
					<td>Số lượng</td>
					<td>Tổng tiền</td>
					<td>Xóa sản phẩm</td>
				</tr>
<?php 	
	$tg=0;
	foreach($_SESSION['giohang'] as $masp=> $sp){
		$id_array[]= $masp;
		}
	$list_id= implode(',',$id_array);
	include('connect.php');
	$sl= 'select * from san_pham where masp in ('.$list_id.')';
	$exec= mysqli_query($connect, $sl);
	while($row= mysqli_fetch_array($exec)){
		
?>

<?php $_SESSION['soLuongDuocMua'] = $_SESSION['giohang'][$row['masp']]; ?>
				<tr>
					<td><?php echo $row['tensp'] ?></td>
					<td><?php echo number_format($row['giasp'],0,",",".")."đ"; ?></td>
					<td><input type="text" class="form-control" name="sl_sp[<?php echo $row['masp']; ?>]" size="2" value="<?php echo $_SESSION['giohang'][$row['masp']]; ?>"></td>
					<td><?php $tog=($row['giasp'] * $_SESSION['giohang'][$row['masp']]); echo number_format($tog,0,",",".")."đ";  ?></td>
					<td><a href="?menu=del_cart&masp=<?php echo $row['masp']; ?>">Xóa</a></td>
				</tr>
<?php 
	$tg = $tg + $tog; 
	} 
?>				
				<tr align="center">
					<td colspan="5"><input class="btn btn-primary" type="submit" name="submit" value="Cập nhật sản phẩm" ></td>
				</tr>
		</table>
	</form>
		<table class="table">
				<tr  style="font-weight: bold;">
					<td colspan="4" style="font-weight: bold;">Tổng giỏ hàng là:</td> 
					<td><?php echo number_format($tg,0,",",".")."đ"; ?></td>
				</tr>
				<tr>
					<td colspan="5" align="center"><a href="?menu=del_cart&masp=0">Xóa toàn bộ giỏ hàng</a></td>
				</tr>
				<tr>
					<td colspan="5" align="center"><form action="?menu=thanh_toan" method="post"><input type="submit" class="btn btn-primary" name="thanh_toan" value="Thanh toán"></form></td>
				</tr>
		</table>
<?php }}
	elseif(!isset($_SESSION['giohang'])){
		?>
	<p class="alert alert-warning">Giỏ hàng bạn trống.. Bấm <a href="?menu=san_pham">vào đây</a> để chọn và mua hàng</p>
		<?php
	}
 ?>
	</div>
