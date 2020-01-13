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

<style type="text/css" media="print">
  	@page { size: landscape; }
</style>

<div class="container-fluid">
	<h5 class="border-bottom mb-3 text-center mt-4"><strong>SMK Permata 1 Kota Bogor</strong></h5>

	<div class="row justify-content-between">
		<div class="">
			<div class="col-md-3"><strong>No. Transaksi</strong></div>
			<div class="col-md-9"><?php echo $no_transaksi; ?></div>

			<div class="col-md-3"><strong>Jenis Transaksi</strong></div>
			<div class="col-md-9"><?php echo $transaksi_kategori->kategori_transaksi ?></div>
		</div>

		<div class="">
			<div class="col-md-3"><strong>Nama</strong></div>
			<div class="col-md-9"><?php echo $pendaftar->nama ?></div>

			<div class="col-md-3"><strong>E - Mail</strong></div>
			<div class="col-md-9"><?php echo $pendaftar->email ?></div>

			<div class="col-md-3"><strong>No. Telepon</strong></div>
			<div class="col-md-9">+62<?php echo $pendaftar->no_telp ?></div>

			<div class="col-md-3"><strong>Alamat</strong></div>
			<div class="col-md-9"><?php echo $pendaftar->alamat ?></div>
		</div>

	</div>

	<table class="table table-bordered mt-4">
		<thead>
			<tr>
				<th class="align-middle text-center" style="background-color: #3399ff !important;">No</th>
				<th class="align-middle text-center" style="background-color: #3399ff !important;">Tanggal Bayar</th>
				<th class="align-middle text-center" style="background-color: #3399ff !important;">Jumlah Bayar</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			$no = 1;
			$total = 0;
			foreach ($transaksi_riwayat as $data): ?>
				<tr>
					<td class="align-middle text-center"><?php echo $no++ ?></td>
					<td class="align-middle text-center"><?php 
							$tanggal = date('Y-m-d', strtotime($data->tgl_bayar));
				            $jam = date('H:i:s', strtotime($data->tgl_bayar));
				            echo $this->M_Admin->tanggal_indo($tanggal, true).' - '. $jam; ?></td>
					<td class="align-middle">Rp. <?php echo number_format($data->jumlah_bayar,0,",","."); ?></td>
				</tr>
			<?php 
			$total += $data->jumlah_bayar;
			endforeach ?>
				<tr>
					<td colspan="2"><strong>Total Pembayaran</strong></td>
					<td>Rp. <?php echo number_format($total,0,",",".");?></td>
				</tr>

				<tr>
					<td colspan="2"><strong>Total Yang Harus Dibayar</strong></td>
					<td>Rp. <?php echo number_format($transaksi_kategori->harus_bayar,0,",",".");?></td>
				</tr>

				<tr>
					<td colspan="3" class="text-center"><strong><?php 
					$status	= $total - $transaksi_kategori->harus_bayar;
					if ($status > 0)
					{
						echo "Lebih Rp. ".number_format($status,0,",",".");
					}
					else if ($total == $transaksi_kategori->harus_bayar)
					{
						echo "Tidak ada kurang atau lebih";
					}
					else
					{
						echo "Kurang Rp. ".number_format(substr($status, 1),0,",",".");
					}
					?></strong></td>
				</tr>

				<tr>
					<td colspan="2"><strong>Status Pembayaran</strong></td>
					<td class="text-center"><strong><?php 
					if ($total >= $transaksi_kategori->harus_bayar) 
					{
						echo "LUNAS";
					}
					else
					{
						echo "BELUM LUNAS";
					}
					?></strong></td>
				</tr>
		</tbody>
	</table>
</div>
</body>
<script type="text/javascript">
 	window.print();
    setTimeout(function(){window.close()}, 1000);
</script>
</html>