<?php
/* @var $this ChecklistCategoryMapController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Checklist Category Maps',
);

$this->menu=array(
	array('label'=>'Create ChecklistCategoryMap', 'url'=>array('create')),
	array('label'=>'Manage ChecklistCategoryMap', 'url'=>array('admin')),
);
?>

<h1>Checklist Category Maps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
