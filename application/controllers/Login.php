<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		//Do your magic here
		if ($this->session->userdata('akses') == 'admin' or $this->session->userdata('akses') == 'superadmin' AND $this->session->userdata('status') == 'login') 
		{
			redirect(base_url().'admin','refresh');
		}
		else if ($this->session->userdata('akses') == 'pendaftar' AND $this->session->userdata('status') == 'login')
		{
			redirect(base_url().'pendaftar','refresh');
		}
	}

	public function pendaftar()
	{
		$data['title'] 		= 'Login Pendaftar - SMK Permata 1 Kota Bogor';
		$data['jurusan']	= $this->db->query("SELECT * FROM jurusan")->result();
		$this->load->view('v_pendaftar/login', $data);
	}

	public function admin()
	{
		$data['title'] = 'Login Administrator - SMK Permata 1 Kota Bogor';
		$this->load->view('v_admin/login', $data);
	}

	public function pendaftar_login()
	{
		$username 	= $this->input->post('username');
		$password	= $this->input->post('password');
		$this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run() == true)
        {
        	$where = array('nisn'=>$username, 'tgl_lahir'=>$password);
                
        	$pendaftar 	= $this->db->get_where('pendaftar', $where);
			$p 			= $pendaftar->row();
			$u 			= $this->db->get_where('ujian', "ujian.nisn = '$username'")->row();
			$cek	 	= $pendaftar->num_rows();
	                
			if($cek > 0)
			{
				$session = array
						(
	                    	'nisn' => $p->nisn, 
	                    	'nama' => $p->nama, 
	                    	'jurusan' => $p->kd_jurusan, 
	                    	'token'	=> $u->token,
	                    	'no_ujian' => $u->no_ujian,
	                    	'akses'	=> 'pendaftar',
	                    	'status' => 'login',
	                    );
				$this->session->set_userdata($session);
		       	redirect(base_url().'pendaftar','refresh');
        	}
        	else
        	{
        		$this->session->set_flashdata('message_name',"<div class='alert alert-danger text-center'><strong>Login Gagal!</strong><br>Username atau Password Salah</div>");
				redirect(base_url().'login/pendaftar');
        	}
		}
		else
		{
			$this->session->set_flashdata('message_name',"<div class='alert alert-danger text-center'><strong>Login Gagal!</strong><br>Harap isi Username dan Password</div>");
			redirect(base_url().'login/pendaftar');
		}
	}

	public function pendaftar_daftar()
	{
		$this->load->model('M_Admin');

		$nama = $this->input->post('nama');
     	$tanggal_lahir = $this->input->post('tanggal_lahir');
	    $jenis_kelamin = $this->input->post('jenis_kelamin');
	    $no_telp = $this->input->post('no_telp');
	    $email = $this->input->post('email');
	    $nisn = $this->input->post('nisn');
	    $jurusan = $this->input->post('jurusan');
	    $alamat = $this->input->post('alamat');
	    $rt_rw = $this->input->post('rt_rw');
	    $kelurahan = $this->input->post('kelurahan');
	    $kecamatan = $this->input->post('kecamatan');
	    $kota = $this->input->post('kota');
	    $kodepos = $this->input->post('kodepos');
	    $tanggal_daftar = date("Y-m-d");

	    $this->form_validation->set_message('required', 'Form <b>%s</b> harus diisi');
      	$this->form_validation->set_message('is_unique', '<b>%s</b> sudah terdaftar');
      	$this->form_validation->set_message('exact_length', '<b>%s</b> harus terdiri dari 10 digit nomor');

      	$this->form_validation->set_rules('nama','Nama','required');
      	$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','trim|required');
      	$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','trim|required');
      	$this->form_validation->set_rules('no_telp','No. Telepon','trim|required');
      	$this->form_validation->set_rules('email','E - Mail','trim|required|valid_email|is_unique[pendaftar.email]');
      	$this->form_validation->set_rules('nisn','NISN','trim|required|exact_length[10]|is_unique[pendaftar.nisn]');
      	$this->form_validation->set_rules('jurusan','Jurusan','trim|required');
      	$this->form_validation->set_rules('alamat','Alamat','trim|required');
      	$this->form_validation->set_rules('kelurahan','Kelurahan','trim|required');
      	$this->form_validation->set_rules('kecamatan','Kecamatan','trim|required');
      	$this->form_validation->set_rules('kota','Kota/Kabupaten','trim|required');
      	$this->form_validation->set_rules('kodepos','Kode Pos','trim|required');
      	$alamatlengkap = $alamat.' RT '.$rt_rw.' Kel.'.$kelurahan.' Kec.'.$kecamatan.' '.$kota.' '.$kodepos;

      	if($this->form_validation->run() == true)
      	{
      		$pendaftar = array
      			(
		            'nama' => $nama,
		            'tgl_lahir' => $tanggal_lahir,
		            'jenis_kelamin' => $jenis_kelamin,
		            'no_telp' => $no_telp,
		            'email' => $email,
		            'nisn' => $nisn,
		            'kd_jurusan' => $jurusan,
		            'alamat' => $alamatlengkap,
		            'tgl_daftar' =>  $tanggal_daftar,
          		);

         	$orangtua = array
         		(
            		'nisn' => $nisn,
          		);

          	$no_ujian = array
          		(
		            'no_ujian' => $this->M_Admin->no_ujian($jurusan),
		            'nisn' => $nisn,
          		);

          	$this->db->insert('pendaftar', $pendaftar);
          	$this->db->insert('ujian', $no_ujian);
          	$this->db->insert('orangtua',$orangtua);
          	$this->session->set_flashdata('message_name',"<div class='alert alert-success text-center'><strong>Sukses!</strong><br>Data sudah terdaftar</div>");
          	redirect(base_url().'login/pendaftar');
      	}
      	else
        {
	        $data['pendaftar']	= $this->db->query("SELECT * FROM pendaftar")->result();
			$data['jurusan']	= $this->db->query("SELECT * FROM jurusan")->result();
	        $data['title']		= "SMK Permata 1 Kota Bogor - Aplikasi Penerimaan Peserta Didik Baru";

        	$this->load->view('v_pendaftar/login', $data);
        }
	}

	public function admin_login()
	{
		$username 	= $this->input->post('username');
		$password	= $this->input->post('password');
		$this->form_validation->set_rules('username','Username','required');
        $this->form_validation->set_rules('password','Password','required');

        if($this->form_validation->run() == true)
        {
        	$where = array('username'=>$username, 'password'=>md5($password));
                
        	$data = $this->db->get_where('admin',$where);
			$d = $this->db->get_where('admin',$where)->row();
			$cek = $data->num_rows();
	                
			if($cek > 0)
			{
				$session = array
						(
	                    	'id' => $d->id, 
	                    	'nama_admin' => $d->nama, 
	                    	'username' => $d->username, 
	                    	'status' => 'login',
	                    	'akses' => $d->akses,
	                    );
				$this->session->set_userdata($session);
		       	redirect(base_url().'admin','refresh');
        	}
        	else
        	{
        		$this->session->set_flashdata('message_name',"<div class='alert alert-danger'><strong>Login Gagal!</strong><br>Username atau Password Salah</div>");
				redirect(base_url().'login/admin');
        	}
		}
		else
		{
			$this->session->set_flashdata('message_name',"<div class='alert alert-danger'><strong>Login Gagal!</strong><br>Harap isi Username dan Password</div>");
			redirect(base_url().'login/admin');
		}
	}
}
?>