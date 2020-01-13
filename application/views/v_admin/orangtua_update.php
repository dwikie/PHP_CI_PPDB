<div class="container-fluid mb-4">
	<div class="border-bottom bg-white p-3 shadow-sm">
		<div class="border-bottom shadow-sm p-3 mb-4" style="margin: -1rem -1rem 1.5rem -1rem !important; font-size: 28px"><i class="fas fa-user"></i> Update</div>
		<?php echo $this->session->flashdata('message_name'); ?>
		<h5 class="border-bottom mb-3 text-center mt-4"><strong>Data Orang Tua</strong></h5>
		<?php foreach ($orangtua as $o): ?>
		<form method="POST" action="<?php echo base_url().'admin/orangtua_update_act/'.$o->nisn ?>" enctype="multipart/form-data">
		
			<div class="form-row col-md-6 d-inline-block mb-4" style="">
        	<div class="border-bottom mb-2 mt-2 text-center"><strong>Data Ayah</strong></div>
		        <label class="col-form-label">Nama Ayah</label>
		        <div class="">
		          	<input type="text" class="form-control" id="validationCustom01" placeholder="" 
		            name="nama_ayah" value="<?php echo $o->nama_ayah; ?>">
		        </div>

		        <label class="col-form-label">NIK Ayah</label>
		        <div class="">
		          	<input type="text" class="form-control" id="validationCustom01" placeholder="" 
		            name="nik_ayah" value="<?php echo $o->nik_ayah; ?>">
		        </div>

		        <label class="col-form-label">Pendidikan Terakhir Ayah</label>
		        <div>
		          <input type="text" class="form-control" id="validationCustom01" placeholder="" 
		            name="pendidikan_ayah" value="<?php echo $o->pendidikan_ayah; ?>">
		        </div>

		        <label class="col-form-label">Pekerjaan Ayah</label>
		        <div>
		          	<input type="text" class="form-control" id="validationCustom01" placeholder="" 
		            name="pekerjaan_ayah" value="<?php echo $o->pekerjaan_ayah; ?>">
		        </div>

		        <label class="col-form-label">No. Telepon Ayah</label>
		        <div>
		          	<input type="text" class="form-control" id="validationCustom01" placeholder="" 
		            name="no_telp_ayah" value="<?php echo $o->no_telp_ayah; ?>"
		            >
		        </div>

		        <label class="col-form-label">Penghasilan Ayah</label>
		        <div class="input-group">
		          	<div class="input-group-prepend">
		            	<span class="input-group-text">Rp. </span>
		          	</div>
		          	<input type="number" name="penghasilan_ayah" class="form-control" placeholder="" value="<?php echo $o->penghasilan_ayah; ?>">
		        </div>
		    </div>

		    <div class="form-row col-md-6 d-inline-block mb-4" style="">
        		<div class="border-bottom mb-2 mt-2 text-center"><strong>Data Ibu</strong></div>
		        <label class="col-form-label">Nama Ibu</label>
		        <div class="">
		          	<input type="text" class="form-control" id="validationCustom01" placeholder="" 
		            name="nama_ibu" value="<?php echo $o->nama_ibu; ?>">
		        </div>

		        <label class="col-form-label">NIK Ibu</label>
		        <div class="">
		          	<input type="text" class="form-control" id="validationCustom01" placeholder="" 
		            name="nik_ibu" value="<?php echo $o->nik_ibu; ?>">
		        </div>

		        <label class="col-form-label">Pendidikan Terakhir Ibu</label>
		        <div>
		          <input type="text" class="form-control" id="validationCustom01" placeholder="" 
		            name="pendidikan_ibu" value="<?php echo $o->pendidikan_ibu; ?>">
		        </div>

		        <label class="col-form-label">Pekerjaan Ibu</label>
		        <div>
		          	<input type="text" class="form-control" id="validationCustom01" placeholder="" 
		            name="pekerjaan_ibu" value="<?php echo $o->pekerjaan_ibu; ?>">
		        </div>

		        <label class="col-form-label">No. Telepon Ibu</label>
		        <div>
		          	<input type="text" class="form-control" id="validationCustom01" placeholder="" 
		            name="no_telp_ibu" value="<?php echo $o->no_telp_ibu; ?>"
		            >
		        </div>

		        <label class="col-form-label">Penghasilan Ibu</label>
		        <div class="input-group">
		          	<div class="input-group-prepend">
		            	<span class="input-group-text">Rp. </span>
		          	</div>
		          	<input type="number" name="penghasilan_ibu" class="form-control" placeholder="" value="<?php echo $o->penghasilan_ibu; ?>">
		        </div>
		    </div>

		    <div class="form-row col-md-12 d-inline-block mb-4" style="">
        		<div class="border-bottom mb-2 mt-2 text-center"><strong>Data Wali</strong></div>
		        <label class="col-form-label">Nama Wali</label>
		        <div class="">
		          	<input type="text" class="form-control" id="validationCustom01" placeholder="" 
		            name="nama_wali" value="<?php echo $o->nama_wali; ?>">
		        </div>

		        <label class="col-form-label">NIK Wali</label>
		        <div class="">
		          	<input type="text" class="form-control" id="validationCustom01" placeholder="" 
		            name="nik_wali" value="<?php echo $o->nik_wali; ?>">
		        </div>

		        <label class="col-form-label">Pendidikan Terakhir Wali</label>
		        <div>
		          <input type="text" class="form-control" id="validationCustom01" placeholder="" 
		            name="pendidikan_wali" value="<?php echo $o->pendidikan_wali; ?>">
		        </div>

		        <label class="col-form-label">Pekerjaan Wali</label>
		        <div>
		          	<input type="text" class="form-control" id="validationCustom01" placeholder="" 
		            name="pekerjaan_wali" value="<?php echo $o->pekerjaan_wali; ?>">
		        </div>

		        <label class="col-form-label">No. Telepon Wali</label>
		        <div>
		          	<input type="text" class="form-control" id="validationCustom01" placeholder="" 
		            name="no_telp_wali" value="<?php echo $o->no_telp_wali; ?>"
		            >
		        </div>

		        <label class="col-form-label">Penghasilan Wali</label>
		        <div class="input-group">
		          	<div class="input-group-prepend">
		            	<span class="input-group-text">Rp. </span>
		          	</div>
		          	<input type="number" name="penghasilan_wali" class="form-control" placeholder="" value="<?php echo $o->penghasilan_wali; ?>">
		        </div>
		    </div>
		
			<div class="mt-4 mb-4 d-flex justify-content-center">
				<a href="<?php echo base_url().'admin/pendaftar_detail/'.$o->nisn ?>" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
				<button type="submit" class="btn btn-primary ml-1"><i class="fas fa-save"></i> Simpan</button>
			</div>
		</form>
		<?php endforeach ?>
	</div>
</div>