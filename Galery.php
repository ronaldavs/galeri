<style type="text/css">
	.foto{
		margin: 12px;
		display: flex;
		justify-content: center;
		flex-wrap: wrap;
	}
	.foto #item{
		cursor: pointer;
		position: relative;
		margin: 5px;
	}
	.foto #item img{
		width: 150px;
		border: 10px solid #DEDFDF;
	}
	.foto #item #fo{
		font-family: aladin;
		padding: 12px;
		background: #DEDFDF;
	}

	.lihat{
		position: fixed;
		top: 0px;
		left : 0px;
		width: 100%;
		height: 100%;
		background: rgba(77, 77, 77,0.5);
		z-index: 3;
		display: flex;
		align-items: center;
		justify-content: center;
		display: none;
	}
	.lihat #item{
		background: white;
		position: relative;
	}
	.lihat #item .del{
		position: absolute;
		bottom: 0px;
		right: 0px;
		color : black;
		cursor: pointer;
		user-select : none;
	}
	.lihat #item .left{
		position: absolute;
		left : 0px;
		bottom: 0px;
		cursor: pointer;
		user-select : none;
	}
	.lihat #item .right{
		position: absolute;
		left : 30px;
		bottom: 0px;
		cursor: pointer;
		user-select : none;
	}
	.lihat #item .del:hover{
		color : #C0392B;
	}
	.lihat #item .left:hover{
		color : #C0392B;
	}
	.lihat #item .right:hover{
		color : #C0392B;
	}
	.lihat #item img{
		border: 10px solid white;
	}
	.lihat #item #fo{
		text-align: center;
		font-family: aladin;
		padding: 12px;
	}

@media screen and (max-width: 550px){

}

</style>

<?php
?>

<div class="foto" id="foto">
</div>

<div class="lihat">
	<div id="item">
		<span class="material-icons del" id="del">delete</span>
		<img src=""/>
		<div id="fo"></div>
		<span class="material-icons right" id="right">keyboard_arrow_right</span>
		<span class="material-icons left" id="left">keyboard_arrow_left</span>
	</div>
</div>

<script>

	Lihat = document.getElementsByClassName("lihat")[0];
	Lihat.onclick = function(target){
		if(target.target.className == "lihat"){
			this.style.display = "none";
			noblur();
		}
		else if(target.target.id == "right"){
			right();
		}
		else if(target.target.id == "left"){
			left();
		}
	}

	Foto = document.getElementsByClassName("foto")[0];
	Foto.onclick = function(target){
		let obj = target.target.parentNode;
		let item = target.target.parentNode.id;
		if(item == "item"){
			src = obj.getElementsByTagName("img")[0].getAttribute("src");
			waktu = obj.getElementsByTagName("div")[0].innerHTML;
			Lihat.getElementsByTagName("div")[0].getElementsByTagName("img")[0].setAttribute("src",src);
			Lihat.getElementsByTagName("div")[0].getElementsByTagName("div")[0].innerHTML = waktu;
			Lihat.style.display = "flex";
			blur();

			num = -1;
			do{
				num +=1;
			}while(Foto.querySelectorAll("div[id='item']")[num] != obj);
		}
	}

	function left(){
		if(num >0){
			num -=1;
			let item = Foto.querySelectorAll("div[id='item']")[num];
			src = item.getElementsByTagName("img")[0].getAttribute("src");
			waktu = item.getElementsByTagName("div")[0].innerHTML;
			Lihat.getElementsByTagName("div")[0].getElementsByTagName("img")[0].setAttribute("src",src);
			Lihat.getElementsByTagName("div")[0].getElementsByTagName("div")[0].innerHTML = waktu;
		}
	}
	function right(){
		if(num < Foto.querySelectorAll("div[id='item']").length - 1){
			num +=1;
			let item = Foto.querySelectorAll("div[id='item']")[num];
			src = item.getElementsByTagName("img")[0].getAttribute("src");
			waktu = item.getElementsByTagName("div")[0].innerHTML;
			Lihat.getElementsByTagName("div")[0].getElementsByTagName("img")[0].setAttribute("src",src);
			Lihat.getElementsByTagName("div")[0].getElementsByTagName("div")[0].innerHTML = waktu;
		}
	}

	function blur(){
		document.getElementsByClassName("header")[0].style.filter = "blur(5px)";
		Foto.style.filter = "blur(5px)";
	}
	function noblur(){
		document.getElementsByClassName("header")[0].style.filter = "blur(0px)";
		Foto.style.filter = "blur(0px)";
	}

	hapus = document.getElementById("del");
	hapus.onclick = function(){
		let show = Lihat.getElementsByTagName("div")[0].getElementsByTagName("img")[0].getAttribute("src");
		part = show.split("/");
		$.post("Kontrol/upload.php",{dele : part[1]},function(data,status){
			Foto.innerHTML = data;
		});

		/*...*/
		if(num > 0){num -=1;
			let item = Foto.querySelectorAll("div[id='item']")[num];
			src = item.getElementsByTagName("img")[0].getAttribute("src");
			waktu = item.getElementsByTagName("div")[0].innerHTML;
			Lihat.getElementsByTagName("div")[0].getElementsByTagName("img")[0].setAttribute("src",src);
			Lihat.getElementsByTagName("div")[0].getElementsByTagName("div")[0].innerHTML = waktu;
		}
		else{num +=1;
			let item = Foto.querySelectorAll("div[id='item']")[num];
			src = item.getElementsByTagName("img")[0].getAttribute("src");
			waktu = item.getElementsByTagName("div")[0].innerHTML;
			Lihat.getElementsByTagName("div")[0].getElementsByTagName("img")[0].setAttribute("src",src);
			Lihat.getElementsByTagName("div")[0].getElementsByTagName("div")[0].innerHTML = waktu;
			num -=1;
		}
		/*...*/
	}

	loads = function(){$(".foto").load("Kontrol/upload.php");}
	loads();
	loadgaleri = setInterval(loads,3000);

</script>