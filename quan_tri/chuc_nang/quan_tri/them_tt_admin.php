<?php
	if(!isset($login)){exit();}
	include('../connect.php');
	$sl1= "select * from quan_tri where name='".$_SESSION['user']."'";
	$exec1= mysqli_query($connect, $sl1);
	$row1= mysqli_fetch_array($exec1);
	if($row1['quyen_truy_cap']==1){
?>
<form action="?menu=exec_them_tt_admin" method="post">
	<table>
		<tr> 
			<td class="right"><label for="name">Username: </label></td>
			<td><input type="text" name="name" id="name" required ></td>
		</tr>
		<tr>
			<td class="right"><label for="pass">Password: </label></td>
			<td><input type="password" name="pass" id="pass" required ></td>
		</tr>
		<tr>
			<td class="right"><label for="re_pass">Password: </label></td>
			<td><input type="password" name="re_pass" id="re_pass" required></td>
		</tr>
		<tr>
			<td class="right"><input type="submit" name="submit" value="Thêm"></td>
			</form>
<form action="?menu=exec_them_tt_admin" method="post">
			<td><input type="submit" name="cancel" value="Hủy"></td>
		</tr>
	</table>
</form>
<?php }
	else{
		echo "<script> alert('Bạn không có quyền truy cập vào trang này.'); location.href='?menu=trang_chu'; </script>";
	}
?>