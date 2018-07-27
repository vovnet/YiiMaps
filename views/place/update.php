<?php

$this->title = 'Update '.$model->address;

echo $this->render('_map', ['model' => $model]);
echo $this->render('_form', ['model' => $model]);