<?php
/* @var $this ChecklistCategoryMapController */
/* @var $model ChecklistCategoryMap */

$this->breadcrumbs=array(
	'Checklist Category Maps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ChecklistCategoryMap', 'url'=>array('index')),
	array('label'=>'Manage ChecklistCategoryMap', 'url'=>array('admin')),
);
?>

<h1>Create ChecklistCategoryMap</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>