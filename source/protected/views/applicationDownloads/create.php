<?php
/* @var $this ApplicationDownloadsController */
/* @var $model ApplicationDownloads */

$this->breadcrumbs=array(
	'Application Downloads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ApplicationDownloads', 'url'=>array('index')),
	array('label'=>'Manage ApplicationDownloads', 'url'=>array('admin')),
);
?>

<h1>Create ApplicationDownloads</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>