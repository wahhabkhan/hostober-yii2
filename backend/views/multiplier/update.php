<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Multiplier $model */

$this->title = 'Update Multiplier: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Multipliers', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="multiplier-update">

    <h4 style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    <hr>
    <?= $this->render('add-multiplier', [
        'model' => $model,
    ]) ?>

</div>
