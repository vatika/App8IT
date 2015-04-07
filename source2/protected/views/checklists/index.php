<?php
/* @var $this ChecklistsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Checklists',
);

$this->menu=array(
	array('label'=>'Create Checklists', 'url'=>array('create')),
	array('label'=>'Manage Checklists', 'url'=>array('admin')),
);
?>

<h1>Checklists</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
