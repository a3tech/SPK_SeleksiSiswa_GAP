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
                    <i class="fa fa-edit"></i>FORM TAMBAH NILAI ALTERNATIF</div>
                  <div class="card-body">
                    <form class="form-horizontal" action="create" method="post">
                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NAMA SISWA</label>
                        <div class="controls">
                          <div class="input-group">
                          <select class="form-control" id="appendedInput" name="id_alternatif">
                          <option>Pilih Salah Satu</option>
                          <?php foreach ($rows as $row){ ?>
                          <option value='<?php echo $row->id_alternatif; ?>'><?php echo $row->nama_siswa; ?></option>
                          <?php } ?>
                           </select>
                            <div class="input-group-append">
                            </div>
                          </div>
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NILAI RATA-RATA UN</label>
                        <div class="controls">
                          <div class="input-group">
                           <input type="hidden" name="id_sk1" value="<?php echo $sk1->id_subkriteria; ?>">
                          <select class="form-control" id="appendedInput" name="nilai_sk1">
                          <option>Pilih Salah Satu</option>
                          <?php foreach ($rows1 as $row){ ?>
                          <option value='<?php echo $row->bobot_parameter; ?>'><?php echo $row->parameter_nilai; ?></option>
                          <?php } ?>
                           </select>
                            <div class="input-group-append">
                            </div>
                          </div>  
                        </div>
                      </div>
                       <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NILAI RATA-RATA RAPORT</label>
                        <div class="controls">
                          <div class="input-group">
                          <input type="hidden" name="id_sk2" value="<?php echo $sk2->id_subkriteria; ?>">
                          <select class="form-control" id="appendedInput" name="nilai_sk2">
                            <option>Pilih Salah Satu</option>
                          <?php foreach ($rows2 as $row){ ?>
                           <option value='<?php echo $row->bobot_parameter; ?>'><?php echo $row->parameter_nilai; ?></option>
                          <?php } ?>
                           </select>
                            <div class="input-group-append">
                            </div>
                          </div>  
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NILAI PRAKTIK KEJURUAN</label>
                        <div class="controls">
                          <div class="input-group">
                           <input type="hidden" name="id_sk3" value="<?php echo $sk3->id_subkriteria; ?>">
                          <select class="form-control" id="appendedInput" name="nilai_sk3">
                           <option>Pilih Salah Satu</option>
                          <?php foreach ($rows3 as $row){ ?>
                          <option value='<?php echo $row->bobot_parameter; ?>'><?php echo $row->parameter_nilai; ?></option>
                          <?php } ?>
                           </select>
                            <div class="input-group-append">
                            </div>
                          </div>  
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NILAI MEMBACA AL-QUR'AN</label>
                        <div class="controls">
                          <div class="input-group">
                           <input type="hidden" name="id_sk4" value="<?php echo $sk4->id_subkriteria; ?>">
                          <select class="form-control" id="appendedInput" name="nilai_sk4">
                          <option>Pilih Salah Satu</option>
                          <?php foreach ($rows4 as $row){ ?>
                              <option value='<?php echo $row->bobot_parameter; ?>'><?php echo $row->parameter_nilai; ?></option>
                          <?php } ?>
                           </select>
                            <div class="input-group-append">
                            </div>
                          </div>  
                        </div>
                      </div>

                       <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NILAI TATA CARA SHALAT</label>
                        <div class="controls">
                          <div class="input-group">
                          <input type="hidden" name="id_sk5" value="<?php echo $sk5->id_subkriteria; ?>">
                          <select class="form-control" id="appendedInput" name="nilai_sk5">
                           <option>Pilih Salah Satu</option>
                          <?php foreach ($rows5 as $row){ ?>
                          <option value='<?php echo $row->bobot_parameter; ?>'><?php echo $row->parameter_nilai; ?></option>
                          <?php } ?>
                           </select>
                            <div class="input-group-append">
                            </div>
                          </div>  
                        </div>
                      </div>

                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NILAI HAFALAN SURAT</label>
                        <div class="controls">
                          <div class="input-group">
                          <input type="hidden" name="id_sk6" value="<?php echo $sk6->id_subkriteria; ?>">
                          <select class="form-control" id="appendedInput" name="nilai_sk6">
                           <option>Pilih Salah Satu</option>
                          <?php foreach ($rows6 as $row){ ?>
                          <option value='<?php echo $row->bobot_parameter; ?>'><?php echo $row->parameter_nilai; ?></option>
                          <?php } ?>
                           </select>
                            <div class="input-group-append">
                            </div>
                          </div>  
                        </div>
                      </div>

                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NILAI TES BUTA WARNA</label>
                        <div class="controls">
                          <div class="input-group">
                          <input type="hidden" name="id_sk7" value="<?php echo $sk7->id_subkriteria; ?>">
                          <select class="form-control" id="appendedInput" name="nilai_sk7">
                           <option>Pilih Salah Satu</option>
                          <?php foreach ($rows7 as $row){ ?>
                          <option value='<?php echo $row->bobot_parameter; ?>'><?php echo $row->parameter_nilai; ?></option>
                          <?php } ?>
                           </select>
                            <div class="input-group-append">
                            </div>
                          </div>  
                        </div>
                      </div>


                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NILAI PEROKOK</label>
                        <div class="controls">
                          <div class="input-group">
                          <input type="hidden" name="id_sk8" value="<?php echo $sk8->id_subkriteria; ?>">
                          <select class="form-control" id="appendedInput" name="nilai_sk8">
                           <option>Pilih Salah Satu</option>
                          <?php foreach ($rows8 as $row){ ?>
                          <option value='<?php echo $row->bobot_parameter; ?>'><?php echo $row->parameter_nilai; ?></option>
                          <?php } ?>
                           </select>
                            <div class="input-group-append">
                            </div>
                          </div>  
                        </div>
                      </div>
  


                        <div class="form-group">
                        <label class="col-form-label" for="appendedInput">NILAI TINGGI BADAN</label>
                        <div class="controls">
                          <div class="input-group">
                          <input type="hidden" name="id_sk9" value="<?php echo $sk9->id_subkriteria; ?>">
                          <select class="form-control" id="appendedInput" name="nilai_sk9">
                           <option>Pilih Salah Satu</option>
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