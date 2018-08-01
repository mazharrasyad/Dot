<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\KontributorPangan */

$this->title = 'Create Kontributor Pangan';
$this->params['breadcrumbs'][] = ['label' => 'Kontributor Pangans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kontributor-pangan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
