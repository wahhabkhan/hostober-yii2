<?php

namespace backend\controllers;

use common\models\Factory;
use yii\web\Controller;

class FactoryController extends Controller
{
    public function actionViewFactory()
    {
        $models = Factory::find()->all();
    
        return $this->render('view-factory', [
            'models' => $models,
        ]);
    }
    
    

    public function actionAddFactory()
    {
        $model = new Factory();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view-factory', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('add-factory', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view-factory', 'id' => $model->id]);
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
        if (($model = Factory::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
