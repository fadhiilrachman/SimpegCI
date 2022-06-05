
    <div class="content-wrapper">
      <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title"><?=$title_page;?></h4>
              <?php if($this->session->flashdata('msg_alert')) { ?>

              <div class="alert alert-info">
                <label style="font-size: 13px;"><?=$this->session->flashdata('msg_alert');?></label>
              </div>
              <?php } ?>
              <?=form_open('data_izin/edit/' . $data_izin->id_izin, array('method'=>'post'));?>
                <input type="hidden" name="id_izin" value="<?=$data_izin->id_izin;?>">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Type Izin</label>
                      <div class="col-sm-9">
                        <select name="type" class="form-control">
                          <option disabled selected>-- Pilih --</option>
                          <?php
                            $izin = array(
                              array(
                                'id'    => 'cuti',
                                'nama'  => 'Cuti'
                              ),
                              array(
                                'id'    => 'sekolah',
                                'nama'  => 'Sekolah'
                              ),
                              array(
                                'id'    => 'seminar',
                                'nama'  => 'Seminar'
                              )
                            );
                            foreach($izin as $iz) {
                          ?>
                          <option value="<?=$iz['id'];?>" <?=( ($iz['id']==$data_izin->type) ? 'selected' : '');?>><?=$iz['nama'];?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Cuti</label>
                      <div class="col-sm-9">
                        <select name="id_namaizin" class="form-control">
                          <option disabled selected>-- Pilih --</option>
                          <?php
                            foreach($namaizin_list as $di) {
                          ?>
                          <option value="<?=$di->id_namaizin;?>" <?=( ($di->id_namaizin==$data_izin->id_namaizin) ? 'selected' : '');?>><?=$di->nama_izin;?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Pengguna</label>
                      <div class="col-sm-9">
                        <select name="id" class="form-control">
                          <option disabled selected>-- Pilih --</option>
                          <?php
                            foreach($pegawai_list_all as $pg) {
                          ?>
                          <option value="<?=$pg->id;?>" <?=( ($pg->id==$data_izin->id) ? 'selected' : '');?>><?=$pg->nama;?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal Awal</label>
                      <div class="col-sm-9">
                        <input type="date" value="<?=$data_izin->tglawal;?>" name="tglawal" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tempat</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?=$data_izin->tempat;?>" name="tempat" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal Akhir</label>
                      <div class="col-sm-9">
                        <input type="date" value="<?=$data_izin->tglakhir;?>" name="tglakhir" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Status</label>
                      <div class="col-sm-9">
                        <select name="status" class="form-control">
                          <option disabled selected>-- Pilih --</option>
                          <option value="waiting" <?=( ($data_izin->status=='waiting') ? 'selected' : '');?>>Waiting</option>
                          <option value="approved" <?=( ($data_izin->status=='approved') ? 'selected' : '');?>>Approved</option>
                          <option value="rejected" <?=( ($data_izin->status=='rejected') ? 'selected' : '');?>>Rejected</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <button type="submit" class="btn btn-success mr-2">Submit</button>
                      <button class="btn btn-light" type="reset">Reset</button>
                    </div>
                  </div>
                </div>
              <?=form_close();?>
            </div>
          </div>
        </div>
    </div>
  </div>