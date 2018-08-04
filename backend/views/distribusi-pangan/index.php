<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\DistribusiPanganSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Distribusi Pangan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="distribusi-pangan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!--<p>
        < ?= Html::a('Create Distribusi Pangan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            [
              'label' => 'Nama Kontributor Pangan',
              'attribute' => 'kontributor_pangan_id',
              'value' => 'kontributorPangan.nama_lengkap',
            ],
            'tanggal',
            'bahan_pangan',
            [
              'label' => 'Stok Rata-Rata',
              'attribute' => 'stok_rata2',
              'value' => 'stok',
            ],
            //'satuan_stok',
            [
              'label' => 'Harga Rata-Rata',
              'attribute' => 'harga_rata2',
              'value' => 'harga',
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php
    // You only need add this,
    $this->registerJs('
        var gridview_id = ""; // specific gridview
        var columns = [2]; // index column that will grouping, start 1

        /*
        DON\'T EDIT HERE

http://www.hafidmukhlasin.com

        */
        var column_data = [];
            column_start = [];
            rowspan = [];

        for (var i = 0; i < columns.length; i++) {
            column = columns[i];
            column_data[column] = "";
            column_start[column] = null;
            rowspan[column] = 1;
        }

        var row = 1;
        $(gridview_id+" table > tbody  > tr").each(function() {
            var col = 1;
            $(this).find("td").each(function(){
                for (var i = 0; i < columns.length; i++) {
                    if(col==columns[i]){
                        if(column_data[columns[i]] == $(this).html()){
                            $(this).remove();
                            rowspan[columns[i]]++;
                            $(column_start[columns[i]]).attr("rowspan",rowspan[columns[i]]);
                        }
                        else{
                            column_data[columns[i]] = $(this).html();
                            rowspan[columns[i]] = 1;
                            column_start[columns[i]] = $(this);
                        }
                    }
                }
                col++;
            })
            row++;
        });
    ');
    ?>
</div>
