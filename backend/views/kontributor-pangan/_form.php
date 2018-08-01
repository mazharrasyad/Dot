<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model common\models\KontributorPangan */
/* @var $form yii\widgets\ActiveForm */

$user_id = ArrayHelper::map(\common\models\User::find()->asArray()->all(), 'id', 'username');

?>

<div class="kontributor-pangan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nik')->textInput(['maxlength' => true, 'type' => 'number'])->widget(MaskedInput::classname(), ['mask' => '[99-99-99-99-99-99-9999]'])->hint('Contoh : 32-01-01-21-03-99-0008') ?>

    <?= $form->field($model, 'npwp')->textInput(['maxlength' => true, 'type' => 'number'])->widget(MaskedInput::classname(), ['mask' => '[99.999.999.9-999.999]'])->hint('Contoh : 03.026.562.3-805.000') ?>

    <?= $form->field($model, 'nama_lengkap')->textInput(['maxlength' => true])->hint('Contoh : Muhammad Azhar Rasyad') ?>

    <?= $form->field($model, 'no_handphone')->textInput(['maxlength' => true, 'type' => 'number'])->widget(MaskedInput::classname(), ['mask' => '[+62999999999999]'])->hint('Contoh : +6281290351971') ?>

    <?= $form->field($model, 'email')->input('email')->hint('Contoh : muhazharrasyad@gmail.com') ?>

    <div hidden><?= $form->field($model, 'kode_pos')->textInput(['type' => 'number'])->widget(MaskedInput::classname(), ['mask' => '[99999]', 'clientOptions' => ['removeMaskOnSubmit'=> true]])->hint('Contoh : 16914') ?></div>

    <?= $form->field($model, 'user_id')->dropDownList($user_id, ['prompt' => 'Pilih User','class' => 'form-control']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
