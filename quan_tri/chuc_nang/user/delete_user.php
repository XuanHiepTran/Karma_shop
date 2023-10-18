<?php
	if(!isset($login)){exit();}
?>
<?php
include_once('connect.php');
if(isset($_REQUEST['?cmnd']) and $_REQUEST['?cmnd']!=""){
$cmnd=$_GET['?cmnd'];
$sql = "DELETE FROM thanh_vien WHERE 'cmnd'='$cmnd'";
if ($connect->query($sql) == TRUE) {
echo "Xoá thành công!";
} else {
echo "Error updating record: " . $connect->error;
}
 
$connect->close();
}
?>