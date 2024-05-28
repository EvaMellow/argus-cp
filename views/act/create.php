<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Act $model */

$this->title = 'Create Act';
$this->params['breadcrumbs'][] = ['label' => 'Acts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="act-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
