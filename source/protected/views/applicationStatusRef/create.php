<?php
/* @var $this ApplicationStatusRefController */
/* @var $model ApplicationStatusRef */

$this->breadcrumbs=array(
	'Application Status Refs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ApplicationStatusRef', 'url'=>array('index')),
	array('label'=>'Manage ApplicationStatusRef', 'url'=>array('admin')),
);
?>

<h1>Create ApplicationStatusRef</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>