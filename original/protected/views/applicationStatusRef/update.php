<?php
/* @var $this ApplicationStatusRefController */
/* @var $model ApplicationStatusRef */

$this->breadcrumbs=array(
	'Application Status Refs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ApplicationStatusRef', 'url'=>array('index')),
	array('label'=>'Create ApplicationStatusRef', 'url'=>array('create')),
	array('label'=>'View ApplicationStatusRef', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ApplicationStatusRef', 'url'=>array('admin')),
);
?>

<h1>Update ApplicationStatusRef <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>