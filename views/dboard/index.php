<?php

use app\models\Dboard;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\DboardSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Дашборды';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dboard-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

  <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'showHeader' => false,
    'columns' => [
        'name:ntext',
        [
            'attribute' => 'act.cmd',
            'value' => function ($data) {
                return $data->act->cmd;
            },
        ],
       [
                'class' => ActionColumn::className(),
                'template' => '{update} {delete}',
                'urlCreator' => function ($action, Dboard $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
        'tableOptions' => ['class' => 'table table-striped table-bordered']
    ]); 
?>


    <?php Pjax::end(); ?>

</div>
