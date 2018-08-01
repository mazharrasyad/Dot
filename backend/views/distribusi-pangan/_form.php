<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\DistribusiPangan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="distribusi-pangan-form">

  <?php $form = ActiveForm::begin(); ?>
      <div hidden> <?= $form->field($model, 'kontributor_pangan_id')->textInput() ?> </div>
      <?= $form->field($model, 'tanggal')->input('date')->hint('Contoh : 31 / 12 / 2018')->label('Tanggal Mendata') ?>
      <?= $form->field($model, 'bahan_pangan')->hint('Contoh : Beras')->textInput(['id' => 'txtState']) ?>
      <?= $form->field($model, 'stok_rata2')->hint('Contoh : 50')->label('Stok Rata-Rata Bahan Pangan')->textInput(['type' => 'number']) ?>
      <?= $form->field($model, 'satuan_stok')->hint('Contoh : Kilogram')->label('Satuan Stok Bahan Pangan')->radioList(array('Ton' => 'Ton', 'Kwintal' => 'Kwintal', 'Kilogram' => 'Kilogram', 'Gram' => 'Gram', 'Ons' => 'Ons')) ?>
      <?= $form->field($model, 'harga_rata2')->hint('Contoh : 10000')->label('Harga Rata-Rata Bahan Pangan Per Kilogram (KG)') ?>

      <div class="form-group">
          <?= Html::submitButton('Input', ['id' => 'btnValidate', 'class' => 'btn btn-primary']) ?>
      </div>
  <?php ActiveForm::end(); ?>

</div>
