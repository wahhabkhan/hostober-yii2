<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Brand $model */

$this->title = 'Update Brand: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Brands', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="brand-update">

    <h4 style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    <hr>
    <?= $this->render('add-brand', [
        'model' => $model,
    ]) ?>

</div>
