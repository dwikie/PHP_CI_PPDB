<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="<?php echo base_url().'assets/datatable/datatables.js'; ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datatable/datatables.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/font/fontawesome-free-5.10.1-web/css/all.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/my.css';?>">
</head>
<body>
	<div class="container-fluid bg-img-overlay p-0 d-flex justify-content-end" style="background-image: url('<?php echo base_url()  ?>assets/bg/59440693_p0.jpg');">
		<div class="col-lg-5 bg-form p-3" style="min-height: 100vh">
			<div class="mb-4">
				<div class="text-center" style="font-weight: bold; font-size: 28px;">SMK PERMATA 1 KOTA BOGOR</div>
				<div class="text-center" style="font-size: 18px;">Penerimaan Peserta Didik Baru Tahun Ajaran 2019</div>
			</div>
			<div id="judul" class="p-2 text-center" style="transition: opacity .5s ease-in-out; font-size: 20px; font-weight: bolder; ">
            LOGIN
            </div>
			<?php echo $this->session->flashdata('message_name'); ?>
			<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
			<div id="form_masuk" class="mt-4" style="transition: opacity .5s ease-in-out;">
				<form method="POST" action="<?php echo base_url().'login/pendaftar_login' ?>">
				<div class="form-group row p-2">
				    <label class="col-lg-3 col-form-label">No. NISN</label>
				    <div class="col-lg-9">
				      	<input type="text" class="form-control" placeholder="NISN" name="username" id="my_input" required="" style="background-color: transparent; border-color: #333 !important;">
				    </div>
				</div>

				<div class="form-group row p-2">
				 	<label class="col-lg-3 col-form-label">Password</label>
				    <div class="col-lg-9">
				      	<input type="password" class="form-control" placeholder="Password" name="password" id="my_input" required="" style="background-color: transparent; border-color: #333 !important;">
				    </div>
				</div>

				<div class="d-flex justify-content-center align-items-center mt-4">
					<button type="submit" class="btn btn-secondary shadow-sm" style="width: 150px">Login</button>
				</div>
				</form>
			</div>

			<div id="form_daftar" class="" style="display: none; transition: opacity .5s ease-in-out; ">
				<form method="POST" action="<?php echo base_url().'login/pendaftar_daftar' ?>">
					
					<div class="form-group col-sm-12">
						<label>Nama : </label>
						<input type="text" name="nama" class="form-control"  placeholder="Nama Lengkap" required="" >
              		</div>

              		<div class="form-group col-sm-12">
						<label>Tanggal Lahir : </label>
						<input type="date" name="tanggal_lahir" class="form-control" placeholder="Tanggal Lahir" required="">
					</div>

					<div class="form-group col-sm-12">
						<label>Jenis Kelamin : </label>
						<select name="jenis_kelamin" class="form-control">
							<option value="Laki - laki">Laki-Laki</option>
							<option value="Perempuan">Perempuan</option>
						</select>
					</div>

					<div class="form-group col-sm-12">
				        <label>No. Telp : </label>
				         <div class="input-group">
				         	<div class="input-group-prepend">
				            	<span class="input-group-text">+62</span>
				            </div>
				            <input type="text" name="no_telp" class="form-control" placeholder="No. Telepon" minlength="10">
				        </div>
				    </div>

					<div class="form-group col-sm-12">
						<label>E-mail : </label>
						<input type="email" name="email" class="form-control" placeholder="E-mail" required="">
					</div>

					<div class="form-group col-sm-12">
						<label>NISN : </label>
						<input type="text" name="nisn" class="form-control" placeholder="NISN" required="">
					</div>

					<div class="form-group col-sm-12">
						<label>Jurusan : </label>
						<select name="jurusan" class="form-control">
							<option value="" selected="" disabled="">- Pilih Jurusan -</option>
							<?php foreach ($jurusan as $j) { ?>
							<option value="<?php echo $j->kd_jurusan ?>"><?php echo $j->nama_jurusan ?></option>
							<?php } ?>
						</select>
					</div>

					<div class="form-row" style="padding: 0px 15px 1rem 15px;">
						<div class="col">
							<label>Alamat : </label>
							<input type="text" name="alamat" class="form-control" placeholder="Alamat" style="" required="">
						</div>

						<div class="col">
							<label>RT/RW : </label>
							<input type="text" name="rt_rw" class="form-control" placeholder="RT/RW" style="">
						</div>
					</div>

					<div class="form-row" style="padding: 0px 15px 1rem 15px;">
						<div class="col">
							<label>Kelurahan : </label>
							<input type="text" name="kelurahan" class="form-control" placeholder="Kelurahan" required="">
						</div>

						<div class="col">
							<label>Kecamatan : </label>
							<input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" required="">
						</div>
					</div>

					<div class="form-row" style="padding: 0px 15px 1rem 15px;">
						<div class="col">
							<label>Kota/Kabupaten : </label>
							<input type="text" name="kota" class="form-control" placeholder="Kota/Kabupaten" required="">
						</div>

						<div class="col">
							<label>Kode Pos : </label>
							<input type="text" name="kodepos" class="form-control" placeholder="Kode Pos" required="">
						</div>
					</div>

					<div class="d-flex justify-content-center align-items-center mt-4">
						<button type="submit" class="btn btn-secondary shadow-sm" style="width: 150px;">Daftar</button>
					</div>
				</form>
			</div>
				<div class="d-flex align-items-center justify-content-center mb-4 mt-4">
                    <a href="#" id="daftar" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30 text-dark" style="border-bottom: 1px solid #333 !important; text-decoration: none;">
                        Daftar <i class="fas fa-arrow-right"></i>
                    </a>
                            
                    <a href="#" id="masuk" class="dis-block txt3 hov1 p-r-30 p-t-10 p-b-10 p-l-30 text-dark" style="display: none; border-bottom: 1px solid #333 !important; text-decoration: none;">
                        <i class="fas fa-arrow-left"></i> Masuk
                    </a>
                </div>

                <p id="info" style="transition: opacity .5s ease-in-out;">Password adalah tanggal lahir YYYY-MM-DD <br>
                    Contoh : 1945-08-17
                </p>
		</div>
	</div>
</body>
<script type="text/javascript">
	$('.alert').alert().delay(3000).slideUp('slow');
</script>

<script type="text/javascript">
    var judul = document.querySelector('#judul');
    var masuk = document.getElementById("masuk");
    var daftar = document.getElementById("daftar");
    var info = document.getElementById("info");
    var form_masuk = document.getElementById("form_masuk");
    var form_daftar = document.getElementById("form_daftar");

    $(function(){
        $("#daftar").click(function() {
            judul.style.opacity = 0;
            form_masuk.style.opacity = 0;
            info.style.opacity = 0;
            setTimeout(function(){ 
                judul.innerHTML = "DAFTAR";
                judul.style.opacity = 1;
                form_daftar.style.opacity = 1;
                $("#daftar").hide();
                $("#form_masuk").hide();
                $("#info").hide();
                masuk.style.display = "block";
                form_daftar.style.display = "block";
            },  1000);
            
        });
    });

    $(function(){
        $("#masuk").click(function() {
            judul.style.opacity = 0;
            form_daftar.style.opacity = 0;
            setTimeout(function(){ 
                judul.innerHTML = "MASUK";
                form_masuk.style.opacity = 1;
                judul.style.opacity = 1;
                info.style.opacity = 1;
                $("#masuk").hide();
                $("#form_daftar").hide();
                daftar.style.display = "block";
                info.style.display = "block";
                form_masuk.style.display = "block";
            },  1000);
        });
    });
</script>
</html>