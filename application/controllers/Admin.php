<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_controller
{
	
	function __construct()
	{
		parent::__construct();
		//Do your magic here
		if ($this->session->userdata('status') != "login" && $this->session->userdata('akses') != "admin" || $this->session->userdata('id') == NULL) 
		{
			$this->session->set_flashdata('message_name', "<div class='alert alert-danger'><strong>Harap login terlebih dahulu</strong></div>");
			redirect(base_url().'login/admin','refresh');
		}
		$this->load->model('M_Admin');
      	$this->load->library('encryption');
	}

	public function index()
	{
		$title['title']		= "SMK Permata 1 Kota Bogor - Aplikasi Penerimaan Peserta Didik Baru";
		$this->session->set_flashdata('message_name', "<div class='alert alert-primary'><strong>Belum melakukan ujian</strong></div>");
		$this->load->view('v_admin/header', $title, FALSE);
		$this->load->view('v_admin/index', FALSE);
		$this->load->view('v_admin/footer');
	}

	public function pendaftar()
	{
		$title['title']		= "SMK Permata 1 Kota Bogor - Aplikasi Penerimaan Peserta Didik Baru";
		$data['pendaftar']	= $this->db->query("SELECT * FROM pendaftar")->result();
		$data['jurusan']	= $this->db->query("SELECT * FROM jurusan")->result();
		$this->session->set_flashdata('message_name', "<div class='alert alert-primary'><strong>Belum melakukan ujian</strong></div>");
		$this->load->view('v_admin/header', $title, FALSE);
		$this->load->view('v_admin/pendaftar', $data,  FALSE);
		$this->load->view('v_admin/footer');
	}

	public function pendaftar_tambah()
	{
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
          	redirect(base_url().'admin/pendaftar');
      	}
      	else
        {
	        $modal['modal'] 	= 'show';
	        $data['pendaftar']	= $this->db->query("SELECT * FROM pendaftar")->result();
			$data['jurusan']	= $this->db->query("SELECT * FROM jurusan")->result();
	        $title['title']		= "SMK Permata 1 Kota Bogor - Aplikasi Penerimaan Peserta Didik Baru";

        	$this->load->view('v_admin/header', $title, FALSE);
			$this->load->view('v_admin/pendaftar', $data,  FALSE);
			$this->load->view('v_admin/footer', $modal);
        }
	}

	public function pendaftar_hapus($nisn)
	{
		$this->db->query("DELETE FROM pendaftar WHERE nisn='$nisn'");
		redirect(base_url().'admin/pendaftar','refresh');
	}

	public function pendaftar_update($nisn = NULL)
	{
		$cek						= $this->db->query("SELECT * FROM pendaftar WHERE nisn = '$nisn'")->num_rows();
		if ($cek < 1)
		{
			redirect(base_url().'err404','refresh');
		}

		$jpendaftar					= $this->db->query("SELECT * FROM pendaftar WHERE nisn = '$nisn'")->row();
		$data['pendaftar']			= $this->db->query("SELECT * FROM pendaftar WHERE nisn = '$nisn'")->row();
		$data['jurusan']			= $this->db->query("SELECT * FROM jurusan WHERE kd_jurusan != '$jpendaftar->kd_jurusan'")->result();
		$title['title']				= "SMK Permata 1 Kota Bogor - Aplikasi Penerimaan Peserta Didik Baru";
	    $this->load->view('v_admin/header', $title);
	    $this->load->view('v_admin/pendaftar_update',$data);
	    $this->load->view('v_admin/footer');
	}

	public function pendaftar_update_act($nisn)
	{
		$cek						= $this->db->query("SELECT * FROM pendaftar WHERE nisn = '$nisn'")->num_rows();
		if ($cek < 1)
		{
			redirect(base_url().'err404','refresh');
		}

		$nama 			= $this->input->post('nama');
     	$tanggal_lahir 	= $this->input->post('tgl_lahir');
	    $jenis_kelamin 	= $this->input->post('jenis_kelamin');
	    $no_telp 		= $this->input->post('no_telp');
	    $email 			= $this->input->post('email');
	    $nisnbaru 		= $this->input->post('nisn');
	    $jurusan 		= $this->input->post('jurusan');
	    $alamat 		= $this->input->post('alamat');

	    $this->form_validation->set_message('is_unique', '<div class="alert alert-danger">'.'<b>%s</b> sudah terdaftar'.'</div>');
        $this->form_validation->set_message('exact_length', '<div class="alert alert-danger">'.'<b>%s</b> harus terdiri dari 10 digit angka'.'</div>');
        $this->form_validation->set_message('valid_email', '<div class="alert alert-danger">'.'Masukan <b>%s</b> yang valid'.'</div>');
        $this->form_validation->set_message('required', '<div class="alert alert-danger">'.'Field <b>%s</b> Harus diisi'.'</div>');

        $this->form_validation->set_rules('nama','Nama','trim|required');
        $this->form_validation->set_rules('tgl_lahir','Tanggal Lahir','trim|required');
        $this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','trim|required');
        $this->form_validation->set_rules('no_telp','No. Telepon','trim|required');
        $this->form_validation->set_rules('email','E - Mail','trim|required|valid_email');
        $this->form_validation->set_rules('nisn','NISN','trim|exact_length[10]|required');
        $this->form_validation->set_rules('jurusan','Jurusan','trim|required');
        $this->form_validation->set_rules('alamat','Alamat','required');

        $pendaftar						= $this->db->query("SELECT * FROM pendaftar WHERE nisn = '$nisn'")->row();
        if($this->form_validation->run() == true)
        {
        	 $data1 = array
        	(
              	'nama' => $nama,
              	'tgl_lahir' => $tanggal_lahir,
              	'jenis_kelamin' => $jenis_kelamin,
              	'no_telp' => $no_telp,
              	'email' => $email,
              	'nisn' => $nisnbaru,
              	'alamat' => $alamat,
            );

            if ($jurusan != $pendaftar->kd_jurusan)
            {
            	$data2 = array
            	(
                    'kd_jurusan' => $jurusan,
                );

                $data3 = array
                (
                    'no_ujian' => $this->M_Admin->no_ujian($jurusan),
                );
                $this->db->update("pendaftar", $data2, "pendaftar.nisn='$nisn'");
                $this->db->update("ujian", $data3, "ujian.nisn='$nisn'");
            }
            $this->db->update("pendaftar", $data1, "pendaftar.nisn='$nisn'");
            $this->session->set_flashdata('message_name',"<div class='alert alert-success text-center'><strong>Sukses!</strong><br>Data berhasil disimpan</div>");
            redirect(base_url().'admin/pendaftar_update/'.$nisnbaru,'refresh');
        }
	}

	public function pendaftar_detail($nisn = NULL)
	{
		$cek						= $this->db->query("SELECT * FROM pendaftar WHERE nisn = '$nisn'")->num_rows();
		if ($cek < 1)
		{
			redirect(base_url().'err404','refresh');
		}

		$data['pendaftar'] 			= $this->db->query("SELECT * FROM pendaftar WHERE nisn='$nisn'")->result();
	    $data['orangtua'] 			= $this->db->query("SELECT * FROM orangtua WHERE nisn='$nisn'")->result();
	    $data['ujian']		 		= $this->db->query("SELECT * FROM ujian WHERE nisn='$nisn'")->result();
	    
	    $title['title']				= "SMK Permata 1 Kota Bogor - Aplikasi Penerimaan Peserta Didik Baru";
	    $this->load->view('v_admin/header', $title);
	    $this->load->view('v_admin/pendaftar_detail',$data);
	    $this->load->view('v_admin/footer');
	}

	public function pendaftar_detail_print($nisn)
	{
		$cek						= $this->db->query("SELECT * FROM pendaftar WHERE nisn = '$nisn'")->num_rows();
		if ($cek < 1)
		{
			redirect(base_url().'err404','refresh');
		}

		$data['pendaftar'] 			= $this->db->query("SELECT * FROM pendaftar WHERE nisn='$nisn'")->result();
	    $data['orangtua'] 			= $this->db->query("SELECT * FROM orangtua WHERE nisn='$nisn'")->result();
	    $data['ujian']		 		= $this->db->query("SELECT * FROM ujian WHERE nisn='$nisn'")->result();
	    
	    $data['title']				= "SMK Permata 1 Kota Bogor - Aplikasi Penerimaan Peserta Didik Baru";
	    $this->load->view('v_admin/pendaftar_detail_print',$data);
	}

	public function pendaftar_detail_pdf($nisn)
	{
		$cek						= $this->db->query("SELECT * FROM pendaftar WHERE nisn = '$nisn'")->num_rows();
		if ($cek < 1)
		{
			redirect(base_url().'err404','refresh');
		}

		$this->load->library('pdfgenerator');

		$data['pendaftar'] 			= $this->db->query("SELECT * FROM smkpermata1.pendaftar WHERE nisn='$nisn'")->result();
	    $data['orangtua'] 			= $this->db->query("SELECT * FROM smkpermata1.orangtua WHERE nisn='$nisn'")->result();
	    $data['ujian']		 		= $this->db->query("SELECT * FROM smkpermata1.ujian WHERE nisn='$nisn'")->result();
	    
	    $data['title']				= "SMK Permata 1 Kota Bogor - Aplikasi Penerimaan Peserta Didik Baru";

	    $html = $this->load->view('v_admin/pendaftar_detail_pdf', $data, true);
	    $this->pdfgenerator->generate_view($html,'Detail Pendaftar -'.$nisn);
	}

	public function orangtua()
	{
		$title['title']		= "SMK Permata 1 Kota Bogor - Aplikasi Penerimaan Peserta Didik Baru";
		$data['orangtua']	= $this->db->query("SELECT * FROM orangtua")->result();
		$this->load->view('v_admin/header', $title, FALSE);
		$this->load->view('v_admin/orangtua', $data,  FALSE);
		$this->load->view('v_admin/footer');
	}

	public function orangtua_update($nisn)
	{	
		$cek						= $this->db->query("SELECT * FROM pendaftar WHERE nisn = '$nisn'")->num_rows();
		if ($cek < 1)
		{
			redirect(base_url().'err404','refresh');
		}
		$data['orangtua'] 			= $this->db->query("SELECT * FROM smkpermata1.orangtua WHERE nisn='$nisn'")->result();
		$title['title']				= "SMK Permata 1 Kota Bogor - Aplikasi Penerimaan Peserta Didik Baru";

		$this->load->view('v_admin/header', $title, FALSE);
		$this->load->view('v_admin/orangtua_update', $data, FALSE);
		$this->load->view('v_admin/footer');
	}

	public function orangtua_update_act($nisn)
	{
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
	    redirect(base_url().'admin/orangtua_update/'.$nisn);
	}

	public function transaksi()
	{
		$title['title']				= "SMK Permata 1 Kota Bogor - Aplikasi Penerimaan Peserta Didik Baru";
		$data['transaksi_riwayat']	= $this->db->query("SELECT * FROM transaksi_riwayat")->result();

		$this->load->view('v_admin/header', $title, FALSE);
		$this->load->view('v_admin/transaksi', $data, FALSE);
		$this->load->view('v_admin/footer');
	}

	public function transaksi_detail($nisn)
	{
		$cek						= $this->db->query("SELECT * FROM pendaftar WHERE nisn = '$nisn'")->num_rows();
		if ($cek < 1)
		{
			redirect(base_url().'err404','refresh');
		}

		$query 						= $this->db->query("SELECT * FROM ujian WHERE ujian.nisn='$nisn'")->row();
		$no_ujian					= $query->no_ujian;
        $map 						= directory_map('./upload/pendaftar/'.$nisn.'/', FALSE, TRUE);

		$data['ujian'] 				= $this->db->query("SELECT * from ujian WHERE nisn='$nisn'")->row();
        $data['pendaftar'] 			= $this->db->query("SELECT * from pendaftar WHERE nisn='$nisn'")->row();
        $data['transaksi_kategori'] = $this->db->query("SELECT * from transaksi_kategori")->result();
        $data['foto']				= $map;
        $title['title']				= "SMK Permata 1 Kota Bogor - Aplikasi Penerimaan Peserta Didik Baru";

        $this->load->view('v_admin/header', $title, FALSE);
		$this->load->view('v_admin/transaksi_detail', $data, FALSE);
		$this->load->view('v_admin/footer');
	}

	public function transaksi_tambah()
	{
		$tgl 			= date("Y-m-d H:i:s");
        $no_ujian 		= $this->input->post('no_ujian');
        $kategori 		= $this->input->post('kategori');
        $jml_bayar 		= $this->input->post('jumlah');
        $no_transaksi 	= $this->M_Admin->no_transaksi($kategori, $no_ujian);

        $query1 = $this->db->query("SELECT * FROM transaksi where transaksi.no_transaksi='$no_transaksi'");
        if ($query1->num_rows()!=0)
        {
          	$row1 = $query1->row_array();
          	$jml_telah_bayar = $row1['jumlah_bayar'];
          	$total_bayar = $jml_bayar + $jml_telah_bayar;
        }
        else
        {
          	$jml_telah_bayar = 0;
          	$total_bayar = $jml_bayar + $jml_telah_bayar;
        }

        $query2 = $this->db->query("SELECT * FROM transaksi_kategori where transaksi_kategori.kd_transaksi ='$kategori'");
        $row2 = $query2->row_array();
        $harus_bayar = $row2['harus_bayar'];

        $query3 = $this->db->query("SELECT * FROM ujian where ujian.no_ujian ='$no_ujian'");
        $row3 = $query3->row_array();

        if ($total_bayar >= $row2['harus_bayar']) 
        {
            $status_bayar = 'Lunas';
        }
        else 
        {
            $status_bayar = 'Belum Lunas';
        }

        $data1= array
        (
          	'no_transaksi' 			=> $no_transaksi,
          	'no_ujian' 				=> $no_ujian,
          	'kd_transaksi' 			=> $kategori,
          	'kategori_transaksi' 	=> $row2['kategori_transaksi'],
          	'jumlah_bayar' 			=> $total_bayar,
          	'harus_bayar' 			=> $row2['harus_bayar'],
          	'status_bayar' 			=> $status_bayar,
        );

        $data2 = array 
        (
          	'no_ujian' 				=> $no_ujian,
          	'kategori_transaksi' 	=> $row2['kategori_transaksi'],
          	'no_transaksi' 			=> $no_transaksi,
          	'tgl_bayar' 			=> $tgl,
          	'jumlah_bayar' 			=> $jml_bayar,
        );

        $sql =  $this->db->insert_string('transaksi', $data1)." ON DUPLICATE KEY UPDATE 
                jumlah_bayar = '$total_bayar',
                status_bayar = '$status_bayar'";
        $this->db->query($sql);
        $this->db->insert('transaksi_riwayat', $data2);

        $query4 = $this->db->query("SELECT * FROM transaksi where transaksi.no_ujian='$no_ujian' and transaksi.kategori_transaksi='Ujian Masuk'");
        $row4 = $query4->row_array();


        if ($row4['status_bayar'] == 'Lunas' && $row3['token'] == NULL || $row4['status_bayar'] == 'Lunas' && $row3['token'] == 0) 
        {
          	$token = array 
          	(
            	'token' => 1,
          	);
          	$this->db->update('ujian',$token,"ujian.no_ujian = '$no_ujian'");
        }
        $this->session->set_flashdata('message_name',"<div class='alert alert-success text-center'><strong>Sukses!</strong><br>Transaksi berhasil ditambahkan</div>");
		redirect(base_url().'admin/transaksi_detail/'.$row3['nisn']);
	}

	public function transaksi_detail_print()
	{
		$no_transaksi   = $this->input->get('k');
		$kd_transaksi	= substr($no_transaksi, 0, 3);
		$no_ujian		= substr($no_transaksi, 4);

		$data['no_transaksi']		= $no_transaksi;
		$data['transaksi_riwayat']	= $this->db->query("SELECT * FROM transaksi_riwayat WHERE transaksi_riwayat.no_transaksi = '$no_transaksi'")->result();
		$data['transaksi_kategori']	= $this->db->query("SELECT * FROM transaksi_kategori WHERE transaksi_kategori.kd_transaksi = '$kd_transaksi'")->row();

		$ujian						= $this->db->query("SELECT * FROM ujian WHERE ujian.no_ujian = '$no_ujian'")->row();
		$data['pendaftar']			= $this->db->query("SELECT * FROM pendaftar WHERE pendaftar.nisn = '$ujian->nisn'")->row();
		$data['title']				= "Detail Pembayaran - SMK Permata 1 Kota Bogor";

		$this->load->view('v_admin/transaksi_detail_print', $data, FALSE);
	}

	public function ujian()
	{
		$title['title']  = "Hasil Ujian - Aplikasi Penerimaan Peserta Didik Baru";
  		$data['ujian'] = $this->db->query("SELECT * FROM ujian")->result();

  		$this->load->view('v_admin/header', $title, FALSE);
		$this->load->view('v_admin/ujian', $data, FALSE);
		$this->load->view('v_admin/footer');
	}

	public function jurusan()
	{
		$title['title']  = "Jurusan - Aplikasi Penerimaan Peserta Didik Baru";
  		$data['jurusan'] = $this->db->query("SELECT * FROM jurusan")->result();

  		$this->load->view('v_admin/header', $title, FALSE);
		$this->load->view('v_admin/jurusan', $data, FALSE);
		$this->load->view('v_admin/footer');
	}

	public function jurusan_tambah()
	{
		$kd_jurusan 	= strtoupper($this->input->post('kd_jurusan'));
		$nama_jurusan 	= ucwords($this->input->post('nama_jurusan'));
		$nilai_min 		= $this->input->post('nilai_min');
		$jumlah_soal	= $this->input->post('jumlah_soal');

		$this->form_validation->set_message('is_unique', '<b>%s</b> sudah terdaftar');
        $this->form_validation->set_message('exact_length', '<b>%s</b> harus terdiri dari 3 karakter');
        $this->form_validation->set_message('required', 'Field <b>%s</b> Harus diisi');

        $this->form_validation->set_rules('kd_jurusan','Kode Jurusan','trim|exact_length[3]|required|is_unique[jurusan.kd_jurusan]');
        $this->form_validation->set_rules('nama_jurusan','Nama Jurusan','required');
        $this->form_validation->set_rules('nilai_min','Nilai Minimum','trim|required');
        $this->form_validation->set_rules('jumlah_soal','Jumlah Soal','trim|required');

       	if($this->form_validation->run() == true)
        {
			$data = array
			(
				'nama_jurusan' 	=> $nama_jurusan,
			    'kd_jurusan' 	=> $kd_jurusan,
			    'nilai_min' 	=> $nilai_min,
			    'jumlah_soal'	=> $jumlah_soal,
			);

			$this->db->insert('jurusan', $data);
			$this->session->set_flashdata('message_name',"<div class='alert alert-success text-center'><strong>Sukses!</strong><br>Data berhasil ditambahkan</div>");
			redirect(base_url().'admin/jurusan','refresh');
        } 
        else 
        {
			$modal['modal'] 	= 'show';
			$data['jurusan']	= $this->db->query("SELECT * FROM jurusan")->result();
	        $title['title']		= "SMK Permata 1 Kota Bogor - Aplikasi Penerimaan Peserta Didik Baru";

        	$this->load->view('v_admin/header', $title, FALSE);
			$this->load->view('v_admin/jurusan', $data,  FALSE);
			$this->load->view('v_admin/footer', $modal);
        }
	}

	public function jurusan_hapus($kd_jurusan)
	{
		$this->db->query("DELETE FROM jurusan WHERE jurusan.kd_jurusan = '$kd_jurusan'");

		$this->session->set_flashdata('message_name',"<div class='alert alert-success text-center'><strong>Sukses!</strong><br>Data berhasil dihapus</div>");
		redirect(base_url().'admin/jurusan','refresh');
	}

	public function jurusan_update($kd_jurusan_lama)
	{
		$kd_jurusan 	= strtoupper($this->input->post('kd_jurusan'));
		$nama_jurusan 	= ucwords($this->input->post('nama_jurusan'));
		$nilai_min 		= $this->input->post('nilai_min');
		$jumlah_soal	= $this->input->post('jumlah_soal');

		$this->form_validation->set_message('is_unique', '<b>%s</b> sudah terdaftar');
        $this->form_validation->set_message('exact_length', '<b>%s</b> harus terdiri dari 3 karakter');
        $this->form_validation->set_message('required', 'Field <b>%s</b> Harus diisi');

        $this->form_validation->set_rules('kd_jurusan','Kode Jurusan','trim|exact_length[3]|required');
        $this->form_validation->set_rules('nama_jurusan','Nama Jurusan','required');
        $this->form_validation->set_rules('nilai_min','Nilai Minimum','trim|required');
        $this->form_validation->set_rules('jumlah_soal','Jumlah Soal','trim|required');

       	if($this->form_validation->run() == true)
        {
			$data = array
			(
				'nama_jurusan' 	=> $nama_jurusan,
			    'kd_jurusan' 	=> $kd_jurusan,
			    'nilai_min' 	=> $nilai_min,
			    'jumlah_soal'	=> $jumlah_soal,
			);

			$this->db->update('jurusan', $data, "jurusan.kd_jurusan = '$kd_jurusan_lama'");
			$this->session->set_flashdata('message_name',"<div class='alert alert-success text-center'><strong>Sukses!</strong><br>Data berhasil ditambahkan</div>");
			redirect(base_url().'admin/jurusan','refresh');
        } 
        else 
        {
			$data['jurusan']		= $this->db->query("SELECT * FROM jurusan")->result();
	        $title['title']			= "SMK Permata 1 Kota Bogor - Aplikasi Penerimaan Peserta Didik Baru";

        	$this->load->view('v_admin/header', $title, FALSE);
			$this->load->view('v_admin/jurusan', $data,  FALSE);
			$this->load->view('v_admin/footer');
        }
	}

	public function soal()
	{
		$title['title']  	= "Jurusan - Aplikasi Penerimaan Peserta Didik Baru";
  		$data['jurusan'] 	= $this->db->query("SELECT * FROM jurusan")->result();
  		$data['soal'] 		= $this->db->query("SELECT * FROM ujian_soal")->result();

  		$this->load->view('v_admin/header', $title, FALSE);
		$this->load->view('v_admin/soal', $data, FALSE);
		$this->load->view('v_admin/footer');
	}

	public function soal_tambah()
	{
		$jurusan 	= $this->input->post('jurusan');
  		$soal 		= $this->input->post('soal');
  		$kd_soal 	= $this->M_Admin->kd_soal($jurusan);

  		$data = array 
          (
          	'kd_soal'		=> $kd_soal,
            'kd_jurusan' 	=> $jurusan,
            'soal' 			=> $soal,
          );

  		$this->db->insert('ujian_soal', $data);
  		$this->session->set_flashdata('message_name',"<div class='alert alert-success text-center'><strong>Sukses!</strong><br>Data berhasil ditambahkan</div>");
  		redirect(base_url().'admin/soal','refresh');
	}

	public function soal_hapus($kd_soal)
	{
		$this->db->query("DELETE FROM ujian_soal WHERE ujian_soal.kd_soal = '$kd_soal'");
		$this->session->set_flashdata('message_name',"<div class='alert alert-info text-center'><strong>Sukses!</strong><br>Data berhasil dihapus</div>");
		redirect(base_url().'admin/soal','refresh');
	}

	public function soal_update($kd_soal_lama)
	{
		$soal 		= $this->input->post('soal');
		$jurusan 	= $this->input->post('jurusan');
		$kd_soal 	= $this->M_Admin->kd_soal($jurusan);
		$data = array
		(
			'soal'			=> $soal,
			'kd_jurusan'	=> $jurusan,
			'kd_soal'		=> $kd_soal,
		);
		$this->db->update('ujian_soal', $data, "ujian_soal.kd_soal ='$kd_soal_lama'");
		$this->session->set_flashdata('message_name',"<div class='alert alert-success text-center'><strong>Sukses!</strong><br>Data berhasil diupdate</div>");
		redirect(base_url().'admin/soal_detail/'.$kd_soal,'refresh');
	}

	public function soal_detail($kd_soal)
	{
		$cek						= $this->db->query("SELECT * FROM ujian_soal WHERE ujian_soal.kd_soal = '$kd_soal'")->num_rows();
		if ($cek < 1)
		{
			redirect(base_url().'err404','refresh');
		}

		$title['title']  	= "Jurusan - Aplikasi Penerimaan Peserta Didik Baru";
		$data['soal'] = $this->db->query("SELECT * FROM ujian_soal WHERE kd_soal='$kd_soal'")->row();
		$data['jawaban'] = $this->db->query("SELECT * FROM ujian_jawaban WHERE kd_soal='$kd_soal'")->result();
		$data['jurusan'] = $this->db->query("SELECT * FROM jurusan")->result();

		$this->load->view('v_admin/header', $title, FALSE);
		$this->load->view('v_admin/soal_detail', $data, FALSE);
		$this->load->view('v_admin/footer');
	}

	public function jawaban_tambah($kd_soal)
	{
		$jawaban 	= $this->input->post('jawaban');
  		$status 	= $this->input->post('status');
  		$kd_jawaban = $this->M_Admin->kd_jawaban(substr($kd_soal, 0, 3));

  		$data = array 
        (
        	'kd_jawaban' 	=> $kd_jawaban,
            'jawaban' 		=> $jawaban,
            'kd_soal' 		=> $kd_soal,
        	'status' 		=> $status,
        );
		
		$cek	= $this->db->query("SELECT * FROM ujian_jawaban WHERE ujian_jawaban.kd_soal = '$kd_soal'")->num_rows();
		if ($cek >= 6)
		{
			$this->session->set_flashdata('message_name',"<div class='alert alert-info text-center'><strong>Gagal!</strong><br>Kuota jawaban untuk soal ini sudah habis</div>");
			redirect(base_url().'admin/soal_detail/'.$kd_soal,'refresh');
		}

		if ($status == 1)
		{
			$this->db->query("UPDATE ujian_jawaban SET status='0' WHERE ujian_jawaban.kd_soal='$kd_soal'");
		}
		$this->db->insert('ujian_jawaban', $data);
		$this->session->set_flashdata('message_name',"<div class='alert alert-success text-center'><strong>Sukses!</strong><br>Data berhasil ditambahkan</div>");
		redirect(base_url().'admin/soal_detail/'.$kd_soal,'refresh');
	}

	public function jawaban_hapus($kd_jawaban, $kd_soal)
	{
		$this->db->query("DELETE FROM ujian_jawaban WHERE ujian_jawaban.kd_jawaban = '$kd_jawaban'");

		$this->session->set_flashdata('message_name',"<div class='alert alert-success text-center'><strong>Sukses!</strong><br>Data berhasil dihapus</div>");
		redirect(base_url().'admin/soal_detail/'.$kd_soal,'refresh');
	}

	public function jawaban_update($kd_jawaban, $kd_soal)
	{
		$jawaban 	= $this->input->post('jawaban');
		$status 	= $this->input->post('status');

		$data = array
        (
            'jawaban' => $jawaban,
            'status' => $status,
        );
        if ($status == 1)
		{
		    $this->db->query("UPDATE ujian_jawaban SET status='0' WHERE ujian_jawaban.kd_soal='$kd_soal'");
		}
		$this->db->update('ujian_jawaban', $data, "ujian_jawaban.kd_jawaban = '$kd_jawaban'");
		$this->session->set_flashdata('message_name',"<div class='alert alert-success text-center'><strong>Sukses!</strong><br>Data berhasil dirubah</div>");
		redirect(base_url().'admin/soal_detail/'.$kd_soal,'refresh');
	}

	public function laporan_pendaftar()
	{
		$title['title']  	= "Laporan Pendaftar - Aplikasi Penerimaan Peserta Didik Baru";
		$data['pendaftar'] = $this->db->query("SELECT pendaftar.nama, pendaftar.tgl_lahir, pendaftar.jenis_kelamin, pendaftar.nisn, pendaftar.no_telp, pendaftar.alamat, ujian.no_ujian, ujian.token, ujian.nilai, ujian.status, pendaftar.tgl_daftar FROM pendaftar INNER JOIN ujian ON pendaftar.nisn = ujian.nisn")->result();


		$this->load->view('v_admin/header', $title, FALSE);
		$this->load->view('v_admin/laporan_pendaftar', $data, FALSE);
		$this->load->view('v_admin/footer');
	}

	public function laporan_pendaftar_print()
	{
	    $tanggal_mulai    	= $this->input->post('tanggal1');
	    $tanggal_selesai  	= $this->input->post('tanggal2');
	    $lulus            	= $this->input->post('lulus');
	    $tidaklulus       	= $this->input->post('tidaklulus');
	    $belumujian         = $this->input->post('belumujian');
	    $lunas            	= $this->input->post('lunas');
	    $belumlunas       	= $this->input->post('belumlunas');

	    $filter_date      	= "SELECT pendaftar.nama, pendaftar.tgl_lahir, pendaftar.jenis_kelamin, pendaftar.nisn, pendaftar.no_telp, pendaftar.alamat, ujian.no_ujian, ujian.token, ujian.nilai, ujian.status, pendaftar.tgl_daftar FROM pendaftar INNER JOIN ujian ON pendaftar.nisn = ujian.nisn WHERE pendaftar.tgl_daftar BETWEEN '$tanggal_mulai' AND '$tanggal_selesai'";

	    if ($lulus && $tidaklulus && $belumujian && $lunas && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date)->result();
	      $data['filter'] = "Semua";
	    }
	    else if ($lulus && $tidaklulus && $belumujian && $lunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.token IS NOT NULL")->result();
	      $data['filter'] = "Lulus, Tidak lulus, Belum ujian, Lunas";
	    }
	    else if ($lulus && $tidaklulus && $belumujian && $belumlunas) 
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.token IS NULL")->result();
	      $data['filter'] = "Lulus, Tidak lulus, Belum ujian, Belum lunas";
	    }
	    else if ($lulus && $tidaklulus && $lunas && $belumlunas) 
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status IS NOT NULL")->result();
	      $data['filter'] = "Lulus, Tidak lulus, Lunas, Belum lunas";
	    }
	    else if ($lulus && $belumujian && $lunas && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Lulus' OR ujian.status IS NULL")->result();
	      $data['filter'] = "Lulus, Belum ujian, Lunas, Belum lunas";
	    }
	    else if ($tidaklulus && $belumujian && $lunas && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Tidak lulus' OR ujian.status IS NULL")->result();
	      $data['filter'] = "Tidak lulus, Belum ujian, Lunas, Belum lunas";
	    }
	    else if ($lulus && $tidaklulus && $belumujian)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date)->result();
	      $data['filter'] = "Lulus, Tidak lulus, Belum ujian";
	    }
	    else if ($lulus && $tidaklulus && $lunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status IS NOT NULL AND ujian.token IS NOT NULL")->result();
	      $data['filter'] = "Lulus, Tidak lulus, Lunas";
	    }
	    else if ($lulus && $belumujian && $lunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Lulus' OR ujian.status IS NULL AND ujian.token IS NOT NULL")->result();
	      $data['filter'] = "Lulus, Belum ujian, Lunas";
	    }
	    else if ($tidaklulus && $belumujian && $lunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Belum lulus' OR ujian.status IS NULL AND ujian.token IS NOT NULL")->result();
	      $data['filter'] = "Tidak lulus, Belum ujian, Lunas";
	    }
	    else if ($lulus && $tidaklulus && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status IS NOT NULL AND ujian.token IS NULL")->result();
	      $data['filter'] = "Lulus, Tidak lulus, Belum lunas";
	    }
	    else if ($lulus && $belumujian && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Lulus' OR ujian.status IS NULL AND ujian.token IS NULL")->result();
	      $data['filter'] = "Lulus, Belum ujian, Belum lunas";
	    }
	    else if ($tidaklulus && $belumujian && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Tidak lulus' OR ujian.status IS NULL AND ujian.token IS NULL")->result();
	      $data['filter'] = "Tidak lulus, Belum ujian, Belum lunas";
	    }
	    else if ($lulus && $lunas && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Lulus'")->result();
	      $data['filter'] = "Lulus, Tidak lulus, Belum lunas";
	    }
	    else if($tidaklulus && $lunas && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Tidak lulus'")->result();
	      $data['filter'] = "Tidak lulus, Lunas, Belum lunas";
	    }
	    else if($belumujian && $lunas && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status IS NULL")->result();
	      $data['filter'] = "Belum ujian, Lunas, Belum lunas";
	    }
	    else if($lulus && $tidaklulus)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status IS NOT NULL")->result();
	      $data['filter'] = "Lulus, Tidak lulus";
	    }
	    else if($lulus && $belumujian)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Lulus' OR ujian.status IS NULL")->result();
	      $data['filter'] = "Lulus, Belum ujian";
	    }
	    else if($lulus && $lunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Lulus' AND ujian.token IS NOT NULL")->result();
	      $data['filter'] = "Lulus, Lunas";
	    }
	    else if($lulus && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Lulus' AND ujian.token IS NULL")->result();
	      $data['filter'] = "Lulus, Belum lunas";
	    }
	    else if($tidaklulus && $belumujian)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Tidak lulus' OR ujian.status IS NULL")->result();
	      $data['filter'] = "Tidak lulus, Belum ujian";
	    }
	    else if($tidaklulus && $lunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Tidak lulus' AND ujian.token IS NOT NULL")->result();
	      $data['filter'] = "Tidak lulus, lunas";
	    }
	    else if($tidaklulus && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Tidak lulus' AND ujian.token IS NULL")->result();
	      $data['filter'] = "Tidak lulus, Belum lunas";
	    }
	    else if($belumujian && $lunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status IS NULL AND ujian.token IS NOT NULL")->result();
	      $data['filter'] = "Belum lunas, Lunas";
	    }
	    else if($belumujian && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status IS NULL AND ujian.token IS NULL")->result();
	      $data['filter'] = "Belum ujian, Belum lunas";
	    }
	    else if($lunas && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date)->result();
	      $data['filter'] = "Lunas, Belum lunas";
	    }
	    else if($lulus)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Lulus'")->result();
	      $data['filter'] = "Lulus";
	    }
	    else if($tidaklulus)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Tidak lulus'")->result();
	      $data['filter'] = "Tidak lulus";
	    }
	    else if($belumujian)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status IS NULL")->result();
	      $data['filter'] = "Belum ujian";
	    }
	    else if($lunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.token IS NOT NULL")->result();
	      $data['filter'] = "Lunas";
	    }
	    else if($belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.token IS NULL")->result();
	      $data['filter'] = "Belum lunas";
	    }

	    $mulai 						= date('Y-m-d', strtotime($tanggal_mulai));
		$filter_mulai 				= $this->M_Admin->tanggal_indo($mulai, false);
		$selesai 					= date('Y-m-d', strtotime($tanggal_selesai));
		$filter_selesai				= $this->M_Admin->tanggal_indo($selesai, false);

    	$data['title']           	= "[Laporan Pendaftar] ".$filter_mulai.' - '.$filter_selesai;
	    $data['tanggal_mulai'] 		= $tanggal_mulai;
	    $data['tanggal_selesai'] 	= $tanggal_selesai;
	    $this->load->view('v_admin/laporan_pendaftar_print', $data);
	}

	public function laporan_pendaftar_pdf()
	{
		$tanggal_mulai    	= $this->input->post('tanggal1');
	    $tanggal_selesai  	= $this->input->post('tanggal2');
	    $lulus            	= $this->input->post('lulus');
	    $tidaklulus       	= $this->input->post('tidaklulus');
	    $belumujian         = $this->input->post('belumujian');
	    $lunas            	= $this->input->post('lunas');
	    $belumlunas       	= $this->input->post('belumlunas');

	    $filter_date      	= "SELECT pendaftar.nama, pendaftar.tgl_lahir, pendaftar.jenis_kelamin, pendaftar.nisn, pendaftar.no_telp, pendaftar.alamat, ujian.no_ujian, ujian.token, ujian.nilai, ujian.status, pendaftar.tgl_daftar FROM pendaftar INNER JOIN ujian ON pendaftar.nisn = ujian.nisn WHERE pendaftar.tgl_daftar BETWEEN '$tanggal_mulai' AND '$tanggal_selesai'";

	    if ($lulus && $tidaklulus && $belumujian && $lunas && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date)->result();
	      $data['filter'] = "Semua";
	    }
	    else if ($lulus && $tidaklulus && $belumujian && $lunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.token IS NOT NULL")->result();
	      $data['filter'] = "Lulus, Tidak lulus, Belum ujian, Lunas";
	    }
	    else if ($lulus && $tidaklulus && $belumujian && $belumlunas) 
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.token IS NULL")->result();
	      $data['filter'] = "Lulus, Tidak lulus, Belum ujian, Belum lunas";
	    }
	    else if ($lulus && $tidaklulus && $lunas && $belumlunas) 
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status IS NOT NULL")->result();
	      $data['filter'] = "Lulus, Tidak lulus, Lunas, Belum lunas";
	    }
	    else if ($lulus && $belumujian && $lunas && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Lulus' OR ujian.status IS NULL")->result();
	      $data['filter'] = "Lulus, Belum ujian, Lunas, Belum lunas";
	    }
	    else if ($tidaklulus && $belumujian && $lunas && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Tidak lulus' OR ujian.status IS NULL")->result();
	      $data['filter'] = "Tidak lulus, Belum ujian, Lunas, Belum lunas";
	    }
	    else if ($lulus && $tidaklulus && $belumujian)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date)->result();
	      $data['filter'] = "Lulus, Tidak lulus, Belum ujian";
	    }
	    else if ($lulus && $tidaklulus && $lunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status IS NOT NULL AND ujian.token IS NOT NULL")->result();
	      $data['filter'] = "Lulus, Tidak lulus, Lunas";
	    }
	    else if ($lulus && $belumujian && $lunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Lulus' OR ujian.status IS NULL AND ujian.token IS NOT NULL")->result();
	      $data['filter'] = "Lulus, Belum ujian, Lunas";
	    }
	    else if ($tidaklulus && $belumujian && $lunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Belum lulus' OR ujian.status IS NULL AND ujian.token IS NOT NULL")->result();
	      $data['filter'] = "Tidak lulus, Belum ujian, Lunas";
	    }
	    else if ($lulus && $tidaklulus && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status IS NOT NULL AND ujian.token IS NULL")->result();
	      $data['filter'] = "Lulus, Tidak lulus, Belum lunas";
	    }
	    else if ($lulus && $belumujian && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Lulus' OR ujian.status IS NULL AND ujian.token IS NULL")->result();
	      $data['filter'] = "Lulus, Belum ujian, Belum lunas";
	    }
	    else if ($tidaklulus && $belumujian && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Tidak lulus' OR ujian.status IS NULL AND ujian.token IS NULL")->result();
	      $data['filter'] = "Tidak lulus, Belum ujian, Belum lunas";
	    }
	    else if ($lulus && $lunas && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Lulus'")->result();
	      $data['filter'] = "Lulus, Tidak lulus, Belum lunas";
	    }
	    else if($tidaklulus && $lunas && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Tidak lulus'")->result();
	      $data['filter'] = "Tidak lulus, Lunas, Belum lunas";
	    }
	    else if($belumujian && $lunas && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status IS NULL")->result();
	      $data['filter'] = "Belum ujian, Lunas, Belum lunas";
	    }
	    else if($lulus && $tidaklulus)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status IS NOT NULL")->result();
	      $data['filter'] = "Lulus, Tidak lulus";
	    }
	    else if($lulus && $belumujian)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Lulus' OR ujian.status IS NULL")->result();
	      $data['filter'] = "Lulus, Belum ujian";
	    }
	    else if($lulus && $lunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Lulus' AND ujian.token IS NOT NULL")->result();
	      $data['filter'] = "Lulus, Lunas";
	    }
	    else if($lulus && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Lulus' AND ujian.token IS NULL")->result();
	      $data['filter'] = "Lulus, Belum lunas";
	    }
	    else if($tidaklulus && $belumujian)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Tidak lulus' OR ujian.status IS NULL")->result();
	      $data['filter'] = "Tidak lulus, Belum ujian";
	    }
	    else if($tidaklulus && $lunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Tidak lulus' AND ujian.token IS NOT NULL")->result();
	      $data['filter'] = "Tidak lulus, lunas";
	    }
	    else if($tidaklulus && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Tidak lulus' AND ujian.token IS NULL")->result();
	      $data['filter'] = "Tidak lulus, Belum lunas";
	    }
	    else if($belumujian && $lunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status IS NULL AND ujian.token IS NOT NULL")->result();
	      $data['filter'] = "Belum lunas, Lunas";
	    }
	    else if($belumujian && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status IS NULL AND ujian.token IS NULL")->result();
	      $data['filter'] = "Belum ujian, Belum lunas";
	    }
	    else if($lunas && $belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date)->result();
	      $data['filter'] = "Lunas, Belum lunas";
	    }
	    else if($lulus)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Lulus'")->result();
	      $data['filter'] = "Lulus";
	    }
	    else if($tidaklulus)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status = 'Tidak lulus'")->result();
	      $data['filter'] = "Tidak lulus";
	    }
	    else if($belumujian)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.status IS NULL")->result();
	      $data['filter'] = "Belum ujian";
	    }
	    else if($lunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.token IS NOT NULL")->result();
	      $data['filter'] = "Lunas";
	    }
	    else if($belumlunas)
	    {
	      $data['pendaftar'] = $this->db->query($filter_date." AND ujian.token IS NULL")->result();
	      $data['filter'] = "Belum lunas";
	    }

	    $this->load->library('pdfgenerator');
	    $data['title']				= "Laporan Pendaftar - Aplikasi Penerimaan Peserta Didik Baru";
	    $data['tanggal_mulai'] 		= $tanggal_mulai;
	    $data['tanggal_selesai'] 	= $tanggal_selesai;
	    $mulai 						= date('Y-m-d', strtotime($tanggal_mulai));
		$filter_mulai 				= $this->M_Admin->tanggal_indo($mulai, false);
		$selesai 					= date('Y-m-d', strtotime($tanggal_selesai));
		$filter_selesai				= $this->M_Admin->tanggal_indo($selesai, false);
	    $html 						= $this->load->view('v_admin/laporan_pendaftar_pdf', $data, true);
	    
	    $this->pdfgenerator->generate_view_landscape($html,'[Laporan Pendaftar] '.$filter_mulai.' - '.$filter_selesai);
    	
	}

	public function laporan_transaksi()
	{
		$title['title']				= "Laporan Transaksi - Aplikasi Penerimaan Peserta Didik Baru";
		$data['transaksi'] 			= $this->db->query("SELECT pendaftar.nisn, pendaftar.nama, pendaftar.no_telp, pendaftar.email, pendaftar.alamat, transaksi_riwayat.tgl_bayar, transaksi_riwayat.kategori_transaksi, transaksi_riwayat.jumlah_bayar FROM ((ujian INNER JOIN transaksi_riwayat on ujian.no_ujian = transaksi_riwayat.no_ujian)INNER JOIN pendaftar ON ujian.nisn = pendaftar.nisn)")->result();
		$this->load->view('v_admin/header', $title, FALSE);
		$this->load->view('v_admin/laporan_transaksi', $data, FALSE);
		$this->load->view('v_admin/footer');
	}

	public function laporan_transaksi_print()
	{
		$tanggal_mulai          	= $this->input->post('tanggal1');
    	$tanggal_selesai         	= $this->input->post('tanggal2');
    	$mulai 						= date('Y-m-d', strtotime($tanggal_mulai));
		$filter_mulai 				= $this->M_Admin->tanggal_indo($mulai, false);
		$selesai 					= date('Y-m-d', strtotime($tanggal_selesai));
		$filter_selesai				= $this->M_Admin->tanggal_indo($selesai, false);

		$data['tanggal_mulai'] 		= $tanggal_mulai;
	    $data['tanggal_selesai'] 	= $tanggal_selesai;
    	$data['title']           	= "[Laporan Transaksi] ".$filter_mulai.' - '.$filter_selesai;
    	$data['transaksi'] 		 	= $this->db->query("SELECT pendaftar.nisn, pendaftar.nama, pendaftar.no_telp, pendaftar.email, pendaftar.alamat, transaksi_riwayat.tgl_bayar, transaksi_riwayat.kategori_transaksi, transaksi_riwayat.jumlah_bayar FROM ((ujian INNER JOIN transaksi_riwayat on ujian.no_ujian = transaksi_riwayat.no_ujian)INNER JOIN pendaftar ON ujian.nisn = pendaftar.nisn) WHERE transaksi_riwayat.tgl_bayar BETWEEN '$tanggal_mulai 00:00:00' AND '$tanggal_selesai 23:59:59'")->result();

    	$this->load->view('v_admin/laporan_transaksi_print',$data);
	}

	public function laporan_transaksi_pdf()
	{
		$tanggal_mulai           = $this->input->post('tanggal1');
    	$tanggal_selesai         = $this->input->post('tanggal2');
    	$data['title']           = "Laporan Transaksi - Aplikasi Penerimaan Peserta Didik Baru";
    	$data['transaksi'] 		 = $this->db->query("SELECT pendaftar.nisn, pendaftar.nama, pendaftar.no_telp, pendaftar.email, pendaftar.alamat, transaksi_riwayat.tgl_bayar, transaksi_riwayat.kategori_transaksi, transaksi_riwayat.jumlah_bayar FROM ((ujian INNER JOIN transaksi_riwayat on ujian.no_ujian = transaksi_riwayat.no_ujian)INNER JOIN pendaftar ON ujian.nisn = pendaftar.nisn) WHERE transaksi_riwayat.tgl_bayar BETWEEN '$tanggal_mulai 00:00:00' AND '$tanggal_selesai 23:59:59'")->result();

    	$this->load->library('pdfgenerator');

    	$data['tanggal_mulai'] 		= $tanggal_mulai;
	    $data['tanggal_selesai'] 	= $tanggal_selesai;
	    $mulai 						= date('Y-m-d', strtotime($tanggal_mulai));
		$filter_mulai 				= $this->M_Admin->tanggal_indo($mulai, false);
		$selesai 					= date('Y-m-d', strtotime($tanggal_selesai));
		$filter_selesai				= $this->M_Admin->tanggal_indo($selesai, false);

	    $html 						= $this->load->view('v_admin/laporan_transaksi_pdf', $data, true);
	    
	    $this->pdfgenerator->generate_view_landscape($html,'[Laporan Pendaftar] '.$filter_mulai.' - '.$filter_selesai);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url().'login/admin','refresh');
	}
}
?>