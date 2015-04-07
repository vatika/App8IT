<?php
/* @var $this ApplicationDownloadsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Application Downloads',
);

$this->menu=array(
	array('label'=>'Create ApplicationDownloads', 'url'=>array('create')),
	array('label'=>'Manage ApplicationDownloads', 'url'=>array('admin')),
);
?>

<h1>Application Downloads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
