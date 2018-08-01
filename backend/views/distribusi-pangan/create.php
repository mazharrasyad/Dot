<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\DistribusiPangan */

$this->title = 'Create Distribusi Pangan';
$this->params['breadcrumbs'][] = ['label' => 'Distribusi Pangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribusi-pangan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
