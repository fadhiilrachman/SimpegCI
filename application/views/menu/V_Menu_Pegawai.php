      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="<?=assets_url('images/faces/face1.jpg');?>" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">Fadhiil Rachman</p>
                  <div>
                    <small class="designation text-muted">Deputi</small><br>
                    <small class="designation text-muted">Bid. Enterprise</small>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?=base_url('dashboard');?>">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-dm" aria-expanded="false" aria-controls="ui-dm">
              <i class="menu-icon mdi mdi-treasure-chest"></i>
              <span class="menu-title">Manajemen Data Master</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-dm">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('data_master/admin');?>">Data Admin</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('data_master/jabatan');?>">Data Jabatan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('data_master/bidang');?>">Data Bidang</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('data_master/pegawai');?>">Data Pegawai</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('data_master/cuti');?>">Data Cuti</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('data_master/sekolah');?>">Data Sekolah</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('data_master/seminar');?>">Data Seminar</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-di" aria-expanded="false" aria-controls="ui-di">
              <i class="menu-icon mdi mdi-treasure-chest"></i>
              <span class="menu-title">Manajemen Data Izin</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-di">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('data_izin/cuti');?>">Data Izin Cuti</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('data_izin/sekolah');?>">Data Izin Sekolah</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('data_izin/seminar');?>">Data Izin Seminar</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-ki" aria-expanded="false" aria-controls="ui-ki">
              <i class="menu-icon mdi mdi-checkbox-multiple-marked-outline"></i>
              <span class="menu-title">Konfirmasi Izin</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-ki">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('konfirmasi_izin/cuti');?>">Izin Cuti</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('konfirmasi_izin/sekolah');?>">Izin Sekolah</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('konfirmasi_izin/seminar');?>">Izin Seminar</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-rd" aria-expanded="false" aria-controls="ui-rd">
              <i class="menu-icon mdi mdi-poll"></i>
              <span class="menu-title">Rekapitulasi Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-rd">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('rekapitulasi_data/admin');?>">Data Admin</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('rekapitulasi_data/jabatan');?>">Data Jabatan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('rekapitulasi_data/bidang');?>">Data Bidang</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('rekapitulasi_data/pegawai');?>">Data Pegawai</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?=base_url('rekapitulasi_data/izin');?>">Data Izin</a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </nav>
<div class="main-panel">