<?php
/* @var $this RatingsController */
/* @var $model Ratings */

$this->breadcrumbs=array(
	'Ratings'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Ratings', 'url'=>array('index')),
	array('label'=>'Manage Ratings', 'url'=>array('admin')),
);
?>

<h1>Create Ratings</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>