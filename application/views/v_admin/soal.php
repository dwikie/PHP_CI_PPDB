<div class="container-fluid mb-4">
	<div class="border-bottom bg-white p-3 shadow-sm">
		<div class="border-bottom shadow-sm p-3 mb-4" style="margin: -1rem -1rem 1.5rem -1rem !important; font-size: 28px"><i class="fas fa-tasks"></i> Soal Ujian</div>

		<div class="modal" id="tambah">
	      	<div class="modal-dialog" style="max-width: 700px;">
		        <div class="modal-content">
		        
		          	<!-- Modal Header -->
		          	<div class="modal-header">
		            	<h4 class="modal-title">Tambah Soal</h4>
		            	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	</div>

		          	<form class="needs-validation" action="<?php echo base_url().'admin/soal_tambah' ?>" method="post" enctype="multipart/form-data">
			          	<!-- Modal body -->
			          	<div class="modal-body">
			            
				            <div class="form-group col-sm-12">
				                <label>Jurusan </label>
				                <select name="jurusan" class="form-control" required="">
				                  	<option value="" selected="" disabled="">- Pilih Jurusan -</option>
				                  	<?php foreach ($jurusan as $j) { ?>
				                  	<option value="<?php echo $j->kd_jurusan ?>"><?php echo $j->nama_jurusan ?></option>
				                  	<?php } ?>
				                </select>
				            </div>

				            <div class="form-group col-sm-12">
				            	<label>Soal </label>
				            	<textarea class="form-control" name="soal" required=""></textarea>
				            </div>

			          	</div>

			          
			            <div class="modal-footer">
			              	<input type="submit" class="btn btn-primary" value="Simpan">
			              	<button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
			            </div>
		          
		         	</form>
		        </div>

	      	</div>
	  	</div>
	  	<?php echo $this->session->flashdata('message_name'); ?>
		<div class="d-flex justify-content-end mb-2" style="">
			<!-- Berkas -->
			<button class="btn btn-success ml-1" data-toggle="modal" data-target="#tambah" style="">
	    		<i class="fas fa-file"></i> Tambah Soal
			</button>
		</div>

		<div class="table-responsive mb-4">
		
			<table class="table table-bordered table-striped table-hover" id = "table-datatable" style="vertical-align: middle; text-align: center; justify-content: center;">
	    		<thead>
	    			<tr>
	    				<th class="align-middle">No</th>
	    				<th class="align-middle">Jurusan</th>
	    				<th class="align-middle">Soal</th>
	    				<th class="align-middle">Opsi</th>
	    			</tr>
	    		</thead>
	    		<tbody>
	    			<?php
	    			$no = 1; 
	    			foreach ($soal as $s) { ?>
	    			<tr>
	    				<td class="align-middle"><?php echo $no++ ?></td>
	    				<td class="align-middle"><?php echo $s->kd_jurusan ?></td>
	    				<td class="align-middle"><?php echo $s->soal ?></td>
	    				<td class="align-middle">
	    					<a href="<?php echo base_url().'admin/soal_detail/'.$s->kd_soal ?>" class="btn btn-info m-1" style="width: 100px;"><i class="fas fa-edit"></i> Edit</a>
	      				</td>
	    			</tr>
	    			<?php } ?>
	    		</tbody>
	    	</table>
    	</div>

	</div>
</div>