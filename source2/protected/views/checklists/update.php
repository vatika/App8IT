<?php
/* @var $this ChecklistsController */
/* @var $model Checklists */

$this->breadcrumbs=array(
	'Checklists'=>array('index'),
	$model->title=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Checklists', 'url'=>array('index')),
	array('label'=>'Create Checklists', 'url'=>array('create')),
	array('label'=>'View Checklists', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Checklists', 'url'=>array('admin')),
);
?>

<h1>Update Checklists <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
