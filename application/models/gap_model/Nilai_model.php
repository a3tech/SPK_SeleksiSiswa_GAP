<?php

class Nilai_model extends CI_Model{
public $id_penilaian;
public $id_alternatif;
public $nisn;
public $id_subkriteria = array();
public $nilai = array();
public $jumlah;
	
public function __construct(){
	parent::__construct();
	$this->load->database();
}

public function insert(){
	for($i=0;$i<$this->jumlah;$i++){
	$data =[
	'id_alternatif'=> $this->id_alternatif,
	'nisn'=> $this->nisn,
	'id_subkriteria' => $this->id_subkriteria[$i],
	'nilai'=>$this->nilai[$i]
	];
	$this->db->insert('penilaian',$data);
}
}

public function insert1(){
	$data =[
	'id_alternatif'=> $this->id_alternatif
	];
	$this->db->insert('ranking',$data);
}

public function update(){
	$data =[
	'nilai' => $this->nilai
	];
	$this->db->where('id_penilaian',$this->id_penilaian);
	$this->db->update('penilaian',$data);
}	

public function detail(){
$this->db->select('*')
->from('penilaian a')
->join('alternatif b', 'a.id_alternatif = b.id_alternatif')	
->join('subkriteria c', 'a.id_subkriteria = c.id_subkriteria')
->where('a.id_alternatif=',$this->id_alternatif)
->order_by('id_penilaian', 'asc');
$query = $this->db->get();
return $query;
}	


public function delete(){
	$this->db->empty_table('penilaian');
	$this->db->empty_table('ranking');

}

public function delete1(){
	$this->db->where('nisn', $this->nisn);
	$this->db->delete('penilaian');

}

public function select_count(){
$this->db->select('*')
->from('penilaian a')
->join('alternatif b', 'a.id_alternatif = b.id_alternatif')	
->join('subkriteria c', 'a.id_subkriteria = c.id_subkriteria')
->group_by('a.id_alternatif');
$query = $this->db->get();
return $query;
} 

public function select($limit, $start){
$this->db->select('*')
->from('penilaian a')
->join('alternatif b', 'a.id_alternatif = b.id_alternatif')	
->join('subkriteria c', 'a.id_subkriteria = c.id_subkriteria')
->group_by('a.id_alternatif')
->order_by('a.id_penilaian', 'asc')
->limit($limit, $start);
$query = $this->db->get();
return $query;
} 

public function select_un(){
$query = $this->db->query("select id_parameter from parameter where id_subkriteria='SK001' ");
$jumlah = $query->num_rows();
for($i=0;$i<$jumlah;$i++){
$rows = $query->row($i);
$array[$i] = $rows->id_parameter;
}
$this->db->select('*')
->from('parameter')
->where_in('id_parameter',$array);	
$query = $this->db->get();
return $query->result();
} 

public function select_raport(){
$query = $this->db->query("select id_parameter from parameter where id_subkriteria='SK002' ");
$jumlah = $query->num_rows();
for($i=0;$i<$jumlah;$i++){
$rows = $query->row($i);
$array[$i] = $rows->id_parameter;
}
$this->db->select('*')
->from('parameter')
->where_in('id_parameter',$array);		
$query = $this->db->get();
return $query->result();
} 

public function select_kejuruan(){
$query = $this->db->query("select id_parameter from parameter where id_subkriteria='SK003' ");
$jumlah = $query->num_rows();
for($i=0;$i<$jumlah;$i++){
$rows = $query->row($i);
$array[$i] = $rows->id_parameter;
}
$this->db->select('*')
->from('parameter')
->where_in('id_parameter',$array);		
$query = $this->db->get();
return $query->result();
} 

public function select_alquran(){
$query = $this->db->query("select id_parameter from parameter where id_subkriteria='SK004' ");
$jumlah = $query->num_rows();
for($i=0;$i<$jumlah;$i++){
$rows = $query->row($i);
$array[$i] = $rows->id_parameter;
}
$this->db->select('*')
->from('parameter')
->where_in('id_parameter',$array);		
$query = $this->db->get();
return $query->result();
} 

public function select_shalat(){
$query = $this->db->query("select id_parameter from parameter where id_subkriteria='SK005' ");
$jumlah = $query->num_rows();
for($i=0;$i<$jumlah;$i++){
$rows = $query->row($i);
$array[$i] = $rows->id_parameter;
}
$this->db->select('*')
->from('parameter')
->where_in('id_parameter',$array);	
$query = $this->db->get();
return $query->result();
}

public function select_surat(){
$query = $this->db->query("select id_parameter from parameter where id_subkriteria='SK006' ");
$jumlah = $query->num_rows();
for($i=0;$i<$jumlah;$i++){
$rows = $query->row($i);
$array[$i] = $rows->id_parameter;
}
$this->db->select('*')
->from('parameter')
->where_in('id_parameter',$array);	
$query = $this->db->get();
return $query->result();
}  

public function select_butawarna(){
$query = $this->db->query("select id_parameter from parameter where id_subkriteria='SK007' ");
$jumlah = $query->num_rows();
for($i=0;$i<$jumlah;$i++){
$rows = $query->row($i);
$array[$i] = $rows->id_parameter;
}
$this->db->select('*')
->from('parameter')
->where_in('id_parameter',$array);	
$query = $this->db->get();
return $query->result();
} 

public function select_perokok(){
$query = $this->db->query("select id_parameter from parameter where id_subkriteria='SK008' ");
$jumlah = $query->num_rows();
for($i=0;$i<$jumlah;$i++){
$rows = $query->row($i);
$array[$i] = $rows->id_parameter;
}
$this->db->select('*')
->from('parameter')
->where_in('id_parameter',$array);	
$query = $this->db->get();
return $query->result();
} 

public function select_tb(){
$query = $this->db->query("select id_parameter from parameter where id_subkriteria='SK009' ");
$jumlah = $query->num_rows();
for($i=0;$i<$jumlah;$i++){
$rows = $query->row($i);
$array[$i] = $rows->id_parameter;
}
$this->db->select('*')
->from('parameter')
->where_in('id_parameter',$array);	
$query = $this->db->get();
return $query->result();
} 

public function select6(){
$query = $this->db->get('alternatif');
return $query->result();
} 

public function select_sk1(){
$this->db->select('id_subkriteria')
->from('subkriteria')
->where('id_subkriteria', 'SK001');
$query = $this->db->get();
return $query->row();
} 

public function select_sk2(){
$this->db->select('id_subkriteria')
->from('subkriteria')
->where('id_subkriteria', 'SK002');
$query = $this->db->get();
return $query->row();
} 

public function select_sk3(){
$this->db->select('id_subkriteria')
->from('subkriteria')
->where('id_subkriteria', 'SK003');
$query = $this->db->get();
return $query->row();
} 

public function select_sk4(){
$this->db->select('id_subkriteria')
->from('subkriteria')
->where('id_subkriteria', 'SK004');
$query = $this->db->get();
return $query->row();
} 

public function select_sk5(){
$this->db->select('id_subkriteria')
->from('subkriteria')
->where('id_subkriteria', 'SK005');
$query = $this->db->get();
return $query->row();
} 

public function select_sk6(){
$this->db->select('id_subkriteria')
->from('subkriteria')
->where('id_subkriteria', 'SK006');
$query = $this->db->get();
return $query->row();
} 

public function select_sk7(){
$this->db->select('id_subkriteria')
->from('subkriteria')
->where('id_subkriteria', 'SK007');
$query = $this->db->get();
return $query->row();
}

public function select_sk8(){
$this->db->select('id_subkriteria')
->from('subkriteria')
->where('id_subkriteria', 'SK008');
$query = $this->db->get();
return $query->row();
}  

public function select_sk9(){
$this->db->select('id_subkriteria')
->from('subkriteria')
->where('id_subkriteria', 'SK009');
$query = $this->db->get();
return $query->row();
} 


public function searching($kunci){
$this->db->select('*')
->from('penilaian a')
->join('alternatif b', 'a.id_alternatif = b.id_alternatif')	
->join('subkriteria c', 'a.id_subkriteria = c.id_subkriteria')
->like('b.nisn', $kunci)
->or_like('b.nama_siswa', $kunci)
->group_by('a.id_alternatif');
$query = $this->db->get();
return $query;
}

public function validasi_delete(){
	$this->where = array('nisn'=>$this->nisn);
	$this->db->select('*')
			 ->from('penilaian')
			 ->where($this->where);
	$query = $this->db->get();
	return $query->result();
}  

}