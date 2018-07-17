
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
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <button type="button" onclick="javascript:top.location.href='<?=base_url("/data_master/add_new/pegawai");?>';" class="btn btn-block btn-success btn-sm"><i class="mdi mdi-plus-circle-outline"></i> Tambah baru</button>
              </div>
            </div>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      No.
                    </th>
                    <th>
                      Avatar
                    </th>
                    <th>
                      Nama Lengkap
                    </th>
                    <th>
                      NIP
                    </th>
                    <th>
                      Tempat Lahir
                    </th>
                    <th>
                      Tanggal Lahir
                    </th>
                    <th>
                      Jenis Kelamin
                    </th>
                    <th>
                      Pendidikan Terakhir
                    </th>
                    <th>
                      Status Perkawinan
                    </th>
                    <th>
                      Status Pegawai
                    </th>
                    <th>
                      Nama Jabatan
                    </th>
                    <th>
                      Nama Bidang
                    </th>
                    <th>
                      Agama
                    </th>
                    <th>
                      Alamat
                    </th>
                    <th>
                      No. KTP
                    </th>
                    <th>
                      No. Rumah
                    </th>
                    <th>
                      No. Handphone
                    </th>
                    <th>
                      Email
                    </th>
                    <th>
                      Tanggal Pengangkatan
                    </th>
                    <th>
                      
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $i=1;
                  foreach ($list_all as $d) {
                  ?>
                  <tr>
                    <td>
                      <?=$i++;?>
                    </td>
                    <td class="py-1">
                      <img src="<?=uploads_url('avatar/' . $d->avatar);?>" alt="image" />
                    </td>
                    <td>
                      <?=$d->nama;?>
                    </td>
                    <td>
                      <?=$d->nip;?>
                    </td>
                    <td>
                      <?=$d->tempat_lahir;?>
                    </td>
                    <td>
                      <?=date_format( date_create($d->tanggal_lahir), 'd/m/Y');?>
                    </td>
                    <td>
                      <?=$d->jenis_kelamin;?>
                    </td>
                    <td>
                      <?=$d->pendidikan_terakhir;?>
                    </td>
                    <td>
                      <?=$d->status_perkawinan;?>
                    </td>
                    <td>
                      <?=$d->status_pegawai;?>
                    </td>
                    <td>
                      <?=$d->nama_jabatan;?>
                    </td>
                    <td>
                      <?=$d->nama_bidang;?>
                    </td>
                    <td>
                      <?=$d->agama;?>
                    </td>
                    <td>
                      <?=$d->alamat;?>
                    </td>
                    <td>
                      <?=$d->no_ktp;?>
                    </td>
                    <td>
                      <?=$d->no_rumah;?>
                    </td>
                    <td>
                      <?=$d->no_handphone;?>
                    </td>
                    <td>
                      <?=$d->email;?>
                    </td>
                    <td>
                      <?=date_format( date_create($d->tanggal_pengangkatan), 'd/m/Y');?>
                    </td>
                    <td>
                      <button type="button" onclick="javascript:top.location.href='<?=base_url("/data_master/edit/pegawai/{$d->id}");?>';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>
                      <button type="button" onclick="javascript:top.location.href='<?=base_url("/data_master/delete/pegawai/{$d->id}");?>';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>
                    </td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>