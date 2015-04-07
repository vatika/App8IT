<?php
/* @var $this MediaFilesController */
/* @var $model MediaFiles */

$this->breadcrumbs=array(
	'Media Files'=>array('index'),
	$model->id,
);

$this->menu=array(
//	array('label'=>'List MediaFiles', 'url'=>array('index')),
//	array('label'=>'Create MediaFiles', 'url'=>array('create')),
//	array('label'=>'Update MediaFiles', 'url'=>array('update', 'id'=>$model->id)),
//	array('label'=>'Delete MediaFiles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
//	array('label'=>'Manage MediaFiles', 'url'=>array('admin')),
);
?>

<h1>View MediaFiles #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,

	'attributes'=>array(
	//	'id',
	//	'application_id',
		 array(
                        'name'=>'application.name',
                        'header'=>'Application Name',
//                        'type'=>'raw',

  //                      'value' =>'CHtml::image(Yii::app()->baseUrl ."/images/".$data->application->logo,"",array("width"=>"50px", "height"=>"50px"))',
                     ),

	//	'appName',

		'type',
		'filename',
		'status',
		'create_date',
	),
)); ?>
