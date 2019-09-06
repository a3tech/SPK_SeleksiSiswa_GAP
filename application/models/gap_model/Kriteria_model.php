<?php

class Kriteria_model extends CI_Model{
public $id;
public $nama;

public function __construct(){
	parent::__construct();
	$this->load->database();
}

public function insert(){
	$query = $this->db->query("select max(id_kriteria) as max_id from kriteria");
	$rows = $query->row();
	$kode= $rows->max_id;
	$noUrut=(int)substr($kode,2);
	$noUrut++;
	$char="KR";
	$kode=$char.sprintf("%u", $noUrut);
	$data =[
	'id_kriteria'=>$kode,
	'nama_kriteria'=>$this->nama];
	$this->db->insert('kriteria',$data);
	
}

public function update(){
	$data =[
	'nama_kriteria'=>	$this->nama
	];
	$this->db->where('id_kriteria',$this->id);
	$this->db->update('kriteria',$data);
}

public function delete(){
	$this->db->select('*')
	->from('subkriteria')
	->where('id_kriteria', $this->id);
	$query = $this->db->get();

	$this->db->select('*')
	->from('kriteria')
	->where('id_kriteria', $this->id);
	$query2 = $this->db->get();
	if($query->row()==TRUE){
	$this->db->where('id_kriteria', $this->id);
	$this->db->delete('subkriteria');
	}
	if($query2->row()==TRUE){
	$this->db->where('id_kriteria', $this->id);
	$this->db->delete('kriteria');
}
}

public function select(){
$query = $this->db->get('kriteria');
return $query->result();
}

public function searching($kunci){
$this->db->select('*')
->from('kriteria')
->like('id_kriteria', $kunci)
->or_like('nama_kriteria', $kunci);
$query = $this->db->get();
return $query->result();
} 

}