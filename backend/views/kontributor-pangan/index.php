<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\KontributorPanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Kontributor Pangan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kontributor-pangan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <!-- < ?= Html::a('Create Kontributor Pangan', ['create'], ['class' => 'btn btn-success']) ?> -->
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nik',
            //'npwp',
            'nama_lengkap',
            'no_handphone',
            'email:email',
            //'provinsi',
            //'kota',
            //'kecamatan',
            'kelurahan',
            [
              'attribute' => 'kelurahan',
              'value' => 'kelurahan0.nama',
            ],
            //'rt',
            //'rw',
            //'kode_pos',
            //'lat',
            //'lng',
            //'user_id',

            ['class' => 'yii\grid\ActionColumn'],

        ],
    ]); ?>
</div>
