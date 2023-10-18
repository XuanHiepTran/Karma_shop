<!DOCTYPE html>
<?php
	if(!isset($login)){exit();}
?>
<title>Insert MySQL Data</title>


<form method="POST" class="form">
    <h2>Thêm thành viên</h2>
    <label>CMND <input type="char(13)" name="CMND"></label><br/>
    <label>UserName: <input type="varchar(50)" name="Username"></label><br/>
    <label>Password: <input type="varchar(80)" name="Pass"></label><br/>
    <label>Họ Tên: <input type="varchar(60)" name="HoTen"></label><br/>
    <label>Ngày Sinh: <input type="Date" name="NgaySinh"></label><br/>
    <label>Giới Tính <input type="varchar(10)" name="GioiTinh"></label><br/>
    <label>Email: <input type="Varchar(80)" name="Email"></label><br/>
    <label>Số điện thoại: <input type="varchar(11)" name="SoDT"></label><br/>
    <label>ID địa chỉ: <input type="varchar(5)" name="IDdc"></label><br/>
    <label>Địa chỉ: <input type="varchar(150)" name="diachi"></label><br/>
    <input type="submit" value="Add" name="add_user">
</form>

<?php
include 'connect.php';



  if(isset($_POST['submit'])){
    $sl1= "select * from thanh_vien";
    $exec1= mysqli_query($connect, $sl1);
    $row1= mysqli_fetch_array($exec1); 

$CMND=$_POST['CMND'];
$User=$_POST['UserName'];
$pass= $_POST['Pass'];	
	$pass= md5($pass);
	$pass= md5($pass);
$HoTen=$_POST['HoTen'];
$NgaySinh=$_POST['NgaySinh'];
$GioiTinh=$_POST['GioiTinh']; 
$Email=['Email'];
$SoDT=$_POST['SoDT'];
$IDdiachi=$_POST['IDdc'];
$Diachi=$_POST['diachi'];

$sl= "insert into thanh_vien(cmnd,username,pass,hoten,ngaysinh,gioitinh,email,sdt,id_diachi,diachi) values('".$CMND."','".$pass."','".$User."','".$HoTen."','".$NgaySinh."','".$GioiTinh."','".$Email."','".$SoDT."','".$IDdiachi."','".$DiaChi."')";
	$exec= mysqli_query($connect, $sl);
	if($exec){
			echo "<script> alert('Thêm vào thành công'); location.href='?menu=add_user'; </script>";
		}
		else{
			echo "<script> alert('Thêm vào không thành công'); location.href='?menu=add_user'; </script>";
		}
  }

?>