<!DOCTYPE html>
<html>

<meta name="viewport" content="width=device-width,initial-scale=1.0"> 

<link href='https://fonts.googleapis.com/css?family=Aladin' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Allura' rel='stylesheet'>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

<script src="Modul/JQuery.js"></script>
<script src="Modul/Webcam.js"></script>
<script src="Modul/Webcam.min.js"></script>

<style>
	body{margin: 0px;}
	.header{
		text-align: center;
		padding-top: 10px;
		padding-bottom: 10px;
		position: relative;
		background: linear-gradient(to right, #4E5251,#E66220 ,#38E4B8);
	}
	.header span:nth-child(1){
		font-family: aladin;
		background: #9FE561;
		font-size: 30px;
		display: inline-block;
		padding: 5px;
		color : white;
		padding-left: 10px;
		padding-right: 10px;
		border-radius: 10px;
		border: 2px solid white;
		position: relative;
		z-index: 2;
	}
	.header span:nth-child(2){
		font-size: 40px;
		display: inline-block;
		padding: 5px;
		color : white;
		padding-left: 10px;
		padding-right: 10px;
		border-radius: 10px;
		position: absolute;
		top : 50%;
		left: 10px;
		transform: translateY(-50%);
		cursor: pointer;
		font-family: Allura;
		z-index: 2;
	}
	.header .material-icons{
		background: #9FE561;
		font-size: 30px;
		display: inline-block;
		padding: 5px;
		color : white;
		padding-left: 10px;
		padding-right: 10px;
		border-radius: 10px;
		position: absolute;
		top : 50%;
		right: 10px;
		transform: translateY(-50%);
		cursor: pointer;
		border: 2px solid white;
		z-index: 2;
	}
	.header .material-icons:hover{
		-webkit-text-fill-color : #F2EB51;
	}
	.header #wp{
		background: url(Image/Img1.jpg);
		width: 100%;
		height: 100%;
		position: absolute;
		top : 0px;
		left: 0px;
		z-index: 1;
		background-size: cover;
		mix-blend-mode : multiply;
	}

	.camera{
		width: 100%;
		height: 100%;
		position: fixed;
		text-align: center;
		background: black;
		top : 0px;
		left : 0px;
		z-index: 5;
		background: rgba(77, 77, 77,0.5);
		display: none;
	}
	.camera #camera{
		margin-top : 20px;
	}
	.camera #action{
		position: absolute;
		bottom: 0px;
		width: 100%;
		background: #40D65F;
		user-select : none;
	}
	.camera #action #Flip{
		font-size: 60px;
		padding: 7px;
		margin: 5px;
		display: inline-block;
		cursor: pointer;
		background: #F97C57;
		border-radius: 50%;
	}
	.camera #action #Snap{
		font-size: 60px;
		padding: 7px;
		margin: 5px;
		display: inline-block;
		cursor: pointer;
		background: #F97C57;
		border-radius: 50%;
	}
	.camera #action #Save{
		font-size: 60px;
		padding: 7px;
		margin: 5px;
		display: inline-block;
		cursor: pointer;
		background: #F97C57;
		border-radius: 50%;
	}
	.camera #action #Close{
		font-size: 60px;
		padding: 7px;
		margin: 5px;
		display: inline-block;
		cursor: pointer;
		background: #F97C57;
		border-radius: 50%;
	}
	.camera #action #Flip:hover,
	.camera #action #Snap:hover,
	.camera #action #Close:hover,
	.camera #action #Save:hover{
		color : #F6F62C;
	}

@media screen and (max-width: 550px){
	.header span:nth-child(1){font-size: 20px;}
	.header span:nth-child(2){font-size: 20px;}
	.header .material-icons{font-size: 20px;}

	.camera #action #Flip{
		font-size: 30px;
	}
	.camera #action #Snap{
		font-size: 30px;
	}
	.camera #action #Close{
		font-size: 30px;
	}
	.camera #action #Save{
		font-size: 30px;
	}		
}	

</style>

<head>
	<title>Galeri</title>
</head>

<body>

	<div class="header">
		<span>Galeri</span>
		<span>Welcome</span>
		<span class="material-icons" id="cmr">camera</span>
		<div id="wp"></div>
	</div>

	<?php
	require "Galery.php";
	?>

	<div class="camera">
		<video id="camera" autoplay playsinline width="320" height="240"></video><br/>
		<canvas id="hasil"></canvas><br/>
		<div id="action">
			<div id="Flip" class="material-icons">autorenew</div>
			<div id="Snap" class="material-icons">camera</div>
			<div id="Save" class="material-icons">save</div>
			<div id="Close" class="material-icons">close</div>
		</div>
	</div>

</body>

<script type="text/javascript">

	const camera = document.getElementById('camera');
	const hasil = document.getElementById('hasil');
	const mp3 = document.getElementById('mp3');
	const foto = new Camera(camera, 'user', hasil, mp3);
	status = "";

	boxcamera =  document.querySelector(".camera");

	playcmr = document.getElementById('cmr');
	playcmr.onclick = function(){
		boxcamera.style.display = "block";
		foto.start();
		/**/
		document.getElementsByClassName("header")[0].style.filter = "blur(5px)";
		Foto.style.filter = "blur(5px)";
		/**/
	}

	stopcmr = document.getElementById("Close");
	stopcmr.onclick = function(){
		boxcamera.style.display = "none";
		foto.stop();
		/**/
		document.getElementsByClassName("header")[0].style.filter = "blur(0px)";
		Foto.style.filter = "blur(0px)";
		/**/
	}

	flip = document.getElementById("Flip");
	flip.onclick = function(){
		foto.flip();
		foto.start();
	}

	snap = document.getElementById("Snap");
	snap.onclick = function(){
		tmp = foto.snap();
		status = "snap";
	}

	save = document.getElementById("Save");
	save.onclick = function(N){
		if(status){
			N.preventDefault();
			Webcam.upload( tmp, 'Kontrol/upload.php', function(code, text) {
			Foto.innerHTML = text;		
			} );
		}
		else{
			alert("Tidak Ada Gambar Yang Disimpan");
		}
	}

	document.body.onresize = function(){
		size();
	}
	document.body.onload = function(){
		size();
	}

	function size(){
		if(window.innerWidth < window.innerHeight){
			foto._webcamElement.width = 240;
			foto._webcamElement.height = 320;
		}
		else{
			foto._webcamElement.width = 320;
			foto._webcamElement.height = 240;
		}	
	}

</script>

</html>