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
                    <i class="fa fa-edit"></i>FORM UBAH DATA NILAI TINGGI BADAN</div>
                  <div class="card-body">
                    <form action="<?php echo base_url('index.php/data_nilai1/update1'); ?>" method="post" class="form-horizontal">
                       <div class="form-group">
                        <input type="hidden" name="id_penilaian" value="<?php echo $model->id_penilaian; ?>">
                        <label class="col-form-label" for="appendedInput">NILAI TINGGI BADAN</label>
                        <div class="controls">
                          <div class="input-group">
                          <select class="form-control" id="appendedInput" name="sk9">
                          <?php foreach ($rows9 as $row){ ?>
                          <option value='<?php echo $row->bobot_parameter; ?>'><?php echo $row->parameter_nilai; ?></option>
                          <?php } ?>
                           </select>
                            <div class="input-group-append">
                            </div>
                          </div>  
                        </div>
                      </div>
          
                      <div class="form-actions">
                        <button class="btn btn-primary" name="btnSubmit" type="submit">Simpan</button>
                        <button class="btn btn-secondary" type="button" onclick=self.history.back()>Batal</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- /.col-->
            </div>
            <!-- /.row-->
          </div>
        </div>

</body>
</html>