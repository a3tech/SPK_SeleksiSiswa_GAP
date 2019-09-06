<?php

class Admin_model extends CI_Model{
public $id;
public $nama;
public $username;
public $password;

public function __construct(){
	parent::__construct();
	$this->load->database();
}


public function insert(){
	$data =[
	'nama_admin'=>$this->nama,
	'username' => $this->username,
	'password' =>$this->password];
	$this->db->insert('admin',$data);
	
}

public function update(){
	$sql = sprintf("update admin set nama_admin='%s', username='%s', password='%s'
					where id_admin='%s'",
					$this->nama,
					$this->username,
					$this->password,
					$this->id);
	$this->db->query($sql);
}

public function delete(){
	$sql = sprintf("delete from admin where id_admin='%s'",
				$this->id);
	$this->db->query($sql);
}

public function select(){
$query = $this->db->get('admin');
return $query->result();
}

public function searching($kunci){
$this->db->select('*')
->from('admin')
->like('id_admin', $kunci)
->or_like('nama_admin', $kunci);
$query = $this->db->get();
return $query->result();
} 


}