<html>
<head>
<meta charset="UTF-8">
<link href='https://fonts.googleapis.com/css?family=Open+Sans:400' rel='stylesheet' type='text/css'>
<title>Surat Keterangan</title>
<style>
  @media print{.no-print,.no-print *{display:none!important}}
  @font-face {
    font-family: 'Loved by the King';
    font-style: normal;
    font-weight: 400;
    src: url('https://s3-us-west-2.amazonaws.com/lob-assets/LovedbytheKing.ttf') format('truetype');
  }

  *, *:before, *:after {
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }

  body {
    width: 8.5in;
    margin: 0;
    padding: 0;
    font-family: 'Open Sans';
  }

  .page {
    page-break-after: always;
  }

  .page-content {
    position: relative;
    left: 0.75in;
  }

  .wrapper {
    position: absolute;
    top: 0in;
  }

  .signature {
    font-family: 'Loved by the King';
    font-size: 30px;
  }
</style>
</head>
<body>
  <div class="page">
    <div class="page-content">
      <div class='wrapper'>
        <p><h3>Surat Keterangan</h3></p>

        <p><?=$data->tempat;?>, <?=date("d M Y");?></p>

        <p>Hal : Surat Keterangan Izin</p>

        <p>Kepada Yth,<br>Ka. BAAK<br>Di Tempat</p>

        <p>Dengan hormat,</p>

        <p>Saya yang bertanda tangan di bawah ini :</p>

        <p>
         &nbsp;  &nbsp; Nama &nbsp;  &nbsp;  &nbsp; : <?=$data->nama;?><br>
         &nbsp;  &nbsp; NIP &nbsp;   &nbsp;  &nbsp; &nbsp;  &nbsp; : <?=$data->nip;?><br>
         &nbsp;  &nbsp; Posisi  &nbsp; &nbsp;  &nbsp; : <?=$data->nama_jabatan;?>, Bid. <?=$data->nama_bidang;?>
        </p>

        <p>Bermaksud untuk mengajukan izin <?=$nama_izin;?> selama <?=$selama;?> terhitung mulai tanggal <?=$tglawal;?> sampai dengan <?=$tglakhir;?>.</p>

        <p>Demikian surat izin <?=$type;?> ini saya sampaikan, atas perhatian dan kebijaksanaannya saya ucapkan banyak terima kasih.</p>

        <p>Hormat Saya,</p>

        <p class="signature"><?=$nama;?></p>
        
        <div class="no-print" style="margin:0 0 20px;text-align:center;"><a href="javascript:history.go(-1);">&laquo; kembali</a> | <a href="javascript:window.print();">print</a></div>
      </div>
    </div>
  </div>
</body>
</html>