<?php

class Data_parameter extends CI_Controller{

private $model = NULL;

		public function __construct(){
		parent::__construct();

		$this->load->model('gap_model/Parameter_model');
		$this->model = $this->Parameter_model;
	}

	public function index(){
		$this->select(); 
	}


	public function create(){
		if(isset($_POST['btnSubmit'])){
			$this->model->id_subkriteria = $_POST['id_subkriteria'];	
			$this->model->parameter_nilai = $_POST['parameter_nilai'];	
			$this->model->bobot_parameter = $_POST['bobot_parameter'];
			$this->model->keterangan = $_POST['keterangan'];
			$this->session->set_flashdata('tambah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Parameter Berhasil Ditambahkan !</strong></br>Berikut Semua Daftar Data Parameter yang Tersimpan
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			$this->model->insert();
			redirect('gap_controller/data_parameter/index');
		} else {
			$rows = $this->model->select1();
			$this->load->view('module_gap/view_tambah_parameter', ['rows'=>$rows]);
		}

	}

	public function select(){
	if(isset($_POST['kunci'])){
	$kunci = $_POST['kunci'];
	$rows = $this->model->searching($kunci);
	$this->load->view('module_gap/view_data_parameter', ['rows'=>$rows]);
	} else {
	$rows = $this->model->select();
	$this->load->view('module_gap/view_data_parameter', ['rows'=>$rows]); }
	}

	public function detail(){
	$this->model->id_subkriteria = $_GET['id_subkriteria'];
	$this->model->detail();
	$rows = $this->model->detail();
	$this->load->view('module_gap/view_detail_parameter', ['rows'=>$rows]); 
	
	}


	public function update(){
		if(isset($_POST['btnSubmit'])){
			$this->model->id = $_POST['id_parameter'];
			$this->model->parameter_nilai = $_POST['parameter_nilai'];
			$this->model->bobot_parameter = $_POST['bobot_parameter'];
			$this->model->keterangan = $_POST['keterangan'];
			$this->session->set_flashdata('ubah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Parameter Berhasil Diubah !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			$this->model->update();
			redirect('gap_controller/data_parameter/index');
		} else {
			$id_parameter = $_GET['id_parameter'];
			$query = $this->db->query("select * from subkriteria a join parameter b 
				on a.id_subkriteria=b.id_subkriteria where b.id_parameter='$id_parameter'");
			$this->load->view('module_gap/view_ubah_parameter',['query'=>$query]);
		}
	}

	public function delete(){
	$this->model->id = $_GET['id_subkriteria'];
	$this->model->delete();
	$this->session->set_flashdata('hapus', 
    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Data Parameter Berhasil Dihapus !</strong>
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button></div>');
	redirect('gap_controller/data_parameter/index');
	}
}