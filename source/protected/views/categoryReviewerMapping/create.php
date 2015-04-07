<?php
/* @var $this CategoryReviewerMappingController */
/* @var $model CategoryReviewerMapping */

$this->breadcrumbs=array(
	'Category Reviewer Mappings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CategoryReviewerMapping', 'url'=>array('index')),
	array('label'=>'Manage CategoryReviewerMapping', 'url'=>array('admin')),
);
?>

<h1>Create CategoryReviewerMapping</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>
