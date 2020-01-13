<div class="container-fluid">
	<div class="col-md-12 border bg-white mt-3 p-3 mb-3">
		<div class="mb-4 pb-2 border-bottom">
			<strong>DATA ORANGTUA</strong>
		</div>
		<?php echo $this->session->flashdata('message_name'); ?>
		<form method="post" action="<?php echo base_url().'pendaftar/orangtua_update'?>">
		<div class="form-row col-md-6 d-inline-block mb-4" style="">
			<div class="mb-2 pb-1 border-bottom text-center">
				<strong>Ayah</strong>
			</div>

			<label class="col-form-label">Nama</label>
	        <div class="">
	          	<input type="text" class="form-control" id="validationCustom01" placeholder="<?php if ($ortu['nama_ayah'] == NULL || $ortu['nama_ayah'] == "") 
	          			{
	          				echo 'Tidak ada data';
	          			}?>" 
	            name="nama_ayah" value="<?php echo $ortu['nama_ayah']; ?>" 
	          	>
	        </div>

	        <label class="col-form-label">NIK</label>
	        <div class="">
	          	<input type="text" class="form-control" id="validationCustom01" placeholder="<?php if ($ortu['nik_ayah'] == NULL || $ortu['nik_ayah'] == "") 
	          			{
	          				echo 'Tidak ada data';
	          			}?>" 
	            name="nik_ayah" value="<?php echo $ortu['nik_ayah']; ?>" 
	          	>
	        </div>

	        <label class="col-form-label">Pendidikan Terakhir</label>
	        <div class="">
	          	<input type="text" class="form-control" id="validationCustom01" placeholder="<?php if ($ortu['pendidikan_ayah'] == NULL || $ortu['pendidikan_ayah'] == "") 
	          			{
	          				echo 'Tidak ada data';
	          			}?>" 
	            name="pendidikan_ayah" value="<?php echo $ortu['pendidikan_ayah']; ?>" 
	          	>
	        </div>

	        <label class="col-form-label">Pekerjaan</label>
	        <div class="">
	          	<input type="text" class="form-control" id="validationCustom01" placeholder="<?php if ($ortu['pekerjaan_ayah'] == NULL || $ortu['pekerjaan_ayah'] == "") 
	          			{
	          				echo 'Tidak ada data';
	          			}?>" 
	            name="pekerjaan_ayah" value="<?php echo $ortu['pekerjaan_ayah']; ?>" 
	          	>
	        </div>

	        <label class="col-form-label">No. Telepon</label>
	        <div class="">
	          	<input type="text" class="form-control" id="validationCustom01" placeholder="<?php if ($ortu['no_telp_ayah'] == NULL || $ortu['no_telp_ayah'] == "") 
	          			{
	          				echo 'Tidak ada data';
	          			}?>" 
	            name="no_telp_ayah" value="<?php echo $ortu['no_telp_ayah']; ?>" 
	          	>
	        </div>

	        <label class="col-form-label">Penghasilan</label>
	        <div class="input-group">
	          	<div class="input-group-prepend">
	            	<span class="input-group-text">Rp. </span>
	          	</div>
	          	<input type="number" name="penghasilan_ayah" class="form-control" placeholder="<?php if ($ortu['penghasilan_ayah'] == NULL || $ortu['penghasilan_ayah'] == "") 
	          			{
	          				echo 'Tidak ada data';
	          			}?>" value="<?php echo $ortu['penghasilan_ayah'] ?>">
	        </div>
		</div>


		<div class="form-row col-md-6 d-inline-block mb-4" style="">
			<div class="mb-2 pb-1 border-bottom text-center">
				<strong>Ibu</strong>
			</div>

			<label class="col-form-label">Nama</label>
	        <div class="">
	          	<input type="text" class="form-control" id="validationCustom01" placeholder="<?php if ($ortu['nama_ibu'] == NULL || $ortu['nama_ibu'] == "") 
	          			{
	          				echo 'Tidak ada data';
	          			}?>" 
	            name="nama_ibu" value="<?php echo $ortu['nama_ibu']; ?>" 
	          	>
	        </div>

	        <label class="col-form-label">NIK</label>
	        <div class="">
	          	<input type="text" class="form-control" id="validationCustom01" placeholder="<?php if ($ortu['nik_ibu'] == NULL || $ortu['nik_ibu'] == "") 
	          			{
	          				echo 'Tidak ada data';
	          			}?>" 
	            name="nik_ibu" value="<?php echo $ortu['nik_ibu']; ?>" 
	          	>
	        </div>

	        <label class="col-form-label">Pendidikan Terakhir</label>
	        <div class="">
	          	<input type="text" class="form-control" id="validationCustom01" placeholder="<?php if ($ortu['pendidikan_ibu'] == NULL || $ortu['pendidikan_ibu'] == "") 
	          			{
	          				echo 'Tidak ada data';
	          			}?>" 
	            name="pendidikan_ibu" value="<?php echo $ortu['pendidikan_ibu']; ?>" 
	          	>
	        </div>

	        <label class="col-form-label">Pekerjaan</label>
	        <div class="">
	          	<input type="text" class="form-control" id="validationCustom01" placeholder="<?php if ($ortu['pekerjaan_ibu'] == NULL || $ortu['pekerjaan_ibu'] == "") 
	          			{
	          				echo 'Tidak ada data';
	          			}?>" 
	            name="pekerjaan_ibu" value="<?php echo $ortu['pekerjaan_ibu']; ?>" 
	          	>
	        </div>

	        <label class="col-form-label">No. Telepon</label>
	        <div class="">
	          	<input type="text" class="form-control" id="validationCustom01" placeholder="<?php if ($ortu['no_telp_ibu'] == NULL || $ortu['no_telp_ibu'] == "") 
	          			{
	          				echo 'Tidak ada data';
	          			}?>" 
	            name="no_telp_ibu" value="<?php echo $ortu['no_telp_ibu']; ?>" 
	          	>
	        </div>

	        <label class="col-form-label">Penghasilan</label>
	        <div class="input-group">
	          	<div class="input-group-prepend">
	            	<span class="input-group-text">Rp. </span>
	          	</div>
	          	<input type="number" name="penghasilan_ibu" class="form-control" placeholder="<?php if ($ortu['penghasilan_ibu'] == NULL || $ortu['penghasilan_ibu'] == "") 
	          			{
	          				echo 'Tidak ada data';
	          			}?>" value="<?php echo $ortu['penghasilan_ibu'] ?>">
	        </div>
		</div>

		<div class="form-row col-md-12 d-inline-block mb-4" style="">
				<div class="mb-2 pb-1 border-bottom text-center">
					<strong>Wali</strong>
				</div>
				<label class="col-form-label">Nama</label>
	        <div class="">
	          	<input type="text" class="form-control" id="validationCustom01" placeholder="<?php if ($ortu['nama_wali'] == NULL || $ortu['nama_wali'] == "") 
	          			{
	          				echo 'Tidak ada data';
	          			}?>" 
	            name="nama_wali" value="<?php echo $ortu['nama_wali']; ?>" 
	          	>
	        </div>

	        <label class="col-form-label">NIK</label>
	        <div class="">
	          	<input type="text" class="form-control" id="validationCustom01" placeholder="<?php if ($ortu['nik_wali'] == NULL || $ortu['nik_wali'] == "") 
	          			{
	          				echo 'Tidak ada data';
	          			}?>" 
	            name="nik_wali" value="<?php echo $ortu['nik_wali']; ?>" 
	          	>
	        </div>

	        <label class="col-form-label">Pendidikan Terakhir</label>
	        <div class="">
	          	<input type="text" class="form-control" id="validationCustom01" placeholder="<?php if ($ortu['pendidikan_wali'] == NULL || $ortu['pendidikan_wali'] == "") 
	          			{
	          				echo 'Tidak ada data';
	          			}?>" 
	            name="pendidikan_wali" value="<?php echo $ortu['pendidikan_wali']; ?>" 
	          	>
	        </div>

	        <label class="col-form-label">Pekerjaan</label>
	        <div class="">
	          	<input type="text" class="form-control" id="validationCustom01" placeholder="<?php if ($ortu['pekerjaan_wali'] == NULL || $ortu['pekerjaan_wali'] == "") 
	          			{
	          				echo 'Tidak ada data';
	          			}?>" 
	            name="pekerjaan_wali" value="<?php echo $ortu['pekerjaan_wali']; ?>" 
	          	>
	        </div>

	        <label class="col-form-label">No. Telepon</label>
	        <div class="">
	          	<input type="text" class="form-control" id="validationCustom01" placeholder="<?php if ($ortu['no_telp_wali'] == NULL || $ortu['no_telp_wali'] == "") 
	          			{
	          				echo 'Tidak ada data';
	          			}?>" 
	            name="no_telp_wali" value="<?php echo $ortu['no_telp_wali']; ?>" 
	          	>
	        </div>

	        <label class="col-form-label">Penghasilan</label>
	        <div class="input-group">
	          	<div class="input-group-prepend">
	            	<span class="input-group-text">Rp. </span>
	          	</div>
	          	<input type="number" name="penghasilan_wali" class="form-control" placeholder="<?php if ($ortu['penghasilan_wali'] == NULL || $ortu['penghasilan_wali'] == "") 
	          			{
	          				echo 'Tidak ada data';
	          			}?>" value="<?php echo $ortu['penghasilan_wali'] ?>">
	        </div>
		</div>
		<div class="d-flex justify-content-center align-items-center mb-4">
			<input type="submit" name="" class="btn btn-primary" value="Simpan">
		</div>
		</form>
	</div>
</div>