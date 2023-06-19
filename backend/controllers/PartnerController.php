<?php

namespace backend\controllers;

use common\models\Partners;
use yii\web\Controller;

class PartnerController extends Controller
{
    public function actionViewPartner()
    {
        $models = Partners::find()->all();
    
        return $this->render('view-partner', [
            'models' => $models,
        ]);
    }
    
    

    public function actionAddPartner()
    {
        $model = new Partners();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view-partner', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('add-partner', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view-partner', 'id' => $model->id]);
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
        if (($model = Partners::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
