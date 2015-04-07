<?php
/* @var $this ApplicationsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Applications',
);

$this->menu=array(
	array('label'=>'Upload Applications', 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess('createApp')),
	array('label'=>'Manage Applications', 'url'=>array('admin')),
);
?>

<h1>Applications</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
