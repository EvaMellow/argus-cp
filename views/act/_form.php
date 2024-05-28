<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Act $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="act-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cmd')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'dboard_id')->textInput() ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
