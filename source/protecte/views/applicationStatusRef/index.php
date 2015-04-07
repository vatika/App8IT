<?php
/* @var $this ApplicationStatusRefController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Application Status Refs',
);

$this->menu=array(
	array('label'=>'Create ApplicationStatusRef', 'url'=>array('create')),
	array('label'=>'Manage ApplicationStatusRef', 'url'=>array('admin')),
);
?>

<h1>Application Status Refs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
