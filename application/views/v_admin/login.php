<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="<?php echo base_url().'assets/datatable/datatables.js'; ?>"></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/datatable/datatables.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/font/fontawesome-free-5.10.1-web/css/all.css';?>">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/my.css';?>">
</head>
<body>
	<div class="container-fluid bg-img-overlay text-white" style="background-image: url('<?php echo base_url()  ?>assets/bg/65371180_p0.jpg');">
		<div class="col-md-5 text-center mb-4 mt-4">
			<div class="" style="font-weight: bold; font-size: 28px;">SMK PERMATA 1 KOTA BOGOR</div>
			<div class="mb-4" style="font-size: 18px;">Aplikasi Penerimaan Peserta Didik Baru</div>

			<form method="POST" action="<?php echo base_url().'login/admin_login' ?>">
				<div class="bg-white text-dark rounded shadow p-2">
					<div class="font-weight-bold border-bottom mb-2 p-3 shadow-sm" style="margin-left: -0.5rem; margin-right: -0.5rem; margin-top: -0.5rem">LOGIN ADMINISTRATOR</div>

					<?php echo $this->session->flashdata('message_name'); ?>

					<div class="form-group row p-2">
				    	<label class="col-md-2 col-form-label"><span class="fas fa-user-shield"></span></label>
				    	<div class="col-md-10">
				      		<input type="text" class="form-control" placeholder="Username" name="username" id="my_input" required="">
				    	</div>
				  	</div>

					<div class="form-group row p-2">
				    	<label class="col-md-2 col-form-label"><span class="fas fa-key"></span></label>
				    	<div class="col-md-10">
				      		<input type="password" class="form-control" placeholder="Password" name="password" id="my_input" required="">
				    	</div>
				  	</div>

					<button type="submit" class="btn btn-secondary mb-4">LOGIN</button>
				</div>
			</form>

		</div>
	</div>
</body>
<script type="text/javascript">
	$('.alert').alert().delay(3000).slideUp('slow');
</script>
</html>