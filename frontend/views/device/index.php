<?php

use common\models\Device;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use kartik\grid\GridView;
use kartik\select2\Select2;


/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DeviceSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Devices';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Device', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'serial',
            [
                'attribute' => 'store_id',
                'value' => function ($model) {
                    return $model->storeName;
                },
                'filter' => Select2::widget([
                    'model' => $searchModel,
                    'attribute' => 'store_id',
                    'data' => ArrayHelper::map(\common\models\Store::find()->asArray()->all(), 'id', 'name'),
                    'options' => [
                        'class' => 'form-control',
                        'placeholder' => 'Выберите значение'
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'selectOnClose' => true,
                    ]
                ])],


            ['attribute' => 'created_at', 'format' => ['datetime', 'php:d-M-Y']],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Device $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
        'responsive' => true,
        'hover' => true,
        'resizableColumns' => true,
    ]); ?>


</div>
