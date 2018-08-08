<?php

use yii\widgets\LinkPager;
use yii\helpers\Html;

foreach ($models as $model) {
  echo '<div class="row">';
  echo '<div class="col-sm-6" style="padding-bottom: 8px;">';
  echo $model->address;
  echo '</div>';
  echo '<div class="col-sm-6" style="padding-bottom: 8px;">';
  echo Html::a('Edit', ['/place/update', 'id' => $model->id], ['class'=>'btn btn-primary']);
  echo Html::a('Remove', ['/place/delete', 'id' => $model->id,
      'page' => Yii::$app->request->getQueryParam('page', null)], ['class'=>'btn btn-warning']);
  echo '</div>';
  echo '</div>';
}

echo LinkPager::widget([
  'pagination' => $pages,
]);

