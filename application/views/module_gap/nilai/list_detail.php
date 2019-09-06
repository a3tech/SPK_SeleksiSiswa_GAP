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
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i>Tabel Detail Nilai Alternatif</div>
                  <div class="card-body">
                    <nav>
                    </nav>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
  <thead>
                        <tr>
                          <th>ID</th>
                          <th>NISN</th>
                          <th>NAMA SISWA</th>
                          <th>NAMA SUBKRITERIA</th>
                          <th>NILAI</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
   <?php
  foreach ($data->result()  as $row){
 
    ?>
                      <tbody>
                          <tr>
                          <td><?php echo $row->id_penilaian; ?></td>
                          <td><?php echo $row->nisn; ?></td>
                          <td><?php echo $row->nama_siswa; ?></td>
                          <td><?php echo $row->nama_subkriteria; ?></td>
                          <td><?php echo $row->nilai; ?></td>
                          <td align="center">
                          <span class="badge badge-warning"><a href="<?php echo base_url('index.php/data_nilai1/update?id_penilaian='.$row->id_penilaian); ?>">Ubah</a></span>              
                          </td>
                        </tr>
                      </tbody>
     <?php 
     } ?>
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