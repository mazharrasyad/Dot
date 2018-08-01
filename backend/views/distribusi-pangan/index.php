<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DistribusiPanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Distribusi Pangans';
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

            'id',
            'kontributor_pangan_id',
            'tanggal',
            'bahan_pangan',
            'stok_rata2',
            //'satuan_stok',
            //'harga_rata2',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
