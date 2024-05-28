<?php

use app\models\Act;
use yii\helpers\Html;
use yii\widgets\MaskedInput;
use kartik\color\ColorInput;
use kartik\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Dboard $model */
/** @var yii\widgets\ActiveForm $form */
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($dboard, 'name')->textInput(['maxlength' => true]) ?>

    <?= /*$form->field($dboard, 'refresh_time')->widget(\yii\widgets\MaskedInput::class, [
    'mask' => '99:99:99', // маска времени
    'options' => ['class' => 'form-control'],
])->label('Refresh time (hh:mm:ss)')  ?>

    <?=*/ $form->field($dboard, 'colour')->dropDownList(Act::getColourOptions()) ?>

    <?=/* //$form->field($dboard, 'position')->textInput(); ?>

    <?=*/ $form->field($act, 'cmd')->textInput(['maxlength' => true]) ?>

    <?= $form->field($act, 'type')->dropDownList(Act::getTypeOptions()) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
