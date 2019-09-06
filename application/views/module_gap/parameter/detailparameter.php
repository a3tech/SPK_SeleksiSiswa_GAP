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
                    <i class="fa fa-align-justify"></i>Tabel Detail Parameter</div>
                  <div class="card-body">
                    <nav>
                    </nav>
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>ID PARAMETER</th>
                          <th>NAMA KRITERIA</th>
                          <th>PARAMETER NILAI</th>
                          <th>BOBOT PARAMETER</th>
                          <th>KETERANGAN</th>
                          <th>KELOLA</th>
                        </tr>
                      </thead>
   <?php
  foreach ($rows as $row){
    ?>
                      <tbody>
                          <tr>
                          <td><?php echo $row->id_parameter; ?></td>
                          <td><?php echo $row->nama_subkriteria; ?></td>
                          <td><?php echo $row->parameter_nilai; ?></td>
                          <td><?php echo $row->bobot_parameter; ?></td>
                          <td><?php echo $row->keterangan; ?></td>
                          <td>
                            <span class="badge badge-warning"><a href="<?php echo base_url('index.php/gap_controller/data_parameter/update?id_parameter='.$row->id_parameter); ?>">Ubah</a></span>
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