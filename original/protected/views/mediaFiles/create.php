<?php
/* @var $this MediaFilesController */
/* @var $model MediaFiles */

$this->breadcrumbs=array(
	'Media Files'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List MediaFiles', 'url'=>array('index')),
	array('label'=>'Manage MediaFiles', 'url'=>array('admin')),
);
?>

<h1>Create MediaFiles</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
