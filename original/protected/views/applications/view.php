<?php
/* @var $this ApplicationsController */
/* @var $model Applications */

$this->breadcrumbs=array(
		'Applications'=>array('admin'),
		$model->name,
		);

$this->menu=array(
		array('label'=>'Create Applications', 'url'=>array('create')),
		array('label'=>'Update Applications', 'url'=>array('updateApp', 'id'=>$model->id)),
		array('label'=>'Manage Applications', 'url'=>array('admin')),
		);
?>

<h1>View Application : <?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
				'name',
				'description',
				'logo',
				array(
					'name'=>'category.title',
					'header'=> 'Category',
					'filter'=>CHtml::activeTextField($model,'category_search'),
				     ),
				array(
					'name'=>'status',
					'header'=>'Status',
					'value' => ($model->status==1  ? "Activated" : "Deactivated"),
				     ),
				array(
					'name'=>'platform.name',
					'header'=>'Platform',
					'filter'=>CHtml::activeTextField($model,'platform_search'),
				     ),
				array(
					'name'=>'device.type',
					'header'=>'Device type',
					'filter'=>CHtml::activeTextField($model,'device_search'),
				     ),
				array(
						'name'=>'logo',
						'header'=>'Logo',
						'type'=>'raw',
						//                      'value'=> CHtml::link($data->logo,array('applications/downloadLogo'),

						'value' => CHtml::link($model->logo,"http://". $_SERVER["SERVER_NAME"] ."/yii/new/images/".$model->logo),
						//                      'value' => 'CHtml::link($data->logo,"http://". $_SERVER["SERVER_NAME"] .Yii::app()->request->baseUrl . * . $data->logo)'
						),

				'ndownloads',
				'disabled_comments',




			),
	)); ?>
