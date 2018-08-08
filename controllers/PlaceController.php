<?php

namespace app\controllers;

use app\models\Areas;
use Yii;
use yii\web\Controller;
use app\models\Place;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;

class PlaceController extends Controller 
{

  public function actionIndex() {
    $model = Place::find();
    $count = clone $model;
    $pages = new Pagination(['totalCount' => $count->count()]);
    $models = $model->offset($pages->offset)
      ->limit($pages->limit)
      ->all();
    return $this->render('index',[
      'models' => $models,
      'pages' => $pages,
    ]);
  }

  public function actionCreate() {
    $model = new Place();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['index']);
    }

    return $this->render('create', ['model' => $model]);
  }


  public function actionUpdate($id) {
    $model = Place::findOne($id);

    if ($model === null) {
      throw new NotFoundHttpException('The requested page does not exist.');
    }

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
      return $this->redirect(['update', 'id' => $id]);
    }

    return $this->render('update', ['model' => $model]);
  }


  public function actionDelete($id, $page = null) {
    $model = Place::findOne($id);
    if ($model !== null) {
      $model->delete();
      $this->redirect(['index', 'page' => $page]);
    } else {
      throw new NotFoundHttpException('The requested page does not exist.');
    }
  }


  public function actionDistance() {
      $request = Yii::$app->request;
      $result = $request->post('Areas')['areaNames'];

      $model = new Areas();

      if ($result == '') {
          $isSelectedArea = false;
          $areas = $model->getAreasSortedByName();
      } else {
          $isSelectedArea = true;
          $areas = $model->getAreasSortedByDistance($result);
      }
      return $this->render('distance', compact('model', 'result', 'areas', 'isSelectedArea'));
  }

}