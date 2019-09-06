<!DOCTYPE html>
<html>
<html lang="en">
<head>
 <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
	<title></title>
</head>
<body>
  <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i>Tabel Data Hasil Proses Nilai Seleksi Calon Siswa Baru </div>
                  <div class="card-body">
                      <form method="post">
      <div class="table-responsive">          
  <h4>Nilai Alternatif Kriteria</h4>
 <table class="table table-responsive-sm table-bordered table-striped table-sm">
               
                      <thead>
                        <tr>
                          <th>NO</th>
                           <th>NISN</th>
                           <th>NAMA SISWA</th>
    <?php
  foreach($this->model->nama_kriteria->result() as $nama_kriteria){
    ?>   
                          <th><?php echo $nama_kriteria->nama_kriteria; ?></th>
<?php } ?>
                        </tr>
                      </thead>
   <?php
    $no=1;$i=0;
    foreach ($data1['data']->result()  as $row){
    ?>
                      <tbody>
                          <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $row->nisn; ?></td>
                          <td><?php echo $row->nama_siswa; ?></td>
                          <td><?php echo $this->model->nilai_cbt[$i]; ?></td>
                          <td><?php echo $this->model->nilai_un[$i]; ?></td>
                          <td><?php echo $this->model->nilai_raport[$i]; ?></td>
                          <td><?php echo $this->model->nilai_alquran[$i]; ?></td>
                          <td><?php echo $this->model->nilai_wawancara[$i]; ?></td>
                        </tr>
                      </tbody>
     <?php 
       $no++;$i++; } ?>
                   </table>     
                    </div> 

<div class="table-responsive">
<h4>Nilai Normalisasi</h4>
 <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>NISN</th>
                          <th>NAMA SISWA</th>
    <?php
  foreach($this->model->nama_kriteria->result() as $nama_kriteria){
    ?>   
                          <th><?php echo $nama_kriteria->nama_kriteria; ?></th>
<?php } ?>
                        </tr>
                      </thead>
   <?php
    $no=1;$i=0;
    foreach ($data1['data']->result()  as $row){
    ?>
                      <tbody>
                          <tr>
                          <td><?php echo $no; ?></td>
                          <td><?php echo $row->nisn; ?></td>
                          <td><?php echo $row->nama_siswa; ?></td>
                          <td><?php echo $this->model->r1[$i]; ?></td>
                          <td><?php echo $this->model->r2[$i]; ?></td>
                          <td><?php echo $this->model->r3[$i]; ?></td>
                          <td><?php echo $this->model->r4[$i]; ?></td>
                          <td><?php echo $this->model->r5[$i]; ?></td>
                        </tr>
                      </tbody>
     <?php 
      $no++;$i++;} ?>
                    </table>     
                    </div> 
<div class="table-responsive">
<h4>Hasil Akhir Perankingan</h4>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>NISN</th>
                          <th>NAMA SISWA</th>
    <?php
  foreach($this->model->nama_kriteria->result() as $nama_kriteria){
    ?>   
                          <th><?php echo $nama_kriteria->nama_kriteria; ?></th>
<?php } ?>
                          <th>TOTAL NILAI</th>
                          <th>RANKING</th>
                        </tr>
                      </thead>
   <?php
  $a=1;$i=0;
    foreach ($data['data']->result()  as $row){
    ?>
                      <tbody>
                          <tr>
                          <td><?php echo $row->nisn; ?></td>
                          <td><?php echo $row->nama_siswa; ?></td>
                          <td><?php echo $this->model->v1[$i]; ?></td>
                          <td><?php echo $this->model->v2[$i]; ?></td>
                          <td><?php echo $this->model->v3[$i]; ?></td>
                          <td><?php echo $this->model->v4[$i]; ?></td>
                          <td><?php echo $this->model->v5[$i]; ?></td>
                          <td><?php echo $row->total; ?></td>
                          <td><?php echo $a; ?></td>
                        </tr>
                      </tbody>
     <?php 
      $a++;$i++; } ?>
                    </table>  

                      <?php 
                      echo $data['pagination']; 
                            
                          ?>
                                        <nav>
 <ul class="pagination">  
<li class="page-item">
<a class="page-link" href="http://localhost:8080/skripsi/index.php/data_nilaiakhir/index?preview_laporan">Cetak Laporan</a>
</li></ul> </nav>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            <!-- /.row-->
          </div>
        </div> 
      </main>
</body>
</html>