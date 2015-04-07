<?php
/* @var $this CategoryReviewerMappingController */
/* @var $model CategoryReviewerMapping */

$this->breadcrumbs=array(
	'Category Reviewer Mappings'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CategoryReviewerMapping', 'url'=>array('index')),
	array('label'=>'Create CategoryReviewerMapping', 'url'=>array('create')),
	array('label'=>'View CategoryReviewerMapping', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CategoryReviewerMapping', 'url'=>array('admin')),
);
?>

<h1>Update CategoryReviewerMapping <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>