<?php

/* @var $this yii\web\View */
use app\models\Dboard;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
use deyraka\materialdashboard\widgets\CardStats;
use deyraka\materialdashboard\widgets\CardProduct;
use deyraka\materialdashboard\widgets\CardChart;
use deyraka\materialdashboard\widgets\Card;
use deyraka\materialdashboard\widgets\Progress;

$datas = Dboard::find()->joinWith('act')->all();

$this->title = 'Dashboard';
?>


<div class="site-index">
    <div class="body-content">
        <div class="row">
    <?php foreach ($datas as $key => $data): ?>
        <div class="col-md-4">
            <?php
                    Card::begin([
                        'id' => "card".$data->id,
                        'color' => $data->colour,
                        'headerIcon' => 'code',
                        'collapsable' => $data->act->type == "btn",
                        'title' => $data->name,
                        'titleTextType' => "black",
                        'showFooter' => false,
                    ])
                ?>
                <!-- START your <body> content of the Card below this line  -->
                <span class='col-md-6'><h4><pre><?php echo shell_exec($data->act->cmd); ?></pre></h4></span>
                <!-- END your <body> content of the Card above this line, right before "Card::end()"  -->                
                <?php Card::end(); ?>
        </div>
        <?php if (($key+1) % 3 == 0): ?>
            </div><div class="row">
        <?php endif; ?>
    <?php endforeach; ?>
</div>
<style>
    pre {
  background-color: #f4f4f4;
  border: 1px solid #ddd;
  padding: 10px;
  overflow-x: auto;
}
code {
  font-family: Consolas, Monaco, 'Andale Mono', monospace;
  font-size: 12px;
}
</style>

        
</div></div>
