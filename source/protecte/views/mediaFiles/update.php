<?php
/* @var $this MediaFilesController */
/* @var $model MediaFiles */

$this->breadcrumbs=array(
	'Media Files'=>array('index'),
	$media->id=>array('view','id'=>$media->id),
	'Update',
);

$this->menu=array(
//	array('label'=>'List MediaFiles', 'url'=>array('index')),
//	array('label'=>'Create MediaFiles', 'url'=>array('create')),
//	array('label'=>'View MediaFiles', 'url'=>array('view', 'id'=>$model->id)),
//	array('label'=>'Manage MediaFiles', 'url'=>array('admin')),
);
?>

<h1>Update MediaFiles <?php echo $media->id; ?></h1>

<?php $this->renderPartial('_form', array('media'=>$media)); ?>