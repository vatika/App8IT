<?php
/* @var $this ChecklistCategoryMapController */
/* @var $model ChecklistCategoryMap */

$this->breadcrumbs=array(
	'Checklist Category Maps'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ChecklistCategoryMap', 'url'=>array('index')),
	array('label'=>'Create ChecklistCategoryMap', 'url'=>array('create')),
	array('label'=>'Update ChecklistCategoryMap', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ChecklistCategoryMap', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ChecklistCategoryMap', 'url'=>array('admin')),
);
?>

<h1>View ChecklistCategoryMap #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'category_id',
		'checklist_id',
	),
)); ?>
