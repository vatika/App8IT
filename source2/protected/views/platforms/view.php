<?php
/* @var $this PlatformsController */
/* @var $model Platforms */

$this->breadcrumbs=array(
	'Platforms'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Platforms', 'url'=>array('index')),
	array('label'=>'Create Platforms', 'url'=>array('create')),
	array('label'=>'Update Platforms', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Platforms', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Platforms', 'url'=>array('admin')),
);
?>

<h1>View Platforms #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
