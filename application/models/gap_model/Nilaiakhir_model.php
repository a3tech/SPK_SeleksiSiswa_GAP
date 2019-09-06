<?php

class Nilaiakhir_model extends CI_Model{
public $id_alternatif = array();
public $nisn_akhir = array();
public $nama_akhir = array();
public $subkriteria_penilaian = array();
public $subkriteria_keagamaan = array();
public $subkriteria_kesehatan = array();
public $nilai_alternatif;
public $nilai_cf_c1= array();
public $nilai_cf_c2= array();
public $nilai_cf_c3= array();
public $nilai_sf_c1= array();
public $nilai_sf_c2= array();
public $nilai_sf_c3= array();
public $nilai_total_c1= array();
public $nilai_total_c2= array();
public $nilai_total_c3= array();
public $total_nilai= array();
public $tampil_total= array();
//VARIABEL MIPA
public $nama_siswa= array();
public $nilai_un = array();
public $target_un;
public $gap1= array();
public $bobot_gap1= array();

public $nilai_raport = array();
public $target_raport;
public $gap2= array();
public $bobot_gap2= array();

public $nilai_kejuruan = array();
public $target_kejuruan;
public $gap3= array();
public $bobot_gap3= array();

public $nilai_alquran = array();
public $target_alquran;
public $gap4= array();
public $bobot_gap4= array();

public $nilai_shalat = array();
public $target_shalat;
public $gap5= array();
public $bobot_gap5 =array();

public $nilai_surat = array();
public $target_surat;
public $gap6= array();
public $bobot_gap6= array();

public $nilai_butawarna = array();
public $target_butawarna;
public $gap7= array();
public $bobot_gap7= array();

public $nilai_perokok = array();
public $target_perokok;
public $gap8= array();
public $bobot_gap8= array();

public $nilai_tb = array();
public $target_tb;
public $gap9= array();
public $bobot_gap9= array();

public $total = array();
public $jumlah;

public function __construct(){
	parent::__construct();
	$this->load->database();
}



public function update(){
	for($i=0;$i<$this->jumlah;$i++){
	$data =[
	'total'=>$this->total_nilai[$i]
	];
	$this->db->where('id_alternatif',$this->id_alternatif[$i]);
	$this->db->update('ranking',$data);
}
}

public function update_sk1(){
	for($i=0;$i<$this->jumlah;$i++){
	$array = array('id_alternatif' => $this->id_alternatif[$i], 'id_subkriteria' => 'SK001');
	$data =[
	'gap'=>$this->gap1[$i],
	'nilai_bobot'=>$this->bobot_gap1[$i]
	];
	$this->db->where($array);
	$this->db->update('penilaian',$data);
}
}

public function update_sk2(){
	for($i=0;$i<$this->jumlah;$i++){
	$array = array('id_alternatif' => $this->id_alternatif[$i], 'id_subkriteria' => 'SK002');
	$data =[
	'gap'=>$this->gap2[$i],
	'nilai_bobot'=>$this->bobot_gap2[$i]
	];
	$this->db->where($array);
	$this->db->update('penilaian',$data);
}
}


public function update_sk3(){
	for($i=0;$i<$this->jumlah;$i++){
	$array = array('id_alternatif' => $this->id_alternatif[$i], 'id_subkriteria' => 'SK003');
	$data =[
	'gap'=>$this->gap3[$i],
	'nilai_bobot'=>$this->bobot_gap3[$i]
	];
	$this->db->where($array);
	$this->db->update('penilaian',$data);
}
}


public function update_sk4(){
	for($i=0;$i<$this->jumlah;$i++){
	$array = array('id_alternatif' => $this->id_alternatif[$i], 'id_subkriteria' => 'SK004');
	$data =[
	'gap'=>$this->gap4[$i],
	'nilai_bobot'=>$this->bobot_gap4[$i]
	];
	$this->db->where($array);
	$this->db->update('penilaian',$data);
}}


public function update_sk5(){
	for($i=0;$i<$this->jumlah;$i++){
	$array = array('id_alternatif' => $this->id_alternatif[$i], 'id_subkriteria' => 'SK005');
	$data =[
	'gap'=>$this->gap5[$i],
	'nilai_bobot'=>$this->bobot_gap5[$i]
	];
	$this->db->where($array);
	$this->db->update('penilaian',$data);
}}



public function update_sk6(){
	for($i=0;$i<$this->jumlah;$i++){
	$array = array('id_alternatif' => $this->id_alternatif[$i], 'id_subkriteria' => 'SK006');
	$data =[
	'gap'=>$this->gap6[$i],
	'nilai_bobot'=>$this->bobot_gap6[$i]
	];
	$this->db->where($array);
	$this->db->update('penilaian',$data);
}}



public function update_sk7(){
	for($i=0;$i<$this->jumlah;$i++){
	$array = array('id_alternatif' => $this->id_alternatif[$i], 'id_subkriteria' => 'SK007');
	$data =[
	'gap'=>$this->gap7[$i],
	'nilai_bobot'=>$this->bobot_gap7[$i]
	];
	$this->db->where($array);
	$this->db->update('penilaian',$data);
}}


public function update_sk8(){
	for($i=0;$i<$this->jumlah;$i++){
	$array = array('id_alternatif' => $this->id_alternatif[$i], 'id_subkriteria' => 'SK008');
	$data =[
	'gap'=>$this->gap8[$i],
	'nilai_bobot'=>$this->bobot_gap8[$i]
	];
	$this->db->where($array);
	$this->db->update('penilaian',$data);
}}



public function update_sk9(){
	for($i=0;$i<$this->jumlah;$i++){
	$array = array('id_alternatif' => $this->id_alternatif[$i], 'id_subkriteria' => 'SK009');
	$data =[
	'gap'=>$this->gap9[$i],
	'nilai_bobot'=>$this->bobot_gap9[$i]
	];
	$this->db->where($array);
	$this->db->update('penilaian',$data);
}}



public function cetak_laporan(){
$this->db->select('*')
->from('ranking a')
->join('alternatif b', 'a.id_alternatif = b.id_alternatif')
->order_by('total', 'desc');	
$query = $this->db->get();
return $query->result();
}

public function select($limit, $start){
$this->db->select('*')
->from('ranking a')
->join('alternatif b', 'a.id_alternatif = b.id_alternatif')	
->order_by('a.total', 'desc')
->limit($limit, $start);
$query = $this->db->get();
return $query;
} 

public function select11($limit, $start){
$this->db->select('*')
->from('penilaian a')
->join('alternatif b', 'a.id_alternatif = b.id_alternatif')	
->join('subkriteria c', 'a.id_subkriteria = c.id_subkriteria')	
->join('kriteria d', 'd.id_kriteria = c.id_kriteria')
->where_in('a.id_alternatif',$this->id_alternatif)
->where('a.id_subkriteria','SK001')
->group_by('a.id_alternatif')
->limit($limit, $start)
->order_by('a.id_penilaian','asc');
$query = $this->db->get();
return $query;
} 

public function select12($limit, $start){
$this->db->select('*')
->from('penilaian a')
->join('alternatif b', 'a.id_alternatif = b.id_alternatif')	
->join('subkriteria c', 'a.id_subkriteria = c.id_subkriteria')	
->join('kriteria d', 'd.id_kriteria = c.id_kriteria')
->where_in('a.id_alternatif',$this->id_alternatif)
->where('a.id_subkriteria','SK002')
->group_by('a.id_alternatif')
->limit($limit, $start)
->order_by('a.id_penilaian','asc');
$query = $this->db->get();
return $query;
} 

public function select13($limit, $start){
$this->db->select('*')
->from('penilaian a')
->join('alternatif b', 'a.id_alternatif = b.id_alternatif')	
->join('subkriteria c', 'a.id_subkriteria = c.id_subkriteria')	
->join('kriteria d', 'd.id_kriteria = c.id_kriteria')
->where_in('a.id_alternatif',$this->id_alternatif)
->where('a.id_subkriteria','SK003')
->group_by('a.id_alternatif')
->limit($limit, $start)
->order_by('a.id_penilaian','asc');
$query = $this->db->get();
return $query;
} 

public function select21($limit, $start){
$this->db->select('*')
->from('penilaian a')
->join('alternatif b', 'a.id_alternatif = b.id_alternatif')	
->join('subkriteria c', 'a.id_subkriteria = c.id_subkriteria')	
->join('kriteria d', 'd.id_kriteria = c.id_kriteria')
->where_in('a.id_alternatif',$this->id_alternatif)
->where('a.id_subkriteria','SK004')
->group_by('a.id_alternatif')
->limit($limit, $start)
->order_by('a.id_penilaian','asc');
$query = $this->db->get();
return $query;
} 

public function select22($limit, $start){
$this->db->select('*')
->from('penilaian a')
->join('alternatif b', 'a.id_alternatif = b.id_alternatif')	
->join('subkriteria c', 'a.id_subkriteria = c.id_subkriteria')	
->join('kriteria d', 'd.id_kriteria = c.id_kriteria')
->where_in('a.id_alternatif',$this->id_alternatif)
->where('a.id_subkriteria','SK005')
->group_by('a.id_alternatif')
->limit($limit, $start)
->order_by('a.id_penilaian','asc');
$query = $this->db->get();
return $query;
} 

public function select23($limit, $start){
$this->db->select('*')
->from('penilaian a')
->join('alternatif b', 'a.id_alternatif = b.id_alternatif')	
->join('subkriteria c', 'a.id_subkriteria = c.id_subkriteria')	
->join('kriteria d', 'd.id_kriteria = c.id_kriteria')
->where_in('a.id_alternatif',$this->id_alternatif)
->where('a.id_subkriteria','SK006')
->group_by('a.id_alternatif')
->limit($limit, $start)
->order_by('a.id_penilaian','asc');
$query = $this->db->get();
return $query;
} 


public function select31($limit, $start){
$this->db->select('*')
->from('penilaian a')
->join('alternatif b', 'a.id_alternatif = b.id_alternatif')	
->join('subkriteria c', 'a.id_subkriteria = c.id_subkriteria')	
->join('kriteria d', 'd.id_kriteria = c.id_kriteria')
->where_in('a.id_alternatif',$this->id_alternatif)
->where('a.id_subkriteria','SK007')
->group_by('a.id_alternatif')
->limit($limit, $start)
->order_by('a.id_penilaian','asc');
$query = $this->db->get();
return $query;
} 

public function select32($limit, $start){
$this->db->select('*')
->from('penilaian a')
->join('alternatif b', 'a.id_alternatif = b.id_alternatif')	
->join('subkriteria c', 'a.id_subkriteria = c.id_subkriteria')	
->join('kriteria d', 'd.id_kriteria = c.id_kriteria')
->where_in('a.id_alternatif',$this->id_alternatif)
->where('a.id_subkriteria','SK008')
->group_by('a.id_alternatif')
->limit($limit, $start)
->order_by('a.id_penilaian','asc');
$query = $this->db->get();
return $query;
} 

public function select33($limit, $start){
$this->db->select('*')
->from('penilaian a')
->join('alternatif b', 'a.id_alternatif = b.id_alternatif')	
->join('subkriteria c', 'a.id_subkriteria = c.id_subkriteria')	
->join('kriteria d', 'd.id_kriteria = c.id_kriteria')
->where_in('a.id_alternatif',$this->id_alternatif)
->where('a.id_subkriteria','SK009')
->group_by('a.id_alternatif')
->limit($limit, $start)
->order_by('a.id_penilaian','asc');
$query = $this->db->get();
return $query;
} 




}