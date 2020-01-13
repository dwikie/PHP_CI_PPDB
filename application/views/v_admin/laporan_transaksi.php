<div class="container-fluid mb-4">
	<div class="border-bottom bg-white p-3 shadow-sm">
		<div class="border-bottom shadow-sm p-3 mb-4" style="margin: -1rem -1rem 1.5rem -1rem !important; font-size: 28px"><i class="fas fa-tasks"></i> Riwayat Transaksi</div>
		<h5 class="border-bottom mb-3 text-center mt-4"><strong>Filter Laporan</strong></h5>

		<form method="POST">
			<div class="row justify-content-center align-items-center d-flex">
				<div class="col-sm-2 mb-2">
					<div class="mb-2">
						<label class="col-sm-4"><strong>Tanggal</strong></label>
					</div>
				</div>
				<div class="col-sm-4 mb-2">
					<div class="mb-2">
						<input type="date" name="tanggal1" class="form-control" required="">
					</div>
				</div>
				<div class="col-sm-2 mb-2">
					<div class="mb-2">
						<label class="col-sm-4"><strong>Sampai</strong></label>
					</div>
				</div>
				<div class="col-sm-4 mb-4">
					<div class="mb-2">
						<input type="date" name="tanggal2" class="form-control" required="">
					</div>
				</div>
			</div>

			<div class="d-flex justify-content-center align-items-center">
			      <button type="submit" class="btn btn-secondary" formaction="<?php echo base_url().'admin/laporan_transaksi_print' ?>" id="checkBtn1" style="border-radius: 4px 0px 0px 4px" formtarget="_blank">
			       <i class="fas fa-print"></i> Print
			      </button>
			      <button type="submit" class="btn btn-secondary" formaction="<?php echo base_url().'admin/laporan_transaksi_pdf/'?>" id="checkBtn2" style="border-radius: 0px 4px 4px 0px" formtarget="_blank">
			        <i class="fas fa-file-pdf"></i> PDF
		      </button>
		    </div>
		</form>

		<h5 class="border-bottom mb-3 text-center mt-4"><strong>Data Transaksi</strong></h5>

		<div class="table-responsive">
	  	<table class="table table-bordered table-striped table-hover" id = "table-laporan">
	    <thead>
	      <tr>
	      	<th class="align-middle text-center">No</th>
	        <th class="align-middle text-center">Nama</th>
	        <th class="align-middle text-center">NISN</th>
	        <th class="align-middle text-center">Telepon</th>
	        <th class="align-middle text-center">E-mail</th>
	        <th class="align-middle text-center">Alamat</th>
	        <th class="align-middle text-center">Kategori</th>
	        <th class="align-middle text-center">Waktu</th>
	        <th class="align-middle text-center">Jumlah</th>
	      </tr>
	    </thead>
	    <tbody>
	      <?php
	      $no = 1;
	      foreach ($transaksi as $data) {
	      ?>
	      <tr>
	      	<td class="align-middle text-center"><?php echo $no++; ?></td>
	      	<td class="align-middle text-center"><?php echo ucwords($data->nama) ?></td>
	        <td class="align-middle text-center"><?php echo $data->nisn ?></td>
	        <td class="align-middle text-center"><?php echo $data->no_telp ?></td>
	        <td class="align-middle text-center"><?php echo $data->email ?></td>
	        <td class="align-middle text-center"><?php echo $data->alamat ?></td>
	        <td class="align-middle text-center"><?php echo $data->kategori_transaksi ?></td>
	        <td class="align-middle text-center"><?php 
	            $tanggal = date('Y-m-d', strtotime($data->tgl_bayar));
	            $jam = date('H:i:s', strtotime($data->tgl_bayar));
	            echo $this->M_Admin->tanggal_indo($tanggal, true).' - '. $jam; ?></td>
	        <td class="align-middle text-center">Rp. <?php echo number_format($data->jumlah_bayar,0,",","."); ?></td>
	      </tr>
	    <?php } ?>
	  	</tbody>
		</table>
	</div>
	</div>
</div>