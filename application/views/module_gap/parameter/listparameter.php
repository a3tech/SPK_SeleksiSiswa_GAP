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
                    <i class="fa fa-align-justify"></i>Tabel Data Parameter</div>
                  <div class="card-body">
                    <nav>
                      <form method="post">
                      <ul class="pagination">
                        <li class="page-item">
                          <a class="page-link" href="<?php echo base_url('index.php/gap_controller/data_parameter/create'); ?>">Tambah</a>
                        </li>&nbsp;&nbsp;
                    <li class="page-item">
          <input class="form-control" type="text" placeholder="Masukan nama parameter" name="kunci">
                        </li>
                      </ul>
                    </nav>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>NO</th>
                          <th>NAMA SUBKRITERIA</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
   <?php
   $i=1;
  foreach ($rows as $row){
    ?>
                      <tbody>
                          <tr>
                          <td><?php echo $i; ?></td>
                          <td><?php echo $row->nama_subkriteria; ?></td>
                          <td>
                            <span class="badge badge-warning"><a href="<?php echo base_url('index.php/gap_controller/data_parameter/detail?id_subkriteria='.$row->id_subkriteria); ?>">Detail</a></span>
                            <span class="badge badge-danger"><a href="<?php echo base_url('index.php/gap_controller/data_parameter/delete?id_subkriteria='.$row->id_subkriteria); ?>" onclick="return confirm('Apakah Anda Yakin Ingin Hapus Data Ini ?')">Hapus</a></span>
                          </td>
                        </tr>
                      </tbody>
     <?php 
      $i++;} ?>
                    </table>
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