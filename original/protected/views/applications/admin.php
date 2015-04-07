<?php
/* @var $this ApplicationsController */
/* @var $model Applications */

$this->breadcrumbs=array(
	'Applications'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Update Applications', 'url'=>array('updateApp'),'visible'=>Yii::app()->user->checkAccess('createApp')),
	array('label'=>'Create Applications', 'url'=>array('create') ,'visible'=>Yii::app()->user->checkAccess('createApp') ),
	array('label'=>'Pending App (Developer)', 'url'=>array('pendingdev') ,'visible'=>Yii::app()->user->checkAccess('Create') ),
	array('label'=>'Pending App (Reviewer)', 'url'=>array('create') ,'visible'=>Yii::app()->user->checkAccess('Create') ),


);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#applications-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Applications</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
	$active='active';
	$inactive = 'inactive'; 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'applications-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		
		'name',
		'description',
		//'status',
		 array(
                        'name'=>'status',
                        'header'=>'Status',
			'value' => '($data->status==1 ? "Activated" : "Deactivated")',
                //        'filter'=>CHtml::activeTextField($model,'versions_search'),
                     ),


		array(
			'name'=>'device.type',
			'header'=>'Device type',
			'filter'=>CHtml::activeTextField($model,'device_search'),
		     ),	
/*		array(
			'name'=>'versions.version',
			'header'=>'Version',
			'filter'=>CHtml::activeTextField($model,'versions_search'),
		     ),
*/
		/*'ndownloads',
		  'disabled_comments',
		 */
		array(
			'name'=>'category.title',
			'header'=> 'Category',
			'filter'=>CHtml::activeTextField($model,'category_search'),
		     ),
		array(
				'name'=>'platform.name',
				'header'=>'Platform',
				'filter'=>CHtml::activeTextField($model,'platform_search'),
		     ),
		array(
			'name'=>'logo',
			'header'=>'Logo',
			'type'=>'raw',
//			'value'=> 'CHtml::link($data->logo,array('applications/downloadLogo')',

			'value' => 'CHtml::link($data->logo,"http://". $_SERVER["SERVER_NAME"] ."/yii/new/images/".$data->logo)',
//			'value' => 'CHtml::link($data->logo,"http://". $_SERVER["SERVER_NAME"] .Yii::app()->request->baseUrl . * . $data->logo)'
			'htmlOptions'=>array('width'=>'40'),
		     ), 
		array(
			'class'=>'CButtonColumn',

			'template'=>'{view}{update}{delete}',
			'buttons'=>array(
				'update'=>array(
					'label'=>'Update details',
					'url'=>'Yii::app()->createUrl("/applications/updateApp", array("id"=>$data->id))',
							'visible'=>"Yii::app()->user->checkAccess('createApp')",
					),
				'delete' => array(
					'label'=>'Delete',
					'url'=>'Yii::app()->createUrl("/applications/delete", array("id"=>$data->id)',
						'visible'=>"Yii::app()->user->checkAccess('Create')",
						),
					),


				//		'updateButtonUrl'=>'Yii::app()->createUrl("/applications/updateApp", array("id" => $data->id))',
				),

		     ),
		)); ?>
