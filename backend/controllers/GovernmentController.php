<?php

namespace backend\controllers;

use common\models\Government;
use yii\web\Controller;

class GovernmentController extends Controller
{
    public function actionViewGovernment()
    {
        $models = Government::find()->all();
    
        return $this->render('view-government', [
            'models' => $models,
        ]);
    }
    
    

    public function actionAddGovernment()
    {
        $model = new Government();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view-government', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('add-government', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view-government', 'id' => $model->id]);
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
        if (($model = Government::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
