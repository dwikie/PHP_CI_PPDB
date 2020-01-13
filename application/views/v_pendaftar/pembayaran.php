<div class="container-fluid">
	<div class="col-md-12 border bg-white mt-3 p-3 mb-3">
		<div class="mb-4 pb-2 border-bottom">
			<strong>PANDUAN PEMBAYARAN</strong>
		</div>

		<div class="col-md-12 pl-4 mb-4" style="">
			<p>
				1. Lakukan pembayaran dengan cara transfer ATM ke No. Rek 12345xxxx<br>
				2. Scan atau foto bukti pembayaran <strong><mark style="background-color: #def0e6";>PASTIKAN HASIL SCAN ATAU FOTO JELAS/TERBACA</mark></strong><br>
				3. Upload bukti pembayaran dengan cara klik tombol <strong><mark style="background-color: #def0e6;">"Choose File"</mark></strong><br>
				4. Pilih file bukti pembayaran<br>
				5. Klik tombol <strong><mark style="background-color: #def0e6";>"Upload"</mark></strong>

			</p>
		</div>

		<div class="mb-4 pb-2 border-bottom">
			<strong>UPLOAD BUKTI BAYAR</strong>
		</div>
		<?php echo $this->session->flashdata('message_name'); ?>
		<?php echo $error ;?>
		<?php echo form_open_multipart('pendaftar/upload');?>
			<div class="col-md-12 pl-4 mb-4" style="">
				<input type="file" class="form-control-file border mb-2" name="bukti" value="" accept="image/jpg, image/jpeg, image/png">
					<p>
						JPG/JPEG/PNG - Max. 2MB
					</p>
					<div class="align-items-center justify-content-center d-flex">
						<input type="submit" value="Upload" class="btn btn-primary text-white">
					</div>
			</div>
		</form>
	</div>
</div>