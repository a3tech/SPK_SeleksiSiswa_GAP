<?php

class Subkriteria_model extends CI_Model{
public $id;
public $id_kriteria;
public $nama_kriteria;
public $nama_subkriteria;
public $jenis_penilaian;
public $nilai_target;

public function __construct(){
	parent::__construct();
	$this->load->database();
}

public function insert(){
	$query4 = $this->db->query("select max(id_subkriteria) as max_id from subkriteria");
	$rows4 = $query4->row();
	$kode= $rows4->max_id;
	$noUrut=(int)substr($kode, 2, 3);
	$noUrut++;
	$char="SK";
	$kode=$char.sprintf("%03s", $noUrut);
	$data =[
	'id_subkriteria'=>$kode,
	'id_kriteria'=>	$this->id_kriteria,
	'nama_subkriteria'=> $this->nama_subkriteria,
	'jenis_penilaian'=>	$this->jenis_penilaian,
	'nilai_target' => $this->nilai_target];
	$this->db->insert('subkriteria',$data);
	
}

public function update(){
	$sql = sprintf("update subkriteria set nama_subkriteria='%s', jenis_penilaian='%s', nilai_target='%f'
		where id_subkriteria='%s'",
					$this->nama_subkriteria,
					$this->jenis_penilaian,
					$this->nilai_target,
					$this->id);
	$this->db->query($sql);
}

public function delete(){
	$sql = sprintf("delete from subkriteria where id_kriteria='%s'",
				$this->id);
	$this->db->query($sql);
}

public function select(){
$this->db->select('*')
		 ->from('kriteria a')
		 ->join('subkriteria b', 'a.id_kriteria=b.id_kriteria')
		 ->group_by('b.id_kriteria');
$query = $this->db->get();
return $query->result();
}

public function detail(){
$this->db->select('*')
		 ->from('kriteria a')
		 ->join('subkriteria b', 'a.id_kriteria=b.id_kriteria')
		 ->where('b.id_kriteria=',$this->id_kriteria);
$query = $this->db->get();
return $query->result();
}

public function select1(){
$query = $this->db->get('kriteria');		 
return $query->result();
}

public function searching($kunci){
$this->db->select('*')
->from('subkriteria a')
->join('kriteria b', 'a.id_kriteria = b.id_kriteria')
->like('b.nama_kriteria', $kunci)
->group_by('b.nama_kriteria');
$query = $this->db->get();
return $query->result();
} 

}