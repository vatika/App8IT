<?php
/* @var $this PlatformsController */
/* @var $model Platforms */

$this->breadcrumbs=array(
	'Platforms'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Platforms', 'url'=>array('index')),
	array('label'=>'Manage Platforms', 'url'=>array('admin')),
);
?>

<h1>Create Platforms</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>