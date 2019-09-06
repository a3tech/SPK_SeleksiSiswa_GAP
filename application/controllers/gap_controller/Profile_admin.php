<?php

class Profile_admin extends CI_Controller{
private $model = NULL;

		public function __construct(){
		parent::__construct();

		$this->load->model('gap_model/Login_model');
		$this->model = $this->Login_model;
	}

	public function validasi_proses(){
	if(isset($_GET['validasi'])){
 	$this->db->select('b.id_subkriteria')
 	->from('subkriteria a')
	->join('penilaian b', 'a.id_subkriteria= b.id_subkriteria');
	$query1 = $this->db->get();
	$query = $this->db->get('kriteria');	
	if($query->num_rows()<3){
	$this->session->set_flashdata('validasi', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Tidak Bisa Memproses Nilai Karena Kriteria Kurang Dari 5</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');

		redirect('gap_controller/profile_admin/index');

	}elseif($query1->num_rows()<9){
	$this->session->set_flashdata('validasi1', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Tidak Bisa Memproses Nilai Karena Nilai Setiap Alternatif Kurang Dari 9 SubKriteria</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');

		redirect('gap_controller/profile_admin/index');
	}
	else {
			redirect('data_nilaiakhir1/index');
	}
}
}

	public function index(){
	if($this->session->has_userdata('user_admin')){

	$query1 = $this->db->query("select id_alternatif from alternatif");
	$rows1 = $query1->num_rows();
	$this->model->jumlah_alternatif = $rows1;

	$query2 = $this->db->query("select id_kriteria from kriteria");
	$rows2 = $query2->num_rows();
	$this->model->jumlah_kriteria = $rows2;

	$query3 = $this->db->query("select id_subkriteria from subkriteria");
	$rows3 = $query3->num_rows();
	$this->model->jumlah_parameter = $rows3;

	$query4 = $this->db->query("select id_penilaian from penilaian");
	$rows4 = $query4->num_rows();
	$this->model->jumlah_nilai = $rows4;

	$this->load->view('view_profile_admin2', ['model'=>$this->model,
										 	 'jumlah_alternatif'=>$this->model->jumlah_alternatif,
										 	 'jumlah_kriteria'=>$this->model->jumlah_kriteria,
										 	 'jumlah_parameter'=>$this->model->jumlah_parameter,
										 	 'jumlah_nilai'=>$this->model->jumlah_nilai]);	
	}else{
	$this->load->view('login2',
							  ['model'=>$this->model]);
		}
	}
}