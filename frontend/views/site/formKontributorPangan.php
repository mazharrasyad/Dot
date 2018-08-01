<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\validators\StringValidator;

/* @var $this yii\web\View */
/* @var $model common\models\KontributorPangan */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Daftar Kontributor Pangan';
$this->params['breadcrumbs'][] = $this->title;
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type = "text/javascript">
    $("#btnValidate").live("click", function () {
        var regex = /^[a-zA-Z ]*$/;
        if (regex.test($("#txtState").val())) {
            "";
        } else {
            alert("Nama Lengkap Harus Menggunakan Huruf");
        }
    });
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAj6_eHTMYCXJFS5B9jEaycaXOZ0D4sGtY&sensor=false" type="text/javascript"></script>
<script>
  // variabel global marker
  var marker, infoWindow;

  function taruhMarker(peta, posisiTitik)
  {
    if( marker )
    {
      // pindahkan marker
      marker.setPosition(posisiTitik);
    }
    else
    {
      // buat marker baru
      marker = new google.maps.Marker({
        position: posisiTitik,
        map: peta
      });
    }
    // isi nilai koordinat ke form
    document.getElementById("lat").value = posisiTitik.lat();
    document.getElementById("lng").value = posisiTitik.lng();
  }

  function initialize() {
    var propertiPeta =
    {
      center:new google.maps.LatLng(-8.5830695,116.3202515),
      zoom:9,
      mapTypeId:google.maps.MapTypeId.ROADMAP
    };

    var peta = new google.maps.Map(document.getElementById("peta"), propertiPeta);
    infoWindow = new google.maps.InfoWindow;

    // Try HTML5 geolocation.
    if (navigator.geolocation)
    {
      navigator.geolocation.getCurrentPosition(function(position)
      {
        var pos =
        {
          lat: position.coords.latitude,
          lng: position.coords.longitude
        };
        infoWindow.setPosition(pos);
        infoWindow.setContent('Lokasi Anda Sekarang');
        infoWindow.open(peta);
        peta.setCenter(pos);
        // isi nilai koordinat ke form
        document.getElementById("lat").value = position.coords.latitude;
        document.getElementById("lng").value = position.coords.longitude;
      },

      function()
      {
        handleLocationError(true, infoWindow, peta.getCenter());
      });
    }
    else
    {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, peta.getCenter());
    }

    // even listner ketika peta diklik
    google.maps.event.addListener(peta, 'click', function(event) {
    taruhMarker(this, event.latLng);
    });
  }

  function handleLocationError(browserHasGeolocation, infoWindow, pos)
  {
    infoWindow.setPosition(pos);
    infoWindow.setContent(browserHasGeolocation ?
            'Error: The Geolocation service failed.' :
            'Error: Your browser doesn\'t support geolocation.');
    infoWindow.open(peta);
  }

  // event jendela di-load
  google.maps.event.addDomListener(window, 'load', initialize);

</script>

<div class="site-formKontributorPangan">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true, 'type' => 'number'])->widget(MaskedInput::classname(), ['mask' => '[99-99-99-99-99-99-9999]'])->hint('Contoh : 32-01-01-21-03-99-0008') ?>

    <?= $form->field($model, 'npwp')->textInput(['maxlength' => true, 'type' => 'number'])->widget(MaskedInput::classname(), ['mask' => '[99.999.999.9-999.999]'])->hint('Contoh : 03.026.562.3-805.000') ?>

    <?= $form->field($model, 'nama_lengkap')->textInput(['id' => 'txtState'])->hint('Contoh : Muhammad Azhar Rasyad') ?>

    <?= $form->field($model, 'no_handphone')->textInput(['maxlength' => true, 'type' => 'number'])->widget(MaskedInput::classname(), ['mask' => '[+62999999999999]'])->hint('Contoh : +6281290351971') ?>

    <?= $form->field($model, 'email')->input('email')->hint('Contoh : muhazharrasyad@gmail.com') ?>

    <?= $form->field($model, 'provinsi')->dropDownList($provinsis, ['prompt' => 'Pilih Provinsi','onchange' => '$.post("'.Yii::$app->urlManager->createUrl('site/kab').'&id="+$(this).val(), function(data){$("select#kab").html(data);});','class' => 'form-control']) ?>

    <?= $form->field($model, 'kota')->dropDownList([], ['prompt' => 'Pilih Kota / Kabupaten', 'id' => 'kab', 'onchange' => '$.post("'.Yii::$app->urlManager->createUrl('site/kec').'&id="+$(this).val(), function(data){$("select#kec").html(data);});','class' => 'form-control']) ?>

    <?= $form->field($model, 'kecamatan')->dropDownList([], ['prompt' => 'Pilih Kecamatan', 'id' => 'kec', 'onchange' => '$.post("'.Yii::$app->urlManager->createUrl('site/desa').'&id="+$(this).val(), function(data){$("select#desa").html(data);});','class' => 'form-control']) ?>

    <?= $form->field($model, 'kelurahan')->dropDownList([], ['prompt' => 'Pilih Desa / Kelurahan', 'id' => 'desa','class' => 'form-control']) ?>

    <?= $form->field($model, 'rt')->textInput(['type' => 'number'])->widget(MaskedInput::classname(), ['mask' => '[99]', 'clientOptions' => ['removeMaskOnSubmit'=> true]])->hint('Contoh : 01') ?>

    <?= $form->field($model, 'rw')->textInput(['type' => 'number'])->widget(MaskedInput::classname(), ['mask' => '[99]', 'clientOptions' => ['removeMaskOnSubmit'=> true]])->hint('Contoh : 06') ?>

    <?= $form->field($model, 'kode_pos')->textInput(['type' => 'number'])->widget(MaskedInput::classname(), ['mask' => '[99999]', 'clientOptions' => ['removeMaskOnSubmit'=> true]])->hint('Contoh : 16914') ?>

    <div id="peta" style="width:100%;height:380px;" hidden></div>

    <div hidden> <?= $form->field($model, 'lat')->textInput(['maxlength' => true, 'id' => "lat"]) ?> </div>

    <div hidden> <?= $form->field($model, 'lng')->textInput(['maxlength' => true, 'id' => "lng"]) ?> </div>

    <?= $form->field($model, 'user_id')->textInput(['value' => '0']) ?>

    <div class="form-group">
        <?= Html::submitButton('Daftar', ['id' => 'btnValidate', 'class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
