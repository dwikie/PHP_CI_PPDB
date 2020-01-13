<div class="container-fluid mb-4">
	<div class="border-bottom bg-white p-3 shadow-sm">
		<div class="border-bottom shadow-sm p-3 mb-4" style="margin: -1rem -1rem 1.5rem -1rem !important; font-size: 28px"><i class="fas fa-tasks"></i> Ikhtisar</div>

		<div class="col-md-12">
			<div class="row p-3 d-flex justify-content-center align-items-center">
				
				<div class="col-lg-4 mb-4">
					<div class="border shadow-sm" style="background-color: #aaeeb1">
						<div class="d-flex justify-content-between p-2">
						<div style="font-size: 68px"><i class="fas fa-users"></i></div>
						<div class="text-right">
							<div style="font-size: 42px">
								<strong>
									<?php echo $this->db->query("SELECT * FROM pendaftar")->num_rows(); ?>
								</strong>
							</div>
							<div>Pendaftar</div>
						</div>
					</div>

					<div class="bg-white text-right p-2" style="box-shadow: 0rem -0.1rem 0.35rem 0.15rem rgba(0, 0, 0, 0.075) !important; margin: 0rem -0rem 1rem -0rem !important;">
						<a href="<?php echo base_url().'admin/pendaftar' ?>" class="text-dark d-block">Detail <i class="fas fa-long-arrow-alt-right"></i></a>
					</div>
					</div>
				</div>

				<div class="col-lg-4 mb-4">
					<div class="border shadow-sm" style="background-color: #b1aaee">
						<div class="d-flex justify-content-between p-2">
						<div style="font-size: 68px"><i class="fas fa-pencil-ruler"></i></div>
						<div class="text-right">
							<div style="font-size: 42px">
								<strong>
									<?php echo $this->db->query("SELECT * FROM ujian WHERE ujian.status IS NOT NULL")->num_rows(); ?>
								</strong>
							</div>
							<div>Peserta Tes</div>
						</div>
					</div>

					<div class="bg-white text-right p-2" style="box-shadow: 0rem -0.1rem 0.35rem 0.15rem rgba(0, 0, 0, 0.075) !important; margin: 0rem -0rem 1rem -0rem !important;">
						<a href="<?php echo base_url().'admin/ujian' ?>" class="text-dark d-block">Detail <i class="fas fa-long-arrow-alt-right"></i></a>
					</div>
					</div>
				</div>

				<div class="col-lg-4 mb-4">
					<div class="border shadow-sm" style="background-color: #f9a8a8">
						<div class="d-flex justify-content-between p-2">
						<div style="font-size: 68px"><i class="fas fa-wallet"></i></div>
						<div class="text-right">
							<div style="font-size: 42px">
								<strong>
									<?php echo $this->db->query("SELECT * FROM transaksi_riwayat")->num_rows(); ?>
								</strong>
							</div>
							<div>Transaksi</div>
						</div>
					</div>

					<div class="bg-white text-right p-2" style="box-shadow: 0rem -0.1rem 0.35rem 0.15rem rgba(0, 0, 0, 0.075) !important; margin: 0rem -0rem 1rem -0rem !important;">
						<a href="<?php echo base_url().'admin/transaksi' ?>" class="text-dark d-block">Detail <i class="fas fa-long-arrow-alt-right"></i></a>
					</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>