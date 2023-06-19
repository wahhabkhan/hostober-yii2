<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Association $model */

$this->title = 'Update Association: ' . $model->id;
//$this->params['breadcrumbs'][] = ['label' => 'Association', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="association-update">

    <h4 style="margin-left: 240px;"><?= Html::encode($this->title) ?></h4>
    <hr>
    <?= $this->render('add-association', [
        'model' => $model,
    ]) ?>

</div>
