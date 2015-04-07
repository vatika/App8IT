<?php
/* @var $this VersionsController */
/* @var $model Versions */

$this->breadcrumbs=array(
	'Versions'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Versions', 'url'=>array('index')),
	array('label'=>'Create Versions', 'url'=>array('../applications/create')),
//	array('label'=>'Update Versions', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Versions', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Versions', 'url'=>array('admin')),
);
?>

<h1>View Versions #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'application_id',
		'file_name',
		'version',
		'create_date',
		'status_id',
		'reviewer_id',
		'activity',
		'comment',
	),
)); ?>
