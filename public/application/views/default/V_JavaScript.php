  <script src="<?=assets_url('vendors/js/vendor.bundle.base.js');?>"></script>
  <script src="<?=assets_url('vendors/js/vendor.bundle.addons.js');?>"></script>
  <script src="<?=assets_url('js/off-canvas.js');?>"></script>
  <!--<script src="<?=assets_url('js/misc.js');?>"></script>-->
  <script src="<?=assets_url('vendors/datatables/datatables.min.js');?>"></script>
  <script type="text/javascript">
    base_url='<?=base_url();?>';
    $.ajaxSetup({
      headers: { 'X-CSRF-TOKEN': $('meta[name="<?=$this->security->get_csrf_token_name();?>"]').attr('content') },
      xhrFields: {
        withCredentials: true
      },
      dataType: 'json',
      cache: false
    });
  </script>
  <script src="<?=assets_url('js/app.js', false);?>"></script>