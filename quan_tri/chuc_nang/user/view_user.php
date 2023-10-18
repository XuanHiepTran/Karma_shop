<?php
	if(!isset($login)){exit();}
?>
<table border="1">
<tr>
<td>CMND</td>
<td>UserName</td>
<td>Password</td>
<td>Họ Tên</td>
<td>Ngày Sinh</td>
<td>Giới Tính</td>
<td>Email</td>
<td>Số điện thoại</td>
<td>ID địa chỉ</td>
<td>Địa Chỉ</td>
</tr>
<?php
include 'connect.php';
$query=mysqli_query($connect,"select * from thanh_vien");
while($row=mysqli_fetch_array($query)){
?>  

<tr>
    <td><?php echo $row['cmnd']; ?></td>
    <td><?php echo $row['username']; ?></td>
    <td><?php echo $row['password']; ?></td>
    <td><?php echo $row['hoten'];  ?></td>
    <td><?php echo $row['ngaysinh']; ?></td>
    <td><?php echo $row['gioitinh']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['sdt']; ?></td>
    <td><?php echo $row['id_diachi']; ?></td>
    <td><?php echo $row['diachi']; ?></td>
    
    <td><a href="?menu=edit_user&?cmnd=<?php echo $row['cmnd']; ?>">Edit</a></td>
    <td><a href="?menu=delete_user&?cmnd=<?php echo $row['cmnd']; ?>">Delete</a></td>
</tr>

<?php
}
?>
</table>