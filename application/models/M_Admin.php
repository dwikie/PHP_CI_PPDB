<?php
defined('BASEPATH') or exit('No direct Script access allowed');

class M_Admin extends CI_Model
{
	function no_ujian($jurusan)
	{
	$tgl = date('ymd');

    $this->db->select('right(no_ujian,3) as kode', false);
    $this->db->order_by('no_ujian','desc');
    $this->db->limit(1);

    $query 		= $this->db->get("ujian where left(no_ujian,3)='$jurusan'");
    if ($query->num_rows()!=0)
    {
      	$data	= $query->row();
      	$kode 	= intval($data->kode)+1;
    }
    else
    {
      	$kode=1;
    }

    $kodemax = /*substr(strtoupper($nama), 0, 3).'/'.*/date('y', strtotime($tgl)).'/'.str_pad($kode,3,"0", STR_PAD_LEFT); 
    $kodejadi = $jurusan.'-'.$kodemax;

    return $kodejadi;
    }

    public function no_transaksi($kategori, $no_ujian)
    {
        $kodebayar = $kategori.'/'.$no_ujian;
        return $kodebayar;
    }

    public function kd_soal($jurusan)
    {	
    	$this->db->select('right(kd_soal,3) as kode', false);
	    $this->db->order_by('kd_soal','desc');
	    $this->db->limit(1);

	    $query 		= $this->db->get("ujian_soal where left(kd_soal,3)='$jurusan'");
	    if ($query->num_rows()!=0)
	    {
	      	$data	= $query->row();
	      	$kode 	= intval($data->kode)+1;
	    }
	    else
	    {
	      	$kode=1;
	    }

        $kodesoal = $jurusan.'S'.str_pad($kode,3,"0", STR_PAD_LEFT);
        return $kodesoal;
    }

    public function kd_jawaban($jurusan)
    {	
    	$this->db->select('right(kd_jawaban,3) as kode', false);
	    $this->db->order_by('kd_jawaban','desc');
	    $this->db->limit(1);

	    $query 		= $this->db->get("ujian_jawaban where left(kd_jawaban,3)='$jurusan'");
	    if ($query->num_rows()!=0)
	    {
	      	$data	= $query->row();
	      	$kode 	= intval($data->kode)+1;
	    }
	    else
	    {
	      	$kode=1;
	    }

        $kodesoal = $jurusan.'J'.str_pad($kode,3,"0", STR_PAD_LEFT);
        return $kodesoal;
    }

    function tanggal_indo($tanggal, $cetak_hari = false)
  	{
	    $hari = array 
	    	( 
	    		1 =>    'Senin',
				        'Selasa',
				        'Rabu',
				        'Kamis',
				        'Jumat',
				        'Sabtu',
				        'Minggu'
	        );
	        
	    $bulan = array 
	    	(	
	    		1 =>   'Januari',
			           	'Februari',
			          	'Maret',
			          	'April',
			          	'Mei',
			          	'Juni',
			          	'Juli',
			          	'Agustus',
			          	'September',
			          	'Oktober',
			          	'November',
			          	'Desember'
	        );

	    $split    = explode('-', $tanggal);
	    $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
	    
	    if ($cetak_hari) 
	    {
	      	$num = date('N', strtotime($tanggal));
	      	return $hari[$num] . ', ' . $tgl_indo;
	    }
	    return $tgl_indo;
  	}
}