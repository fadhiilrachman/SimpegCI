<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="<?=$this->security->get_csrf_token_name();?>" content="<?=$this->security->get_csrf_hash();?>">
  <meta name="description" content="Sistem Informasi Kepegawaian" />
  <meta name="author" content="Fadhiil Rachman" />
  <title><?=$title_page;?> - Sistem Informasi Kepegawaian</title>
  <link rel="stylesheet" href="<?=assets_url('vendors/iconfonts/mdi/css/materialdesignicons.min.css');?>">
  <link rel="stylesheet" href="<?=assets_url('vendors/css/vendor.bundle.base.css');?>">
  <link rel="stylesheet" href="<?=assets_url('vendors/css/vendor.bundle.addons.css');?>">
  <link rel="stylesheet" href="<?=assets_url('vendors/datatables/datatables.min.css');?>">
  <link rel="stylesheet" href="<?=assets_url('css/style.css', false);?>">
  <link rel="shortcut icon" href="<?=assets_url('images/favicon.png');?>" />
  <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Application",
    "name": "Sistem Informasi Kepegawaian",
    "logo": "<?=assets_url('images/favicon.png');?>",
    "url": "<?=base_url();?>",
    "sameAs": {
      "https://github.com/fadhiilrachman/SimpegCI",
      "https://www.instagram.com/fadhiilrachman",
    }
  }
  </script>
</head>