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
                    <i class="fa fa-edit"></i>FORM TAMBAH DATA ALTERNATIF</div>
                  <div class="card-body">
                    <form class="form-horizontal" action="create" method="post">
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NISN</label>
                        <div class="controls">
                          <div class="input-group">
                           <input class="form-control" id="appendedInput" size="16" type="text" name="nisn" required>
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NAMA SISWA</label>
                        <div class="controls">
                          <div class="input-group">
                           <input class="form-control" id="appendedInput" size="16" type="text" name="nama_siswa" required>
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-form-label" for="appendedInput">JENIS KELAMIN</label>
                        <div class="controls">
                   
                           <div class="form-check">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="jenis_kelamin" value="Laki-Laki" required>Laki-Laki
  </label>
</div>
<div class="form-check">
  <label class="form-check-label">
    <input type="radio" class="form-check-input" name="jenis_kelamin" value="Perempuan" required>Perempuan
  </label>
</div>
                            <div class="input-group-append">
                            </div>
                          
                        </div>
                      </div>
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">ASAL SEKOLAH</label>
                        <div class="controls">
                          <div class="input-group">
                           <input class="form-control" id="appendedInput" size="16" type="text" name="asal_sekolah" required>
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