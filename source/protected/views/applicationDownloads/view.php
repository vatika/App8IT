<?php
/* @var $this ApplicationDownloadsController */
/* @var $model ApplicationDownloads */

$this->breadcrumbs=array(
	'Application Downloads'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ApplicationDownloads', 'url'=>array('index')),
	array('label'=>'Create ApplicationDownloads', 'url'=>array('create')),
	array('label'=>'Update ApplicationDownloads', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ApplicationDownloads', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ApplicationDownloads', 'url'=>array('admin')),
);
?>

<h1>View ApplicationDownloads #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'application_id',
		'user_id',
		'version_id',
		'download_date',
	),
)); ?>
