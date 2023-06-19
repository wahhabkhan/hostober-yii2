<?php

namespace backend\controllers;

use common\models\Multiplier;
use yii\web\Controller;

class MultiplierController extends Controller
{
    public function actionViewMultiplier()
    {
        $models = Multiplier::find()->all();
    
        return $this->render('view-multiplier', [
            'models' => $models,
        ]);
    }
    
    

    public function actionAddMultiplier()
    {
        $model = new Multiplier();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view-multiplier', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('add-multiplier', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view-multiplier', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/site/index']);
    }

    protected function findModel($id)
    {
        if (($model = Multiplier::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
