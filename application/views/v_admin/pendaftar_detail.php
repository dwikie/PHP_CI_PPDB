<div class="container-fluid mb-4">
	<div class="border-bottom bg-white p-3 shadow-sm">
		<div class="border-bottom shadow-sm p-3 mb-4" style="margin: -1rem -1rem 1.5rem -1rem !important; font-size: 28px"><i class="fas fa-user"></i> Detail Pendaftar</div>

		<?php foreach ($pendaftar as $p): ?>
		<div class="d-flex justify-content-end navbar" style="">
		  	<a class="btn btn-secondary ml-1" style="" href="<?php echo base_url().'admin/pendaftar_detail_print/'.$p->nisn ?>" target="_blank"><i class="fas fa-print"></i> Print</a>

	  		<a class="btn btn-secondary ml-1" style="" href="<?php echo base_url().'admin/pendaftar_detail_pdf/'.$p->nisn ?>" target="_blank"><i class="fas fa-file"></i> PDF</a>

	  		<button class="btn btn-danger ml-1" data-toggle="modal" data-target="#hapus" style="">
	    			<i class="fas fa-user-times"></i> Hapus
			</button>

			<div class="modal" id="hapus" style="">
			    <div class="modal-dialog" style="max-width: 400px;">
			      	<div class="modal-content">
			      
			        <!-- Modal Header -->
			        <div class="modal-header">
			          	<h4 class="modal-title">Hapus Pendaftar</h4>
			          	<button type="button" class="close" data-dismiss="modal">&times;</button>
			        </div>
			        
			        <!-- Modal body -->
			        <div class="modal-body text-center">
			        	<span class="glyphicon glyphicon-warning-sign" style="font-size: 50px"></span>
			            <div class="align-middle"><strong>Yakin Hapus Data ?</strong></div>
			            <div class="align-middle">Semua data yang berhubungan dengan pendaftar ini akan terhapus</div>
			        </div>
			        
			        <!-- Modal footer -->
			        <div class="modal-footer">
			            <a class="btn btn-danger float-right" style="margin: 2px;" href="<?php echo base_url().'admin/pendaftar_hapus/'.$p->nisn; ?>">Ya</a>
			            <button type="button" class="btn btn-primary" data-dismiss="modal">Kembali</button>
			        </div>
			        
			      	</div>
			    </div>		
  			</div>

			<div class="dropdown ml-1">
			  	<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
			   	 	<i class="far fa-edit"></i> Edit
			  	</button>

			  	<div class="dropdown-menu shadow-sm" style="right: 0px !important; left: unset;">
				    <a class="dropdown-item" href="<?php echo base_url().'admin/pendaftar_update/'.$p->nisn ?>">Data Pendaftar</a>
				    <a class="dropdown-item" href="<?php echo base_url().'admin/orangtua_update/'.$p->nisn ?>">Data Orang Tua</a>
			  	</div>
			</div>
		</div>

		<h5 class="border-bottom mb-3 text-center mt-4"><strong>Data Pendaftar</strong></h5>

			<div class="mb-2">
				<label class="col-sm-4"><strong>Nama</strong></label>
				<span class="col-sm-8"><?php echo $p->nama ?></span>
			</div>

			<div class="mb-2">
				<label class="col-sm-4"><strong>Jenis Kelamin</strong></label>
				<span class="col-sm-8"><?php echo $p->jenis_kelamin ?></span>
			</div>

			<div class="mb-2">
				<label class="col-sm-4"><strong>Tanggal Lahir</strong></label>
				<span class="col-sm-8"><?php echo $p->tgl_lahir ?></span>
			</div>

			<div class="mb-2">
				<label class="col-sm-4"><strong>No. Telepon</strong></label>
				<span class="col-sm-8"><?php echo $p->no_telp ?></span>
			</div>

			<div class="mb-2">
				<label class="col-sm-4"><strong>E-Mail</strong></label>
				<span class="col-sm-8"><?php echo $p->email ?></span>
			</div>

			<div class="mb-2">
				<label class="col-sm-4"><strong>No. NISN</strong></label>
				<span class="col-sm-8"><?php echo $p->nisn ?></span>
			</div>

			<div class="mb-2">
				<label class="col-sm-4"><strong>Jurusan</strong></label>
				<span class="col-sm-8"><?php echo $p->kd_jurusan ?></span>
			</div>

			<div class="mb-2">
				<label class="col-sm-4"><strong>Alamat</strong></label>
				<span class="col-sm-8"><?php echo $p->alamat ?></span>
			</div>

			<div class="mb-2">
				<label class="col-sm-4"><strong>Tanggal Daftar</strong></label>
				<span class="col-sm-8"><?php echo $p->tgl_daftar ?></span>
			</div>
		<?php endforeach ?>

		<h5 class="border-bottom mb-3 text-center mt-4"><strong>Data Orang Tua</strong></h5>
		<?php foreach ($orangtua as $o): ?>
			<div class="row justify-content-center align-items-center">
				<div class="col-md-4 mb-4">
					<div class="mb-2">
						<label class="col-sm-4"><strong>Nama Ayah</strong></label>
						<div class="col-sm-8">
						<?php if ($o->nama_ayah === NULL || $o->nama_ayah === "") 
						{
							echo "Belum ada data";
						} 
						else 
						{
							echo $o->nama_ayah;
						}
						?>
						</div>
					</div>

					<div class="mb-2">
						<label class="col-sm-4"><strong>NIK Ayah</strong></label>
						<div class="col-sm-8">
						<?php if ($o->nik_ayah === NULL || $o->nik_ayah === "") 
						{
							echo "Belum ada data";
						} 
						else 
						{
							echo $o->nik_ayah;
						}
						?>
						</div>
					</div>

					<div class="mb-2">
						<label class="col-sm-4"><strong>Pendidikan Ayah</strong></label>
						<div class="col-sm-8">
						<?php if ($o->pendidikan_ayah === NULL || $o->pendidikan_ayah === "") 
						{
							echo "Belum ada data";
						} 
						else 
						{
							echo $o->pendidikan_ayah;
						}
						?>
						</div>
					</div>

					<div class="mb-2">
						<label class="col-sm-4"><strong>Pekerjaan Ayah</strong></label>
						<div class="col-sm-8">
						<?php if ($o->pekerjaan_ayah === NULL || $o->pekerjaan_ayah === "") 
						{
							echo "Belum ada data";
						} 
						else 
						{
							echo $o->pekerjaan_ayah;
						}
						?>
						</div>
					</div>

					<div class="mb-2">
						<label class="col-sm-4"><strong>Telp. Ayah</strong></label>
						<div class="col-sm-8">
						<?php if ($o->no_telp_ayah === NULL || $o->no_telp_ayah === "") 
						{
							echo "Belum ada data";
						} 
						else 
						{
							echo $o->no_telp_ayah;
						}
						?>
						</div>
					</div>

					<div class="mb-2">
						<label class="col-sm-4"><strong>Penghasilan Ayah</strong></label>
						<div class="col-sm-8">
						<?php if ($o->penghasilan_ayah === NULL || $o->penghasilan_ayah === "") 
						{
							echo "Belum ada data";
						} 
						else 
						{
							echo $o->penghasilan_ayah;
						}
						?>
						</div>
					</div>

				</div>

				<div class="col-md-4 mb-4">
					
					<div class="mb-2">
						<label class="col-sm-4"><strong>Nama Ibu</strong></label>
						<div class="col-sm-8">
						<?php if ($o->nama_ibu === NULL || $o->nama_ibu === "") 
						{
							echo "Belum ada data";
						} 
						else 
						{
							echo $o->nama_ibu;
						}
						?>
						</div>
					</div>

					<div class="mb-2">
						<label class="col-sm-4"><strong>NIK Ibu</strong></label>
						<div class="col-sm-8">
						<?php if ($o->nik_ibu === NULL || $o->nik_ibu === "") 
						{
							echo "Belum ada data";
						} 
						else 
						{
							echo $o->nik_ibu;
						}
						?>
						</div>
					</div>

					<div class="mb-2">
						<label class="col-sm-4"><strong>Pendidikan Ibu</strong></label>
						<div class="col-sm-8">
						<?php if ($o->pendidikan_ibu === NULL || $o->pendidikan_ibu === "") 
						{
							echo "Belum ada data";
						} 
						else 
						{
							echo $o->pendidikan_ibu;
						}
						?>
						</div>
					</div>

					<div class="mb-2">
						<label class="col-sm-4"><strong>Pekerjaan Ibu</strong></label>
						<div class="col-sm-8">
						<?php if ($o->pekerjaan_ibu === NULL || $o->pekerjaan_ibu === "") 
						{
							echo "Belum ada data";
						} 
						else 
						{
							echo $o->pekerjaan_ibu;
						}
						?>
						</div>
					</div>

					<div class="mb-2">
						<label class="col-sm-4"><strong>Telp. Ibu</strong></label>
						<div class="col-sm-8">
						<?php if ($o->no_telp_ibu === NULL || $o->no_telp_ibu === "") 
						{
							echo "Belum ada data";
						} 
						else 
						{
							echo $o->no_telp_ibu;
						}
						?>
						</div>
					</div>

					<div class="mb-2">
						<label class="col-sm-4"><strong>Penghasilan Ibu</strong></label>
						<div class="col-sm-8">
						<?php if ($o->penghasilan_ibu === NULL || $o->penghasilan_ibu === "") 
						{
							echo "Belum ada data";
						} 
						else 
						{
							echo $o->penghasilan_ibu;
						}
						?>
						</div>
					</div>

				</div>

				<div class="col-md-4 mb-4">
					
					<div class="mb-2">
						<label class="col-sm-4"><strong>Nama Wali</strong></label>
						<div class="col-sm-8">
						<?php if ($o->nama_wali === NULL || $o->nama_wali === "") 
						{
							echo "Belum ada data";
						} 
						else 
						{
							echo $o->nama_wali;
						}
						?>
						</div>
					</div>

					<div class="mb-2">
						<label class="col-sm-4"><strong>NIK Wali</strong></label>
						<div class="col-sm-8">
						<?php if ($o->nik_wali === NULL || $o->nik_wali === "") 
						{
							echo "Belum ada data";
						} 
						else 
						{
							echo $o->nik_wali;
						}
						?>
						</div>
					</div>

					<div class="mb-2">
						<label class="col-sm-4"><strong>Pendidikan Wali</strong></label>
						<div class="col-sm-8">
						<?php if ($o->pendidikan_wali === NULL || $o->pendidikan_wali === "") 
						{
							echo "Belum ada data";
						} 
						else 
						{
							echo $o->pendidikan_wali;
						}
						?>
						</div>
					</div>

					<div class="mb-2">
						<label class="col-sm-4"><strong>Pekerjaan Wali</strong></label>
						<div class="col-sm-8">
						<?php if ($o->pekerjaan_wali === NULL || $o->pekerjaan_wali === "") 
						{
							echo "Belum ada data";
						} 
						else 
						{
							echo $o->pekerjaan_wali;
						}
						?>
						</div>
					</div>

					<div class="mb-2">
						<label class="col-sm-4"><strong>Telp. Wali</strong></label>
						<div class="col-sm-8">
						<?php if ($o->no_telp_wali === NULL || $o->no_telp_wali === "") 
						{
							echo "Belum ada data";
						} 
						else 
						{
							echo $o->no_telp_wali;
						}
						?>
						</div>
					</div>

					<div class="mb-2">
						<label class="col-sm-4"><strong>Penghasilan Wali</strong></label>
						<div class="col-sm-8">
						<?php if ($o->penghasilan_wali === NULL || $o->penghasilan_wali === "") 
						{
							echo "Belum ada data";
						} 
						else 
						{
							echo $o->penghasilan_wali;
						}
						?>
						</div>
					</div>

				</div>

			</div>
		<?php endforeach ?>

		<h5 class="border-bottom mt-4 mb-3 text-center"><strong>Detail Ujian</strong></h5>
			<?php foreach ($ujian as $u): ?>
				<div class="mb-2">
					<label class="col-sm-4"><strong>No. Ujian</strong></label>
					<span class="col-sm-8"><?php echo $u->no_ujian ?></span>
				</div>

				<div class="mb-2">
					<label class="col-sm-4"><strong>Nilai</strong></label>
					<span class="col-sm-8">
					<?php if ($u->nilai === NULL) 
						{
							echo "Belum mengikuti ujian";
						} 
						else 
						{
							echo $u->nilai;
						}
					?>
					</span>
				</div>

				<div class="mb-2">
					<label class="col-sm-4"><strong>Status</strong></label>
					<span class="col-sm-8">
					<?php if ($u->status === NULL) 
						{
							echo "Belum mengikuti ujian";
						} 
						else 
						{
							echo $u->status;
						}
					?>
					</span>
				</div>
			<?php endforeach ?>

		<h5 class="border-bottom mb-3 mt-4 text-center"><strong>Detail Transaksi</strong></h5>
		<div class="d-flex justify-content-end mb-2" style="">
			<a href="<?php echo base_url().'admin/transaksi_detail/'.$p->nisn ?>" class="btn btn-info"><i class="fas fa-wallet"></i> Detail Transaksi</a>
		</div>
			<div class="table-resposive mb-4">
				<table class="table table-bordered table-striped table-hover" id="info-trans">
					<thead>
						<tr>
							<th>No</th>
							<th>No. Transaksi</th>
							<th>Kode Transaksi</th>
							<th>Kategori</th>
							<th>Jumlah Bayar</th>
							<th>Total Harus Bayar</th>
							<th>Status Byr</th>
						</tr>
					</thead>
					<tbody>
						<?php $no 	= 1;
						$transaksi	= $this->db->query("SELECT * FROM transaksi WHERE transaksi.no_ujian = '$u->no_ujian'")->result();
						foreach ($transaksi as $t): ?>
							<tr>
								<td><?php echo $no ?></td>
								<td><?php echo $t->no_transaksi ?></td>
								<td><?php echo $t->kd_transaksi ?></td>
								<?php 
								$kategori = $this->db->query("SELECT * FROM transaksi_kategori WHERE kd_transaksi ='$t->kd_transaksi'")->row();
								?>
								<td><?php echo $kategori->kategori_transaksi ?></td>
								<td><?php echo $t->jumlah_bayar ?></td>
								<td><?php echo $kategori->harus_bayar ?></td>
								<td><?php echo $t->status_bayar ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
	</div>
</div>