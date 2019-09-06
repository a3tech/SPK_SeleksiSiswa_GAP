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
                    <i class="fa fa-align-justify"></i>Tabel Detail SubKriteria</div>
                  <div class="card-body">
                    <nav>
                    </nav>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>ID SUBKRITERIA</th>
                          <th>NAMA SUBKRITERIA</th>
                          <th>JENIS PENILAIAN</th>
                          <th>NILAI TARGET</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
   <?php
  foreach ($rows as $row){
    ?>
                      <tbody>
                          <tr>
                          <td><?php echo $row->id_subkriteria; ?></td>
                          <td><?php echo $row->nama_subkriteria; ?></td>
                          <td><?php echo $row->jenis_penilaian; ?></td>
                          <td><?php echo $row->nilai_target; ?></td>
                          <td>
                            <span class="badge badge-warning"><a href="<?php echo base_url('index.php/gap_controller/data_subkriteria/update?id_subkriteria='.$row->id_subkriteria); ?>">Ubah</a></span>
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