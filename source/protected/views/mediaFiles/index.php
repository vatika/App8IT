<?php
/* @var $this MediaFilesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Media Files',
);

$this->menu=array(
//	array('label'=>'Create MediaFiles', 'url'=>array('create')),
//	array('label'=>'Manage MediaFiles', 'url'=>array('admin')),
);
?>

<h1>Media Files</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
