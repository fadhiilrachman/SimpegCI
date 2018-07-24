<html>
<head>
<title>Surat Keterangan</title>
<meta http-equiv="Content-Type" content="text/html; charset=Windows-1252">
<style>
  @media print {
    .no-print,.no-print * {
      display:none!important
    }
  }
  body, table {
    font-family: Arial, Helvetica;
    font-size: 13px !important;
  }
  @font-face {
    font-family: 'Loved by the King';
    font-style: normal;
    font-weight: 400;
    src: url('<?=assets_url('fonts/LovedbytheKing/LovedbytheKing.ttf');?>') format('truetype');
  }
  .kop-surat {
    font-size: 26px;
  }
  .title {
    font-size: 18px;
  }
  .eng {
    font-family: Arial, Helvetica;
    font-size:9px; font-style:italic;
  }
  .signature {
    font-family: 'Loved by the King';
    font-size: 30px;
  }
</style>
</head>
<body bgcolor="#FFFFFF">
<table width="670" border="0" cellspacing="2" cellpadding="2" align="center">
  <tr> 
    <td> 
      <div align="center">
        <b class="kop-surat">PT. Fadilus Media</b><br>
        Gandaria Office Tower 8 Lt.20 Unit B-C, Gandaria City
      </div>
      <hr size="2" align="center" width="100%" color="#000000"/>
    </td>
  </tr>
  <tr> 
    <td> 
      <div align="center" class="title"><b>SURAT 
        KETERANGAN</b><br>
      <font class="eng"><i>To Whom It May Concern</i></font>
      </div>
    </td>
  </tr>
  <tr> 
    <td>&nbsp;<br></td>
  </tr>
  <tr>
    <td style="text-align: right;">Jakarta, <?=date("d M Y");?></td>
  </tr>
  <tr> 
    <td>&nbsp;<br></td>
  </tr>
  <tr>
    <div align="left">
      <td>
      <table width="100%" border="0" cellspacing="1" cellpadding="1">
        <tr> 
          <td width="13%">Nomor / <font class="eng">Number</font></td>
          <td width="70%">: <?=$type_id;?>/0<?=$id;?>/BAAK-Sket/<?=date('Y');?></td>
        </tr>
        <tr> 
          <td width="13%">Hal / <font class="eng">Case</font></td>
          <td width="70%">: Izin</td>
        </tr>
      </table>
    </td>
    </div>
  </tr>
  <tr> 
    <td>&nbsp;<br></td>
  </tr>
  <tr>
    <div align="left">
      <td> 
        Kepada Yth, 
        <br>
        <font class="eng">Dear,</font>
        <br>
        Kepala BAAK 
        <br>
        <font class="eng">Head of BAAK</font>
        <br>
        Di Tempat 
        <br>
        <font class="eng">In place</font>
      </td>
    </div>
  </tr>
  <tr> 
    <td>&nbsp;<br>
    </td>
  </tr>
  <tr>
    <td>Yang bertanda tangan dibawah ini :<br>
        <font class="eng">This is to certify that:</font>
    </td>
  </tr>
  <tr> 
    <td> 
      <table width="100%" border="0" cellspacing="1" cellpadding="1">
		    <tr><td>&nbsp;</td></tr>
        <tr> 
          <td width="1%">&nbsp;</td>
          <td width="29%">N a m a / <font class="eng">Name</font></td>
          <td width="70%">:&nbsp; <b> <?=strtoupper($data->nama);?> </b> </td>
        </tr>
        <tr> 
          <td width="1%">&nbsp;</td>
          <td width="29%">Nomor Induk Pegawai / <font class="eng">Employee ID Number</font></td>
          <td width="70%">:&nbsp; <?=$data->nip;?> </td>
        </tr>
		    <tr> 
          <td width="12%">&nbsp;</td>
          <td width="25%">Tempat, Tanggal Lahir  / <font class="eng">Date of Birth</font></td>
          <td width="60%">:&nbsp;  <?=$tempat_lahir;?>, <?=$tanggal_lahir;?>               </td>
        </tr>
        <tr> 
          <td width="1%">&nbsp;</td>
          <td width="29%">Posisi / <font class="eng">Position</font></td>
          <td width="70%">:&nbsp;  <?=$data->nama_jabatan;?> </td>
        </tr>
        <tr> 
          <td width="1%">&nbsp;</td>
          <td width="29%">Bidang / <font class="eng">Department</font></font></td>
          <td width="70%">:&nbsp; <?=$data->nama_bidang;?></td>
        </tr>
        <tr>
          <td width="1%">&nbsp;</td>
          <td width="29%">Alamat / <font class="eng">Address</font></td>
          <td width="70%" valign="top">:&nbsp; <?=$data->alamat;?></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Bermaksud untuk mengajukan izin <?=$nama_izin;?> di <?=$data->tempat;?> selama <?=$selama;?> terhitung mulai tanggal <?=$tglawal;?> sampai dengan <?=$tglakhir;?>.<br>
    </td>
  </tr>
  <tr> 
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Demikian surat izin <?=$type;?> ini dibuat agar dapat dipergunakan sebagaimana mestinya, atas perhatian dan kebijaksanaannya saya ucapkan banyak terima kasih.</td>
  </tr>
  <tr>
    <td>&nbsp;<br><br><br></td>
  </tr>
  <tr> 
    <td>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr> 
          <td width="45%">Disetujui oleh,<br><font class="eng">Approved by,</font></td>
          <td width="45%">Pemohon,<br><font class="eng">Applicant,</font></td>
        </tr>
        <tr>
          <td width="45%"><br><p class="signature">Ka. BAAK</p></td>

          <td width="45%"><br><br><br><br><br><br></td>
        </tr>
        <tr> 
          <td width="45%"></td>
          <td width="45%"></td>
        </tr>
        <tr>
          <td width="45%" align="left"><p style="text-align: center;"><br></p><hr size="1" align="left" width="90%" color="#000000"></td>
          <td width="45%" align="left"><p style="text-align: center;"><?=$data->nama;?></p><hr size="1" align="left" width="90%" color="#000000"></td>
        </tr>
        <tr>
          <td width="45%">Kepala BAAK<br><font class="eng">Head of BAAK</font></td>
          <td width="45%">NIP / <font class="eng">Employee ID Number</font>: <?=$data->nip;?></td>
		    </tr>
      </table>
    </td>
  </tr>
  <tr>
    <?php if(!$dl) { ?>
    <td><div class="no-print" style="margin:0 0 20px;text-align:center;"><a href="javascript:history.go(-1);">&laquo; kembali</a> | <a href="javascript:window.print();">print</a></div></td>
    <?php } ?>
  </tr>
</table>
<?php if(!$dl) { ?>
<script type="text/javascript">window.print();</script>
<?php } ?>
</body>
</html>