<?php
/* @var $this ChecklistsController */
/* @var $model Checklists */

$this->breadcrumbs=array(
	'Checklists'=>array('admin'),
	'Create',
);

$this->menu=array(
//	array('label'=>'List Checklists', 'url'=>array('index')),
	array('label'=>'Manage Checklists', 'url'=>array('admin')),
);
?>

<h1>Create Checklists</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'entry'=>$entry)); ?>
