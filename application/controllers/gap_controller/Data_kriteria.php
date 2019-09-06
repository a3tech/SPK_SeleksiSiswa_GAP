<?php

class Data_kriteria extends CI_Controller{

private $model = NULL;

		public function __construct(){
		parent::__construct();

		$this->load->model('gap_model/Kriteria_model');
		$this->model = $this->Kriteria_model;
	}

	public function index(){
		if(isset($_GET['tambah'])){
		$this->load->view('module_gap/view_tambah_kriteria', ['model'=>$this->model]);
		} else {
		$this->select(); }
	}


	public function create(){
		if(isset($_POST['btnSubmit'])){
			$query = $this->db->get('kriteria');
			if($query->num_rows()>=5){
			$this->session->set_flashdata('tambah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Tidak bisa menambahkan data kriteria lagi karena sudah mencapai batas maksimal !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			redirect('gap_controller/data_kriteria/index');
				} else {
			$this->model->nama = $_POST['nama'];	
			$this->model->insert();
			$this->session->set_flashdata('tambah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Kriteria Berhasil Ditambahkan !</strong></br>Berikut Semua Daftar Data Kriteria yang Tersimpan
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			redirect('gap_controller/data_kriteria/index');
		}
		} else {
			$this->load->view('module_gap/view_tambah_kriteria', ['model'=>$this->model]);
		}

	}

	public function select(){
	if(isset($_POST['kunci'])){
	$kunci = $_POST['kunci'];
	$rows = $this->model->searching($kunci);
	$this->load->view('module_gap/view_data_kriteria', ['rows'=>$rows]);
	} else {
	$rows = $this->model->select();
	$this->load->view('module_gap/view_data_kriteria', ['rows'=>$rows]); }
	}

	public function update(){
		if(isset($_POST['btnSubmit'])){
			$this->model->id = $_POST['id_kriteria'];
			$this->model->nama = $_POST['nama'];	
			$this->model->update();
			$this->session->set_flashdata('ubah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Kriteria Berhasil Diubah !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			redirect('gap_controller/data_kriteria/index');
		} else {
			$id_kriteria = $_GET['id_kriteria'];
			$query = $this->db->query("select * from kriteria where id_kriteria='$id_kriteria'");
			$row = $query->row();
			$this->model->id = $row->id_kriteria;
			$this->model->nama = $row->nama_kriteria;
			$this->load->view('module_gap/view_ubah_kriteria',['model'=>$this->model]);
		}
	}

	public function delete(){
	$this->model->id = $_GET['id_kriteria'];
	$this->model->delete();
	$this->session->set_flashdata('hapus', 
    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Data Kriteria Berhasil Dihapus !</strong>
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button></div>');
	redirect('gap_controller/data_kriteria/index');
	}
}