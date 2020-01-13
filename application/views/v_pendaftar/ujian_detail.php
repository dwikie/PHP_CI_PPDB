<!DOCTYPE html>
<html><head>
    <title><?php echo $title ?></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="<?php echo base_url().'assets/datatable/datatables.js'; ?>"></script>
    <script type="text/javascript" src="<?php echo base_url().'assets/js/popper.min.js'; ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datatable/datatables.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/font/fontawesome-free-5.10.1-web/css/all.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/my.css';?>">
</head><body style="" class="bg-white">
	<!-- style="background-image: url('<?php echo base_url()."assets/bg/66344984_p0.jpg"; ?>');
				background-position: center;
				height: 200px;
				position: relative;
				display: block;
				background-repeat: no-repeat;" -->

	<div class="container-fluid">
		<div class="col-md-12 m-auto table-responsive-md">
			<div class="alignMe mb-4" style="">
			  	<?php 
			  	$nisn = $this->uri->segment(3);
			  	$no_ujian = $this->db->query("SELECT * FROM ujian WHERE nisn='$nisn'")->row(); ?>
			  	<p style="font-size: 18px;">
			  		<b>Nama</b> <?php echo $pendaftar->nama ?><br>
			  		<b>No Ujian</b> <?php echo $no_ujian->no_ujian ?><br>
			  	</p>
			</div>

			<table class="table table-bordered mb-4 table-striped" style="margin: auto;">
				
					<tr class="table-primary" style="">
						<th class="text-center" style="text-align: center; background-color: #b8daff !important">No</th>
						<th class="text-center" style="width: 40%; background-color: #b8daff !important">Soal</th>
						<th class="text-center" style="width: 40%; background-color: #b8daff !important">Jawaban</th>
						<th class="text-center" style="background-color: #b8daff !important">Status</th>
					</tr>
				</thead>
					<?php $no = 1; 
					foreach ($ujian_detail as $detail): ?>
						<?php 
						$kd_soal = $detail['kd_soal'];
						$kd_jawaban = $detail['kd_jawaban'];
						$soal = $this->db->query("SELECT * FROM ujian_soal WHERE ujian_soal.kd_soal='$kd_soal'")->row();
						$jawaban = $this->db->query("SELECT * FROM ujian_jawaban WHERE ujian_jawaban.kd_jawaban='$kd_jawaban'")->row(); ?>
						<tr>

							<td class="text-center" style="text-align: center"><?php echo $no ?></td>
							<td class="text-center"><?php echo substr($soal->soal,0,60) ?></td>
							<td class="text-center" style="text-align: center"><?php if (!$jawaban) {
								echo "Tidak dijawab";
							}
							else
							{
								echo substr($jawaban->jawaban,0,60);
							} ?></td>
							<td class="text-center"><?php 
															if (!$jawaban)
															{
																echo "Salah";
															}
															else if ($jawaban->status == '1')
															{
																echo "Benar";
															}
															else
															{
																echo "Salah";
															}
														?></td>
						</tr>
					<?php $no++;
					endforeach ?>
						<tr class="">
							<td colspan="3" class="font-weight-bold" style="font-weight: bold">NILAI</td>
							<td colspan="1" class="font-weight-bold text-center" style="text-align: center; font-weight: bold"><?php echo $no_ujian->nilai ?></td>
						</tr>
				</tbody>
			</table>
			<div class="col-md-4 text-center m-auto mb-4" style="">
				<div class="" style="font-size: 25px; text-align: center;">
					Dinyatakan<br>
					<strong><?php if ($no_ujian->status == "Lulus") 
																			{
																				echo '<p>Lulus'.'/'.'<del>Tidak lulus</del></p>';
																			}
																			else 
																			{
																				echo '<p>Tidak lulus'.'/'.'<del>Lulus</del></p>';
																			}
																	 		?></strong>
				</div>
			</div>
		</div>
	</div>
</body></html>