<?php

use yii\helpers\Html;
use yii\jui\DatePicker;

$request = Yii::$app->request;

$this->title = 'Peta Distribusi Pangan';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-peta">
  <h1> <?= Html::encode($this->title) ?> </h1>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script type="text/javascript">
    function pilih_prov()
    {
      var prov = document.getElementById("prov");
      document.getElementById("prov_id").value = prov.options[prov.selectedIndex].text;
    }
  </script>

  <?php
    Html::beginForm('post');

    echo Html::dropDownList('provinsi', null, $provinsis, [
        'id' => 'prov',
        'prompt' => 'Pilih Provinsi',
        'onchange' => 'pilih_prov()',
        'class' => 'form-control'
    ]);
    Html::endForm();
  ?>

  <form method="post">
    <input id="prov_id" name="prov_id">
    <input name="<?= \Yii::$app->request->csrfParam; ?>" value="<?= \Yii::$app->request->getCsrfToken();?>"> </div>
    <input type="submit">
  </form>

  <?php
    $provinsi_id = $request->post('prov_id');
    echo "Provinsi ID : ". $provinsi_id;
  ?>

</div>
