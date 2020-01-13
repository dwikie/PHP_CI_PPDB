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
	<nav class="navbar navbar-expand-md shadow-sm" style="background: #73a1cb; justify-content: space-between;">
        <div>
            <a href="<?php echo base_url().'pendaftar' ?>" class="navbar-brand" title="Aplikasi Ujian Online" style="text-decoration: none; font-size: 18px;"> <strong class="text-white">PPDB SMK PERMATA 1 BOGOR</strong>
            </a>

            <ul class="navbar-nav d-inline-flex">
                <li class="nav-item">
                    <a href="<?php echo base_url().'pendaftar/ujian' ?>" class="menu_pendaftar nav-link" style="color: #e5e5e5; border-top: 2px solid transparent">Ujian Masuk</a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url().'pendaftar/orangtua' ?>" class="menu_pendaftar nav-link" style="color: #e5e5e5; border-top: 2px solid transparent">Data Orangtua</a>
                </li>

                <li class="nav-item">
                    <a href="<?php echo base_url().'pendaftar/pembayaran' ?>" class="menu_pendaftar nav-link" style="color: #e5e5e5; border-top: 2px solid transparent">Pembayaran</a>
                </li>
            </ul>
        </div>
        
            
        <div class="dropdown">
            <button type="button" class="btn btn-default dropdown-toggle text-light" data-toggle="dropdown" style="background: #6790b6;">
                <i class="fas fa-user"></i>
            </button>
            <div class="dropdown-menu" style="left: -90px; top: 45px;">
                <a class="dropdown-item" href="#">Edit Data</a>
                <a class="dropdown-item" href="<?php echo base_url().'pendaftar/logout' ?>">Logout</a>
            </div>
        </div>
    </nav>