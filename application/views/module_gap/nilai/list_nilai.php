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
                 <?php echo $this->session->flashdata('konfirmasi_hapus');?>
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i>Tabel Data Nilai Alternatif</div>
                  <div class="card-body">
                    <nav>
                    <form method="post">
                      <ul class="pagination">
                        <li class="page-item">
                          <a class="page-link" href="<?php echo base_url('index.php/data_nilai1/index?tambah'); ?>">Tambah</a>
                        </li>&nbsp;&nbsp;
                         <li class="page-item">
          <input class="form-control" type="text" placeholder="Masukan nisn atau nama" name="kunci">
                        </li>
                      </ul>
                      </form>
  <form method="post" action="<?php echo base_url('index.php/data_nilai1/delete1'); ?>">
                         <ul class="pagination">
                          <li class="page-item">
                            <button class="btn btn-danger" type="submit" name="btnHapus" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data Nilai Alternatif ?')">Hapus</button>
                        </li>
                    <li class="page-item">            
          <input class="form-control" type="text" placeholder="Masukan NISN Calon Siswa" name="nisn">
                        </li>
                      </ul>
                        <ul class="pagination">
                          <li class="page-item">
                          <a class="page-link text-white bg-danger" href="<?php echo base_url('index.php/data_nilai1/delete'); ?>" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Semua Data Nilai Alternatif ?')">Hapus Semua Nilai</a>
                        </li></ul>
</form>
                    </nav>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
  <thead>
                        <tr>
                          <th>ID</th>
                          <th>NISN</th>
                          <th>NAMA SISWA</th>
                          <th>JENIS KELAMIN</th>
                          <th>ASAL SEKOLAH</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
   <?php
  foreach ($data['data']->result()  as $row){
 
    ?>
                      <tbody>
                          <tr>
                          <td><?php echo $row->id_penilaian; ?></td>
                          <td><?php echo $row->nisn; ?></td>
                          <td><?php echo $row->nama_siswa; ?></td>
                          <td><?php echo $row->jenis_kelamin; ?></td>
                          <td><?php echo $row->asal_sekolah; ?></td>
                          <td align="center">
                           <span class="badge badge-warning"><a href="<?php echo base_url('index.php/data_nilai1/detail?id_alternatif='.$row->id_alternatif); ?>">Detail</a></span>                
                          </td>
                        </tr>
                      </tbody>
     <?php 
     } ?>
                    </table>
                 
                    <?php 
                 
                      echo $data['pagination']; 
                            
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