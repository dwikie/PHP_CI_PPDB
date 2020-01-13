<div class="container-fluid mb-4">
	<div class="border-bottom bg-white p-3 shadow-sm">
		<div class="border-bottom shadow-sm p-3 mb-4" style="margin: -1rem -1rem 1.5rem -1rem !important; font-size: 28px"><i class="fas fa-wallet"></i></i> Detail Transaksi</div>

		<h5 class="border-bottom mb-3 text-center mb-2 mt-4"><strong>Data Pembayar</strong></h5>
			<div class="mb-2">
				<label class="col-sm-4"><strong>Nama</strong></label>
				<span class="col-sm-8"><?php echo $pendaftar->nama ?></span>
			</div>
			<div class="mb-2">
				<label class="col-sm-4"><strong>No Ujian</strong></label>
				<span class="col-sm-8"><?php echo $ujian->no_ujian ?></span>
			</div>
			<div class="mb-2">
				<label class="col-sm-4"><strong>Status Pembayaran Ujian</strong></label>
				<span class="col-sm-8"><?php 
				if ($ujian->token === NULL) 
				{
					echo "Belum lunas";
				} 
				else 
				{
					echo "Lunas";
				}
				 ?></span>
			</div>
		<h5 class="border-bottom mb-3 text-center mb-2 mt-4"><strong>Data Transaksi</strong></h5>
		<?php echo $this->session->flashdata('message_name'); ?>
		<div class="d-flex justify-content-end mb-2" style="">
			<!-- Berkas -->
			<button class="btn btn-info ml-1" data-toggle="modal" data-target="#berkas" style="">
	    		<i class="fas fa-clipboard-check"></i> Berkas Transaksi
			</button>

			<div class="modal" id="berkas" style="">
			    <div class="modal-dialog" style="max-width: 720px;">
			      	<div class="modal-content">
			        <!-- Modal Header -->
			        <div class="modal-header">
			          	<h4 class="modal-title">Berkas Transaksi</h4>
			          	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        
			        <!-- Modal body -->
			        <div class="modal-body">
			        	<div class="row p-3 d-flex justify-content-center">
		          		<?php 
		          		if ($foto != 0) 
		          		{ ?>

				            <?php foreach ($foto as $f){ ?>
				            	<div class="col-md-3" style="">
				            		<a href="<?php echo base_url().'upload/pendaftar/'.$pendaftar->nisn.'/'.$f ?>" target="_blank">
									<img src="<?php echo base_url().'upload/pendaftar/'.$pendaftar->nisn.'/'.$f ?>" class="img-fluid shadow mx-auto d-block " style="" id="transaksi_gambar">
								</a>
				            	</div>
							<?php }?>

						<?php 
						}
						else 
						{ ?>
							<div class="display-4 text-center"><i class="fas fa-images"></i><br> Berkas Kosong</div>
						<?php } ?>
		          		</div>
			        </div>
			        
			        <!-- Modal footer -->
			        <div class="modal-footer">
			            <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
			        </div>
			      	</div>
			    </div>		
  			</div>

			<!-- Tambah -->
			<button class="btn btn-success ml-1" data-toggle="modal" data-target="#tambah" style="">
	    		<i class="fas fa-plus"></i> Tambah Transaksi
			</button>

			<div class="modal" id="tambah" style="">
			    <div class="modal-dialog" style="max-width: 720px;">
			      	<div class="modal-content">
			      	<form method="POST" action="<?php echo base_url().'admin/transaksi_tambah' ?>">
			        <!-- Modal Header -->
			        <div class="modal-header">
			          	<h4 class="modal-title">Tambah Transaksi</h4>
			          	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        
			        <!-- Modal body -->
			        <div class="modal-body">
			        	<input type="hidden" name="no_ujian" class="form-control" value="<?php echo $ujian->no_ujian; ?>" placeholder="Nama Lengkap" required="" readonly>
			        	<div class="form-group col-md-12">
			                <label>Kategori : </label>
			                <select name="kategori" class="form-control" required>
				                 <option value="" selected="" disabled="">- Kategori Pembayaran -</option>
				                 <?php foreach ($transaksi_kategori as $tk) { ?>
				                 <option value="<?php echo $tk->kd_transaksi ?>"><?php echo $tk->kategori_transaksi ?></option>
			                  	<?php } ?>
			                </select>
			            </div>

			            <div class="form-group col-md-12">
			                <label class="col-form-label">Jumlah Bayar : </label>
					        <div class="input-group">
					          	<div class="input-group-prepend">
					            	<span class="input-group-text">Rp. </span>
					          	</div>
					          	<input type="number" name="jumlah" class="form-control" placeholder="" value="" required="">
					        </div>
			            </div>
			        </div>
			        
			        <!-- Modal footer -->
			        <div class="modal-footer">
			            <input type="submit" name="" value="Tambah" class="btn btn-primary">
			            <button type="button" class="btn btn-danger" data-dismiss="modal">Kembali</button>
			        </div>
			        </form>
			      	</div>
			    </div>		
  			</div>
		</div>
		<div class="table-resposive mb-4">
			<table class="table table-bordered table-striped table-hover" id="info-trans">
				<thead>
					<tr>
						<th>No</th>
						<th>No. Trans.</th>
						<th>Kategori</th>
						<th>Jumlah Bayar</th>
						<th>Total Harus Bayar</th>
						<th>Status Bayar</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no 	= 1;
					$transaksi	= $this->db->query("SELECT * FROM transaksi WHERE transaksi.no_ujian = '$ujian->no_ujian'")->result();
					foreach ($transaksi as $t): ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $t->no_transaksi ?></td>
						<td><?php echo $t->kategori_transaksi ?></td>
						<td>Rp. <?php echo number_format($t->jumlah_bayar,0,",","."); ?></td>
						<td>Rp. <?php echo number_format($t->harus_bayar,0,",","."); ?></td>
						<td><?php echo $t->status_bayar ?></td>
						<td class="text-center">
							<a href="<?php echo base_url().'admin/transaksi_detail_print/?k='.urlencode($t->no_transaksi) ?>" class="btn btn-secondary" target="_blank">Cetak</a>
						</td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>

		<h5 class="border-bottom mb-3 text-center mb-2 mt-4"><strong>Riwayat Transaksi</strong></h5>

		<div class="table-resposive mb-4">
			<table class="table table-bordered table-striped table-hover" id="riwayat-trans">
				<thead>
					<tr>
						<th>No</th>
						<th>No. Trans.</th>
						<th>Kategori</th>
						<th>Tgl. Bayar</th>
						<th>Jumlah Bayar</th>
					</tr>
				</thead>
				<tbody>
					<?php $no 		= 1;
					$transaksi_r	= $this->db->query("SELECT * FROM transaksi_riwayat WHERE transaksi_riwayat.no_ujian = '$ujian->no_ujian'")->result();
					foreach ($transaksi_r as $tr): ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $tr->no_transaksi ?></td>
						<td><?php echo $tr->kategori_transaksi ?></td>
						<td><?php $tanggal = date('Y-m-d', strtotime($tr->tgl_bayar));
				            $jam = date('H:i:s', strtotime($tr->tgl_bayar));
				            echo $this->M_Admin->tanggal_indo($tanggal, true).' - '. $jam; ?></td>
						<td>Rp. <?php echo number_format($tr->jumlah_bayar,0,",","."); ?></td>
					</tr>
					<?php endforeach ?>
				</tbody>
			</table>
		</div>

	</div>
</div>