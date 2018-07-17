
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
                <button type="button" onclick="javascript:top.location.href='<?=base_url("/data_master/add_new/admin");?>';" class="btn btn-block btn-success btn-sm"><i class="mdi mdi-plus-circle-outline"></i> Tambah baru</button>
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
                      Type
                    </th>
                    <th>
                      Username
                    </th>
                    <th>
                      Email
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
                      <?=$d->namalengkap;?>
                    </td>
                    <td>
                      <?=$d->type;?>
                    </td>
                    <td>
                      <?=$d->username;?>
                    </td>
                    <td>
                      <?=$d->email;?>
                    </td>
                    <td>
                      <button type="button" onclick="javascript:top.location.href='<?=base_url("/data_master/edit/admin/{$d->id_user}");?>';" class="btn btn-warning btn-icons btn-rounded"><i class="mdi mdi-pencil-box-outline"></i></button>
                      <button type="button" onclick="javascript:top.location.href='<?=base_url("/data_master/delete/admin/{$d->id_user}");?>';" class="btn btn-icons btn-rounded btn-inverse-danger"><i class="mdi mdi-delete"></i></button>
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