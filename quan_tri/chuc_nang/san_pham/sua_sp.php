<?php
	if(!isset($login)){exit();}
?>
<?php
	include('../connect.php');
	$masp=$_GET['masp'];
	$sl= 'select * from san_pham join cau_hinh on san_pham.masp= cau_hinh.masp where san_pham.masp='.$masp;
	$exec= mysqli_query($connect,$sl);
	$row= mysqli_fetch_array($exec);
?>
<div class="addproduct">
	<form method="post" action="?menu=exec_sua_sp" enctype="multipart/form-data">
		<table>
			<tr>
				<td colspan="4">Thông tin sản phẩm</td>
			</tr>
			<tr>
				<td><label for="name">Tên sản phẩm</label></td>
				<td><label for="cost">Giá</label></td>
				<td><label for="soluong">Số lượng</label></td>
				<td class="right"><label for="loaisp">Loại sản phẩm</label></td>

			</tr>
			<tr>
				<td><input type="text" id="name" name="name"  value="<?php echo $row['tensp']; ?>" ></td>
				<td><input type="text" id="cost" name="cost"  value="<?php echo $row['giasp']; ?>" ></td>
				<td><input type="text" id="soluong" name="soluong"  value="<?php echo $row['soluong']; ?>" ></td>
				<td>
					<select name="loaisp" id="loaisp"   >
						<option value="laptop" <?php if($row['loaisp']=="laptop"){echo "selected";} 
						else{echo "";}
						  ?> >Laptop</option>
						<option value="mobile" <?php if($row['loaisp']=="mobile"){echo "selected"; }
						else{echo "";}
						 ?> >Điện thoại</option>
						<option value="tablet" <?php if($row['loaisp']=="tablet"){echo "selected"; }
						else{echo "";}  ?> >Máy tính bảng</option>
						<option value="pk" <?php if($row['loaisp']=="pk"){echo "selected"; }
						else{echo "";} ?> >Phụ kiện</option>
					</select>
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td colspan="2">Hình ảnh</td>
			</tr>
			<tr>
				<td class="right">
					<label for="image1">Ảnh 1:</label><br>
					<label for="image2">Ảnh 2:</label><br>
					<label for="image3">Ảnh 3:</label><br>
					<label for="image4">Ảnh 4:</label><br>
					<label for="image5">Ảnh 5:</label>
				</td>
				<td>
					<input type="hidden" name="masp" value="<?php echo $row['masp']; ?>">
					<input type="hidden" name="img" value="<?php echo $row['img']; ?>">
					<input type="hidden" name="img1" value="<?php echo $row['img1']; ?>">
					<input type="hidden" name="img2" value="<?php echo $row['img2']; ?>">
					<input type="hidden" name="img3" value="<?php echo $row['img3']; ?>">
					<input type="hidden" name="img4" value="<?php echo $row['img4']; ?>">
					<img src="../images/<?php echo $row['img']; ?>" alt="" name="img" width="60px" height="80px" ><input type="file" id="image" name="image"   ><br>
					<img src="../images/<?php echo $row['img1']; ?>" alt="" name="img1" width="60px" height="80px" ><input type="file" id="image1" name="image1"><br>
					<img src="../images/<?php echo $row['img2']; ?>" alt="" name="img2" width="60px" height="80px" ><input type="file" id="image2" name="image2"><br>
					<img src="../images/<?php echo $row['img3']; ?>" alt="" name="img3" width="60px" height="80px" ><input type="file" id="image3" name="image3"><br>
					<img src="../images/<?php echo $row['img4']; ?>" alt="" name="img4" width="60px" height="80px" ><input type="file" id="image4" name="image4">
				</td>
			</tr>
		</table>
		<table>
			<tr>
				<td colspan="4">Cấu hình</td>
			</tr>
			<tr>
				<td><label for="man_hinh">Màn hình</label></td>
				<td><label for="do_phan_giai">Độ phân giải</label></td>
				<td><label for="kich_thuoc_man_hinh">Kích thước màn hình</label></td>
				<td><label for="loai_man_hinh">Loại màn hình</label></td>
			</tr>
			<tr>
				<td><input type="text" id="man_hinh" name="man_hinh"  value="<?php echo $row['man_hinh']; ?>"  ></td>
				<td><input type="text" id="do_phan_giai" name="do_phan_giai"  value="<?php echo $row['do_phan_giai']; ?>" ></td>
				<td><input type="text" id="kich_thuoc_man_hinh" name="kich_thuoc_man_hinh"  value="<?php echo $row['kich_thuoc_man_hinh']; ?>" ></td>
				<td><input type="text" id="loai_man_hinh" name="loai_man_hinh"  value="<?php echo $row['loai_man_hinh']; ?>" ></td>
			</tr>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
				<td><label for="ngon_ngu">Ngôn ngữ</label></td>
				<td><label for="he_dieu_hanh">Hệ điều hành</label></td>
				<td><label for="ram">RAM</label></td>
				<td><label for="bo_nho_trong">Bộ nhớ trong</label></td>
			</tr>
			<tr>
				<td><input type="text" id="ngon_ngu" name="ngon_ngu"  value="<?php echo $row['ngon_ngu']; ?>" ></td>
				<td><input type="text" id="he_dieu_hanh" name="he_dieu_hanh"  value="<?php echo $row['he_dieu_hanh']; ?>" ></td>
				<td><input type="text" id="ram" name="ram"  value="<?php echo $row['ram']; ?>" ></td>
				<td><input type="text" id="bo_nho_trong" name="bo_nho_trong"  value="<?php echo $row['bo_nho_trong']; ?>" ></td>
			</tr>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
				<td><label for="cpu">CPU</label></td>
				<td><label for="chipset">Chipset</label></td>
				<td><label for="so_nhan">Số nhân</label></td>
				<td><label for="toc_do_cpu">Tốc độ CPU</label></td>
			</tr>
			<tr>
				<td><input type="text" id="cpu" name="cpu"  value="<?php echo $row['cpu']; ?>" ></td>
				<td><input type="text" id="chipset" name="chipset"  value="<?php echo $row['chipset']; ?>" ></td>
				<td><input type="text" id="so_nhan" name="so_nhan"  value="<?php echo $row['so_nhan']; ?>" ></td>
				<td><input type="text" id="toc_do_cpu" name="toc_do_cpu"  value="<?php echo $row['toc_do_cpu']; ?>" ></td>
			</tr>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
				<td><label for="chip_do_hoa">Chip đồ họa</label></td>
				<td><label for="camera_truoc">Camera Trước</label></td>
				<td><label for="camera_sau">Camera Sau</label></td>
				<td><label for="the_nho">Thẻ nhớ</label></td>
			</tr>
			<tr>
				<td><input type="text" id="chip_do_hoa" name="chip_do_hoa"  value="<?php echo $row['chip_do_hoa']; ?>" ></td>
				<td><input type="text" id="camera_truoc" name="camera_truoc"   value="<?php echo $row['camera_truoc']; ?>" ></td>
				<td><input type="text" id="camera_sau" name="camera_sau"   value="<?php echo $row['camera_sau']; ?>"  ></td>
				<td><input type="text" id="the_nho" name="the_nho"  value="<?php echo $row['the_nho']; ?>" ></td>
			</tr>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
				<td><label for="danh_ba">Danh Bạ</label></td>
				<td><label for="quay_phim">Quay phim</label></td>
				<td><label for="video_call">Video Call</label></td>
				<td><label for="den_flash">Đèn Flash</label></td>
			</tr>
			<tr>
				<td><input type="text" id="danh_ba" name="danh_ba"  value="<?php echo $row['danh_ba']; ?>" >
				<td>
					<select name="quay_phim" id="quay_phim">
						<option value="có" <?php if($row['quay_phim']=="có"){echo "selected";}else{ echo "";} ?> >Có</option>
						<option value="không" <?php if($row['quay_phim']=="không"){echo "selected";}else{ echo "";} ?> >Không</option>
					</select>
				</td>
				<td>
					<select name="video_call" id="video_call">
						<option value="có" <?php if($row['video_call']=="có"){echo "selected";}else{ echo "";} ?> >Có</option>
						<option value="không" <?php if($row['video_call']=="không"){echo "selected";}else{ echo "";} ?> >Không</option>
					</select>
				</td>
				<td>
					<select name="den_flash" id="den_flash">
						<option value="có" <?php if($row['den_flash']=="có"){echo "selected";}else{ echo "";} ?> >Có</option>
						<option value="không" <?php if($row['den_flash']=="không"){echo "selected";}else{ echo "";} ?> >Không</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
				<td><label for="da_phuong_tien">Đa phương tiện</label></td>
				<td><label for="single3g4g">3G/4G</label></td>
				<td><label for="loai_sim">Loại sim</label></td>
				<td><label for="so_sim">Số sim</label></td>
			</tr>
			<tr>
				<td><input type="text" id="da_phuong_tien" name="da_phuong_tien"  value="<?php echo $row['da_phuong_tien']; ?>" ></td>
				<td><select name="single3g4g" id="single3g_4g">
						<option value="3G" <?php if($row['single3g4g']=="3G"){echo "selected";}else{ echo "";} ?> >3G</option>
						<option value="3G/4G" <?php if($row['single3g4g']=="3G/4G"){echo "selected";}else{ echo "";} ?> >3G/4G</option>
					</select>
				</td>
				<td>
					<select name="loai_sim" id="loai_sim">
						<option value="Sim thường">Sim thường</option>
						<option value="MicroSim">MicroSim</option>
						<option value="NanoSim">NanoSim</option>
					</select>
				</td>
				<td><input type="text" id="so_sim" name="so_sim"  value="<?php echo $row['so_sim']; ?>" ></td>
			</tr>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
				<td><label for="wifi">Wifi</label></td>
				<td><label for="gps">GPS</label></td>
				<td><label for="bluetooth">Bluetooth</label></td>
				<td><label for="gprs_edge">GPRS/EDGE</label></td>
			</tr>
			<tr>
				<td>
					<select name="wifi" id="wifi">
						<option value="có" <?php if($row['wifi']=="có"){echo "selected";}else{ echo "";} ?> >Có</option>
						<option value="không" <?php if($row['wifi']=="không"){echo "selected";}else{ echo "";} ?> >Không</option>
					</select>
				</td>
				<td>
					<select name="gps" id="gps">
						<option value="có" <?php if($row['gps']=="có"){echo "selected";}else{ echo "";} ?> >Có</option>
						<option value="không" <?php if($row['gps']=="không"){echo "selected";}else{ echo "";} ?> >Không</option>
					</select>
				</td>
				<td>
					<select name="bluetooth" id="bluetooth">
						<option value="có" <?php if($row['bluetooth']=="có"){echo "selected";}else{ echo "";} ?> >Có</option>
						<option value="không" <?php if($row['bluetooth']=="không"){echo "selected";}else{ echo "";} ?> >Không</option>
					</select>
				</td>
				<td>
					<select name="gprs_edge" id="gprs_edge">
						<option value="có" <?php if($row['gprs_edge']=="có"){echo "selected";}else{ echo "";} ?> >Có</option>
						<option value="không" <?php if($row['gprs_edge']=="không"){echo "selected";}else{ echo "";} ?> >Không</option>
					</select>
				</td>
			</tr>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
				<td><label for="chuc_nang_khac">Chức năng khác</label></td>
				<td><label for="kich_thuoc">Kích thước</label></td>
				<td><label for="khoi_luong">Khối lượng</label></td>
				<td><label for="pin">Pin</label></td>
			</tr>
			<tr>
				<td><input type="text" id="chuc_nang_khac" name="chuc_nang_khac"  value="<?php echo $row['chuc_nang_khac']; ?>" ></td>
				<td><input type="text" id="kich_thuoc" name="kich_thuoc"  value="<?php echo $row['kich_thuoc']; ?>" ></td>
				<td><input type="text" id="khoi_luong" name="khoi_luong"  value="<?php echo $row['khoi_luong']; ?>"  ></td>
				<td><input type="text" id="pin" name="pin"  value="<?php echo $row['pin']; ?>" ></td>
			</tr>
		</table>
		<table>
			<tr>
				<td colspan="4"><hr></td>
			</tr>
			<tr>
				<td><label for="noi_bat">Nổi bật</label></td>
				<td>
					<select name="noi_bat" id="noi_bat">
						<option value="có" <?php if($row['noi_bat']=="có"){echo "selected";}else{ echo "";} ?> > Có</option>
						<option value="không" <?php if($row['noi_bat']=="không"){echo "selected";}else{ echo "";} ?> >Không</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="right"><input type="submit" name="submit" value="Sửa"></td>	</form>
				<form method="post" action="?menu=exec_sua_sp">
				<td><input type="submit" name="cancel" value="Hủy"></td>
			</tr>
		</table>
	</form>
</div>