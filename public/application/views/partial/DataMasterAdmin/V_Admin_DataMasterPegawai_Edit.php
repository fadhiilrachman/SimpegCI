
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
              <?=form_open_multipart('data_master/edit/pegawai/' . $data_pegawai->id , array('method'=>'post'));?>
                <input type="hidden" name="id" value="<?=$data_pegawai->id;?>">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Lengkap</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?=$data_pegawai->nama;?>" name="nama" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tempat Lahir</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?=$data_pegawai->tempat_lahir;?>" name="tempat_lahir" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Jenis Kelamin</label>
                      <div class="col-sm-9">
                        <select name="jenis_kelamin" class="form-control">
                          <option disabled selected>-- Pilih --</option>
                          <option value="Laki-laki" <?=( ($data_pegawai->jenis_kelamin=='Laki-laki') ? 'selected' : '');?>>Laki-laki</option>
                          <option value="Perempuan" <?=( ($data_pegawai->jenis_kelamin=='Perempuan') ? 'selected' : '');?>>Perempuan</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal Lahir</label>
                      <div class="col-sm-9">
                        <input type="date" value="<?=$data_pegawai->tanggal_lahir;?>" name="tanggal_lahir" class="form-control" placeholder="dd/mm/yyyy" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Avatar</label>
                      <div class="col-sm-9">
                          <input type="file" name="avatar">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Pendidikan Terakhir</label>
                      <div class="col-sm-9">
                        <select name="pendidikan_terakhir" class="form-control">
                          <option disabled selected>-- Pilih --</option>
                          <option value="SMP/SMA" <?=( ($data_pegawai->pendidikan_terakhir=='SMP/SMA') ? 'selected' : '');?>>SMP/SMA</option>
                          <option value="Diploma" <?=( ($data_pegawai->pendidikan_terakhir=='Diploma') ? 'selected' : '');?>>Diploma</option>
                          <option value="S1" <?=( ($data_pegawai->pendidikan_terakhir=='S1') ? 'selected' : '');?>>S1</option>
                          <option value="S2" <?=( ($data_pegawai->pendidikan_terakhir=='S2') ? 'selected' : '');?>>S2</option>
                          <option value="S3" <?=( ($data_pegawai->pendidikan_terakhir=='S3') ? 'selected' : '');?>>S3</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">NIP</label>
                      <div class="col-sm-9">
                        <input type="number" value="<?=$data_pegawai->nip;?>" name="nip" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Status Perkawinan</label>
                      <div class="col-sm-9">
                        <select name="status_perkawinan" class="form-control">
                          <option disabled selected>-- Pilih --</option>
                          <option value="Belum kawin" <?=( ($data_pegawai->status_perkawinan=='Belum kawin') ? 'selected' : '');?>>Belum kawin</option>
                          <option value="Kawin" <?=( ($data_pegawai->status_perkawinan=='Kawin') ? 'selected' : '');?>>Kawin</option>
                          <option value="Cerai mati" <?=( ($data_pegawai->status_perkawinan=='Cerai mati') ? 'selected' : '');?>>Cerai mati</option>
                          <option value="Cerai hidup" <?=( ($data_pegawai->status_perkawinan=='Cerai hidup') ? 'selected' : '');?>>Cerai hidup</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">No. KTP</label>
                      <div class="col-sm-9">
                        <input type="number" value="<?=$data_pegawai->no_ktp;?>" name="no_ktp" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Agama</label>
                      <div class="col-sm-9">
                        <select name="agama" class="form-control">
                          <option disabled selected>-- Pilih --</option>
                          <option value="Islam" <?=( ($data_pegawai->agama=='Islam') ? 'selected' : '');?>>Islam</option>
                          <option value="Kristen Protestan" <?=( ($data_pegawai->agama=='Kristen Protestan') ? 'selected' : '');?>>Kristen Protestan</option>
                          <option value="Kristen Katolik" <?=( ($data_pegawai->agama=='Cerai hidup') ? 'selected' : '');?>>Kristen Katolik</option>
                          <option value="Hindu" <?=( ($data_pegawai->agama=='Cerai hidup') ? 'selected' : '');?>>Hindu</option>
                          <option value="Buddha" <?=( ($data_pegawai->agama=='Cerai hidup') ? 'selected' : '');?>>Buddha</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Status Pegawai</label>
                      <div class="col-sm-9">
                        <select name="status_pegawai" class="form-control">
                          <option disabled selected>-- Pilih --</option>
                          <option value="Karyawan tetap" <?=( ($data_pegawai->status_pegawai=='Karyawan tetap') ? 'selected' : '');?>>Karyawan tetap</option>
                          <option value="Karyawan kontrak" <?=( ($data_pegawai->status_pegawai=='Karyawan kontrak') ? 'selected' : '');?>>Karyawan kontrak</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">No. Rumah</label>
                      <div class="col-sm-9">
                        <input type="number" value="<?=$data_pegawai->no_rumah;?>" name="no_rumah" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Jabatan</label>
                      <div class="col-sm-9">
                        <select name="id_jabatan" class="form-control">
                          <option disabled selected>-- Pilih --</option>
                          <?php
                            foreach($list_jabatan as $lj) {
                          ?>
                          <option value="<?=$lj->id_jabatan;?>" <?=( ($data_pegawai->id_jabatan==$lj->id_jabatan) ? 'selected' : '');?>><?=$lj->nama_jabatan;?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" value="<?=$data_pegawai->email;?>" name="email" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Nama Bidang</label>
                      <div class="col-sm-9">
                        <select name="id_bidang" class="form-control">
                          <option disabled selected>-- Pilih --</option>
                          <?php
                            foreach($list_bidang as $lb) {
                          ?>
                          <option value="<?=$lb->id_bidang;?>" <?=( ($data_pegawai->id_bidang==$lb->id_bidang) ? 'selected' : '');?>><?=$lb->nama_bidang;?></option>
                          <?php
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" placeholder="********" name="password" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Tanggal Pengangkatan</label>
                      <div class="col-sm-9">
                        <input type="date" value="<?=$data_pegawai->tanggal_pengangkatan;?>" name="tanggal_pengangkatan" class="form-control" placeholder="dd/mm/yyyy" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?=$data_pegawai->id_user;?>" name="id_user" class="form-control" />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">No. Handphone</label>
                      <div class="col-sm-9">
                        <input type="number" value="<?=$data_pegawai->no_handphone;?>" name="no_handphone" class="form-control" />
                      </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">Alamat Rumah</label>
                      <div class="col-sm-9">
                        <textarea name="alamat" class="form-control" rows="3"/><?=$data_pegawai->alamat;?></textarea>
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