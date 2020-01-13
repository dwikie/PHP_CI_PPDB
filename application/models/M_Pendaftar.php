<?php
defined('BASEPATH') or exit('No direct Script access allowed');

class M_Pendaftar extends CI_Model
{
	function nilai_min($kd_jurusan)
	{
     	$query = $this->db->query("SELECT nilai_min FROM jurusan WHERE jurusan.kd_jurusan='$kd_jurusan'")->row();
     	$nilai_min = $query->nilai_min;
     	return $nilai_min;
  }
}