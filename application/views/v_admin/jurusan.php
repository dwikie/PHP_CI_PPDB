<div class="container-fluid mb-4">
	<div class="border-bottom bg-white p-3 shadow-sm">
		<div class="border-bottom shadow-sm p-3 mb-4" style="margin: -1rem -1rem 1.5rem -1rem !important; font-size: 28px"><i class="fas fa-graduation-cap"></i> Jurusan</div>
		
		<div class="modal" id="tambah">
      		<div class="modal-dialog" style="max-width: 700px;">
        		<div class="modal-content">
        
	          	<!-- Modal Header -->
		          	<div class="modal-header">
		            	<h4 class="modal-title">Tambah Jurusan</h4>
		            	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	</div>
	          
	          		<form class="needs-validation" action="<?php echo base_url().'admin/jurusan_tambah' ?>" method="post" enctype="multipart/form-data">
			        <!-- Modal body -->
			        <div class="modal-body">
	            		
		              	<div class="form-group col-sm-12">
		                	<label>Kode Jurusan </label>
		                	<input type="text" name="kd_jurusan" class="form-control"  placeholder="Kode Jurusan" required="" maxlength="3">
		              	</div>

		              	<div class="form-group col-sm-12">
		                	<label>Nama Jurusan </label>
		                	<input type="text" name="nama_jurusan" class="form-control"  placeholder="Nama Jurusan" required="">
		              	</div>

		              	<div class="form-group col-sm-12">
		                	<label>Nilai Minimal </label>
		                	<input type="number" name="nilai_min" class="form-control"  placeholder="Nilai" required="" min="1" max="100" maxlength="3">
		              	</div>

		              	<div class="form-group col-sm-12">
		                	<label>Jumlah Soal </label>
		                	<input type="number" name="jumlah_soal" class="form-control"  placeholder="Nilai" required="" min="1" max="100" maxlength="3">
		              	</div>

	          		</div>
	          
		            <div class="modal-footer">
		              	<input type="submit" class="btn btn-primary" value="Simpan">
		              	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		            </div>
	          
	          		</form>
        		</div>

      		</div>
  		</div>
  		<?php echo $this->session->flashdata('message_name'); ?>
  		<?php echo validation_errors('<div class="alert alert-danger">','</div>'); ?>
		<button class="btn btn-success float-right" data-toggle="modal" data-target="#tambah" style="margin-bottom: 10px;">
		    <i class="fas fa-graduation-cap"></i> Tambah Jurusan
		</button>
		
		<div class="table-responsive">
		
		<table class="table table-bordered table-striped table-hover" id = "table-datatable" style="vertical-align: middle; text-align: center; justify-content: center;">
    		<thead>
      			<tr>
      				<th>No</th>
      				<th>Kode Jurusan</th>
      				<th>Nama Jurusan</th>
      				<th>Nilai Minimal Ujian</th>
      				<th>Jumlah Soal Ujian</th>
      				<th>Opsi</th>
      			</tr>
      		</thead>
      		
      		<tbody>
      			<?php
      			$no = 1;
      			foreach ($jurusan as $data) {
      			?>
      			<tr>
      				<td ><?php echo $no ?></td>
      				<td><?php echo $data->kd_jurusan ?></td>
      				<td><?php echo $data->nama_jurusan ?></td>
      				<td><?php echo $data->nilai_min ?></td>
      				<td><?php echo $data->jumlah_soal ?></td>
      				<td>
      					<button class="btn btn-info m-1" data-toggle="modal" data-target="#edit<?php echo $no ?>" style="width: 100px;">
					      	<i class="fas fa-edit"></i> Edit
						</button>
                
                		<button class="btn btn-danger m-1" data-toggle="modal" data-target="#hapus<?php echo $no ?>" style="width: 100px;">
                  			<i class="fas fa-minus-circle"></i> Hapus
                		</button>
      				</td>
      			</tr>

      			<div class="modal" id="edit<?php echo $no ?>">
		      		<div class="modal-dialog" style="max-width: 700px;">
		        		<div class="modal-content">
		        
			          	<!-- Modal Header -->
				          	<div class="modal-header">
				            	<h4 class="modal-title">Edit Jurusan</h4>
				            	<button type="button" class="close" data-dismiss="modal">&times;</button>
				          	</div>
			          
			          		<form class="needs-validation" action="<?php echo base_url().'admin/jurusan_update/'.$data->kd_jurusan ?>" method="post" enctype="multipart/form-data">
					        <!-- Modal body -->
					        <div class="modal-body">

				              	<div class="form-group col-sm-12">
				                	<label>Kode Jurusan </label>
				                	<input type="text" name="kd_jurusan" class="form-control"  placeholder="Kode Jurusan" required="" maxlength="3" value="<?php echo $data->kd_jurusan ?>">
				              	</div>

				              	<div class="form-group col-sm-12">
				                	<label>Nama Jurusan </label>
				                	<input type="text" name="nama_jurusan" class="form-control"  placeholder="Nama Jurusan" required="" value="<?php echo $data->nama_jurusan ?>">
				              	</div>

				              	<div class="form-group col-sm-12">
				                	<label>Nilai Minimal </label>
				                	<input type="number" name="nilai_min" class="form-control"  placeholder="Nilai" required="" min="1" max="100" maxlength="3" value="<?php echo $data->nilai_min ?>">
				              	</div>

				              	<div class="form-group col-sm-12">
				                	<label>Jumlah Soal </label>
				                	<input type="number" name="jumlah_soal" class="form-control"  placeholder="Nilai" required="" min="1" max="100" maxlength="3" value="<?php echo $data->jumlah_soal ?>">
				              	</div>

			          		</div>
			          
				            <div class="modal-footer">
				              	<input type="submit" class="btn btn-primary" value="Simpan">
				              	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				            </div>
			          
			          		</form>
		        		</div>

		      		</div>
		  		</div>

	            <div class="modal" id="hapus<?php echo $no ?>" style="">
	              	<div class="modal-dialog" style="max-width: 600px;">
	                	<div class="modal-content">
	                
		                  	<!-- Modal Header -->
		                  	<div class="modal-header">
		                    	<h4 class="modal-title">Hapus Data</h4>
		                    	<button type="button" class="close" data-dismiss="modal">&times;</button>
		                  	</div>
		                  
			                <!-- Modal body -->
			                <div class="modal-body text-center">
			                    <span class="glyphicon glyphicon-warning-sign" style="font-size: 50px"></span>
			                    <div class="align-middle mb-2">Yakin Hapus Data ?</div>
			                    <p class="text-left">
			                        Semua Data yang Berhubungan dengan Jurusan ini akan Dihapus<br>
			                        - Data Pendaftar yang Memiliki Jurusan ini<br>
			                        - Data Soal jurusan ini
			                    </p>
			                </div>
	                  
			                <!-- Modal footer -->
			                <div class="modal-footer">
			                    <a href="<?php echo base_url().'admin/jurusan_hapus/'.$data->kd_jurusan ?>" class="btn btn-danger m-1" style="width: 100px;"> Hapus</a>
			                    <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
			                </div>
	                  
	                	</div>
	              	</div>
	            </div>
      			<?php 
      			$no++;
      				} 
      			?>
      		</tbody>
      	</table>

		</div>
	</div>
</div>