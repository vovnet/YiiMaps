<?php 

$this->title = 'Create new place';

echo $this->render('_map', ['model' => $model]);
echo $this->render('_form', ['model' => $model]);