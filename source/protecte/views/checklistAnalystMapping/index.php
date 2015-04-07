<?php
/* @var $this ChecklistAnalystMappingController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Checklist Analyst Mappings',
);

$this->menu=array(
	array('label'=>'Create ChecklistAnalystMapping', 'url'=>array('create')),
	array('label'=>'Manage ChecklistAnalystMapping', 'url'=>array('admin')),
);
?>

<h1>Checklist Analyst Mappings</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
