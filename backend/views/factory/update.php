<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Factory $model */

$this->title = 'Update Factory: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Factory', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="factory-update">

    <h4 style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    <hr>
    <?= $this->render('add-factory', [
        'model' => $model,
    ]) ?>

</div>
