<?php
/* @var $this ApplicationsController */
/* @var $model Applications */

$this->breadcrumbs=array(
	'Applications'=>array('admin'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'Add new Version', 'url'=>array('updateApp'),'visible'=>Yii::app()->user->checkAccess('createApp')),
	array('label'=>'Create Applications', 'url'=>array('create') ,'visible'=>Yii::app()->user->checkAccess('createApp') ),
	array('label'=>'Pending Applications', 'url'=>array('pendingdev') ,'visible'=>Yii::app()->user->checkAccess('Create') ),


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


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
/*	$versions = Versions::model()->findAllByAttributes(array('application_id'=>$model->id));
	$count = count($versions);
	if( $count){
		echo $count;
		if ( $versions[$count-1]->status == 1)
				$var = 0;
	
		else $var = 1;
	}
	else $var = 0;
*/	$active='active';
	$inactive = 'inactive'; 
	$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'applications-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(

		array(
			'name'=>'logo',
			'header'=>'Logo',
			'type'=>'raw',

			'value' =>'CHtml::image(Yii::app()->baseUrl ."/images/" .$data->logo,"",array("width"=>"50px", "height"=>"50px"))',
		     ), 
			
		'name',
		'description',
		//'status',
		 array(
                        'name'=>'status',
                        'header'=>'App Status',
			'value' => '($data->status=="1" ? "Activated":"Deactivated")',//CHtml::image(Yii::app()->baseUrl ."/images/active.png" ): CHtml::image(Yii::app()->baseUrl ."/images/inactive.jpg"),
                //        'filter'=>CHtml::activeTextField($model,'versions_search'),
 			'filter'=> array('0' => 'Deactivated', '1' => 'Activated'),
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
			'class'=>'CButtonColumn',

			'template'=>'{view}{update}{delete}{history}',
			'buttons'=>array(
				'history' => array (
                                        'label'=>'View History',
                                        'url' =>'Yii::app()->createUrl("/versions/viewall",array("id"=>$data->id))',
                                        'imageUrl'=>Yii::app()->baseUrl.'/images/history.gif',
                                ),

				'update'=>array(
					'label'=>'Add new version',
					'url'=>'Yii::app()->createUrl("/applications/updateApp", array("id"=>$data->id))',
							'visible'=>"Yii::app()->user->checkAccess('createApp')",
					),
				'delete' => array(
					'label'=>'Delete',
					'url'=>'Yii::app()->createUrl("/applications/view", array("id"=>$data->id)',
						'visible'=>"Yii::app()->user->checkAccess('Create')",
						),
					),


				//		'updateButtonUrl'=>'Yii::app()->createUrl("/applications/updateApp", array("id" => $data->id))',
				),

		     ),
		)); ?>
