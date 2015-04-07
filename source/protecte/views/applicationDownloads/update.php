<?php
/* @var $this ApplicationDownloadsController */
/* @var $model ApplicationDownloads */

$this->breadcrumbs=array(
	'Application Downloads'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ApplicationDownloads', 'url'=>array('index')),
	array('label'=>'Create ApplicationDownloads', 'url'=>array('create')),
	array('label'=>'View ApplicationDownloads', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ApplicationDownloads', 'url'=>array('admin')),
);
?>

<h1>Update ApplicationDownloads <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>