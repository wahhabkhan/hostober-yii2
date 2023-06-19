<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Academia $model */

$this->title = 'Update Academia: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Academia', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="academia-update">

    <h4 style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    <hr>
    <?= $this->render('add-academia', [
        'model' => $model,
    ]) ?>

</div>
