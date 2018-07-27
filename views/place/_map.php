<?php

use yii\helpers\Html;

$modelJson = json_encode($model->toArray());
$this->registerJs('var model = '.$modelJson, $this::POS_BEGIN);

$this->registerJsFile(Yii::$app->request->baseUrl.'/js/geolocation.js', 
  ['depends' => [app\assets\AppAsset::className()]]
);

$this->registerJsFile('https://maps.googleapis.com/maps/api/js?key=AIzaSyBulqy7yWI17Qzq-20XQjXXM2j8NzkZfyk&callback=initMap', [
  'position' => $this::POS_END, 
  'async'=>true, 
  'defer'=>true,
  'depends' => [app\assets\AppAsset::className()],
]);
?>

<div id="map"></div>

<?= Html::tag('input', '', ['type' => 'text', 'id' => 'inputArea']); ?>
<?= Html::tag('input', '', ['type' => 'button', 'value' => 'find', 'id' => 'findButton']); ?>