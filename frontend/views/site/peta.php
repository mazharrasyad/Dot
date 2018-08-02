<?php

use yii\helpers\Html;

$this->title = 'Peta Distribusi Pangan';
$this->params['breadcrumbs'][] = $this->title;
?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj6_eHTMYCXJFS5B9jEaycaXOZ0D4sGtY&sensor=false" type="text/javascript"></script>
<script>
  var marker;
  function initialize()
  {
    var prov = document.getElementById("prov");
    document.getElementById("diprov").value = prov.options[prov.selectedIndex].text;
    var prov_id = document.getElementById("diprov").value;

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
    //$provinsi_id = $_POST['diprov'];
    $kontributor_pangan = $query->select(['*'])->from('kontributor_pangan')->all();
    $distribusi_pangan = $query->select(['*'])->from('distribusi_pangan')->all();
    if($kontributor_pangan)
    {
      foreach ($kontributor_pangan as $kontributor)
      {
        foreach ($distribusi_pangan as $distribusi)
        {
          if($kontributor['provinsi'] == '13')
          {
            if($distribusi['tanggal'] == '2018-07-31')
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
<?php
$htmls =
'<div class="site-peta">
<b id="bid">World</b>
  <h1><?= Html::encode($this->title) ?></h1>
  '.
    Html::beginForm();
    echo Html::dropDownList('provinsi', null, $provinsis, [
        'id' => 'prov',
        'prompt' => 'Pilih Provinsi',
        'onchange' => 'initialize()',
        'class' => 'form-control'
    ]);
    echo '<br> Tentukan Tanggal Distribusi Pangan : '. Html::input('date') .'<br><br>';
    echo 'Your favorite browser is: <input type="text" id="diprov" size="100">';
    echo 'Your favorite browser is: <input type="text" id="prov_id" size="100">';
    Html::endForm();
?>
  <div id="peta" style="width:100%;height:380px;"></div>
</div>;

<?php
$dom = new DOMDocument();

$html = '<html><body>Hello <b id="bid">World</b>.</body> </html>';
$dom->validateOnParse = true; //<!-- this first
$dom->loadHTML($htmls);        //'cause 'load' == 'parse

$dom->preserveWhiteSpace = false;

$belement = $dom->getElementById("prov");
echo $belement->nodeValue;
?>
