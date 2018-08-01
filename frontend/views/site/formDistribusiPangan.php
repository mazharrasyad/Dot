<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\ArrayHelper;
use common\models\KontributorPangan;

/* @var $this yii\web\View */
/* @var $model common\models\DistribusiPangan */
/* @var $form ActiveForm */

$this->title = 'Mendata Distribusi Pangan';
$this->params['breadcrumbs'][] = $this->title;

$kontributor_pangan_id = KontributorPangan::find()
  ->where(['user_id' => Yii::$app->user->identity->id ])
  ->one();
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type = "text/javascript">
    $("#btnValidate").live("click", function () {
        var regex = /^[a-zA-Z ]*$/;
        if (regex.test($("#txtState").val())) {
            "";
        } else {
            alert("Bahan Pangan Harus Menggunakan Huruf");
        }
    });
</script>

<div class="site-formDistribusiPangan">

  <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>
        <div hidden> <?= $form->field($model, 'kontributor_pangan_id')->textInput(['value' => $kontributor_pangan_id->id]) ?> </div>
        <?= $form->field($model, 'tanggal')->input('date')->hint('Contoh : 31 / 12 / 2018')->label('Tanggal Mendata') ?>
        <?= $form->field($model, 'bahan_pangan')->hint('Contoh : Beras')->textInput(['id' => 'txtState']) ?>
        <?= $form->field($model, 'stok_rata2')->hint('Contoh : 50')->label('Stok Rata-Rata Bahan Pangan')->textInput(['type' => 'number']) ?>
        <?= $form->field($model, 'satuan_stok')->hint('Contoh : Kilogram')->label('Satuan Stok Bahan Pangan')->radioList(array('Ton' => 'Ton', 'Kwintal' => 'Kwintal', 'Kilogram' => 'Kilogram', 'Gram' => 'Gram', 'Ons' => 'Ons')) ?>
        <?= $form->field($model, 'harga_rata2')->hint('Contoh : 10000')->label('Harga Rata-Rata Bahan Pangan Per Kilogram (KG)') ?>

        <div class="form-group">
            <?= Html::submitButton('Input', ['id' => 'btnValidate', 'class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-formDistribusiPangan -->
