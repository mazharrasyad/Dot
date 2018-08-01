<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\KontributorPangan */

$this->title = $model->nik . " | " . $model->nama_lengkap;
$this->params['breadcrumbs'][] = ['label' => 'Data Kontributor Pangan', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
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
