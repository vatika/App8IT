<?php
/* @var $this ChecklistCategoryMapController */
/* @var $model ChecklistCategoryMap */

$this->breadcrumbs=array(
	'Checklist Category Maps'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ChecklistCategoryMap', 'url'=>array('index')),
	array('label'=>'Create ChecklistCategoryMap', 'url'=>array('create')),
	array('label'=>'View ChecklistCategoryMap', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ChecklistCategoryMap', 'url'=>array('admin')),
);
?>

<h1>Update ChecklistCategoryMap <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>