<?php

/* @var $this yii\web\View */

$this->title = 'Dot Admin';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Dot Admin</h1>

        <p class="lead">Administrator</p>

        <?php if (Yii::$app->user->identity->role_id == '1') { ?>
          <p><a class="btn btn-lg btn-success" href="site/index.php?r=gii">Gii Generator</a></p>
          <p><a class="btn btn-lg btn-success" href="index/php?r=kontributor-pangan">Data Kontributor Pangan</a></p>
          <p><a class="btn btn-lg btn-success" href="index/php?r=user">Data User</a></p>
          <p><a class="btn btn-lg btn-success" href="index/php?r=distribusi-pangan">Data Distribusi Pangan</a></p>
        <?php } ?>
    </div>

    </div>
</div>
