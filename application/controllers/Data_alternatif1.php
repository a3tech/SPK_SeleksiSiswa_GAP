<?php

class Data_alternatif1 extends CI_Controller{

private $model = NULL;

		public function __construct(){
		parent::__construct();

		$this->load->library('pagination');
		$this->load->model('gap_model/Alternatif_model');
		$this->model = $this->Alternatif_model;
	}

	public function index(){
		$this->select(); 
	}

	public function create(){
		if(isset($_POST['btnSubmit'])){
			$config = [
						'upload_path' => './uploads/',
						'allowed_types' => 'jpg|png',
						'encrypt_name' => TRUE];
			$this->load->library('upload', $config);
			$this->model->nisn = $_POST['nisn'];	
			$this->model->nama_siswa = $_POST['nama_siswa'];
			$this->model->jenis_kelamin = $_POST['jenis_kelamin'];
			$this->model->asal_sekolah = $_POST['asal_sekolah'];
			$this->model->insert();
			$this->session->set_flashdata('tambah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Alternatif Berhasil Ditambahkan !</strong></br>Berikut Semua Daftar Data Alternatif yang Tersimpan
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			redirect('data_alternatif1/index');
			 } else {
			$this->load->view('module_gap/view_tambah_alternatif');
		}

	}

	public function select(){
	if(isset($_POST['kunci'])){
	$kunci = $_POST['kunci'];
	 $data['data'] = $this->model->searching($kunci);

        $this->load->view('module_gap/view_data_alternatif', ['data'=>$data]);
	} else {
	  	$config['base_url'] = site_url('data_alternatif1/index'); //site url
        $config['total_rows'] = $this->db->count_all('alternatif'); //total row
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
 
        $this->load->view('module_gap/view_data_alternatif', ['data'=>$data]);
    }
	}

	public function update(){
		if(isset($_POST['btnSubmit'])){	
			$this->model->id = $_POST['id_alternatif'];
			$this->model->nisn = $_POST['nisn'];	
			$this->model->nama_siswa = $_POST['nama_siswa'];
			$this->model->jenis_kelamin = $_POST['jenis_kelamin'];
			$this->model->asal_sekolah = $_POST['asal_sekolah'];
			$this->model->update();
			$this->session->set_flashdata('ubah', 
            '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Data Alternatif Berhasil Diubah !</strong>
            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
            </button></div>');
			redirect('data_alternatif1/index');
			} else {
			$id_alternatif = $_GET['id_alternatif'];
			$query = $this->db->query("select * from alternatif where id_alternatif='$id_alternatif'");
			$this->load->view('module_gap/view_ubah_alternatif', ['query'=>$query]);
		}
	}

	public function delete(){
	$this->model->id = $_GET['id_alternatif'];
	$this->model->delete();
	$this->session->set_flashdata('hapus', 
    '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Data Alternatif Berhasil Dihapus !</strong>
    <button class="close" type="button" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">×</span>
    </button></div>');
	redirect('data_alternatif1/index');
	}
}