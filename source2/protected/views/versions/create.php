<?php
/* @var $this VersionsController */
/* @var $model Versions */

$this->breadcrumbs=array(
	'Versions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Versions', 'url'=>array('index')),
	array('label'=>'Manage Versions', 'url'=>array('admin')),
);
?>

<h1>Create Versions</h1>

<?php $this->renderPartial('_form', array('entry'=>$entry)); ?>
