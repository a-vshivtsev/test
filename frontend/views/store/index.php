<?php

use common\models\Store;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
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

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'name',
                    'value' => function ($model) {
                        return $model->name;
                    },
                    'format' => 'raw'
                ],
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

    <!-- Modal window-->
    <div class="modal" tabindex="-1" role="dialog" id="modal-info">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal window end-->

<?php $this->registerJs("
$('.grid-view tbody tr').on('click',function(){
var data = $(this).data();
$('#modal-info').modal('show');
$('#modal-info').find('.modal-body').load('/index.php?r=device/list&id=' + data.key);
});
");
?>