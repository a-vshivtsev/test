<?php

use common\models\Store;
use yii\bootstrap4\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;

//use yii\grid\GridView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\StoreSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Stores';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="store-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Store', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php
    Modal::begin([
    ]);
    Modal::end();
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'name', 'value' => function ($model) {
                return Html::a(Yii::t('app', ' {modelClass}', [
                    'modelClass' => $model->name,]),
                    ['store/viewall', 'id' => $model->id], ['class' => 'link', 'id' => 'popupModal']);
            },
                'format' => 'raw',
            ],
            //'name',
            //created_at,
            ['attribute' => 'created_at', 'format' => ['datetime', 'php:d-M-Y']],

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Store $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
        'responsive' => true,
        'hover' => true,
        'resizableColumns' => true,
    ]) ?>


</div>
<?php
$this->registerJs("$(function() {
$('#popupModal').click(function(e) {
e.preventDefault();
$('#modal').modal('show').find('.modal-content')
.load($(this).attr('href'));
});
});");
?>
