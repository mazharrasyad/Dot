<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\KontributorPangan */

$this->title = $model->nik . " | " . $model->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Data Kontributor Pangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj6_eHTMYCXJFS5B9jEaycaXOZ0D4sGtY&sensor=false" type="text/javascript"></script>
<script type="text/javascript">
  function initialize()
  {
    var mapOptions =
    {
      zoom: 15,
      center: new google.maps.LatLng(<?php echo "$dcari[lat], $dcari[lng]"; ?>)
    }

    var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    setMarkers(map, beaches);
  }

  var beaches = [['<?php echo "$dcari[nama_lengkap]"; ?>', <?php echo "$dcari[lat], $dcari[lng]"; ?>],];

  function setMarkers(map, locations)
  {
    var shape =
    {
      coords: [1, 1, 1, 20, 18, 20, 18 , 1],
      type: 'poly'
    };
    var infoWindow = new google.maps.InfoWindow;
    for (var i = 0; i < locations.length; i++)
    {
      var beach = locations[i];
      var myLatLng = new google.maps.LatLng(beach[1], beach[2]);
      var marker = new google.maps.Marker
      ({
        position: myLatLng,
        map: map,
        icon: beach[4],
        shape: shape,
        title: beach[0],
        zIndex: beach[3]
      });
      var html = 'Lokasi : '+beach[0]+'<br/>Latitude : '+beach[1]+'<br/>Longitude : '+beach[2]+'';
      bindInfoWindow(marker, map, infoWindow, html);
    }
  }

  function bindInfoWindow(marker, map, infoWindow, html)
  {
    google.maps.event.addListener(marker, 'click', function()
    {
      infoWindow.setContent(html);
      infoWindow.open(map, marker);
    });
  }

  google.maps.event.addDomListener(window, 'load', initialize);
</script>

<div class="kontributor-pangan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nik',
            'npwp',
            'nama_lengkap',
            'no_handphone',
            'email:email',
            [
              'label' => 'Provinsi',
              'value' => $model->provinsi0->nama,
            ],
            [
              'label' => 'Kota',
              'value' => $model->kota0->nama,
            ],
            [
              'label' => 'Kecamatan',
              'value' => $model->kecamatan0->nama,
            ],
            [
              'label' => 'Kelurahan',
              'value' => $model->kelurahan0->nama,
            ],
            'rt',
            'rw',
            'kode_pos',
            'lat',
            'lng',
            'user_id',
        ],
    ]) ?>

</div>

<!DOCTYPE html>
<html>
  <head>
    <title>Maps <?php echo $dcari['nama_lengkap']; ?> - www.yasirblog.com</title>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <style type="text/css">
      html { height: 100% }
      body { height: 100%; }
      #map-canvas { height: 100% }
    </style>
  </head>

  <body>
    <h3>Lokasi : <?php echo $dcari['nama_lengkap']; ?></h3>
    <div id="map-canvas" style="width:100%;height:380px;"></div>
  </body>
</html>
