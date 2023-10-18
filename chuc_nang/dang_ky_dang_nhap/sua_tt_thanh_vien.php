<script type="text/javascript">

    $(document).ready(function() {
        document.title = 'Thành viên';
    });

</script>
<?php
	include('connect.php');
	$sl= "select * from thanh_vien where username='".$_SESSION['username']."'";
	$exec= mysqli_query($connect, $sl);
	$row = mysqli_fetch_array($exec); 
	$ngaysinh= $row['ngaysinh']; 
	$array= explode("-",$ngaysinh);
	$nam= $array[0];
	$thang= $array[1];
	$ngay= $array[2];
?>
<div class="panel panel-primary">
    <div class="panel-heading">Sửa thông tin thành viên</div>
    <div class="panel-body">
<form action="?menu=exec_sua_tt_thanh_vien" method="post">
	<table class="table">
		<tr>
			<td><label for="hoten">Họ và tên:</label></td>
			<td><input type="text" name="hoten" id="hoten" class="form-control"  placeholder="Nhập họ và tên bạn.." value="<?php echo $row['hoten']; ?>" required ></td>
		</tr>
		<tr>
			<td><label for="cmnd">Số CMND: </label></td>
			<td><input required type="text" name="cmnd" id="cmnd" class="form-control"  placeholder="Nhập số CMND.."  value="<?php echo $row['cmnd']; ?>"></td>
		</tr>
		<tr>
			<td><label>Ngày sinh: </label></td>
			<td>
				<select style="width: 100px; height: 36px; border: 0.1px solid silver; border-radius: 5px; padding-left: 10px;" name="ngay" id="ngaysinh" required >
				<?php for($i=1; $i<=31; $i++){ ?>
					<option value="<?php echo $i; ?>" <?php if($i==$ngay){ echo "selected";} ?>><?php echo "Ngày ".$i; ?></option>
				<?php }?>
				</select>
				<select style="width: 100px; height: 36px; border: 0.1px solid silver; border-radius: 5px; padding-left: 10px;" name="thang" required >
				<?php for($j=1; $j<=12; $j++){ ?>
					<option value="<?php echo $j; ?>"  <?php if($j==$thang){ echo "selected";} ?> ><?php echo "Tháng ".$j; ?></option>
				<?php }?>
				</select>
				<select style="width: 120px; height: 36px; border: 0.1px solid silver; border-radius: 5px; padding-left: 10px;" name="nam" required >
				<?php for($y=1946; $y<=date('Y'); $y++){ ?>
					<option value="<?php echo $y; ?>" <?php if($y==$nam){ echo "selected";} ?> ><?php echo "Năm ".$y; ?></option>
				<?php } ?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for="gioitinh">Giới tính:</label></td>
			<td>
				<select  class="form-control"  name="gioitinh" id="gioitinh" required >
					<option value="Nam" <?php if($row['gioitinh']=="Nam"){ echo "selected"; }?> >Nam</option>
					<option value="Nữ" <?php if($row['gioitinh']=="Nữ"){ echo "selected"; }?>>Nữ</option>
					<option value="Khác" <?php if($row['gioitinh']=="Khác"){ echo "selected"; }?>>Khác</option>
				</select>
			</td>
		</tr>
		<tr>
			<td><label for="email">Email:</label></td>
			<td><input type="email" name="email" id="email" class="form-control"  placeholder="Nhập địa chỉ Email.." value="<?php echo $row['email']; ?>" required ></td>
		</tr>
		<tr>
			<td><label for="sdt">Số điện thoại:</label></td>
			<td><input type="text" name="sdt" id="sdt" class="form-control"  placeholder="Nhập số điện thoại.." value="<?php echo $row['sdt']; ?>" required ></td>
		</tr>
		<tr>
			<td><label for="diachi">Địa chỉ:</label></td>
			<td><input type="text" name="diachi" id="diachi" class="form-control"  placeholder="Tổ, thôn...."  value="<?php echo $row['diachi']; ?>" required ></td>
		</tr>
		<tr>
			<td align="center"><input type="submit" class="btn btn-primary" name="submit" value="Cập nhật"></td>
			<td align="center"><input type="submit" class="btn btn-primary" name="cancel" value="Hủy"></td>
		</tr>
	</table>
</form>
</div>
</div>
