<?php

namespace backend\controllers;

use common\models\Academia;
use yii\web\Controller;

class AcademiaController extends Controller
{
    public function actionViewAcademia()
    {
        $models = Academia::find()->all();
    
        return $this->render('view-academia', [
            'models' => $models,
        ]);
    }
    
    

    public function actionAddAcademia()
    {
        $model = new Academia();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view-academia', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('add-academia', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view-academia', 'id' => $model->id]);
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
        if (($model = Academia::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
