<?php

use yii\helpers\Html;
use yii\jui\DatePicker;

$this->title = 'Peta Distribusi Pangan';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="site-peta">
  <h1> <?= Html::encode($this->title) ?> </h1>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

  <script type="text/javascript">
    function post()
    {
      var name = $('#name').val();
      var age = $('#age').val();

      $.post('Yii::$app->urlManager->createUrl('site/peta')',{postname:name, postage:age},
      function(data)
      {
        if(data == "1")
          $('#result').html('You are over 18');
        if(data == "0")
          $('#result').html('You are under 18');
      });
    }
  </script>

  <?php
    Html::beginForm();

    echo Html::dropDownList('provinsi', null, $provinsis, [
        'id' => 'prov',
        'prompt' => 'Pilih Provinsi',
        'onchange' => 'pilih_prov()',
        'class' => 'form-control'
    ]);

    echo DatePicker::widget([
        'id' => 'tanggal',
        //'attribute' => 'from_date',
        //'language' => 'ru',
        'dateFormat' => 'yyyy-MM-dd',
    ]);

    echo '<button onclick="pilih()"> Filter </button>';

    Html::endForm();
  ?>

  <form>
      <input type="text" id="name" placeholder="Enter your name..." /> <br />
      <input type="text" id="age" placeholder="Enter your age..." /> <br />
      <input type="button" value="Submit" onclick="post();">
  </from>

  <div id="result"></div>

</div>
