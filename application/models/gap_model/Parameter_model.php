<?php

class Parameter_model extends CI_Model{
public $id;
public $id_subkriteria;
public $nama_kriteria;
public $parameter_nilai;
public $bobot_parameter;
public $keterangan;

public function __construct(){
	parent::__construct();
	$this->load->database();
}

public function insert(){
	$query4 = $this->db->query("select max(id_parameter) as max_id from parameter");
	$rows4 = $query4->row();
	$kode= $rows4->max_id;
	$noUrut=(int)substr($kode, 2, 3);
	$noUrut++;
	$char="PM";
	$kode=$char.sprintf("%03s", $noUrut);
	$data =[
	'id_parameter'=>$kode,
	'id_subkriteria'=>	$this->id_subkriteria,
	'parameter_nilai'=>	$this->parameter_nilai,
	'bobot_parameter' => $this->bobot_parameter,
	'keterangan' => $this->keterangan];
	$this->db->insert('parameter',$data);
	
}

public function update(){
	$sql = sprintf("update parameter set parameter_nilai='%s', bobot_parameter='%f', keterangan='%s'
		where id_parameter='%s'",
					$this->parameter_nilai,
					$this->bobot_parameter,
					$this->keterangan,
					$this->id);
	$this->db->query($sql);
}

public function delete(){
	$sql = sprintf("delete from parameter where id_subkriteria='%s'",
				$this->id);
	$this->db->query($sql);
}

public function select(){
$this->db->select('*')
		 ->from('subkriteria a')
		 ->join('parameter b', 'a.id_subkriteria=b.id_subkriteria')
		 ->group_by('b.id_subkriteria');
$query = $this->db->get();
return $query->result();
}

public function detail(){
$this->db->select('*')
		 ->from('subkriteria a')
		 ->join('parameter b', 'a.id_subkriteria=b.id_subkriteria')
		 ->where('b.id_subkriteria=',$this->id_subkriteria);
$query = $this->db->get();
return $query->result();
}

public function select1(){
$query = $this->db->get('subkriteria');		 
return $query->result();
}

public function searching($kunci){
$this->db->select('*')
->from('parameter a')
->join('subkriteria b', 'a.id_subkriteria = b.id_subkriteria')
->like('b.nama_subkriteria', $kunci)
->group_by('b.nama_subkriteria', $kunci);
$query = $this->db->get();
return $query->result();
} 

}