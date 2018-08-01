<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\DistribusiPangan */

$this->title = 'Update Distribusi Pangan: ' . $model->kontributorPangan->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Data Distribusi Pangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kontributorPangan->nama_lengkap, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="distribusi-pangan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
