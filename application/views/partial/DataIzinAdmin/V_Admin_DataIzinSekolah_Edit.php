
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
              <?=form_open('data_izin/edit/sekolah/' . $data_sekolah->id_izin, array('method'=>'post'));?>
                <input type="hidden" name="id_izin" value="<?=$data_sekolah->id_izin;?>">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Sekolah</label>
                      <div class="col-sm-9">
                        <select name="id_sekolah" class="form-control">
                          <option disabled selected>-- Pilih --</option>
                          <?php
                            foreach($sekolah_list_all as $ct) {
                          ?>
                          <option value="<?=$ct->id_sekolah;?>" <?=( ($ct->id_sekolah==$data_sekolah->id_sekolah) ? 'selected' : '');?>><?=$ct->nama_sekolah;?></option>
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
                          <option value="<?=$pg->id;?>" <?=( ($pg->id==$data_sekolah->id) ? 'selected' : '');?>><?=$pg->nama;?></option>
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
                        <input type="date" value="<?=$data_sekolah->tglawal;?>" name="tglawal" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tempat</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?=$data_sekolah->tempat;?>" name="tempat" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Status</label>
                      <div class="col-sm-9">
                        <select name="status" class="form-control">
                          <option disabled selected>-- Pilih --</option>
                          <option value="waiting" <?=( ($data_sekolah->status=='waiting') ? 'selected' : '');?>>Waiting</option>
                          <option value="approved" <?=( ($data_sekolah->status=='approved') ? 'selected' : '');?>>Approved</option>
                          <option value="rejected" <?=( ($data_sekolah->status=='rejected') ? 'selected' : '');?>>Rejected</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal Akhir</label>
                      <div class="col-sm-9">
                        <input type="date" value="<?=$data_sekolah->tglakhir;?>" name="tglakhir" class="form-control" />
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