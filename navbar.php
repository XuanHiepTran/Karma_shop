<nav class="menu navbar-default" role="navigation">
	<div class="container">
		
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php">TRANG CHỦ</a>
		</div>

		
		<div class="collapse navbar-collapse navbar-ex1-collapse">
			<ul class="nav navbar-nav">
				<?php 
				include('connect.php');
				$sl="select * from menu_ngang";
				$exec= mysqli_query($connect, $sl);
				while($row=mysqli_fetch_array($exec)){
				?>
				<li><a href="?menu=<?php echo $row['loaimenu']; ?>"><?php 
				echo $row['title']; ?></a></li>
				<?php } ?>
			</ul>
		</div><!-- /.navbar-collapse -->
	</div>
</nav>