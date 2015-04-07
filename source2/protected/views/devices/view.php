<?php
/* @var $this DevicesController */
/* @var $model Devices */

$this->breadcrumbs=array(
	'Devices'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Devices', 'url'=>array('index')),
	array('label'=>'Create Devices', 'url'=>array('create')),
	array('label'=>'Update Devices', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Devices', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Devices', 'url'=>array('admin')),
);
?>

<h1>View Devices #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
	),
)); ?>
