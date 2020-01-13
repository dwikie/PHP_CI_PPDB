<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Ujian extends CI_Controller {
	function __construct()
	{
		parent::__construct();
		//Do your magic here
		$this->load->model('M_Pendaftar');
      	$this->load->library('pagination');
      	$this->load->library('encryption');
      	if($this->session->userdata('status') != "login" && $this->session->userdata('nisn') == null || $this->session->userdata('status') != "login" && $this->session->userdata('nisn') == "")
      	{
        $this->session->set_flashdata('message_name', "<div class='alert alert-danger'><strong>Harap login terlebih dahulu</strong></div>");
        redirect(base_url().'login/pendaftar');
        $this->session->sess_destroy();
      	}
	}

	public function index()
	{
		if ($this->session->userdata('nisn') > 0 &&  $this->session->userdata('token') == 0)
      	{
        	$this->session->set_flashdata('message_name', "<div class='alert alert-danger text-center'><strong>Harap lakukan pembayaran</strong></div>");
        	redirect(base_url().'pendaftar/ujian');
      	}
      	// 130000 adalah kependekan dari H(Jam format jam 24)i(meniit)s(detik) contoh 13:00:00 = 130000
      	else if ($this->session->userdata('nisn') > 0 &&  $this->session->userdata('token') == 1 && date('His') > "220000" || $this->session->userdata('nisn') > 0 &&  $this->session->userdata('token') == 1 && date('His') < "100000")
      	{
      		$this->session->set_flashdata('message_name', "<div class='alert alert-danger text-center'><strong>Belum waktunya ujian</strong></div>");
          	redirect(base_url().'pendaftar/ujian');
      	}
      	else if ($this->session->userdata('nisn') > 0 &&  $this->session->userdata('token') == 2)
      	{
         	$this->session->set_flashdata('message_name', "<div class='alert alert-danger text-center'><strong>Sudah melakukan ujian</strong></div>");
         	redirect(base_url().'pendaftar/ujian');
      	}

      	$jurusan		= $this->session->userdata('jurusan');
      	$no_ujian 		= $this->session->userdata('no_ujian');

      	$jumlah_soal	= $this->db->query("SELECT * FROM jurusan WHERE jurusan.kd_jurusan = '$jurusan'")->row();
      	$limit			= $jumlah_soal->jumlah_soal;

      	$data['soal'] 	= $this->db->query("SELECT * FROM ujian_soal where ujian_soal.kd_jurusan= '$jurusan' ORDER BY RAND() LIMIT $limit")->result_array();

      	$this->load->view('v_pendaftar/header');
	    $this->load->view('v_pendaftar/ujian', $data);
	    $this->load->view('v_pendaftar/footer');
	}

	public function simpan()
	{
		$jurusan		= $this->session->userdata('jurusan');
      	$no_ujian 		= $this->session->userdata('no_ujian');

	    $jumlah_soal	= $this->db->query("SELECT * FROM jurusan WHERE jurusan.kd_jurusan = '$jurusan'")->row();
      	$limit			= $jumlah_soal->jumlah_soal;

      	for ($i = 1; ; $i++) 
	    {
	      //limit simpan soal
	      if ($i > $limit) {
	          break;
	      }

	      $no_jawaban 	= "jawaban_no".$i;
	      $jawaban 		= $this->input->post($no_jawaban);

	      $no_soal 		= "soal_no".$i;
	      $soal 		= $this->input->post($no_soal);

	      $data 		= array
	      				(
	             			'no_ujian' => $no_ujian, 
	             			'kd_soal' => $soal,
	             			'kd_jawaban' =>$jawaban,
	              		);

	      $this->db->insert('ujian_detail', $data);
	    }

	    $token	= array
	    		(
                  	'token' => 2,
            	);

        $this->db->update('ujian', $token, "ujian.no_ujian = '$no_ujian'");
        $this->session->unset_userdata('token');
        $this->session->set_userdata('token', '2');

        //Cek Nilai dan Status Lulus
	    $jawaban 		= $this->db->query("SELECT kd_jawaban FROM ujian_detail WHERE ujian_detail.no_ujian='$no_ujian'")->result();
	    $jml_benar = 0;

	    foreach ($jawaban as $j) 
	    {
	      $kd_jawaban 	= $j->kd_jawaban;
	      $status 		= $this->db->query("SELECT status FROM ujian_jawaban WHERE ujian_jawaban.kd_jawaban='$kd_jawaban'")->row();
	      if ($status) 
	      {
	      	$jml_benar 	= $jml_benar + $status->status; 
	      }
	    }

	    $nilai = $jml_benar * 100 / $limit;

	    if ($nilai >= $this->M_Pendaftar->nilai_min($jurusan))
	    {
	      $data_tes    = array(
	                      'nilai' => $nilai,
	                      'status' => 'Lulus',
	                      );
	      $this->db->update('ujian', $data_tes, "ujian.no_ujian = '$no_ujian'");
	    }
	    else
	    {
	      $data_tes    = array(
	                      'nilai' => $nilai,
	                      'status' => 'Tidak lulus',
	                      );
	      $this->db->update('ujian', $data_tes, "ujian.no_ujian = '$no_ujian'");
	    }
	    redirect(base_url().'pendaftar/ujian');
	}

	public function hasil($nisn)
	{
		$k = $_GET['k'];
	    $no_ujian = $this->encryption->decrypt($k);

	    $cekhasil = $this->db->query("SELECT * FROM ujian_detail where ujian_detail.no_ujian='$no_ujian'")->num_rows();

	    if($this->session->userdata('nisn') > 0 && $cekhasil < 1)
	    {
	        $this->session->set_flashdata('message_name', "<div class='alert alert-danger'><strong>Belum melakukan ujian</strong></div>");
	        redirect(base_url().'pendaftar/ujian');
	    }
	    else if ($this->session->userdata('id') > 0 && $cekhasil < 1)
	    {
	        $this->session->set_flashdata('message_name', "<div class='alert alert-danger'><strong>Belum melakukan ujian</strong></div>");
	        redirect(base_url().'admin/ujian');
	    }

	    $this->load->library('pdfgenerator');

	    $pendaftar = $this->db->query("SELECT * FROM pendaftar where pendaftar.nisn='$nisn'")->row();
	    $nama = $pendaftar->nama;
	    $data['ujian_detail'] 	= $this->db->query("SELECT * FROM ujian_detail where ujian_detail.no_ujian='$no_ujian'")->result_array();
	    $data['pendaftar'] 		= $pendaftar;
	    $data['ujian'] 			= $this->db->query("SELECT * FROM ujian where ujian.no_ujian='$nisn'")->row();
	    $data['title'] 			= "Hasil Ujian - Sistem Penerimaan Peserta Didik SMK Permata 1 Bogor";

	    $html = $this->load->view('v_pendaftar/ujian_detail', $data, true);
	    if ($this->session->userdata('id'))
	    {
	      $this->pdfgenerator->generate_view($html,'Hasil Ujian - '.$nama);
	    }
	    else
	    {
	      $this->pdfgenerator->generate($html,'Hasil Ujian - '.$nama);
	    }
	}
}

/* End of file Ujian.php */
/* Location: ./application/controllers/Ujian.php */
?>