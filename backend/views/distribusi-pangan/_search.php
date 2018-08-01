<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DistribusiPanganSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="distribusi-pangan-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'kontributor_pangan_id') ?>

    <?= $form->field($model, 'tanggal') ?>

    <?= $form->field($model, 'bahan_pangan') ?>

    <?= $form->field($model, 'stok_rata2') ?>

    <?php // echo $form->field($model, 'satuan_stok') ?>

    <?php // echo $form->field($model, 'harga_rata2') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
