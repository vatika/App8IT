<?php
/* @var $this VersionsController */
/* @var $model Versions */

$this->breadcrumbs=array(
	'Versions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Versions', 'url'=>array('index')),
	array('label'=>'Create Versions', 'url'=>array('create')),
	array('label'=>'View Versions', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Versions', 'url'=>array('admin')),
);
?>

<h1>Update Versions <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>