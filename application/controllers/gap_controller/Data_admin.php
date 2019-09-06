<?php

class Data_admin extends CI_Controller{

private $model = NULL;

		public function __construct(){
		parent::__construct();

		$this->load->model('gap_model/Admin_model');
		$this->model = $this->Admin_model;
	}

	public function index(){
		if(isset($_GET['tambah'])){
		$this->load->view('module/view_tambah_admin', ['model'=>$this->model]);
		} else {
		$this->select(); }
	}


	public function create(){
		if(isset($_POST['btnSubmit'])){
			$this->model->nama = $_POST['nama'];	
			$this->model->username = $_POST['username'];
			$this->model->password = $_POST['password'];
			$this->model->insert();
			$this->session->set_flashdata('tambah', 
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Data Admin Berhasil Ditambahkan !</strong></br>Berikut Semua Daftar Data Admin yang Tersimpan
                      <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>');
			redirect('data_admin/index');
		} else {
			$this->load->view('module/view_tambah_admin', ['model'=>$this->model]);
		}

	}

	public function select(){
	if(isset($_POST['kunci'])){
	$kunci = $_POST['kunci'];
	$rows = $this->model->searching($kunci);
	$this->load->view('module/view_data_admin', ['rows'=>$rows]);
	} else {
	$rows = $this->model->select();
	$this->load->view('module/view_data_admin', ['rows'=>$rows]); }
	}

	public function update($id_admin){
		if(isset($_POST['btnSubmit'])){
			$this->model->id = $_POST['id_admin'];
			$this->model->nama = $_POST['nama'];	
			$this->model->username = $_POST['username'];
			$this->model->password = $_POST['password'];
			$this->model->update();
			$this->session->set_flashdata('ubah', 
                '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <strong>Data Admin Berhasil Diubah !</strong>
                      <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>');
			redirect('data_admin/index');
		} else {
			$query = $this->db->query("select * from admin where id_admin='$id_admin'");
			$row = $query->row();
			$this->model->id = $row->id_admin;
			$this->model->nama = $row->nama_admin;
			$this->model->username = $row->username;
			$this->model->password = $row->password;
			$this->load->view('module/view_ubah_admin',['model'=>$this->model]);
		}
	}

	public function delete($id){
	$this->model->id = $id;
	$this->model->delete();
	$this->session->set_flashdata('hapus', 
    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
     <strong>Data Admin Berhasil Dhapus !</strong>
     <button class="close" type="button" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button></div>');
	redirect('data_admin/index');
	}
}