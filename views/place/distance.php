<?php
/**
 * Created by PhpStorm.
 * User: Anonimous
 * Date: 08.08.2018
 * Time: 16:39
 */
use yii\web\View;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Distance';

$form = ActiveForm::begin();

echo $form->field($model, 'areaNames')
    ->dropDownList($model, [
        'prompt' => '-',
        'options' => [
            $result => ['Selected' => true ],
        ],
    ]);

echo Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'submit_button']);

ActiveForm::end();

?>

<table>
    <?php if (!$isSelectedArea): ?>
        <tr>
            <th width="300">Area</th>
            <th width="200">Latitude</th>
            <th width="200">Longitude</th>
        </tr>
        <?php foreach ($areas as $key => $value): ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $value['lat'] ?></td>
                <td><?= $value['long'] ?></td>
            </tr>
        <?php endforeach; ?>

    <?php else: ?>
        <tr>
            <th width="300">Area</th>
            <th width="200">Distance</th>
        </tr>
        <?php foreach ($areas as $key => $value): ?>
            <tr>
                <td><?= $key ?></td>
                <td><?= $value['dist'] ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
</table>