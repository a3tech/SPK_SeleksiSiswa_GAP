<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
              <?php echo $this->session->flashdata('tambah');?>
               <?php echo $this->session->flashdata('ubah');?>
                <?php echo $this->session->flashdata('hapus');?>
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i>Tabel Data Alternatif</div>
                  <div class="card-body">
                    <nav>
                      <form method="post">
                      <ul class="pagination">
                        <li class="page-item">
                          <a class="page-link" href="<?php echo base_url('index.php/data_alternatif1/create'); ?>">Tambah</a>
                        </li>&nbsp;&nbsp;
                    <li class="page-item">
          <input class="form-control" type="text" placeholder="Masukan nisn atau nama" name="kunci">
                        </li>
                      </ul>
                    </nav>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>NISN</th>
                          <th>NAMA SISWA</th>
                          <th>JENIS KELAMIN</th>
                          <th>ASAL SEKOLAH</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
   <?php
   $no=1;

  foreach ($data['data']->result() as $row){
    ?>
                      <tbody>
                          <tr>
                          <td><?php echo $row->nisn; ?></td>
                          <td><?php echo $row->nama_siswa; ?></td>
                          <td><?php echo $row->jenis_kelamin; ?></td>
                          <td><?php echo $row->asal_sekolah; ?></td>
                          <td>
                            <span class="badge badge-warning"><a href="<?php echo base_url('index.php/data_alternatif1/update?id_alternatif='.$row->id_alternatif); ?>">Ubah</a></span>
                            <span class="badge badge-danger"><a href="<?php echo base_url('index.php/data_alternatif1/delete?id_alternatif='.$row->id_alternatif); ?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data Ini ?')">Hapus</a></span>
                          </td>
                        </tr>
                      </tbody>

     <?php 
      $no++;} ?>


                    </table>
         <?php 
                    if(isset($data['pagination'])){
                      echo $data['pagination']; 
                            }
                          ?>
                            
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