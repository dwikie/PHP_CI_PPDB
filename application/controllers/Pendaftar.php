<?php  
defined('BASEPATH') OR exit('No direct script access allowed');

class Pendaftar extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		//Do your magic here
		if ($this->session->userdata('akses') != 'pendaftar' || $this->session->userdata('status') != 'login') 
		{
			$this->session->set_flashdata('message_name', "<div class='alert alert-danger'><strong>Harap login terlebih dahulu</strong></div>");
			redirect(base_url().'login/pendaftar','refresh');
		}
	}

	public function index()
	{
		$nisn = $this->session->userdata('nisn');
		$pendaftar = $this->db->query("SELECT * FROM pendaftar where pendaftar.nisn='$nisn'");
		$tes = $this->db->query("SELECT * FROM ujian where ujian.nisn='$nisn'");
		$judul = "SMK Permata 1 Bogor - Aplikasi Penerimaan Peserta Didik Baru";

		$data['pendaftar'] 	= $pendaftar->row_array();
		$data['ujian'] 		= $tes->row_array();
		$title['title'] 	= "SMK Permata 1 Bogor - Penerimaan Peserta Didik Baru";

		$this->load->view('v_pendaftar/header', $title, FALSE);
		$this->load->view('v_pendaftar/index', $data, FALSE);
		$this->load->view('v_pendaftar/footer');
	}

	public function ujian()
	{
		$this->load->library('encryption');
		$title['title'] = "SMK Permata 1 Bogor - Aplikasi Penerimaan Peserta Didik Baru";

		$this->load->view('v_pendaftar/header', $title);
		$this->load->view('v_pendaftar/ujian_pilih');
		$this->load->view('v_pendaftar/footer');
	}

	public function orangtua()
	{
		$nisn = $this->session->userdata('nisn');
  		$ortu = $this->db->query("SELECT * FROM orangtua where orangtua.nisn='$nisn'");

  		$data['ortu'] = $ortu->row_array();
  		$title['title'] = "SMK Permata 1 Bogor - Penerimaan Peserta Didik Baru";

  		$this->load->view('v_pendaftar/header', $title);
  		$this->load->view('v_pendaftar/orangtua', $data);
  		$this->load->view('v_pendaftar/footer');
	}

	public function orangtua_update()
	{
		$nisn = $this->session->userdata('nisn');

		$nama_ayah 			= $this->input->post('nama_ayah');
	    $nik_ayah 			= $this->input->post('nik_ayah');
	    $pendidikan_ayah 	= $this->input->post('pendidikan_ayah');
	    $pekerjaan_ayah 	= $this->input->post('pekerjaan_ayah');
	    $no_telp_ayah		= $this->input->post('no_telp_ayah');
	    $penghasilan_ayah 	= $this->input->post('penghasilan_ayah');

	    $nama_ibu 			= $this->input->post('nama_ibu');
	    $nik_ibu 			= $this->input->post('nik_ibu');
	    $pendidikan_ibu 	= $this->input->post('pendidikan_ibu');
	    $pekerjaan_ibu 		= $this->input->post('pekerjaan_ibu');
	    $no_telp_ibu 		= $this->input->post('no_telp_ibu');
	    $penghasilan_ibu 	= $this->input->post('penghasilan_ibu');

	    $nama_wali 			= $this->input->post('nama_wali');
	    $nik_wali		 	= $this->input->post('nik_wali');
	    $pendidikan_wali	= $this->input->post('pendidikan_wali');
	    $pekerjaan_wali 	= $this->input->post('pekerjaan_wali');
	    $no_telp_wali 		= $this->input->post('no_telp_wali');
	    $penghasilan_wali 	= $this->input->post('penghasilan_wali');

	    $data= array
	    	(
		      'nama_ayah' => $nama_ayah,
		      'nik_ayah' => $nik_ayah,
		      'pendidikan_ayah' => $pendidikan_ayah,
		      'pekerjaan_ayah' => $pekerjaan_ayah,
		      'no_telp_ayah' => $no_telp_ayah,
		      'penghasilan_ayah' => $penghasilan_ayah,

		      'nama_ibu' => $nama_ibu,
		      'nik_ibu' => $nik_ibu,
		      'pendidikan_ibu' => $pendidikan_ibu,
		      'pekerjaan_ibu' => $pekerjaan_ibu,
		      'no_telp_ibu' => $no_telp_ibu,
		      'penghasilan_ibu' => $penghasilan_ibu,

		      'nama_wali' => $nama_wali,
		      'nik_wali' => $nik_wali,
		      'pendidikan_wali' => $pendidikan_wali,
		      'pekerjaan_wali' => $pekerjaan_wali,
		      'no_telp_wali' => $no_telp_wali,
		      'penghasilan_wali' => $penghasilan_wali,
    		);
	    $this->db->update('orangtua',$data,"orangtua.nisn = '$nisn'");
	    $this->session->set_flashdata('message_name',"<div class='alert alert-success text-center'><strong>Sukses!</strong><br>Data berhasil disimpan</div>");
	    redirect(base_url().'pendaftar/orangtua');
	}

	public function pembayaran()
	{
		$error['error'] = "";
		$title['title'] = "SMK Permata 1 Bogor - Penerimaan Peserta Didik Baru";

		$this->load->view('v_pendaftar/header', $title);
		$this->load->view('v_pendaftar/pembayaran', $error);
	 	$this->load->view('v_pendaftar/footer');
	}

	public function upload()
	{
	  	$nisn = $this->session->userdata('nisn');
	  	$bukti = $this->input->post('bukti');

	  	$config['upload_path']          = './upload/pendaftar/'.$nisn;
	  	$config['allowed_types']        = 'jpg|jpeg|png';
	  	$config['max_size']             = 2048;

  		$this->load->library('upload', $config);
  
		if (!is_dir('upload')) 
		{
			mkdir('./upload', 0777, true);
		}

		if (!is_dir('upload/pendaftar')) 
		{
			mkdir('./upload/pendaftar', 0777, true);
		}


  		if (!is_dir('upload/pendaftar/'.$nisn)) 
  		{
        	mkdir('./upload/pendaftar/'.$nisn, 0777, true);
      	}

        if (!$this->upload->do_upload('bukti')) { 
            // upload failed
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('v_pendaftar/header');
            $this->load->view('v_pendaftar/pembayaran', $error);
            $this->load->view('v_pendaftar/footer');
        } 
        else 
        {
            // upload success
            $this->session->set_flashdata('message_name',"<div class='alert alert-success text-center'><strong>Sukses!</strong><br>File berhasil diupload</div>");
				redirect(base_url().'pendaftar/pembayaran');
        }
}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'login/pendaftar');
	}

}

/* End of file Pendaftar.php */
/* Location: ./application/controllers/Pendaftar.php */
?>