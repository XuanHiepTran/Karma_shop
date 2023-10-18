<?php
	if(!isset($login)){exit();}
?>
<html>
<head>
<title>Editing MySQL Data</title>
<link rel="stylesheet" href="style.css"/>
</head>
<body>

<?php
// Kết nối Database
include 'connect.php';
$CMND=$_GET['?cmnd'];
$query=mysqli_query($connect, "SELECT * FROM `thanh_vien` WHERE `cmnd`='$CMND'");
$row=mysqli_fetch_assoc($query);
?>

<form method="POST" class="form">
<h2>Sửa thành viên</h2>
<label>Username <input type="varchar(50)" value="<?php echo $row['username']; ?>" name="User"></label><br/>
<label>Password: <input type="varchar(80)" value="<?php echo $row['password']; ?>" name="Pass"></label><br/>
<label>Họ Tên: <input type="varchar(60)" value="<?php echo $row['hoten']; ?>" name="HoTen"></label><br/>
<label>Ngày Sinh: <input type="date" value="<?php echo $row['ngaysinh']; ?>" name="NgaySinh"></label><br/>
<label>Giới tính <input type="varchar(10)" value="<?php echo $row['gioitinh']; ?>" name="GioiTinh"></label><br/>
<label>Email: <input type="Varchar(80)" value="<?php echo $row['email']; ?>" name="Email"></label><br/>
<label>Số điện thoại: <input type="varchar(11)" value="<?php echo $row['sdt']; ?>" name="SoDT"></label><br/>
<label>ID địa chỉ: <input type="varchar(5)" value="<?php echo $row['id_diachi']; ?>" name="IDdiachi"></label><br/>
<label>Địa chỉ: <input type="varchar(150)" value="<?php echo $row['diachi']; ?>" name="DiaChi"></label><br/>
<input type="submit" value="Update" name="update_user">
<?php

if (isset($_POST['update_user'])){
$CMND=$_GET['?cmnd'];
$User=$_POST['User'];
$Pass=$_POST['Pass'];
$HoTen=$_POST['HoTen'];
$NgaySinh=$_POST['NgaySinh'];
$GioiTinh=$_POST['GioiTinh'];
$Email=$_POST['Email'];
$SoDT=$_POST['SoDT'];
$IDdiachi=$_POST['IDdiachi'];
$DiaChi=$_POST['DiaChi'];
 
// Create connection
$connect = new mysqli("localhost", "root", "", "do_an_chuyen_nganh");
// Check connection
if ($connect->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

$sql = "UPDATE `thanh_vien` SET `username`='$User', `password`='$Pass', `hoten`='$HoTen', `ngaysinh`='$NgaySinh', `gioitinh`='$GioiTinh', `email`='$Email', `sdt`='$SoDT', `id_diachi`='$IDdiachi', `diachi`='$DiaChi'  WHERE `cmnd`='$CMND'";
 
if ($connect->query($sql) == TRUE) {
echo "Record updated successfully";
} else {
echo "Error updating record: " . $connect->error;
}
 
$connect->close();
}
?>

</form>
</body>
</html>