/*Webcam Js*/
	
	/*Pembuatan Object dari modul*/
	/*konstruktor membutuhkan object dari tag <video>/<canvas>/<aduio>*/
	/*ukuran foto akan ditentukan berdasarkan width dan height dari <video>*/
	/*ukuran skala vidio harus 240 * 320 atau kelipatannya*/
	webcam = new Camera(obj vidio, 'user', obj canvas, obj Suara);

	/*fungsi ini digunakan untuk memulai kamera*/
	/*then dan cathc tidak harus digunakan cukup dengan webcam.start() saja*/
	webcam.start().then(result =>{ console.log("webcam started");}).catch(err => {console.log(err);});

	/*fungsi ini digunakan untuk mengambil tmp dari gambar yang ingin difoto*/
	/*berbentuk return string tmp*/
    x = webcam.snap();

	/*mematikan kamera*/
	webcam.stop()

	/*menukar kamera depan ke belakang pada android*/
	/*fungsi start harus ada setelah fungsi flip*/
	webcam.flip();
  	webcam.start();

/*Webcam.Min.Js*/

	/*Set Ukuran Foto*/
	Webcam.set({width: 320, height: 240, image_format: 'jpg', jpeg_quality: 100});

	/*Set Lokasi Tag Yang Akan Dijadikan Area pengambilan foto*/
	/*parameter digunakan untuk memasukkan id dari tag div*/
	Webcam.attach( '#camera' );

	/*Menghentikan Gambar pada Kamera*/
	Webcam.freeze();

	/*mematikan fitur freeze*/
	Webcam.unfreeze();

	/*fungsi ini akan menangkap gambar dan mengambil data pada gambar*/
	/*pada bagian paramter di isi dengan function dengan paramter*/
	/*data tmp gambar akan diberikan pada variabel data_uri*/
	Webcam.snap( function(data_uri) {
		/*fungsi ini digunakan untuk mengupload gambar*/
		/*paramter membutuhkan tmp, namafile php, dan function*/
		/*fungsi ini sama seperti ajax*/
		/*variabel text akan berisi segala output dari file php yang dimasukkan pada parameter*/
		Webcam.upload( data_uri, 'camera2.php', function(code, text) {} );
	});
	
	
	/*Catatan
		Fungsi diatas adalah gabungan dari dua modul yang didapatkan dari sumber yang berbeda,
		silahkan pelajari link yang dicantumkan untuk menambah pengetahuan anda
	*/
