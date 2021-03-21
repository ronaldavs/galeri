<?php

	include "koneksi.php";

	if(@$_FILES["webcam"]["tmp_name"]){

		$date = time().".jpg";
		$tmp = $_FILES["webcam"]["tmp_name"];

		mysqli_query($koneksi,"insert into galeri (no,nama,tanggal) values(NULL,'$date','".date("y,m,d")."') ");
		move_uploaded_file($tmp, "../Galeri/".$date);

	}
	else if(@$_POST['dele']){
		$select = mysqli_query($koneksi,"select *from galeri where nama = '".$_POST['dele']."'");
		if(mysqli_num_rows($select) > 0){
			mysqli_query($koneksi,"delete from galeri where nama = '".$_POST['dele']."' ");
			unlink("../Galeri/".$_POST['dele']);
		}
		else{}
	}
	else{/*None*/}


	$item = mysqli_query($koneksi,"select *from galeri order by no desc");
	while($itempart = mysqli_fetch_array($item)){
		echo '<div id="item">';
		echo "<img src='Galeri/".$itempart['nama']."'/>";
		echo "<div id='fo'>".$itempart['tanggal']." No : ".$itempart['no']."</div>";
		echo '</div>';
	}

?>