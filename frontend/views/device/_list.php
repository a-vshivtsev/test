<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
?>

<div class="_list">

    <?= Html::a($model->serial,'index.php?DeviceSearch[serial]='.$model->serial.'&r=device/index',['target'=>'_blank']) ?>

</div>
