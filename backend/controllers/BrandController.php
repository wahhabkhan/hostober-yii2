<?php

namespace backend\controllers;

use common\models\Brand;
use yii\web\Controller;

class BrandController extends Controller
{
    public function actionViewBrand()
    {
        $models = Brand::find()->all();
    
        return $this->render('view-brand', [
            'models' => $models,
        ]);
    }
    
    

    public function actionAddBrand()
    {
        $model = new Brand();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view-brand', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('add-brand', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view-brand', 'id' => $model->id]);
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
        if (($model = Brand::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
