
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
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      No.
                    </th>
                    <th>
                      Nama Sekolah
                    </th>
                    <th>
                      Nama Pengguna
                    </th>
                    <th>
                      Tempat
                    </th>
                    <th>
                      Tanggal Awal
                    </th>
                    <th>
                      Tanggal Akhir
                    </th>
                    <th>
                      Lama sekolah
                    </th>
                    <th>
                      Status
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
                      <?=$d->nama_sekolah;?>
                    </td>
                    <td>
                      <?=$d->nama;?>
                    </td>
                    <td>
                      <?=$d->tempat;?>
                    </td>
                    <td>
                      <?=date_format( date_create($d->tglawal), 'd/m/Y');?>
                    </td>
                    <td>
                      <?=date_format( date_create($d->tglakhir), 'd/m/Y');?>
                    </td>
                    <td>
                      <?php
                        $diff  = date_diff( date_create($d->tglawal), date_create($d->tglakhir) );
                        echo $diff->format('%d hari');
                      ?>
                    </td>
                    <td>
                      <?=$d->status;?>
                    </td>
                    <td>
                      <button type="button" onclick="javascript:top.location.href='<?=base_url("/konfirmasi_izin/accept/sekolah/{$d->id_izin}");?>';" class="btn btn-success btn-icons btn-rounded"><i class="mdi mdi-check-circle"></i></button>
                      <button type="button" onclick="javascript:top.location.href='<?=base_url("/surat_keterangan/sekolah/{$d->id_izin}");?>';" class="btn btn-info btn-icons btn-rounded"><i class="mdi mdi-printer"></i></button>
                      <button type="button" onclick="javascript:top.location.href='<?=base_url("/konfirmasi_izin/reject/sekolah/{$d->id_izin}");?>';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-close-circle-outline"></i></button>
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