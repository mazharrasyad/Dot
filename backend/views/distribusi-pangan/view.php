<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\DistribusiPangan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Distribusi Pangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribusi-pangan-view">

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
            'kontributor_pangan_id',
            'tanggal',
            'bahan_pangan',
            'stok_rata2',
            'satuan_stok',
            'harga_rata2',
        ],
    ]) ?>

</div>
