<?php

class Data_nilaiakhir1 extends CI_Controller{
public $models = array();
public $id_alternatif;
public $id_parameter;
public $id = array();
public $nilai_c1;
public $nilai_c2;
public $nilai_c3;
public $nilai_c4;
public $nilai_c5;
public $nisn_akhir = array();
public $nisn_awal = array();
public $nama_awal = array();
public $cetak;
public $model = NULL;

		public function __construct(){
		parent::__construct();

		$this->load->library('pagination');
		$this->load->model('gap_model/Nilaiakhir_model');
		$this->model = $this->Nilaiakhir_model;
		include_once 'gap_controller/laporan/fpdf.php';

	}

	public function index(){
		if(isset($_GET['preview_laporan'])){
		 $pdf = new FPDF('l','mm','A5');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string 
        $pdf->Cell(190,7,'SEKOLAH MENENGAH KEJURUAN MUHAMMADIYAH',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'LAPORAN SELEKSI CALON SISWA BARU TAHUN 2019',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->SetX(15);
        $pdf->Cell(40,6,'NISN',1,0,'C');
        $pdf->Cell(60,6,'NAMA SISWA',1,0,'C');
        $pdf->Cell(30,6,'JENIS KELAMIN',1,0,'C');
        $pdf->Cell(25,6,'TOTAL NILAI',1,0,'C');
        $pdf->Cell(25,6,'RANKING',1,1,'C');
        $pdf->SetFont('Arial','',10);
		$this->cetak = $this->model->cetak_laporan();
		$ranking=1;
        foreach ($this->cetak as $row){
        	$pdf->SetX(15);
            $pdf->Cell(40,6,$row->nisn,1,0,'C');
            $pdf->Cell(60,6,$row->nama_siswa,1,0,'C');
            $pdf->Cell(30,6,$row->jenis_kelamin,1,0,'C');
            $pdf->Cell(25,6,$row->total,1,0,'C'); 
            $pdf->Cell(25,6,$ranking,1,1,'C'); 
            $ranking++;
        }
        $pdf->Output('D', 'Laporan_Seleksi_Siswa.pdf');
		} 
		else {
		$this->proses_nilai();
	
	 	}
	}

	public function proses_nilai(){
	$query5 = $this->db->query("select distinct(id_alternatif) from penilaian");
	$rows5 = $query5->num_rows();
	$this->model->jumlah= $rows5;
	//NILAI_UN (SK001)
	$query1 = $this->db->query("select nilai from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK001'");
	$rows1 = $query1->num_rows();
	$query2 = $this->db->query("select * from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK001'");
	for($i=0;$i<$rows1;$i++){
	$rows2 = $query2->row($i);
	$this->model->nilai_un[$i] = $rows2->nilai;
	$this->model->id_alternatif[$i] = $rows2->id_alternatif;
	$this->nisn_awal[$i] = $rows2->nisn;
	$this->nama_awal[$i] = $rows2->nama_siswa;
	}
	$query3 = $this->db->query("select c.nilai_target from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK001'");
	$rows3 = $query3->row();
	$this->model->target_un = $rows3->nilai_target;

	for($i=0;$i<$rows1;$i++){
	$this->model->gap1[$i] = $this->model->nilai_un[$i] - $this->model->target_un ;
	$gap11 = $this->model->gap1[$i];
	$query4 = $this->db->query("select * from pembobotan where selisih=$gap11");
	$this->model->bobot_gap1[$i]= $query4->row()->bobot_nilai;
	$gap11=0;
	}
	$this->model->update_sk1();

	//NILAI_RAPORT (SK002)
	$query1 = $this->db->query("select nilai from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK002'");
	$rows1 = $query1->num_rows();
	$query2 = $this->db->query("select * from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK002'");
	for($i=0;$i<$rows1;$i++){
	$rows2 = $query2->row($i);
	$this->model->nilai_raport[$i] = $rows2->nilai;
	}
	$query3 = $this->db->query("select c.nilai_target from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK002'");
	$rows3 = $query3->row();
	$this->model->target_raport = $rows3->nilai_target;

	for($i=0;$i<$rows1;$i++){
	$this->model->gap2[$i] = $this->model->nilai_raport[$i] - $this->model->target_raport ;
	$gap22 = $this->model->gap2[$i];
	$query4 = $this->db->query("select * from pembobotan where selisih=$gap22");
	$this->model->bobot_gap2[$i]= $query4->row()->bobot_nilai;
	$gap22=0;
	}
	$this->model->update_sk2();

	//NILAI_PRAKTIK_KEJURUAN (SK003)
	$query1 = $this->db->query("select nilai from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK003'");
	$rows1 = $query1->num_rows();
	$query2 = $this->db->query("select * from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK003'");
	for($i=0;$i<$rows1;$i++){
	$rows2 = $query2->row($i);
	$this->model->nilai_kejuruan[$i] = $rows2->nilai;
	}
	$query3 = $this->db->query("select c.nilai_target from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK003'");
	$rows3 = $query3->row();
	$this->model->target_kejuruan = $rows3->nilai_target;

	for($i=0;$i<$rows1;$i++){
	$this->model->gap3[$i] = $this->model->nilai_kejuruan[$i] - $this->model->target_kejuruan ;
	$gap33 = $this->model->gap3[$i];
	$query4 = $this->db->query("select * from pembobotan where selisih=$gap33");
	$this->model->bobot_gap3[$i]= $query4->row()->bobot_nilai;
	$gap33=0;
	}
	$this->model->update_sk3();


	//NILAI_MEMBACA_AL-QUR'AN (SK004)
	$query1 = $this->db->query("select nilai from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK004'");
	$rows1 = $query1->num_rows();
	$query2 = $this->db->query("select * from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK004'");
	for($i=0;$i<$rows1;$i++){
	$rows2 = $query2->row($i);
	$this->model->nilai_alquran[$i] = $rows2->nilai;
	}
	$query3 = $this->db->query("select c.nilai_target from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK004'");
	$rows3 = $query3->row();
	$this->model->target_alquran = $rows3->nilai_target;

	for($i=0;$i<$rows1;$i++){
	$this->model->gap4[$i] = $this->model->nilai_alquran[$i] - $this->model->target_alquran ;
	$gap44 = $this->model->gap4[$i];
	$query4 = $this->db->query("select * from pembobotan where selisih=$gap44");
	$this->model->bobot_gap4[$i]= $query4->row()->bobot_nilai;
	$gap44=0;
	}
	$this->model->update_sk4();

	//NILAI_TATA_CARA_SHALAT (SK005)
	$query1 = $this->db->query("select nilai from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK005'");
	$rows1 = $query1->num_rows();
	$query2 = $this->db->query("select * from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK005'");
	for($i=0;$i<$rows1;$i++){
	$rows2 = $query2->row($i);
	$this->model->nilai_shalat[$i] = $rows2->nilai;
	}
	$query3 = $this->db->query("select c.nilai_target from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK005'");
	$rows3 = $query3->row();
	$this->model->target_shalat = $rows3->nilai_target;

	for($i=0;$i<$rows1;$i++){
	$this->model->gap5[$i] = $this->model->nilai_shalat[$i] - $this->model->target_shalat ;
	$gap55 = $this->model->gap5[$i];
	$query4 = $this->db->query("select * from pembobotan where selisih=$gap55");
	$this->model->bobot_gap5[$i]= $query4->row()->bobot_nilai;
	$gap55=0;
	}
	$this->model->update_sk5();


	//NILAI_HAFALAN_SURAT (SK006)
	$query1 = $this->db->query("select nilai from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK006'");
	$rows1 = $query1->num_rows();
	$query2 = $this->db->query("select * from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK006'");
	for($i=0;$i<$rows1;$i++){
	$rows2 = $query2->row($i);
	$this->model->nilai_surat[$i] = $rows2->nilai;
	}
	$query3 = $this->db->query("select c.nilai_target from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK006'");
	$rows3 = $query3->row();
	$this->model->target_surat = $rows3->nilai_target;

	for($i=0;$i<$rows1;$i++){
	$this->model->gap6[$i] = $this->model->nilai_surat[$i] - $this->model->target_surat ;
	$gap66 = $this->model->gap6[$i];
	$query4 = $this->db->query("select * from pembobotan where selisih=$gap66");
	$this->model->bobot_gap6[$i]= $query4->row()->bobot_nilai;
	$gap66=0;
	}
		$this->model->update_sk6();

	//NILAI_BUTAWARNA (SK007)
	$query1 = $this->db->query("select nilai from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK007'");
	$rows1 = $query1->num_rows();
	$query2 = $this->db->query("select * from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK007'");
	for($i=0;$i<$rows1;$i++){
	$rows2 = $query2->row($i);
	$this->model->nilai_butawarna[$i] = $rows2->nilai;
	}
	$query3 = $this->db->query("select c.nilai_target from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK007'");
	$rows3 = $query3->row();
	$this->model->target_butawarna = $rows3->nilai_target;

	for($i=0;$i<$rows1;$i++){
	$this->model->gap7[$i] = $this->model->nilai_butawarna[$i] - $this->model->target_butawarna ;
	$gap77 = $this->model->gap7[$i];
	$query4 = $this->db->query("select * from pembobotan where selisih=$gap77");
	$this->model->bobot_gap7[$i]= $query4->row()->bobot_nilai;
	$gap77=0;
	}
	$this->model->update_sk7();

	//NILAI_PEROKOK (SK008)
	$query1 = $this->db->query("select nilai from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK008'");
	$rows1 = $query1->num_rows();
	$query2 = $this->db->query("select * from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK008'");
	for($i=0;$i<$rows1;$i++){
	$rows2 = $query2->row($i);
	$this->model->nilai_perokok[$i] = $rows2->nilai;
	}
	$query3 = $this->db->query("select c.nilai_target from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK008'");
	$rows3 = $query3->row();
	$this->model->target_perokok = $rows3->nilai_target;

	for($i=0;$i<$rows1;$i++){
	$this->model->gap8[$i] = $this->model->nilai_perokok[$i] - $this->model->target_perokok ;
	$gap88 = $this->model->gap8[$i];
	$query4 = $this->db->query("select * from pembobotan where selisih=$gap88");
	$this->model->bobot_gap8[$i]= $query4->row()->bobot_nilai;
	$gap88=0;
	}
	$this->model->update_sk8();

	//NILAI_PEROKOK (SK009)
	$query1 = $this->db->query("select nilai from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK009'");
	$rows1 = $query1->num_rows();
	$query2 = $this->db->query("select * from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK009'");
	for($i=0;$i<$rows1;$i++){
	$rows2 = $query2->row($i);
	$this->model->nilai_tb[$i] = $rows2->nilai;
	}
	$query3 = $this->db->query("select c.nilai_target from penilaian a join alternatif b on a.id_alternatif=b.id_alternatif join subkriteria c on a.id_subkriteria=c.id_subkriteria where a.id_subkriteria='SK009'");
	$rows3 = $query3->row();
	$this->model->target_tb = $rows3->nilai_target;

	for($i=0;$i<$rows1;$i++){
	$this->model->gap9[$i] = $this->model->nilai_tb[$i] - $this->model->target_tb ;
	$gap99 = $this->model->gap9[$i];
	$query4 = $this->db->query("select * from pembobotan where selisih=$gap99");
	$this->model->bobot_gap9[$i]= $query4->row()->bobot_nilai;
	$gap99=0;
	}
	$this->model->update_sk9();

	//DONE !



	$query5 = $this->db->query("select * from subkriteria a join kriteria b on a.id_kriteria=b.id_kriteria where a.id_kriteria='KR1'");
	$rows5 = $query5->num_rows();
	for($i=0;$i<$rows5;$i++){
	$rows55 = $query5->row($i);
	$this->model->subkriteria_penilaian[$i]= $rows55->nama_subkriteria;
	}

	$query5 = $this->db->query("select * from subkriteria a join kriteria b on a.id_kriteria=b.id_kriteria where a.id_kriteria='KR2'");
	$rows5 = $query5->num_rows();
	for($i=0;$i<$rows5;$i++){
	$rows55 = $query5->row($i);
	$this->model->subkriteria_keagamaan[$i]= $rows55->nama_subkriteria;
	}

	$query5 = $this->db->query("select * from subkriteria a join kriteria b on a.id_kriteria=b.id_kriteria where a.id_kriteria='KR3'");
	$rows5 = $query5->num_rows();
	for($i=0;$i<$rows5;$i++){
	$rows55 = $query5->row($i);
	$this->model->subkriteria_kesehatan[$i]= $rows55->nama_subkriteria;
	}

	sort($this->model->bobot_gap1);  
	sort($this->model->bobot_gap2); 
	sort($this->model->bobot_gap3); 
	sort($this->model->bobot_gap4); 
	sort($this->model->bobot_gap5); 
	sort($this->model->bobot_gap6); 
	sort($this->model->bobot_gap7); 
	sort($this->model->bobot_gap8); 
	sort($this->model->bobot_gap9); 

	$jml_id= implode(",", $this->model->id_alternatif);
	//CF DAN SF KRITERIA 1
	$query6 = $this->db->query("select * from subkriteria where id_subkriteria in('SK001','SK002','SK003') and jenis_penilaian='Core Factor'");
	$rows66 = $query6->num_rows();
	$query7 = $this->db->query("select sum(a.nilai_bobot) as bobot_nilai from penilaian a join subkriteria b on a.id_subkriteria=b.id_subkriteria where a.id_subkriteria in('SK001','SK002','SK003')  and a.id_alternatif in($jml_id) and (b.jenis_penilaian='Core Factor') group by a.id_alternatif");
	for($i=0;$i<$this->model->jumlah;$i++){
	$rows7 = $query7->row($i);
	$this->model->nilai_cf_c1[$i]= $rows7->bobot_nilai / $rows66; 
	}

	$query7 = $this->db->query("select * from subkriteria where id_subkriteria in('SK001','SK002','SK003') and jenis_penilaian='Secondary Factor'");
	$rows77 = $query7->num_rows();
	$query7 = $this->db->query("select sum(a.nilai_bobot) as bobot_nilai from penilaian a join subkriteria b on a.id_subkriteria=b.id_subkriteria where a.id_subkriteria in('SK001','SK002','SK003')  and a.id_alternatif in($jml_id) and (b.jenis_penilaian='Secondary Factor') group by a.id_alternatif");
	for($i=0;$i<$this->model->jumlah;$i++){
	$rows7 = $query7->row($i);
	$this->model->nilai_sf_c1[$i]= $rows7->bobot_nilai / $rows77; 
	}
	for($i=0;$i<$this->model->jumlah;$i++){
	$this->model->nilai_total_c1[$i] = (0.6*$this->model->nilai_cf_c1[$i])+(0.4*$this->model->nilai_sf_c1[$i]);
	}
	//CF DAN SF KRITERIA 2
	$query6 = $this->db->query("select * from subkriteria where id_subkriteria in('SK004','SK005','SK006') and jenis_penilaian='Core Factor'");
	$rows66 = $query6->num_rows();
	$query7 = $this->db->query("select sum(a.nilai_bobot) as bobot_nilai from penilaian a join subkriteria b on a.id_subkriteria=b.id_subkriteria where a.id_subkriteria in('SK004','SK005','SK006')  and a.id_alternatif in($jml_id) and (b.jenis_penilaian='Core Factor') group by a.id_alternatif");
	for($i=0;$i<$this->model->jumlah;$i++){
	$rows7 = $query7->row($i);
	$this->model->nilai_cf_c2[$i]= $rows7->bobot_nilai / $rows66; 
	}

	$query7 = $this->db->query("select * from subkriteria where id_subkriteria in('SK004','SK005','SK006') and jenis_penilaian='Secondary Factor'");
	$rows77 = $query7->num_rows();
	$query7 = $this->db->query("select sum(a.nilai_bobot) as bobot_nilai from penilaian a join subkriteria b on a.id_subkriteria=b.id_subkriteria where a.id_subkriteria in('SK004','SK005','SK006')  and a.id_alternatif in($jml_id) and (b.jenis_penilaian='Secondary Factor') group by a.id_alternatif");
	for($i=0;$i<$this->model->jumlah;$i++){
	$rows7 = $query7->row($i);
	$this->model->nilai_sf_c2[$i]= $rows7->bobot_nilai / $rows77; 
	}
	for($i=0;$i<$this->model->jumlah;$i++){
	$this->model->nilai_total_c2[$i] = (0.6*$this->model->nilai_cf_c2[$i])+(0.4*$this->model->nilai_sf_c2[$i]);
	}

	//CF DAN SF KRITERIA 2
	$query6 = $this->db->query("select * from subkriteria where id_subkriteria in('SK007','SK008','SK009') and jenis_penilaian='Core Factor'");
	$rows66 = $query6->num_rows();
	$query7 = $this->db->query("select sum(a.nilai_bobot) as bobot_nilai from penilaian a join subkriteria b on a.id_subkriteria=b.id_subkriteria where a.id_subkriteria in('SK007','SK008','SK009')  and a.id_alternatif in($jml_id) and (b.jenis_penilaian='Core Factor') group by a.id_alternatif");
	for($i=0;$i<$this->model->jumlah;$i++){
	$rows7 = $query7->row($i);
	$this->model->nilai_cf_c3[$i]= $rows7->bobot_nilai / $rows66; 
	}

	$query7 = $this->db->query("select * from subkriteria where id_subkriteria in('SK007','SK008','SK009') and jenis_penilaian='Secondary Factor'");
	$rows77 = $query7->num_rows();
	$query7 = $this->db->query("select sum(a.nilai_bobot) as bobot_nilai from penilaian a join subkriteria b on a.id_subkriteria=b.id_subkriteria where a.id_subkriteria in('SK007','SK008','SK009')  and a.id_alternatif in($jml_id) and (b.jenis_penilaian='Secondary Factor') group by a.id_alternatif");
	for($i=0;$i<$this->model->jumlah;$i++){
	$rows7 = $query7->row($i);
	$this->model->nilai_sf_c3[$i]= $rows7->bobot_nilai / $rows77; 
	}
	for($i=0;$i<$this->model->jumlah;$i++){
	$this->model->nilai_total_c3[$i] = (0.6*$this->model->nilai_cf_c3[$i])+(0.4*$this->model->nilai_sf_c3[$i]);
	}

	//PERANKINGAN
	for($i=0;$i<$this->model->jumlah;$i++){
$this->model->total_nilai[$i] = (0.4*$this->model->nilai_total_c1[$i])+(0.4*$this->model->nilai_total_c2[$i])+(0.2*$this->model->nilai_total_c3[$i]);
	}

		$this->model->update();	




		$config['base_url'] = site_url('data_nilaiakhir1/index'); //site url
        $config['total_rows'] = $this->db->count_all('ranking'); //total row
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
        $data1['data'] = $this->model->select11($config["per_page"], $data['page']); 
        $data12 = $this->model->select12($config["per_page"], $data['page']); 
        $data13 = $this->model->select13($config["per_page"], $data['page']);
        $data2['data'] = $this->model->select21($config["per_page"], $data['page']);
        $data22 = $this->model->select22($config["per_page"], $data['page']); 
        $data23 = $this->model->select23($config["per_page"], $data['page']);  
        $data3['data'] = $this->model->select31($config["per_page"], $data['page']);
        $data32 = $this->model->select32($config["per_page"], $data['page']); 
        $data33 = $this->model->select33($config["per_page"], $data['page']);   

 
        $data['pagination'] = $this->pagination->create_links(); 

        $this->load->view('module_gap/view_data_nilaiakhir1', [
													  'target_un'=>$this->model->target_un,
													  'target_raport'=>$this->model->target_raport,
													  'target_kejuruan'=>$this->model->target_kejuruan,
													  'target_alquran'=>$this->model->target_alquran,
													  'target_shalat'=>$this->model->target_shalat,
													  'target_surat'=>$this->model->target_surat,
													  'target_butawarna'=>$this->model->target_butawarna,
													  'target_perokok'=>$this->model->target_perokok,
													  'target_tb'=>$this->model->target_tb,
													  'subkriteria_penilaian'=>$this->model->subkriteria_penilaian,
													  'subkriteria_keagamaan'=>$this->model->subkriteria_keagamaan,
													  'subkriteria_kesehatan'=>$this->model->subkriteria_kesehatan,
													  'nilai_cf_c1'=>$this->model->nilai_cf_c1,
													  'nilai_cf_c2'=>$this->model->nilai_cf_c2,
													  'nilai_cf_c3'=>$this->model->nilai_cf_c3,
													  'nilai_sf_c1'=>$this->model->nilai_sf_c1,
													  'nilai_sf_c2'=>$this->model->nilai_sf_c2,
													  'nilai_sf_c3'=>$this->model->nilai_sf_c3,
													  'nilai_total_c1'=>$this->model->nilai_total_c1,
													  'nilai_total_c2'=>$this->model->nilai_total_c2,
													  'nilai_total_c3'=>$this->model->nilai_total_c3,
													  'data'=>$data,
													  'data1'=>$data1,
													  'data2'=>$data2,
													  'data3'=>$data3,
													  'data12'=>$data12,
													  'data13'=>$data13,
													  'data22'=>$data22,
													  'data23'=>$data23,
													  'data32'=>$data32,
													  'data33'=>$data33]); 



}}