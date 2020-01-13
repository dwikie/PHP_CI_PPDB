<div class="container-fluid mb-4">
	<div class="border-bottom bg-white p-3 shadow-sm">
		<div class="border-bottom shadow-sm p-3 mb-4" style="margin: -1rem -1rem 1.5rem -1rem !important; font-size: 28px"><i class="far fa-file-alt"></i> Detail Soal</div>
		<?php echo $this->session->flashdata('message_name'); ?>
		<h5 class="border-bottom mb-3 text-center mb-2 mt-4"><strong>Data Soal</strong></h5>
		<form method="POST" action="<?php echo base_url().'admin/soal_update/'.$soal->kd_soal ?>" enctype="multipart/form-data">
			<div class="form-row mb-2">
			
			<label class="col-form-label col-sm-2 mb-2">Soal</label>
	        <div class="col-sm-10 mb-2">
	          <textarea class="form-control" rows="3" name="soal" required=""><?php echo $soal->soal ?></textarea>
			</div>
			
	        <label class="col-form-label col-sm-2">Jurusan</label>
	        <div class="col-sm-10">
	        	<select name="jurusan" class="form-control">
		            <?php foreach ($jurusan as $j) { ?>
		            <option value="<?php echo $j->kd_jurusan ?>" <?php if ($j->kd_jurusan == $soal->kd_jurusan) {echo "selected";} ?>><?php echo $j->nama_jurusan ?></option>
		            <?php } ?>
	        	</select>
	        </div>

			</div>

			<div class="align-items-center justify-content-center d-flex mb-4">
				<button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
				<button type="button" class="btn btn-danger m-1" data-toggle="modal" data-target="#hapus_soal" style="width: 100px;">
			        <i class="fas fa-minus-circle"></i> Hapus
		        </button>
			</div>
		</form>

		<div class="modal" id="hapus_soal" style="">
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
						<div class="align-middle mb-2">Yakin Hapus Soal ?</div>
					</div>
								                  
					<!-- Modal footer -->
					<div class="modal-footer">
						<a href="<?php echo base_url().'admin/soal_hapus/'.$soal->kd_soal ?>" class="btn btn-danger ml-1"><i class="fas fa-minus-circle"></i> Hapus</a>
						<button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
					</div>              
				</div>
          	</div>
		</div>

		<h5 class="border-bottom mb-3 text-center mb-2 mt-4"><strong>Data Jawaban</strong></h5>
		<div class="d-flex justify-content-end mb-2" style="">
			<!-- Berkas -->
			<button class="btn btn-success ml-1" data-toggle="modal" data-target="#tambah" style="">
	    		<i class="fas fa-file"></i> Tambah Jawaban
			</button>

			<div class="modal" id="tambah">
		      	<div class="modal-dialog" style="max-width: 700px;">
			        <div class="modal-content">
	        
		          	<!-- Modal Header -->
		          	<div class="modal-header">
		            	<h4 class="modal-title">Tambah Jawaban</h4>
		            	<button type="button" class="close" data-dismiss="modal">&times;</button>
		          	</div>
	          	
	          		<form class="needs-validation" action="<?php echo base_url().'admin/jawaban_tambah/'.$soal->kd_soal ?>" method="post" enctype="multipart/form-data">
		          	<!-- Modal body -->
			        <div class="modal-body">

			            <div class="col-md-12">
			            	<label>Jawaban</label>
			            	<textarea class="form-control" name="jawaban" required="" rows="3"></textarea>
			            </div>

			            <div class="col-md-12">
			            <label class="col-form-label">Status</label>
							<div class="mb-2">
								<select name="status" class="form-control" id="status<?php echo $no ?>">
									<option value="1">Benar</option>
									<option value="0">Salah</option>
								</select>
							</div>
						</div>

		          	</div>

		          
		            <div class="modal-footer">
		              	<input type="submit" class="btn btn-primary" value="Tambah">
		              	<button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
		            </div>
	          
	          		</form>
	        		</div>
     			</div>
  			</div>
		</div>
		<!-- table -->
		<div class="table-responsive mb-4">
		
			<table class="table table-striped table-bordered table-hover" id="table-datatable">
				<thead>
					<tr>
						<th class="text-center align-middle" style="width: 10%;">No</th>
						<th class="text-center align-middle" style="width: 60%;">Jawaban</th>
						<th class="text-center align-middle" style="width: 5%;">Status</th>
						<th class="text-center align-middle" style="width: 25%;">Opsi</th>
					</tr>
				</thead>

				<tbody>
					<?php
					$no = 1;
					foreach ($jawaban as $jwb): ?>
					<tr>
						<td class="text-center align-middle"><?php echo $no ?></td>
						<td class="text-center align-middle"><?php echo $jwb->jawaban ?></td>
						<td class="text-center align-middle">
							<?php
								if($jwb->status == 1)
								{
									echo "<i class='fas fa-check'></i> Benar";
								} 
								else
								{
									echo "<i class='fas fa-minus-circle'></i> Salah";
								}
							?>
						</td>
						<td class="text-center align-middle">
							<button class="btn btn-info" data-toggle="modal" data-target="#edit<?php echo $no ?>" style="width: 100px;">
						      	<i class="fas fa-edit"></i> Edit
						    </button>
			                <button class="btn btn-danger ml-1" data-toggle="modal" data-target="#hapus<?php echo $no ?>" style="width: 100px;">
			                  	<i class="fas fa-minus-circle"></i> Hapus
			                </button>
						</td>

					</tr>

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
		                  	</div>
		                  
		                  	<!-- Modal footer -->
		                    <div class="modal-footer">
			                    <a href="<?php echo base_url().'admin/jawaban_hapus/'.$jwb->kd_jawaban.'/'.$soal->kd_soal ?>" class="btn btn-danger m-1" style="width: 100px;">Hapus</a>
			                    <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
		                    </div>
		                  
		                </div>
		              </div>
		            </div>

		            <div class="modal" id="edit<?php echo $no ?>" style="">
		              	<div class="modal-dialog" style="max-width: 720px;">
		                <div class="modal-content">
		                
		                  	<!-- Modal Header -->
		                 	<div class="modal-header">
		                    	<h4 class="modal-title">Ubah Soal</h4>
		                    	<button type="button" class="close" data-dismiss="modal">&times;</button>
		                  	</div>
		                  	<form method="POST" action="<?php echo base_url().'admin/jawaban_update/'.$jwb->kd_jawaban.'/'.$soal->kd_soal ?>" enctype="multipart/form-data">
		                  	<!-- Modal body -->
		                  	<div class="modal-body">
		                  		
		                  			<label class="col-form-label">Jawaban</label>
						        	<div class="mb-2">
						          	<input type="text" class="form-control" id="validationCustom01" placeholder="" 
						            name="jawaban" value="<?php echo $jwb->jawaban; ?>">
									</div>

									<label class="col-form-label">Status</label>
							        <div class="mb-2">
							        	<select name="status" class="form-control" id="status<?php echo $no ?>">
							        		<option value="1" <?php if($jwb->status == 1){echo "selected";} ?>>Benar</option>
							        		<option value="0" <?php if($jwb->status == 0){echo "selected";} ?>>Salah</option>
							        	</select>
							        </div>

		                  	</div>
		                  
		                  	<!-- Modal footer -->
		                    <div class="modal-footer">
			                    <input type="submit" class="btn btn-primary" value="Simpan">
			                    <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
		                    </div>
		                  	</form>
		                </div>
		              </div>
		            </div>

					<?php
					$no ++;
					endforeach ?>
				</tbody>
			</table>
		</div>

	</div>
</div>