    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="<?=base_url('dashboard');?>">
          <img src="<?=assets_url('logo.png', false);?>" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="<?=base_url('dashboard');?>">
          <img src="<?=assets_url('logo.png', false);?>" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="javascript:;" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text"><?=$user_name;?></span>
              <img class="img-xs rounded-circle" src="<?=$user_avatar;?>" alt="<?=$user_name;?>">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <a href="<?=base_url('change_password');?>" class="dropdown-item">
                Ganti Password
              </a>
              <a href="<?=base_url('auth/logout');?>" class="dropdown-item">
                Keluar
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>