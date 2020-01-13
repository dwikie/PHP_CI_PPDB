<!DOCTYPE html>
<html>
<head>
	<title>SMK PERMATA 1 KOTA BOGOR</title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="<?php echo base_url().'assets/datatable/datatables.js'; ?>"></script>
  	<script type="text/javascript" src="<?php echo base_url().'assets/js/popper.min.js'; ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datatable/datatables.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/font/fontawesome-free-5.10.1-web/css/all.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/my.css';?>">
</head>
<body>
	<div class="bg-img-overlay mb-4 shadow-sm" style="background-image: url('<?php echo base_url() ?>assets/bg/SCHOOL+PIC19.jpg'); min-height: 80vh !important; background-position: top center; align-items: flex-start;">
		<nav class="navbar navbar-expand-md mb-3 d-flex justify-content-between shadow-sm bg-img-overlay-white" style="width: 100%">
			<div>
	            <a href="<?php echo base_url() ?>" class="navbar-brand" title="Aplikasi Ujian Online" style="text-decoration: none; font-size: 18px;"> <strong class="text-white">SMK PERMATA 1 KOTA BOGOR</strong>
	            </a>
	        </div>
	        <div>
	        	<a href="<?php echo base_url().'login/pendaftar' ?>" class="btn btn-secondary rounded-0 shadow-sm" style="width: 150px;">Login</a>
	        </div>
		</nav>
		<div class="text-white">
			<div class="display-4 text-center mb-4 font-weight-bold">Pendaftaran Peserta Didik Baru <br> Tahun Ajaran 2019/2020</div>
			<div class="text-center">
				<a href="<?php echo base_url().'login/pendaftar' ?>" class="btn btn-primary shadow rounded-0">DAFTAR SEKARANG</a>
			</div>
		</div>
	</div>
	<div class="container-fluid" style="">
		<h4 class="text-center border-bottom mb-4">Sekapur Sirih</h4>
		<div class="col-md-12 mb-4">
			<p class="text-justify">
				Selamat datang di website SMK Permata 1 Kota Bogor, merupakan wadah informasi dan media dari kegiatan yang ada di sekolah kami. SMK Permata 1 Kota Bogor berdiri mulai tahun pelajaran 1999-2000, semula beroperasi di Komplek Yayasan Pondok Pesantren Tarbiyatusshibyan sambil menunggu proses pembangunan Gedung SMK Permata yang berlokasi di Salabenda RT.002/004 Kelurahan Kayumanis Kecamatan Tanah Sareal Kota Bogor. Pada bulan Mei 2001 Ketua dan Bendahara Yayasan menghadap Notaris Buhari, SH di bogor untuk mengajukan Badan Hukum Yayasan, maka terbitlah Akta Notaris Yayasan Pondok Pesantren Al-Manar dengan nomor 6 tahun 2001. Kemudian seiring dengan peraturan pemerintah khususnya Kementrian Hukum dan HAM maka segenap Yayasan atau badan hukum harus terdaftar, maka yayasan memperbaharui usulan untuk terdaftar di Kementrian Hukum dan HAM. Dengan itu terdapat perubahan nama yayasan menjadi Yayasan Al-Manar Darma Kayumanis dengan No. 6 tanggal 20-8-2007.<br>
				Untuk memulai operasional SMK Permata berdasarkan surat ijin operasional yang di terbitkan oleh Dinas Pendidikan Kota Bogor No. 108.4/704/P/2001 dan No. 108.4/710/P/2001 tertanggal 15 Mei 2001.
			</p>	
		</div>

		<h4 class="text-center border-bottom">Jurusan</h4>
		<div class="row col-md-12 justify-content-center mt-4 mb-4">
			<?php foreach ($jurusan as $j): ?>
				<div class="col-md-3 text-center">
					<div class="display-4 p-2">
						<i class="fas fa-user-graduate"></i>
					</div>
					<p><?php echo $j->nama_jurusan ?></p>
				</div>
			<?php endforeach ?>
		</div>

		<h4 class="text-center border-bottom mb-4">Lokasi</h4>

		<div class="col-md-12 mb-4">
			<iframe frameborder="0" scrolling="no" marginheight="0" marginwidth="0" style="width: 100% !important; height: 300px;" src="https://maps.google.com/maps?q=SMK%20Permata%201%20%26%202%20BOGOR&amp;t=m&amp;z=15&amp;output=embed&amp;iwloc=near" aria-label="SMK Permata 1 &amp; 2 BOGOR"></iframe>
		</div>
		
	</div>
	<nav class="navbar navbar-expand-md bg-dark p-4 text-white justify-content-between">
		<div class="mb-4 mt-4 text-justify">
			<h6><strong>Alamat</strong></h6>
			Jalan KH Sholeh Iskandar, Gg Masjid Al - Abrar, Kayu Manis<br> Kec. Tanah Sereal, Kota Bogor, Jawa Barat 16161
		</div>
		<div class="mb-4 mt-4 text-justify" style="font-size: 24px">
			<i class="fab fa-instagram"></i>
			<i class="fab fa-facebook"></i>
			<i class="fab fa-pinterest"></i>
			<i class="fab fa-youtube"></i>
		</div>
	</nav>
</body>
</html>