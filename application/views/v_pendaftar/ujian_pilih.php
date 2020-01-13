<div class="container-fluid">
	<div class="col-md-12 border bg-white mt-3 p-3 mb-3">
		<div class="mb-4 pb-2 border-bottom">
			<strong>UJIAN</strong>
		</div>
		<?php echo $this->session->flashdata('message_name'); ?>
		<div class="col-md-12 pl-4 mb-4" style="">
		<div class="table-responsive">
  	
		 <table class="table table-striped table-hover" id = "table-datatable" style="vertical-align: middle; text-align: center; justify-content: center;">
		    <thead>
		      <tr>
		      	<th class="align-middle">No</th>
		        <th class="align-middle">Ujian</th>
		        <th class="align-middle">Waktu Ujian</th>
		        <th class="align-middle">Opsi</th>
		      </tr>
		    </thead>
		    <tbody class="mb-2">
		      <?php
		      $no = 1;
		      ?>
		      <tr>
		      	<td class="align-middle"><?php echo $no; ?></td>
		      	<td class="align-middle">Ujian Masuk</td>
		        <td class="align-middle">
			        10.00 - 22.00
		    	</td>
		        <td class="align-middle">
		        	<a href="<?php echo base_url().'ujian/' ?>" class="btn btn-primary" style="background-color: #363942; border: none;"><span class="glyphicon glyphicon-pencil"></span> Mulai Ujian</a>
		        	<a href="<?php echo base_url().'ujian/hasil/'.$this->session->userdata('nisn').'?k='.urlencode($this->encryption->encrypt($this->session->userdata('no_ujian'))); ?>" class="btn btn-primary" style="background-color: #3cd070; border: none; <?php if ($this->session->userdata('token') == '2'){echo "display: inline-block";} else{echo "display: none";} ?>"><span class="glyphicon glyphicon-file"></span> Hasil Ujian</a>
		        </td>
		      </tr>
		  </tbody>
		</table>
		
		</div>
	</div>
</div>
</div>