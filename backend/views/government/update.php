<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Government $model */

$this->title = 'Update Government: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Governments', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="government-update">

    <h4 style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    <hr>
    <?= $this->render('add-government', [
        'model' => $model,
    ]) ?>

</div>
