<div class="container-fluid mb-4">
	<div class="border-bottom bg-white p-3 shadow-sm">
		<div class="border-bottom shadow-sm p-3 mb-4" style="margin: -1rem -1rem 1.5rem -1rem !important; font-size: 28px"><i class="fas fa-file-alt"></i> Laporan Pendaftar</div>

		<h5 class="border-bottom mb-3 text-center mt-4"><strong>Filter Laporan</strong></h5>

		<script type="text/javascript">
		$(document).ready(function () 
		{
    		$('#checkBtn1').click(function() 
    		{
      			checked = $("input[type=checkbox]:checked").length;

	      		if (!checked) 
	      		{
	        		alert("Mohon pilih setidaknya satu checkbox");
	        		return false;
      			}

    		});
		});
		</script>

		<script type="text/javascript">
		$(document).ready(function () 
		{
    		$('#checkBtn2').click(function() 
    		{
      			checked = $("input[type=checkbox]:checked").length;

      			if (!checked) 
      			{
        			alert("Mohon pilih setidaknya satu checkbox");
        			return false;
      			}
    		});
		});
		</script>

		<form method="POST">
			<div class="row justify-content-center align-items-center d-flex">
				<div class="col-sm-2 mb-2">
					<div class="mb-2">
						<label class="col-sm-4"><strong>Tanggal</strong></label>
					</div>
				</div>
				<div class="col-sm-4 mb-2">
					<div class="mb-2">
						<input type="date" name="tanggal1" class="form-control" required="">
					</div>
				</div>
				<div class="col-sm-2 mb-2">
					<div class="mb-2">
						<label class="col-sm-4"><strong>Sampai</strong></label>
					</div>
				</div>
				<div class="col-sm-4 mb-4">
					<div class="mb-2">
						<input type="date" name="tanggal2" class="form-control" required="">
					</div>
				</div>
			</div>
			<!-- checkbox -->
			<div class="row justify-content-center align-items-center">
				<div class="col-sm-2 mb-4 ">
					<div class="mb-2">
						<label class="col-sm-4"><strong>Status Ujian</strong></label>
					</div>
				</div>

				<div class="col-sm-4 mb-4">
					<div class="form-check d-block">
				        <label class="form-check-label" for="lulus">
				          	<input type="checkbox" class="form-check-input" id="lulus" name="lulus" value="Lulus">Lulus
				        </label>
				    </div>

				    <div class="form-check">
				        <label class="form-check-label" for="tlulus">
				          	<input type="checkbox" class="form-check-input" id="tlulus" name="tidaklulus" value="Tidak lulus">Tidak lulus
				        </label>
				    </div>

				    <div class="form-check">
				        <label class="form-check-label" for="bujian">
				          	<input type="checkbox" class="form-check-input" id="bujian" name="belumujian" value="Belum ujian">Belum mengikuti ujian
				        </label>
				    </div>
				</div>

				<div class="col-sm-2 mb-4" style="">
					<div class="mb-2">
						<label class="col-sm-4"><strong>Status<br>Pembayaran</strong></label>
					</div>
				</div>

				<div class="col-sm-4 mb-4">
					<div class="form-check d-block">
				        <label class="form-check-label" for="check1">
				          	<input type="checkbox" class="form-check-input" id="check1" name="lunas" value="Lunas">Ujian - Lunas
				        </label>
			        </div>

			        <div class="form-check">
				        <label class="form-check-label" for="check1">
				          	<input type="checkbox" class="form-check-input" id="check1" name="belumlunas" value="Belum lunas">Ujian - Belum lunas
				        </label>
			        </div>

				</div>

			</div>
			<div class="d-flex justify-content-center align-items-center">
			      <button type="submit" class="btn btn-secondary" formaction="<?php echo base_url().'admin/laporan_pendaftar_print' ?>" id="checkBtn1" style="border-radius: 4px 0px 0px 4px" formtarget="_blank">
			       <i class="fas fa-print"></i> Print
			      </button>
			      <button type="submit" class="btn btn-secondary" formaction="<?php echo base_url().'admin/laporan_pendaftar_pdf/'?>" id="checkBtn2" style="border-radius: 0px 4px 4px 0px" formtarget="_blank">
			        <i class="fas fa-file-pdf"></i> PDF
		      </button>
		    </div>
		</form>

		<h5 class="border-bottom mb-3 text-center mt-4"><strong>Data Pendaftar</strong></h5>
		<div class="table-responsive">
		  	<table class="table table-bordered table-striped table-hover" id = "table-laporan">
		    <thead>
		      <tr>
		      	<th class="align-middle text-center">No</th>
		        <th class="align-middle text-center">Nama</th>
		        <th class="align-middle text-center">Tanggal Lahir</th>
		        <th class="align-middle text-center">Jenis Kelamin</th>
		        <th class="align-middle text-center">NISN</th>
		        <th class="align-middle text-center">Alamat</th>
		        <th class="align-middle text-center">No Tes</th>
		        <th class="align-middle text-center">Nilai</th>
		        <th class="align-middle text-center">Status</th>
		        <th class="align-middle text-center">Pembayaran</th>
		      </tr>
		    </thead>
		    <tbody>
		      <?php
		      $no = 1;
		      foreach ($pendaftar as $data) {
		      ?>
		      <tr>
		      	<td class="align-middle text-center"><?php echo $no++; ?></td>
		      	<td class="align-middle text-center"><?php echo ucwords($data->nama) ?></td>
		        <td class="align-middle text-center"><?php echo date('d F Y',strtotime($data->tgl_lahir)); ?></td>
		        <td class="align-middle text-center"><?php echo $data->jenis_kelamin ?></td>
		        <td class="align-middle text-center"><?php echo $data->nisn ?></td>
		        <td class="align-middle text-center"><?php echo ucwords($data->alamat) ?></td>
		        <td class="align-middle text-center"><?php echo $data->no_ujian ?></td>
		        <td class="align-middle text-center">
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
		    <?php } ?>
			</tbody>
			</table>
		</div>
	</div>
</div>