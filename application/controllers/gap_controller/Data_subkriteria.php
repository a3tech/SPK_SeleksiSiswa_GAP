<?php

class Data_subkriteria extends CI_Controller{

private $model = NULL;

		public function __construct(){
		parent::__construct();

		$this->load->model('gap_model/Subkriteria_model');
		$this->model = $this->Subkriteria_model;
	}

	public function index(){
		$this->select(); 
	}


	public function create(){
		if(isset($_POST['btnSubmit'])){
			$this->model->id_kriteria = $_POST['id_kriteria'];	
			$this->model->nama_subkriteria = $_POST['nama_subkriteria'];
			$this->model->jenis_penilaian = $_POST['jenis'];	
			$this->model->nilai_target = $_POST['nilai_target'];
			$this->session->set_flashdata('tambah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data SubKriteria Berhasil Ditambahkan !</strong></br>Berikut Semua Daftar Data Parameter yang Tersimpan
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			$this->model->insert();
			redirect('gap_controller/data_subkriteria/index');
		} else {
			$rows = $this->model->select1();
			$this->load->view('module_gap/view_tambah_subkriteria', ['rows'=>$rows]);
		}

	}

	public function select(){
	if(isset($_POST['kunci'])){
	$kunci = $_POST['kunci'];
	$rows = $this->model->searching($kunci);
	$this->load->view('module_gap/view_data_subkriteria', ['rows'=>$rows]);
	} else {
	$rows = $this->model->select();
	$this->load->view('module_gap/view_data_subkriteria', ['rows'=>$rows]); }
	}

	public function detail(){
	$this->model->id_kriteria = $_GET['id_kriteria'];
	$this->model->detail();
	$rows = $this->model->detail();
	$this->load->view('module_gap/view_detail_subkriteria', ['rows'=>$rows]); 
	
	}


	public function update(){
		if(isset($_POST['btnSubmit'])){
			$this->model->id = $_POST['id_subkriteria'];
			$this->model->nama_subkriteria = $_POST['nama_subkriteria'];
			$this->model->jenis_penilaian = $_POST['jenis'];	
			$this->model->nilai_target = $_POST['nilai_target'];
			$this->session->set_flashdata('ubah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data SubKriteria Berhasil Diubah !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			$this->model->update();
			redirect('gap_controller/data_subkriteria/index');
		} else {
			$id_subkriteria = $_GET['id_subkriteria'];
			$query = $this->db->query("select * from kriteria a join subkriteria b 
				on a.id_kriteria=b.id_kriteria where b.id_subkriteria='$id_subkriteria'");
			$this->load->view('module_gap/view_ubah_subkriteria',['query'=>$query]);
		}
	}

	public function delete(){
	$this->model->id = $_GET['id_kriteria'];
	$this->model->delete();
	$this->session->set_flashdata('hapus', 
    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Data SubKriteria Berhasil Dihapus !</strong>
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button></div>');
	redirect('gap_controller/data_subkriteria/index');
	}
}