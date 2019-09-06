<?php

class Data_bobot extends CI_Controller{

private $model = NULL;

		public function __construct(){
		parent::__construct();

		$this->load->model('gap_model/Bobot_model');
		$this->model = $this->Bobot_model;
	}

	public function index(){
		if(isset($_GET['tambah'])){
		$this->load->view('module_gap/view_tambah_bobot', ['model'=>$this->model]);
		} else {
		$this->select(); }
	}


	public function create(){
		if(isset($_POST['btnSubmit'])){
			$query = $this->db->get('pembobotan');
			if($query->num_rows()>=9){
			$this->session->set_flashdata('tambah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Tidak bisa menambahkan data pembobotan lagi karena sudah mencapai batas maksimal !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			redirect('gap_controller/data_bobot/index');
				} else {
			$this->model->selisih = $_POST['selisih'];	
			$this->model->bobot_nilai = $_POST['bobot_nilai'];
			$this->model->insert();
			$this->session->set_flashdata('tambah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Bobot Nilai GAP Berhasil Ditambahkan !</strong></br>Berikut Semua Daftar Data Bobot Nilai GAP yang Tersimpan
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			redirect('gap_controller/data_bobot/index');
		}
		} else {
			$this->load->view('module_gap/view_tambah_bobot', ['model'=>$this->model]);
		}

	}

	public function select(){
	if(isset($_POST['kunci'])){
	$kunci = $_POST['kunci'];
	$rows = $this->model->searching($kunci);
	$this->load->view('module_gap/view_data_bobot', ['rows'=>$rows]);
	} else {
	$rows = $this->model->select();
	$this->load->view('module_gap/view_data_bobot', ['rows'=>$rows]); }
	}

	public function update(){
		if(isset($_POST['btnSubmit'])){
			$this->model->id = $_POST['id_bobot'];
			$this->model->selisih = $_POST['selisih'];	
			$this->model->bobot_nilai = $_POST['bobot_nilai'];	
			$this->model->update();
			$this->session->set_flashdata('ubah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Bobot Nilai GAP Berhasil Diubah !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			redirect('gap_controller/data_bobot/index');
		} else {
			$id_bobot = $_GET['id_bobot'];
			$query = $this->db->query("select * from pembobotan where id_bobot='$id_bobot'");
			$row = $query->row();
			$this->model->id = $row->id_bobot;
			$this->model->selisih = $row->selisih;
			$this->model->bobot_nilai = $row->bobot_nilai;
			$this->load->view('module_gap/view_ubah_bobot',['model'=>$this->model]);
		}
	}

	public function delete(){
	$this->model->id = $_GET['id_bobot'];
	$this->model->delete();
	$this->session->set_flashdata('hapus', 
    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Data Bobot Nilai GAP Berhasil Dihapus !</strong>
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button></div>');
	redirect('gap_controller/data_bobot/index');
	}
}