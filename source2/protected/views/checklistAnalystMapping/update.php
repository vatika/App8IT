<?php
/* @var $this ChecklistAnalystMappingController */
/* @var $model ChecklistAnalystMapping */

$this->breadcrumbs=array(
	'Checklist Analyst Mappings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ChecklistAnalystMapping', 'url'=>array('index')),
	array('label'=>'Create ChecklistAnalystMapping', 'url'=>array('create')),
	array('label'=>'View ChecklistAnalystMapping', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ChecklistAnalystMapping', 'url'=>array('admin')),
);
?>

<h1>Update ChecklistAnalystMapping <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>