<?php
/* @var $this PlatformsController */
/* @var $model Platforms */

$this->breadcrumbs=array(
	'Platforms'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Platforms', 'url'=>array('index')),
	array('label'=>'Create Platforms', 'url'=>array('create')),
	array('label'=>'View Platforms', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Platforms', 'url'=>array('admin')),
);
?>

<h1>Update Platforms <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>