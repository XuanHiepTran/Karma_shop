<div class="panel panel-primary" style="width: 186px; margin-left: -16px;">
    <div class="panel-heading">Mua nhiều</div>
    <div class="panel-body">
		<?php
			include('connect.php');
			$sl= "select * from san_pham order by mua_nhieu desc limit 0,4"; 
			$exec= mysqli_query($connect, $sl); 
			while($row= mysqli_fetch_array($exec)){
		?>
		<div style="height: 240px;" class="sp img-thumbnail">
		<div class="img img-thumbnail">
			<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><img src="images/<?php echo $row['img']; ?>" alt=""></a>
		</div>
		<div class="title">
			<a href="?menu=product_info&masp=<?php echo $row['masp']; ?>"><?php echo $row['tensp']; ?></a>
		</div>
		<div class="cost">
			<span><?php echo number_format($row['giasp'],0,",",".")."đ"; ?></span>
		</div>
	</div>
		<?php } ?>
	</div>
</div>