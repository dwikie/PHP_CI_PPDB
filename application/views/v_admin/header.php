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
<body style="background-color: #f9f9f9 !important">
	<div class="d-flex toggled" id="wrapper">
    <!-- Sidebar -->
    <div class=" text-light" id="sidebar-wrapper">
      <div class="list-group list-group-flush" id="">
      
        <div class="sidebar-heading text-center font-weight-bold" style="background-color: #292e33; height: 300px;" id="card-admin">
            <i class="fa fa-user-circle" style="font-size: 200px;" aria-hidden="true"></i>
            <div class="card-body">
              <h4 class="card-title"><?php echo $this->session->userdata('nama_admin') ?></h4>
            </div>
        </div> 

        <div id="side-scroll-items" class="">
        <a href="<?php echo base_url().'admin'; ?>" id="dashboard" class="list-group-item list-group-item-action bg-dark text-light"><i class="fas fa-tachometer-alt"></i> Dashboard</a>

        <a href="#datapendaftar" class="list-group-item list-group-item-action bg-dark text-light" data-toggle="collapse"><span class="fa fa-user"></span> Data Pendaftar<span class="float-right dropdown-toggle"></span></a>
        
        <div id="datapendaftar" class="collapse" data-parent="#accordion" >
          <a href="<?php echo base_url().'admin/pendaftar'; ?>" class="pl-4 pt-2 pb-2 list-group-item list-group-item-action text-light">Pendaftar</a>
          
          <a href="<?php echo base_url().'admin/orangtua'; ?>" class="pl-4 pt-2 pb-2 list-group-item list-group-item-action text-light">Orangtua</a>
        </div>

        <a href="<?php echo base_url().'admin/ujian'; ?>" id="dashboard" class="list-group-item list-group-item-action bg-dark text-light"><i class="far fa-edit"></i> Hasil Ujian</a>

        <a href="<?php echo base_url().'admin/transaksi'; ?>" class="list-group-item list-group-item-action bg-dark text-light"><span class="fa fa-tasks"></span> Riwayat Transaksi</a>

        <a href="#jurusan" class="list-group-item list-group-item-action bg-dark text-light" data-toggle="collapse"><i class="fas fa-user-graduate"></i> Jurusan<span class="float-right dropdown-toggle"></span></a>
        
        <div id="jurusan" class="collapse" data-parent="#accordion" >
          <a href="<?php echo base_url().'admin/jurusan'; ?>" class="pl-4 pt-2 pb-2 list-group-item list-group-item-action text-light">Data Jurusan</a>
          
          <a href="<?php echo base_url().'admin/soal'; ?>" class="pl-4 pt-2 pb-2 list-group-item list-group-item-action text-light">Soal Jurusan</a>
        </div>

        <a href="#laporan" class="list-group-item list-group-item-action bg-dark text-light" data-toggle="collapse"><span class="fa fa-print"></span> Laporan<span class="float-right dropdown-toggle"></span></a>
        
        <div id="laporan" class="collapse" data-parent="#accordion" >
          <a href="<?php echo base_url().'admin/laporan_pendaftar'; ?>" class="pl-4 pt-2 pb-2 list-group-item list-group-item-action text-light">Laporan Pendaftar</a>
          
          <a href="<?php echo base_url().'admin/laporan_transaksi'; ?>" class="pl-4 pt-2 pb-2 list-group-item list-group-item-action text-light" >Laporan Transaksi</a>
        </div>

        <a href="#utilitas" class="list-group-item list-group-item-action bg-dark text-light" data-toggle="collapse"><span class="fa fa-cog"></span> Utilitas<span class="float-right dropdown-toggle"></span></a>
        
        <div id="utilitas" class="collapse" data-parent="#accordion" >
          <a href="<?php echo base_url().'admin/info_admin'; ?>" class="pl-4 pt-2 pb-2 list-group-item list-group-item-action text-light">Info Admin</a>
          
          <a href="<?php echo base_url().'admin/ganti_password'; ?>" class="pl-4 pt-2 pb-2 list-group-item list-group-item-action text-light">Ganti Password</a>
          
          <a href="<?php echo base_url().'admin/logout'; ?>" class="pl-4 pt-2 pb-2 list-group-item list-group-item-action text-light">Keluar</a>
        </div>
        </div>
      </div>
    </div>
    
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-md navbar-dark border-bottom mb-3 d-flex justify-content-between shadow-sm" style="background-color: #5bc0de">

        <button class="btn btn-primary shadow-none border-0 text-white" id="menu-toggle" style="background-color: #4899b1;"><i class="fas fa-bars"></i> Menu</button>

        <!-- <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button> -->
        <div class="dropdown dropleft">
        <button type="button" class="text-white rounded-circle" data-toggle="dropdown" id="notif" style="text-decoration: none; background-color: #4899b1; border: transparent; font-size: 20px;">
          <span style="position: absolute; 
          right: 18px; 
          top: -3px; 
          font-size: 10px;
          padding: 3px 6px 3px 6px !important; 
          background-color: crimson; 
          border: 1px solid white; padding: 3px;
          -webkit-touch-callout: none;
          -webkit-user-select: none;
          -khtml-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;" class="rounded-circle text-white shadow-sm">100</span><i class="fa fa-bell"></i>
        </button>
        <div class="dropdown-menu shadow pb-0" style="width: 500px;">
          <h5 class="dropdown-header border-bottom"><i class="fa fa-tasks"></i> Berkas Pembayaran</h5>
          <a class="dropdown-item p-3" href="#" style="background-color: #f8f9fa"><i class="fa fa-file"></i>
            NIM - Nama - DateTime
          </a>
          <a href="#" class="dropdown-item text-center p-3 border-top">Selengkapnya <i class="fa fa-arrow-right"></i></a>
        </div>
      </div>

      </nav>

  <!-- /#wrapper -->

  <!-- Bootstrap core JavaScript -->

  <!-- Menu Toggle Script -->
<script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
</script>

