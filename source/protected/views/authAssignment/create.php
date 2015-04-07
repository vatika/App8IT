<?php
/* @var $this AuthAssignmentController */
/* @var $model AuthAssignment */

$this->breadcrumbs=array(
	'Auth Assignments'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List AuthAssignment', 'url'=>array('index')),
	array('label'=>'Manage AuthAssignment', 'url'=>array('admin')),
);
?>

<h1>Create AuthAssignment</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>