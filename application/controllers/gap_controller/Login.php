<?php

class Login extends CI_Controller{

private $model = NULL;

		public function __construct(){
		parent::__construct();

		$this->load->model('gap_model/Login_model');
		$this->model = $this->Login_model;
	}

	public function index(){
		if(isset($_POST['btnSubmit'])){
		$this->model->username = $_POST['username'];
		$this->model->password = $_POST['password'];
		if($this->model->authentikasi_admin()==TRUE){
		$this->session->set_userdata('user_admin',$this->model->username);

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
		}else {
		$this->session->set_flashdata('gagal', 
   		 '<div class="alert alert-warning alert-dismissible fade show" role="alert">
   		 <strong>Username Atau Password yang Anda Masukan Salah !</strong>
   		 <button class="close" type="button" data-dismiss="alert" aria-label="Close">
   		 <span aria-hidden="true">×</span>
   		 </button></div>');
		redirect('gap_controller/login');}
		}elseif($this->session->has_userdata('user_admin')){

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

	public function logout(){
		if($this->session->has_userdata('user_admin')){
			$this->session->sess_destroy();
			$this->load->view('login2',
							  ['model'=>$this->model]);
		} else {
			$this->session->sess_destroy();
			$this->load->view('login2',
							  ['model'=>$this->model]);
		}
	}


}