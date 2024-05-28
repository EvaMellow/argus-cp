<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Act $model */

$this->title = 'Update Act: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Acts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="act-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
