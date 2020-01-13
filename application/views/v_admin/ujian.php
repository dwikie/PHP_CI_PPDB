<div class="container-fluid mb-4">
	<div class="border-bottom bg-white p-3 shadow-sm">
		<div class="border-bottom shadow-sm p-3 mb-4" style="margin: -1rem -1rem 1.5rem -1rem !important; font-size: 28px"><i class="fas fa-user-graduate"></i> Hasil Ujian</div>

		<div class="table-responsive mb-4">
		<table class="table table-bordered table-striped table-hover" id = "table-datatable" style="">
			<thead>
				<tr>
					<th>No</th>
					<th>No. Ujian</th>
					<th>Nilai</th>
					<th>Hasil Ujian</th>
					<th>Status Ujian</th>
					<th>Opsi</th>
				</tr>
			</thead>

			<tbody>
				<?php $no = 1;
				foreach ($ujian as $t): ?>
					<tr>
						<td class="text-center align-middle"><?php echo $no++ ?></td>
						<td class="text-center align-middle">
							<?php echo $t->no_ujian?>
						</td>
						<td class="text-center align-middle">
							<?php 
								if($t->nilai === NULL)
									{
										echo "Belum Mengikuti Ujian";
									}
								else{
										echo $t->nilai;
									}
							?>
						</td>
						<td class="text-center align-middle">
							<?php 
								if($t->status === NULL)
									{
										echo "Belum Mengikuti Ujian";
									}
								else{
										echo $t->status;
									}
							?>
						</td>
						<td class="text-center align-middle">
							<?php 
								if($t->token === NULL || $t->token === 0)
									{
										echo "Belum Melakukan Pembayaran";
									}
								else if ($t->token == 1)
									{
										echo "Belum Melakukan Ujian";
									}
								else if ($t->token == 2)
									{
										echo "Sudah Melakukan Ujian";
									}
							?>
						</td>
						<td class="nowrap d-flex justify-content-center">
							<div class="mb-2">
								<a class="btn btn-info shadow-sm" style="width: 100px;" href="<?php echo base_url().'admin/pendaftar_detail/'.$t->nisn; ?>"><i class="fas fa-edit"></i> Detail</a>
					        </div>
					        <div class="mb-2 ml-1">
								<a class="btn btn-success shadow-sm" style="width: 100px; <?php if ($t->status === NULL || $t->nilai === NULL || $t->token === NULL || $t->token === 0)
									{
										echo "display: none;";
							        } ?>" href="<?php echo base_url().'ujian/hasil/'.$t->nisn.'?k='.urlencode($this->encryption->encrypt($t->no_ujian)); ?>" target="_blank"><i class="fas fa-file"></i></span> Hasil</a>
					        </div>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>

	</div>
</div>