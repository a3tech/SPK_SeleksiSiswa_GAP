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
                    <i class="fa fa-edit"></i>FORM TAMBAH DATA PARAMETER</div>
                  <div class="card-body">
                    <form class="form-horizontal" action="create" method="post">
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NAMA KRITERIA</label>
                        <div class="controls">
                          <div class="input-group">
                          <select class="form-control" id="appendedInput" name="id_subkriteria">
                          <?php foreach ($rows as $row){ ?>
                          <option value='<?php echo $row->id_subkriteria; ?>'><?php echo $row->nama_subkriteria; ?></option>
                          <?php } ?>
                           </select>
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NILAI PARAMETER</label>
                        <div class="controls">
                          <div class="input-group">
                           <input class="form-control" id="appendedInput" size="16" type="text" name="parameter_nilai" required>
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">BOBOT PARAMETER</label>
                        <div class="controls">
                          <div class="input-group">
                             <input class="form-control" id="appendedInput" size="16" type="text" name="bobot_parameter" required>
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-form-label" for="appendedInput">KETERANGAN PARAMETER</label>
                        <div class="controls">
                          <div class="input-group">
                             <input class="form-control" id="appendedInput" size="16" type="text" name="keterangan" required>
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                
          
                      <div class="form-actions">
                        <button class="btn btn-primary" type="submit" name="btnSubmit">Simpan</button>
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