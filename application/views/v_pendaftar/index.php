<div class="container-fluid">
	<div class="col-md-12 border bg-white mt-3 p-3 mb-3">
		<div class="mb-4 pb-2 border-bottom">
			<strong>DATA PENDAFTAR</strong>
		</div>
		<div class="col-md-12 pl-4 mb-4" style="">
			<div class="form-row">
	  			<strong class="col-form-label col-md-2">Nama</strong>
		  		<div class="form-control-plaintext col-md-10"><?php echo $pendaftar['nama'] ?></div>
			</div>

			<div class="form-row">
	  			<strong class="col-form-label col-md-2">Tanggal Lahir</strong>
		  		<div class="form-control-plaintext col-md-10"><?php echo $pendaftar['tgl_lahir'] ?></div>
			</div>

			<div class="form-row">
	  			<strong class="col-form-label col-md-2">Jenis Kelamin</strong>
		  		<div class="form-control-plaintext col-md-10"><?php echo $pendaftar['jenis_kelamin'] ?></div>
			</div>

			<div class="form-row">
	  			<strong class="col-form-label col-md-2">No. Telepon</strong>
		  		<div class="form-control-plaintext col-md-10"><?php echo $pendaftar['no_telp'] ?></div>
			</div>

			<div class="form-row">
	  			<strong class="col-form-label col-md-2">E - mail</strong>
		  		<div class="form-control-plaintext col-md-10"><?php echo $pendaftar['email'] ?></div>
			</div>

			<div class="form-row">
	  			<strong class="col-form-label col-md-2">No. NISN</strong>
		  		<div class="form-control-plaintext col-md-10"><?php echo $pendaftar['nisn'] ?></div>
			</div>

			<div class="form-row">
	  			<strong class="col-form-label col-md-2">Jurusan</strong>
		  		<div class="form-control-plaintext col-md-10"><?php echo $pendaftar['kd_jurusan'] ?></div>
			</div>

			<div class="form-row">
	  			<strong class="col-form-label col-md-2">Alamat</strong>
		  		<div class="form-control-plaintext col-md-10"><?php echo $pendaftar['alamat'] ?></div>
			</div>
		</div>

		<div class="mb-4 pb-2 border-bottom">
			<strong>STATUS UJIAN</strong>
		</div>
		<div class="col-md-12 mb-4 pl-4">
			<div class="form-row">
	  			<strong class="col-form-label col-md-2">No. Ujian</strong>
		  		<div class="form-control-plaintext col-md-10"><?php echo $ujian['no_ujian'] ?></div>
			</div>

			<div class="form-row">
	  			<strong class="col-form-label col-md-2">Nilai</strong>
		  		<div class="form-control-plaintext col-md-10"><?php if ($ujian['nilai'] == NULL) 
		  																{
		  																	echo '<mark style="background-color: #def0e6">Belum Mengikuti Ujian Masuk</mark>';
		  																}
		  															else 
		  																{
		  																	echo $ujian['nilai'];
		  																}?></div>
			</div>

			<div class="form-row">
	  			<strong class="col-form-label col-md-2">Status</strong>
		  		<div class="form-control-plaintext col-md-10"><?php if ($ujian['status'] == NULL) 
		  																{
		  																	echo '<mark style="background-color: #def0e6">Belum Mengikuti Ujian Masuk</mark>';
		  																}
		  															else if ($ujian['status'] == "Tidak lulus")
		  																{
		  																	echo '<mark style="background-color: #f594a8">'.$ujian['status'].'</mark>';
		  																}
		  															else if ($ujian['status'] == "Lulus")
		  																{
		  																	echo '<mark style="background-color: #def0e6">Lulus</mark>';;
		  															}?></div>
			</div>
		</div>

		<div class="mb-4 pb-2 border-bottom">
			<strong>STATUS TRANSAKSI</strong>
		</div>
		<div class="col-md-12 mb-4 pl-4">
			<div class="form-row">
	  			<strong class="col-form-label col-md-2">Administrasi ujian</strong>
		  		<div class="form-control-plaintext col-md-10"><?php if ($ujian['token'] === NULL || $ujian['token'] === "")
		  		{
		  			echo "Belum Lunas";
		  		}
		  		else
		  		{
		  			echo "Lunas";	
		  		}
		  		 ?></div>
			</div>
		</div>
	</div>	
</div>