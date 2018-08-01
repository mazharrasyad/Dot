<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DistribusiPanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Distribusi Pangan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribusi-pangan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Distribusi Pangan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
              'label' => 'Nama Kontributor Pangan',
              'attribute' => 'kontributor_pangan_id',
              'value' => 'kontributorPangan.nama_lengkap',
            ],
            'tanggal',
            'bahan_pangan',
            [
              'label' => 'Stok Rata-Rata',
              'attribute' => 'stok_rata2',
              'value' => 'stok',
            ],
            //'satuan_stok',
            [
              'label' => 'Harga Rata-Rata',
              'attribute' => 'harga_rata2',
              'value' => 'harga',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
