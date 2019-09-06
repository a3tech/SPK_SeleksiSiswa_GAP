<?php

class Bobot_model extends CI_Model{
public $id;
public $selisih;
public $bobot_nilai;

public function __construct(){
	parent::__construct();
	$this->load->database();
}

public function insert(){
	$query = $this->db->query("select max(id_bobot) as max_id from pembobotan");
	$rows = $query->row();
	$kode= $rows->max_id;
	$noUrut=(int)substr($kode,2);
	$noUrut++;
	$char="BB";
	$kode=$char.sprintf("%u", $noUrut);
	$data =[
	'id_bobot'=>$kode,
	'selisih'=>$this->selisih,
	'bobot_nilai'=>$this->bobot_nilai];
	$this->db->insert('pembobotan',$data);
	
}

public function update(){
	$data =[
	'selisih'=>	$this->selisih,
	'bobot_nilai'=>	$this->bobot_nilai
	];
	$this->db->where('id_bobot',$this->id);
	$this->db->update('pembobotan',$data);
}

public function delete(){
	$this->db->where('id_bobot', $this->id);
	$this->db->delete('pembobotan');
}

public function select(){
$query = $this->db->get('pembobotan');
return $query->result();
}

public function searching($kunci){
$this->db->select('*')
->from('pembobotan')
->like('id_bobot', $kunci)
->or_like('bobot_nilai', $kunci);
$query = $this->db->get();
return $query->result();
} 

}