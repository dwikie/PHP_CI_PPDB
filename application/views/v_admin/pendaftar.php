<div class="container-fluid mb-4">
	<div class="border-bottom bg-white p-3 shadow-sm">
		<div class="border-bottom shadow-sm p-3 mb-4" style="margin: -1rem -1rem 1.5rem -1rem !important; font-size: 28px"><i class="fas fa-users"></i> Pendaftar</div>

		<div class="modal" id="tambah">
      		<div class="modal-dialog" style="max-width: 700px;">
        		<div class="modal-content">
        
		          	<!-- Modal Header -->
		        	<div class="modal-header">
		            	<h4 class="modal-title">Tambah Pendaftar</h4>
		            	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	</div>
		          	
		          	<form method="POST" action="<?php echo base_url().'admin/pendaftar_tambah' ?>" enctype="multipart/form-data">
		          	<!-- Modal body -->
	          			<div class="modal-body">
	          				<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
	          				<div class="form-group col-sm-12">
				                <label>Nama : </label>
				                <input type="text" name="nama" class="form-control"  placeholder="Nama Lengkap" required="">
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

	          			</div>



	          			<!-- Modal footer -->
	            		<div class="modal-footer">
			              	<input type="submit" class="btn btn-primary" value="Simpan">
			              	<button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
	           			</div>
           			</form>
		        </div>
			</div>
		</div>

		<button class="btn btn-success float-right" data-toggle="modal" data-target="#tambah" style="margin-bottom: 10px;">
		    <i class="fas fa-user"></i> Tambah Data
		</button>

		<div class="table-responsive">
			<table class="table table-bordered table-striped table-hover" id="table-datatable">
				<thead>
					<tr class="text-center">
						<th>No</th>
						<th>Nama</th>
						<th>Jenis Kelamin</th>
						<th>Tgl. Lahir</th>
						<th>Telp</th>
						<th>E-Mail</th>
						<th>NISN</th>
						<th>Jurusan</th>
						<th>Alamat</th>
						<th>Tgl. Daftar</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no = 1; 
						foreach ($pendaftar as $data): 
					?>
					<tr class="text-center">
						<td class="align-middle"><?php echo $no++ ?></td>
						<td class="align-middle"><?php echo $data->nama ?></td>
						<td class="align-middle"><?php echo $data->jenis_kelamin ?></td>
						<td class="align-middle"><?php echo $data->tgl_lahir ?></td>
						<td class="align-middle"><?php echo $data->no_telp ?></td>
						<td class="align-middle"><?php echo $data->email ?></td>
						<td class="align-middle"><?php echo $data->nisn ?></td>
						<td class="align-middle"><?php echo $data->kd_jurusan ?></td>
						<td class="align-middle"><?php echo $data->alamat ?></td>
						<td class="align-middle"><?php echo $data->tgl_daftar ?></td>
						<td class="align-middle">
							<a href="<?php echo base_url().'admin/pendaftar_detail/'.$data->nisn ?>" class="btn btn-info mb-1" style="width: 100px;"><i class="fas fa-search-plus"></i> Detail</a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>