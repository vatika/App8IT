<?php
/* @var $this ApplicationsController */
/* @var $model Applications */

$this->breadcrumbs=array(
	'Applications'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'Upload Applications', 'url'=>array('create')),
	array('label'=>'Manage Applications', 'url'=>array('admin')),
);
?>

<h1>Update Application</h1>

<?php $this->renderPartial('_updateForm', array('id'=>$id,'model'=>$model,'entry'=>$entry)); ?>
