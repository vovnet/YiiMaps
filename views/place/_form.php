<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'address'); ?>
<?= $form->field($model, 'lat'); ?>
<?= $form->field($model, 'lng'); ?>
<?= Html::submitButton('Save', ['class' => 'btn btn-primary']); ?>

<?php ActiveForm::end(); ?>