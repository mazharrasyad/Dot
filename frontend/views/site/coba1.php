<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\KontributorPangan */

$this->title = 'Update Kontributor Pangan : ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Data Kontributor Pangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kontributor-pangan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('peta', [
      'model' => $model,
      'provinsis' => $provinsis,
      'provinsi_id' => $provinsi_id,
      'tanggal' => $tanggal,
    ]) ?>

</div>
