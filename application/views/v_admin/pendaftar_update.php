<div class="container-fluid mb-4">
	<div class="border-bottom bg-white p-3 shadow-sm">
		<div class="border-bottom shadow-sm p-3 mb-4" style="margin: -1rem -1rem 1.5rem -1rem !important; font-size: 28px"><i class="fas fa-user"></i> Update</div>
		<?php echo $this->session->flashdata('message_name'); ?>
		<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
		<h5 class="border-bottom text-center mb-3"><strong>Data Pendaftar</strong></h5>

		<form method="POST" action="<?php echo base_url().'admin/pendaftar_update_act/'.$pendaftar->nisn ?>" enctype="multipart/form-data">	

			<div class="form-inline mb-2">
				<label class="col-sm-4 justify-content-start"><strong>Nama</strong></label>
				<input type="text" required="" class="col-sm-8 form-control" name="nama" value="<?php echo $pendaftar->nama ?>">
			</div>

			<div class="form-inline mb-2">
				<label class="col-sm-4 justify-content-start"><strong>Jenis Kelamin</strong></label>
				<select class="form-control col-sm-8" name="jenis_kelamin" required="">
					<option selected="" value="<?php echo $pendaftar->jenis_kelamin ?>"><?php echo $pendaftar->jenis_kelamin ?></option>
					<option value="<?php 
					if ($pendaftar->jenis_kelamin == 'Laki - laki')
					{
						echo 'Perempuan';
					}
					else
					{
						echo 'Laki - laki';
					}
					?>"><?php 
					if ($pendaftar->jenis_kelamin == 'Laki - laki')
					{
						echo 'Perempuan';
					}
					else
					{
						echo 'Laki - laki';
					} ?>
					</option>
				</select>
			</div>

			<div class="form-inline mb-2">
				<label class="col-sm-4 justify-content-start"><strong>Tanggal Lahir</strong></label>
				<input type="date" class="col-sm-8 form-control" name="tgl_lahir" required="" value="<?php echo $pendaftar->tgl_lahir; ?>">
			</div>

			<div class="form-inline mb-2">
		    	<label class="col-sm-4 justify-content-start"><strong>No. Telepon</strong></label>
		      	<div class="input-group col-sm-8 p-0" style="">
		        	<div class="input-group-prepend">
		          		<span class="input-group-text">+62</span>
		        	</div>
		        
		        	<input type="number" name="no_telp" class="form-control" placeholder="" minlength="9" value="<?php echo $pendaftar->no_telp ?>" required="">
		      	</div>
		    </div>

			<div class="form-inline mb-2">
				<label class="col-sm-4 justify-content-start"><strong>E-Mail</strong></label>
				<input type="email" class="col-sm-8 form-control" name="email" required="" value="<?php echo $pendaftar->email ?>">
			</div>

			<div class="form-inline mb-2">
				<label class="col-sm-4 justify-content-start"><strong>NISN</strong></label>
				<input type="" class="col-sm-8 form-control" name="nisn" required="" value="<?php echo $pendaftar->nisn ?>">
			</div>

			<div class="form-inline mb-2">
				<label class="col-sm-4 justify-content-start"><strong>Jurusan</strong></label>
				<select name="jurusan" class="form-control col-sm-8" required="">
					<?php $nama_jurusan = $this->db->query("SELECT nama_jurusan FROM jurusan where kd_jurusan = '$pendaftar->kd_jurusan'")->row(); ?>
					<option selected="" value="<?php echo $pendaftar->kd_jurusan ?>"><?php echo $nama_jurusan->nama_jurusan ?></option>
					
					<?php foreach ($jurusan as $j): ?>
					<option value="<?php echo $j->kd_jurusan ?>"><?php echo $j->nama_jurusan ?></option>
					<?php endforeach ?>
				</select>
			</div>

			<div class="form-inline mb-2">
				<label class="col-sm-4 justify-content-start"><strong>Alamat</strong></label>
				<textarea class="form-control col-sm-8" rows="3" name="alamat"><?php echo $pendaftar->alamat ?></textarea>
			</div>

			<div class="form-inline mb-2">
				<label class="col-sm-4 justify-content-start"><strong>Tanggal Daftar</strong></label>
				<input type="text" class="col-sm-8 form-control" name="tgl_daftar" readonly="" value="<?php 
					$tanggal = date('Y-m-d', strtotime($pendaftar->tgl_daftar));
		  			$jam = date('H:i:s', strtotime($pendaftar->tgl_daftar));
		  			echo $this->M_Admin->tanggal_indo($tanggal, false); ?>">
			</div>

			<div class="mt-4 mb-4 d-flex justify-content-center">
				<a href="<?php echo base_url().'admin/pendaftar_detail/'.$pendaftar->nisn ?>" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
				<button type="submit" class="btn btn-primary ml-1"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
	</div>
</div>