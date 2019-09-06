<?php

class Data_nilai1 extends CI_Controller{
public $models = array();
public $id_alternatif;
public $id_subkriteria;
private $model = NULL;

		public function __construct(){
		parent::__construct();

		$this->load->library('pagination');
		$this->load->model('gap_model/Nilai_model');
		$this->model = $this->Nilai_model;

	}

	public function index(){
	if(isset($_GET['tambah'])){
	$rows = $this->model->select6();
	$rows1 = $this->model->select_un();
	$rows2 = $this->model->select_raport();
	$rows3 = $this->model->select_kejuruan();
	$rows4 = $this->model->select_alquran();
	$rows5 = $this->model->select_shalat();
	$rows6 = $this->model->select_surat();
	$rows7 = $this->model->select_butawarna();
	$rows8 = $this->model->select_perokok();
	$rows9 = $this->model->select_tb();
	$sk1 = $this->model->select_sk1();
	$sk2 = $this->model->select_sk2();
	$sk3 = $this->model->select_sk3();
	$sk4 = $this->model->select_sk4();
	$sk5 = $this->model->select_sk5();
	$sk6 = $this->model->select_sk6();
	$sk7 = $this->model->select_sk7();
	$sk8 = $this->model->select_sk8();
	$sk9 = $this->model->select_sk9();
	$this->load->view('module_gap/view_tambah_nilai', ['rows'=>$rows,
												  'rows1'=>$rows1,
												  'rows2'=>$rows2,
												  'rows3'=>$rows3,
												  'rows4'=>$rows4,
												  'rows5'=>$rows5,
												  'rows6'=>$rows6,
												  'rows7'=>$rows7,
												  'rows8'=>$rows8,
												  'rows9'=>$rows9,
												  'sk1'=>$sk1,
												  'sk2'=>$sk2,
												  'sk3'=>$sk3,
												  'sk4'=>$sk4,
												  'sk5'=>$sk5,
												  'sk6'=>$sk6,
												  'sk7'=>$sk7,
												  'sk8'=>$sk8,
												  'sk9'=>$sk9]);
	} 
	else{
		$this->select();
	 }
	}

		public function create(){
		if(isset($_POST['btnSubmit'])){
			$this->model->id_alternatif = $_POST['id_alternatif'];
			$this->db->select('*')
			->from('alternatif')
			->where('id_alternatif', $this->model->id_alternatif);
			$query = $this->db->get();
			$row = $query->row();
			$this->model->nisn = $row->nisn;
			$this->model->id_subkriteria[0] = $_POST['id_sk1'];
			$this->model->id_subkriteria[1] = $_POST['id_sk2'];
			$this->model->id_subkriteria[2] = $_POST['id_sk3'];
			$this->model->id_subkriteria[3] = $_POST['id_sk4'];
			$this->model->id_subkriteria[4] = $_POST['id_sk5'];
			$this->model->id_subkriteria[5] = $_POST['id_sk6'];
			$this->model->id_subkriteria[6] = $_POST['id_sk7'];
			$this->model->id_subkriteria[7] = $_POST['id_sk8'];
			$this->model->id_subkriteria[8] = $_POST['id_sk9'];
			$this->model->nilai[0] = $_POST['nilai_sk1'];
			$this->model->nilai[1] = $_POST['nilai_sk2'];
			$this->model->nilai[2] = $_POST['nilai_sk3'];
			$this->model->nilai[3] = $_POST['nilai_sk4'];
			$this->model->nilai[4] = $_POST['nilai_sk5'];
			$this->model->nilai[5] = $_POST['nilai_sk6'];
			$this->model->nilai[6] = $_POST['nilai_sk7'];
			$this->model->nilai[7] = $_POST['nilai_sk8'];
			$this->model->nilai[8] = $_POST['nilai_sk9'];
			$this->model->jumlah = count($this->model->id_subkriteria);
			$this->model->insert();
			$this->model->insert1();
			$this->session->set_flashdata('tambah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Nilai Alternatif Berhasil Ditambahkan !</strong></br>Berikut Semua Daftar Data Nilai Alternatif yang Tersimpan
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			redirect('data_nilai1/index'); 
		} else {
			$this->load->view('module_gap/view_data_nilai', ['model'=>$this->model]);
		}

	}

	public function select(){
	if(isset($_POST['kunci'])){
	$kunci = $_POST['kunci'];
        $data['data'] = $this->model->searching($kunci);           

		$this->load->view('module_gap/view_data_nilai', ['data'=>$data]); 
		}  else {
	 	$config['base_url'] = site_url('data_nilai1/index'); //site url
        $config['total_rows'] = $this->model->select_count()->num_rows(); //total row
        $config['per_page'] = 10;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      $config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
        $data['data'] = $this->model->select($config["per_page"], $data['page']);           
 
        $data['pagination'] = $this->pagination->create_links();
	$this->load->view('module_gap/view_data_nilai', ['data'=>$data]); 
	}
	}

	public function prosesnilai(){
			if(isset($_POST['btnSubmit'])){
			$this->model->id_alternatif = $_POST['id_alternatif'];	
			$this->model->id_subkriteria = $_POST['id_subkriteria'];
			$this->model->id_kriteria = $_POST['id_kriteria'];
			$this->id_alternatif = $this->model->id_alternatif;
			$this->id_subkriteria = $this->model->id_subkriteria;
			$query = $this->db->query("select * from sub_kriteria where id_subkriteria='$this->id_subkriteria'");
			$rows = $query->row();
			$this->model->nilai_alternatif = $rows->nilai_sub; 
			$this->model->insert();
			redirect('data_nilai1/index');	
		
		}
		}


public function update1(){
		if(isset($_POST['btnSubmit'])){
			$this->model->id_penilaian = $_POST['id_penilaian'];
			if($_POST['sk7']){
			$this->model->nilai = $_POST['sk7'];	
			$this->model->update();
			$this->session->set_flashdata('ubah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Nilai Alternatif Berhasil Diubah !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			$this->select();	
			}elseif($_POST['sk8']){
			$this->model->nilai = $_POST['sk8'];	
			$this->model->update();
			$this->session->set_flashdata('ubah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Nilai Alternatif Berhasil Diubah !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			redirect('data_nilai1/index');	
			}else{
			$this->model->nilai = $_POST['sk9'];	
			$this->model->update();
			$this->session->set_flashdata('ubah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Nilai Alternatif Berhasil Diubah !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			redirect('data_nilai1/index');		
			}				
		}
	}
		public function update(){
		if(isset($_POST['btnSubmit'])){
			$this->model->id_penilaian = $_POST['id_penilaian'];
			if($_POST['sk1']){
			$this->model->nilai = $_POST['sk1'];	
			$this->model->update();
			$this->session->set_flashdata('ubah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Nilai Alternatif Berhasil Diubah !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			redirect('data_nilai1/index');	
			}elseif($_POST['sk2']){
			$this->model->nilai = $_POST['sk2'];	
			$this->model->update();
			$this->session->set_flashdata('ubah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Nilai Alternatif Berhasil Diubah !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			redirect('data_nilai1/index');		
			}elseif($_POST['sk3']){
			$this->model->nilai = $_POST['sk3'];	
			$this->model->update();
			$this->session->set_flashdata('ubah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Nilai Alternatif Berhasil Diubah !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			redirect('data_nilai1/index');		
			}elseif($_POST['sk4']){
			$this->model->nilai = $_POST['sk4'];	
			$this->model->update();
			$this->session->set_flashdata('ubah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Nilai Alternatif Berhasil Diubah !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			redirect('data_nilai1/index');	
			}elseif($_POST['sk5']){
			$this->model->nilai = $_POST['sk5'];	
			$this->model->update();
			$this->session->set_flashdata('ubah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Nilai Alternatif Berhasil Diubah !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			redirect('data_nilai1/index');	
			}else{
			$this->model->nilai = $_POST['sk6'];	
			$this->model->update();
			$this->session->set_flashdata('ubah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Nilai Alternatif Berhasil Diubah !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			redirect('data_nilai1/index');	
			}
		
		} else {
			$id_penilaian = $_GET['id_penilaian'];
			$query = $this->db->query("select * from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif where a.id_penilaian='$id_penilaian'");
			$row = $query->row();
			$this->model->id_penilaian = $row->id_penilaian;
			$rows = $this->model->select6();

			if($row->id_subkriteria=='SK001'){
			$rows1 = $this->model->select_un();
			$this->load->view('module_gap/view_ubah_sk1',['model'=>$this->model,
														'rows1'=>$rows1]);
			}elseif($row->id_subkriteria=='SK002'){
			$rows2 = $this->model->select_raport();
			$this->load->view('module_gap/view_ubah_sk2',['model'=>$this->model,
														'rows2'=>$rows2]);
			}elseif($row->id_subkriteria=='SK003'){
			$rows3 = $this->model->select_kejuruan();
			$this->load->view('module_gap/view_ubah_sk3',['model'=>$this->model,
														'rows3'=>$rows3]);
			}elseif($row->id_subkriteria=='SK004'){
			$rows4 = $this->model->select_alquran();
			$this->load->view('module_gap/view_ubah_sk4',['model'=>$this->model,
														'rows4'=>$rows4]);
			}elseif($row->id_subkriteria=='SK005'){
			$rows5 = $this->model->select_shalat();
			$this->load->view('module_gap/view_ubah_sk5',['model'=>$this->model,
														'rows5'=>$rows5]);
			}elseif($row->id_subkriteria=='SK006'){
			$rows6 = $this->model->select_surat();
			$this->load->view('module_gap/view_ubah_sk6',['model'=>$this->model,
														'rows6'=>$rows6]);
			}elseif($row->id_subkriteria=='SK007'){
			$rows7 = $this->model->select_butawarna();
			$this->load->view('module_gap/view_ubah_sk7',['model'=>$this->model,
														'rows7'=>$rows7]);
			}elseif($row->id_subkriteria=='SK008'){
			$rows8 = $this->model->select_perokok();
			$this->load->view('module_gap/view_ubah_sk8',['model'=>$this->model,
														'rows8'=>$rows8]);
			}
			else{
			$rows9 = $this->model->select_tb();
			$this->load->view('module_gap/view_ubah_sk9',['model'=>$this->model,
														'rows9'=>$rows9]);
			}
		}
	}

	public function detail(){
	$this->model->id_alternatif = $_GET['id_alternatif'];
	$this->model->detail();
	$data = $this->model->detail();
	$this->load->view('module_gap/view_detail_nilai', ['data'=>$data]); 
	
	}



	public function delete(){
	$this->model->delete();
	$this->session->set_flashdata('hapus', 
    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Semua Data Nilai Alternatif Berhasil Dihapus !</strong>
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button></div>');
	redirect('data_nilai1/index');
	}

	public function delete1(){
	$this->model->nisn = $_POST['nisn'];
	if($this->model->validasi_delete()==TRUE){
	$this->model->delete1();
	$this->session->set_flashdata('hapus', 
    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Data Nilai Alternatif Berhasil Dihapus !</strong>
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button></div>');
	redirect('data_nilai1/index');
	}if($this->model->validasi_delete()==FALSE && $_POST['nisn']!=null){
	$this->session->set_flashdata('konfirmasi_hapus', 
    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Data Nilai Alternatif Gagal Dihapus !<br/>
    NISN yang dimasukan salah !</strong>
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button></div>');
	redirect('data_nilai1/index');	
	}else{
	$this->session->set_flashdata('konfirmasi_hapus', 
    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Data Nilai Alternatif Gagal Dihapus !<br/>
    Masukan NISN Alternatif yang Nilainya Ingin Dihapus !</strong>
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button></div>');
	redirect('data_nilai1/index');	
	}

	}
}