<?php

class Login_model extends CI_Model{
public $username;
public $password;
public $where = array();
public $jumlah_alternatif;
public $jumlah_kriteria;
public $jumlah_parameter;
public $jumlah_nilai;

public function __construct(){
	parent::__construct();
	$this->load->database();
}

public function authentikasi_admin(){
	$this->where = array('username'=>$this->username, 'password'=>$this->password);
	$this->db->select('*')
			 ->from('admin')
			 ->where($this->where);
	$query = $this->db->get();
	return $query->result();
}

}