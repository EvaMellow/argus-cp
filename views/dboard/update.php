<?php

use app\models\Act;
use yii\helpers\Html;
use yii\widgets\MaskedInput;
use kartik\color\ColorInput;
use kartik\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Dboard $model */

$this->title = 'Редактирование: ' . $dboard->name;
?>
<div class="dboard-update">


    <?= $this->render('_form', [
        'dboard' => $dboard,
        'act' => $act
    ]) ?>

</div>
