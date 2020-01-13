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
		<h5 class="border-bottom mb-3 text-center mt-4"><strong>Laporan Pendaftar</strong></h5>
		<div class="mb-4 d-flex justify-content-between">
			<div><?php echo $filter ?></div>
			<?php 
				$mulai 			= date('Y-m-d', strtotime($tanggal_mulai));
				$filter_mulai 	= $this->M_Admin->tanggal_indo($mulai, false);

				$selesai 		= date('Y-m-d', strtotime($tanggal_selesai));
				$filter_selesai	= $this->M_Admin->tanggal_indo($selesai, false);
			?>
			<div><?php echo $filter_mulai.' - '.$filter_selesai ?></div>	
		</div>

		<div class="table-responsive">
        <table class="table table-striped table-bordered p-0">
            <thead>
                <tr>
                    <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important;">No</th>
                    <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important;">Nama</th>
                    <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important;">Tanggal Lahir</th>
                    <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important;">Jenis Kelamin</th>
                    <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important;">NISN</th>
                    <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important;">Alamat</th>
                    <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important;">No Tes</th>
                    <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important;">Nilai</th>
                    <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important;">Status</th>
                    <th class="align-middle text-center" style="padding: 2px !important; background-color: #3399ff !important;">Pembayaran</th>
                </tr>
            </thead>
            <tbody>
            <?php $no = 1; 
            foreach ($pendaftar as $data): ?>
                <tr>
                    <td class="align-middle text-center" style="padding: 4px !important"><?php echo $no++; ?></td>
                    <td class="align-middle text-center" style="padding: 4px !important"><?php echo ucwords($data->nama) ?></td>
                    <td class="align-middle text-center" style="padding: 4px !important"><?php echo $data->tgl_lahir ?></td>
                    <td class="align-middle text-center" style="padding: 4px !important"><?php echo $data->jenis_kelamin ?></td>
                    <td class="align-middle text-center" style="padding: 4px !important"><?php echo $data->nisn ?></td>
                    <td class="align-middle text-center" style="padding: 4px !important"><?php echo ucwords($data->alamat) ?></td>
                    <td class="align-middle text-center" style="padding: 4px !important"><?php echo $data->no_ujian ?></td>
                    <td class="align-middle text-center" style="padding: 4px !important">
                      <?php
                        if ($data->nilai === NULL) {
                           echo "Belum Mengikuti Tes";
                         }
                         else
                         {
                          echo $data->nilai;
                         }
                      ?>
                    </td>
                    <td class="align-middle text-center">
                      <?php
                        if ($data->status === NULL) {
                           echo "Belum Mengikuti Tes";
                         }
                         else
                         {
                          echo $data->status;
                         }
                      ?>
                    </td>
                    <td class="align-middle text-center">
                      <?php if ($data->token === NULL)
                      {
                        echo "Belum lunas";
                      }
                      else
                      {
                        echo "Lunas";
                      }
                      ?>
                    </td>
                </tr>
            <?php 
            endforeach ?>
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