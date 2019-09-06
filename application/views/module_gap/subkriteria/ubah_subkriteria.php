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
                    <i class="fa fa-edit"></i>FORM UBAH DATA SUBKRITERIA</div>
                  <div class="card-body">
                    <form action="<?php echo base_url('index.php/gap_controller/data_subkriteria/update'); ?>" method="post" class="form-horizontal">
                        <div class="form-group">
                        <?php $row = $query->row() ?>
                        <input type="hidden" name="id_subkriteria" value="<?php echo $row->id_subkriteria; ?>">
                        <label class="col-form-label" for="appendedInput">NAMA KRITERIA</label>
                        <div class="controls">
                          <div class="input-group">
                             <input class="form-control" id="appendedInput" size="16" type="text" name="isi_sub" readonly value="<?php echo $row->nama_kriteria; ?>" required>
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NAMA SUBKRITERIA</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="nama_subkriteria" value="<?php echo $row->nama_subkriteria; ?>" required>
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="col-form-label" for="appendedInput">JENIS PENILAIAN</label>
                         <div class="controls">
                          <div class="input-group">
                          <select class="form-control" id="appendedInput" name="jenis" required>
                          <option value='Core Factor'>Core Factor</option>
                          <option value='Secondary Factor'>Secondary Factor</option>
                           </select>
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>

                         <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NILAI TARGET</label>
                        <div class="controls">
                          <div class="input-group">
                            <input class="form-control" id="appendedInput" size="16" type="text" name="nilai_target" value="<?php echo $row->nilai_target; ?>" required>
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