<?php
/* @var $this ApplicationsController */
/* @var $model Applications */

$this->breadcrumbs=array(
	'Applications'=>array('admin'),
	'Create',
);

$this->menu=array(
	array('label'=>'Manage Applications', 'url'=>array('admin')),
	array('label'=>'Update Application', 'url'=>array('updateApp')),
);
?>

<h1>Upload Application</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'entry'=>$entry,'media'=>$media)); ?>
