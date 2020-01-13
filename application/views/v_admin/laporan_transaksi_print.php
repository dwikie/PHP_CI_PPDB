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
<body>
	<div class="container-fluid">
		<h5 class="border-bottom mb-3 text-center mt-4"><strong>Laporan Transaksi</strong></h5>
		<div class="mb-4">
			<?php 
				$mulai 			= date('Y-m-d', strtotime($tanggal_mulai));
				$filter_mulai 	= $this->M_Admin->tanggal_indo($mulai, false);

				$selesai 		= date('Y-m-d', strtotime($tanggal_selesai));
				$filter_selesai	= $this->M_Admin->tanggal_indo($selesai, false);
			?>
			<div><?php echo $filter_mulai.' - '.$filter_selesai ?></div>	
		</div>

	<div class="">
    <table class="table table-bordered table-striped table-hover">
	    <thead>
		    <tr>
		        <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important;">No</th>
		        <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important;">Nama</th>
		        <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important;">NISN</th>
		        <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important;">Telepon</th>
		        <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important;">E-mail</th>
		        <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important;">Alamat</th>
		        <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important;">Kategori</th>
		        <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important;">Waktu</th>
		        <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important; width: 18%">Jumlah</th>
		    </tr>
	    </thead>

	    <tbody>
	      <?php
	      $no = 1;
	      $total = 0;
	      foreach ($transaksi as $data) {
	      ?>
		    <tr>
		        <td class="align-middle text-center" style="padding: 4px !important"><?php echo $no++; ?></td>
		        <td class="align-middle text-center" style="padding: 4px !important"><?php echo ucwords($data->nama) ?></td>
		        <td class="align-middle text-center" style="padding: 4px !important"><?php echo $data->nisn ?></td>
		        <td class="align-middle text-center" style="padding: 4px !important"><?php echo $data->no_telp ?></td>
		        <td class="align-middle text-center" style="padding: 4px !important"><?php echo $data->email ?></td>
		        <td class="align-middle text-center" style="padding: 4px !important"><?php echo ucwords($data->alamat) ?></td>
		        <td class="align-middle text-center" style="padding: 4px !important"><?php echo $data->kategori_transaksi ?></td>
		        <td class="align-middle text-center" style="padding: 4px !important"><?php 
		            $tanggal = date('Y-m-d', strtotime($data->tgl_bayar));
		            $jam = date('H:i:s', strtotime($data->tgl_bayar));
		            echo $this->M_Admin->tanggal_indo($tanggal, true).' - '. $jam; ?></td>
		        <td class="align-middle text-center">Rp. <?php echo number_format($data->jumlah_bayar,0,",","."); ?></td>
		    </tr>
		    <?php 
		    $total += $data->jumlah_bayar;
		    } ?>
		    <tr>
		        <td colspan="8" class="align-middle"><strong>TOTAL</strong></td>
		        <td class="align-middle text-center"><strong>Rp. <?php echo number_format($total,0,",",".");?></strong></td>
		    </tr>
	  	</tbody>
	</table>
	</div>
	</div>
</body>
<script type="text/javascript">
 	window.print();
    setTimeout(function(){window.close()}, 1000);
</script>
</html>