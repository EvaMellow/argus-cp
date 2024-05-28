<?php

use app\models\Act;
use yii\helpers\Html;
use yii\widgets\MaskedInput;
use kartik\color\ColorInput;
use kartik\widgets\ActiveForm;

ColorInput::widget(['name' => 'color', 'id' => 'color-field']);


$this->title = 'Добавить Дашборд';
$this->params['breadcrumbs'][] = ['label' => 'Dashboards', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<div class="dboard-update">
<?= $this->render('_form', [
        'dboard' => $dboard,
        'act' => $act
    ]) ?>
</div>
