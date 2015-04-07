<?php
/* @var $this ChecklistAnalystMappingController */
/* @var $model ChecklistAnalystMapping */

$this->breadcrumbs=array(
	'Checklist Analyst Mappings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ChecklistAnalystMapping', 'url'=>array('index')),
	array('label'=>'Create ChecklistAnalystMapping', 'url'=>array('create')),
	array('label'=>'Update ChecklistAnalystMapping', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ChecklistAnalystMapping', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ChecklistAnalystMapping', 'url'=>array('admin')),
);
?>

<h1>View ChecklistAnalystMapping #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'analyst_id',
		'checklist_id',
		'version_id',
		'create_date',
	),
)); ?>
