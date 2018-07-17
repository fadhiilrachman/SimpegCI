
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
                <button type="button" onclick="javascript:top.location.href='<?=base_url("/data_master/add_new/seminar");?>';" class="btn btn-block btn-success btn-sm"><i class="mdi mdi-plus-circle-outline"></i> Tambah baru</button>
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
                      Nama Seminar
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
                    <td>
                      <?=$d->nama_seminar;?>
                    </td>
                    <td>
                      <button type="button" onclick="javascript:top.location.href='<?=base_url("/data_master/edit/seminar/{$d->id_seminar}");?>';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>
                      <button type="button" onclick="javascript:top.location.href='<?=base_url("/data_master/delete/seminar/{$d->id_seminar}");?>';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>
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