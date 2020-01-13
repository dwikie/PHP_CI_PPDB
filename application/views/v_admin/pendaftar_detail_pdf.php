<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title ?></title>
	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="<?php echo base_url().'assets/datatable/datatables.js'; ?>"></script>
  	<script type="text/javascript" src="<?php echo base_url().'assets/js/popper.min.js'; ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datatable/datatables.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/font/fontawesome-free-5.10.1-web/css/all.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/my.css';?>">
</head>
<body style="">
	<div class="container-fluid">
		<?php foreach ($pendaftar as $p): ?>

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
		
			<div class="">
				<table class="table table-bordered table-striped table-hover" id="info-trans">
					<thead>
						<tr class="text-center">
							<th style="padding: 2px !important; background-color: #3399ff !important;" class="align-middle">No</th>
							<th style="padding: 2px !important; background-color: #3399ff !important;" class="align-middle">No. Trans.</th>
							<th style="padding: 2px !important; background-color: #3399ff !important;" class="align-middle">Kode Trans.</th>
							<th style="padding: 2px !important; background-color: #3399ff !important;" class="align-middle">Kategori</th>
							<th style="padding: 2px !important; background-color: #3399ff !important;" class="align-middle">Total Hrs Byr</th>
							<th style="padding: 2px !important; background-color: #3399ff !important;" class="align-middle">Jumlah Byr</th>
							<th style="padding: 2px !important; background-color: #3399ff !important;" class="align-middle">Status Byr</th>
						</tr>
					</thead>
					<tbody>
						<?php $no 	= 1;
						$transaksi	= $this->db->query("SELECT * FROM transaksi WHERE transaksi.no_ujian = '$u->no_ujian'")->result();
						foreach ($transaksi as $t): ?>
							<tr>
								<td style="padding: 4px !important"><?php echo $no ?></td>
								<td style="padding: 4px !important"><?php echo $t->no_transaksi ?></td>
								<td style="padding: 4px !important"><?php echo $t->kd_transaksi ?></td>
								<?php 
								$kategori = $this->db->query("SELECT * FROM transaksi_kategori WHERE kd_transaksi ='$t->kd_transaksi'")->row();
								?>
								<td style="padding: 4px !important"><?php echo $kategori->kategori_transaksi ?></td>
								<td style="padding: 4px !important"><?php echo $kategori->harus_bayar ?></td>
								<td style="padding: 4px !important"><?php echo $t->jumlah_bayar ?></td>
								<td style="padding: 4px !important"><?php echo $t->status_bayar ?></td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
</body>
</html>