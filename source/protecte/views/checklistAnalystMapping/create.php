<?php
/* @var $this ChecklistAnalystMappingController */
/* @var $model ChecklistAnalystMapping */

$this->breadcrumbs=array(
	'Checklist Analyst Mappings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ChecklistAnalystMapping', 'url'=>array('index')),
	array('label'=>'Manage ChecklistAnalystMapping', 'url'=>array('admin')),
);
?>

<h1>Create ChecklistAnalystMapping</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>