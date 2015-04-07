<?php
/* @var $this CategoryReviewerMappingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Category Reviewer Mappings',
);

$this->menu=array(
	array('label'=>'Create CategoryReviewerMapping', 'url'=>array('create')),
	array('label'=>'Manage CategoryReviewerMapping', 'url'=>array('admin')),
);
?>

<h1>Category Reviewer Mappings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
