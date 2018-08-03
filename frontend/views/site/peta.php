<?php

use yii\helpers\Html;
use kartik\date\DatePicker;

$request = Yii::$app->request;
$this->title = 'Peta Distribusi Pangan';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-peta">
  <h1> <?= Html::encode($this->title) ?> </h1>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script type="text/javascript">
    function pilih()
    {
      var prov = document.getElementById("prov");
      var tanggal = document.getElementById("tanggal").value;
      document.getElementById("prov_id").value = prov.options[prov.selectedIndex].text;
      document.getElementById("tanggal_data").value = tanggal;
    }
  </script>

  <?php
    Html::beginForm('post');

    echo Html::dropDownList('provinsi', null, $provinsis, [
        'id' => 'prov',
        'prompt' => 'Pilih Provinsi',
        //'onchange' => 'pilih()',
        'class' => 'form-control'
    ]);

    echo DatePicker::widget([
        'id' => 'tanggal',
        'name' => 'tanggal',
        'options' => ['placeholder' => 'Pilih Tanggal'],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd',
            'todayHighlight' => true
        ]
    ]);

    Html::endForm();
  ?>

  <form method="post">
    <input type="hidden" id="prov_id" name="prov_id">
    <input type="hidden" id="tanggal_data" name="tanggal_data"></span>
    <input type="hidden" name="<?= \Yii::$app->request->csrfParam; ?>" value="<?= \Yii::$app->request->getCsrfToken();?>"> <br>
    <input type="submit" value="Filter" onclick="pilih();"><br><br>
  </form>

  <?php
    if($request->post('prov_id') == 'ACEH') $provinsi_id = 11;
    else if($request->post('prov_id') == 'SUMATERA UTARA') $provinsi_id = 12;
    else if($request->post('prov_id') == 'SUMATERA BARAT') $provinsi_id = 13;
    else if($request->post('prov_id') == 'RIAU') $provinsi_id = 14;
    else if($request->post('prov_id') == 'JAMBI') $provinsi_id = 15;
    else if($request->post('prov_id') == 'SUMATERA SELATAN') $provinsi_id = 16;
    else if($request->post('prov_id') == 'BENGKULU') $provinsi_id = 17;
    else if($request->post('prov_id') == 'LAMPUNG') $provinsi_id = 18;
    else if($request->post('prov_id') == 'KEPULAUAN BANGKA BELITUNG') $provinsi_id = 19;
    else if($request->post('prov_id') == 'KEPULAUAN RIAU') $provinsi_id = 21;
    else if($request->post('prov_id') == 'DKI JAKARTA') $provinsi_id = 31;
    else if($request->post('prov_id') == 'JAWA BARAT') $provinsi_id = 32;
    else if($request->post('prov_id') == 'JAWA TENGAH') $provinsi_id = 33;
    else if($request->post('prov_id') == 'DI YOGYAKARTA') $provinsi_id = 34;
    else if($request->post('prov_id') == 'JAWA TIMUR') $provinsi_id = 35;
    else if($request->post('prov_id') == 'BANTEN') $provinsi_id = 36;
    else if($request->post('prov_id') == 'BALI') $provinsi_id = 51;
    else if($request->post('prov_id') == 'NUSA TENGGARA BARAT') $provinsi_id = 52;
    else if($request->post('prov_id') == 'NUSA TENGGARA TIMUR') $provinsi_id = 53;
    else if($request->post('prov_id') == 'KALIMANTAN BARAT') $provinsi_id = 61;
    else if($request->post('prov_id') == 'KALIMANTAN TENGAH') $provinsi_id = 62;
    else if($request->post('prov_id') == 'KALIMANTAN SELATAN') $provinsi_id = 63;
    else if($request->post('prov_id') == 'KALIMANTAN TIMUR') $provinsi_id = 64;
    else if($request->post('prov_id') == 'KALIMANTAN UTARA') $provinsi_id = 65;
    else if($request->post('prov_id') == 'SULAWESI UTARA') $provinsi_id = 71;
    else if($request->post('prov_id') == 'SULAWESI TENGAH') $provinsi_id = 72;
    else if($request->post('prov_id') == 'SULAWESI SELATAN') $provinsi_id = 73;
    else if($request->post('prov_id') == 'SULAWESI TENGGARA') $provinsi_id = 74;
    else if($request->post('prov_id') == 'GORONTALO') $provinsi_id = 75;
    else if($request->post('prov_id') == 'SULAWESI BARAT') $provinsi_id = 76;
    else if($request->post('prov_id') == 'MALUKU') $provinsi_id = 81;
    else if($request->post('prov_id') == 'MALUKU UTARA') $provinsi_id = 82;
    else if($request->post('prov_id') == 'PAPUA BARAT') $provinsi_id = 91;
    else if($request->post('prov_id') == 'PAPUA') $provinsi_id = 94;
    else $provinsi_id = 0;

    $tanggal_data = $request->post('tanggal_data');
  ?>

  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj6_eHTMYCXJFS5B9jEaycaXOZ0D4sGtY&sensor=false" type="text/javascript"></script>
  <script>
    var marker;
    function initialize()
    {

      // Variabel untuk menyimpan informasi (desc)
      var infoWindow = new google.maps.InfoWindow;
      //  Variabel untuk menyimpan peta Roadmap
      var mapOptions =
      {
        center:new google.maps.LatLng(-6.2212790112294964, 106.85128400000008),
        zoom:9,
        mapTypeId:google.maps.MapTypeId.ROADMAP
      };
      // Pembuatan petanya
      var map = new google.maps.Map(document.getElementById('peta'), mapOptions);
      // Variabel untuk menyimpan batas kordinat
      var bounds = new google.maps.LatLngBounds();
      // Pengambilan data dari database

      <?php
      $query = new yii\db\Query();
      $kontributor_pangan = $query->select(['*'])->from('kontributor_pangan')->all();
      $distribusi_pangan = $query->select(['*'])->from('distribusi_pangan')->all();
      if($kontributor_pangan)
      {
        foreach ($kontributor_pangan as $kontributor)
        {
          foreach ($distribusi_pangan as $distribusi)
          {
            if($kontributor['provinsi'] == $provinsi_id)
            {
              if($distribusi['tanggal'] == $tanggal_data)
              {
                if($kontributor['id'] == $distribusi['kontributor_pangan_id'])
                {
                  $nama_lengkap = $kontributor['nama_lengkap'];
                  $lat = $kontributor['lat'];
                  $lon = $kontributor['lng'];
                  $tanggal = $distribusi['tanggal'];
                  $bahan = $distribusi['bahan_pangan'];
                  $stok_rata2 = $distribusi['stok_rata2'];
                  $satuan_stok = $distribusi['satuan_stok'];
                  $harga = $distribusi['harga_rata2'];
                  echo ("addMarker($lat, $lon, 'Kontributor Pangan : <b> $nama_lengkap </b> <br/> Tanggal : <b> $tanggal </b> <br/> Bahan Pangan :  <b> $bahan </b> <br/> Stok Rata-Rata :  <b> $stok_rata2 $satuan_stok </b> <br/> Harga :  <b> $harga / KG </b> <br/> ');\n");
                }
              }
            }
          }
        }
      }
      ?>
      // Proses membuat marker
      function addMarker(lat, lng, info)
      {
        var lokasi = new google.maps.LatLng(lat, lng);
        bounds.extend(lokasi);
        var marker = new google.maps.Marker
        ({
          map: map,
          position: lokasi
        });
        map.fitBounds(bounds);
        bindInfoWindow(marker, map, infoWindow, info);
      }
      // Menampilkan informasi pada masing-masing marker yang diklik
      function bindInfoWindow(marker, map, infoWindow, html)
      {
        google.maps.event.addListener(marker, 'click', function()
        {
          infoWindow.setContent(html);
          infoWindow.open(map, marker);
        });
      }
    }
    google.maps.event.addDomListener(window, 'load', initialize);
  </script>

  <div id="peta" style="width:100%;height:500px;"></div>
</div>
