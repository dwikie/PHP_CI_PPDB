<div class="container-fluid mb-4">
	<div class="border-bottom bg-white p-3 shadow-sm">
		<div class="border-bottom shadow-sm p-3 mb-4" style="margin: -1rem -1rem 1.5rem -1rem !important; font-size: 28px"><i class="fas fa-tasks"></i> Riwayat Transaksi</div>

		<div class="table-resposive mb-4">
			<table class="table table-bordered table-striped table-hover" id="trans">
				<thead>
					<tr>
						<th>No</th>
						<th>No. Trans.</th>
						<th>Kategori</th>
						<th>Tgl. Bayar</th>
						<th>Jumlah Bayar</th>
						<th>Opsi</th>
					</tr>
				</thead>
				<tbody>
					<?php $no 		= 1;
					foreach ($transaksi_riwayat as $tr) { 
						$nisn = $this->db->query("SELECT nisn FROM ujian WHERE ujian.no_ujian='$tr->no_ujian'")->row();
					?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><?php echo $tr->no_transaksi ?></td>
						<td><?php echo $tr->kategori_transaksi ?></td>
						<td><?php echo $tr->tgl_bayar ?></td>
						<td><?php echo $tr->jumlah_bayar ?></td>
						<td class="align-middle justify-content-center d-flex">
							<a href="<?php echo base_url().'admin/pendaftar_detail/'.$nisn->nisn ?>" class="btn btn-info"><i class="far fa-edit"></i> Detail</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</div>