<?php

class Alternatif_model extends CI_Model{
public $id;
public $nama_siswa;
public $jenis_kelamin;
public $asal_sekolah;
public $nisn;

public function __construct(){
	parent::__construct();
	$this->load->database();
}

public function insert(){
	$data =[
	'nisn'=> $this->nisn,
	'nama_siswa' => $this->nama_siswa,
	'jenis_kelamin' => $this->jenis_kelamin,
	'asal_sekolah' => $this->asal_sekolah
	];
	$this->db->insert('alternatif',$data);
	
}

public function update(){
	$data =[
	'nisn'=> $this->nisn,
	'nama_siswa' => $this->nama_siswa,
	'jenis_kelamin' => $this->jenis_kelamin,
	'asal_sekolah' => $this->asal_sekolah
	];
	$this->db->where('id_alternatif',$this->id);
	$this->db->update('alternatif',$data);
}

public function delete(){
	$this->db->where('id_alternatif', $this->id);
	$this->db->delete('ranking');
	$this->db->where('id_alternatif', $this->id);
	$this->db->delete('penilaian');
	$this->db->where('id_alternatif', $this->id);
	$this->db->delete('alternatif');
}



public function select($limit, $start){
$query = $this->db->get('alternatif', $limit, $start);
        return $query;
}


public function searching($kunci){
$this->db->select('*')
->from('alternatif')
->like('nisn', $kunci)
->or_like('nama_siswa', $kunci);
$query = $this->db->get();
return $query;
} 


}