<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DistribusiPangan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="distribusi-pangan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'kontributor_pangan_id')->textInput() ?>

    <?= $form->field($model, 'tanggal')->textInput() ?>

    <?= $form->field($model, 'bahan_pangan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'stok_rata2')->textInput() ?>

    <?= $form->field($model, 'satuan_stok')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'harga_rata2')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
