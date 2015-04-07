<?php
/* @var $this CategoryReviewerMappingController */
/* @var $model CategoryReviewerMapping */

$this->breadcrumbs=array(
	'Category Reviewer Mappings'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CategoryReviewerMapping', 'url'=>array('index')),
	array('label'=>'Create CategoryReviewerMapping', 'url'=>array('create')),
	array('label'=>'Update CategoryReviewerMapping', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CategoryReviewerMapping', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CategoryReviewerMapping', 'url'=>array('admin')),
);
?>

<h1>View CategoryReviewerMapping #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_id',
		'user_id',
	),
)); ?>
