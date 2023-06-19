<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Partners $model */

$this->title = 'Update Partner: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Partners', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="partner-update">

    <h4 style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    <hr>
    <?= $this->render('add-partner', [
        'model' => $model,
    ]) ?>

</div>
