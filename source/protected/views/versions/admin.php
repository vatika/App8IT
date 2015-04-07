<?php
/* @var $this VersionsController */
/* @var $model Versions */

$this->breadcrumbs=array(
	'Versions'=>array('index'),
	'Manage',
);

$this->menu=array(

);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#versions-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Versions</h1>


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(

	'id'=>'versions-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(

		'appName',
				array(
                        'name'=>'appStatus',
                        'header'=>'App Status',
                        'filter'=> array('0' => 'Deactivated', '1' => 'Activated'),
                
                        'value' => '($data->appStatus=="1" ? "Activated" : "Deactivated")',
                     ),
		'version',
array(
                        'name'=>'versionStatus',
                        'header'=>'Version Status',
                        'value' => '$data->versionStatus',
                        /*$status= Application_status_ref::model()->findAll(); $temp = Categories::model()->findAll();
                        $stack = array();
                        foreach ($status as $key) {
                            $stack=array_push($stack, "$key[status]" => "$key[status]");
                        }
                        'filter'=> $stack,
*/
                        'filter'=> array('Admin Approved'=>'Admin Approved','Analyst approved'=>'Analyst Approved','Analyst rejected'=>'Analyst Rejected','Admin Rejected'=>'Admin Rejected','Waiting for review'=>'Waiting for review'),//'Removed'=>'Removed'),
                
                       // 'value' => '($data->application->status=="1" ? "Activated" : "Deactivated")',
                    //    'filter'=>CHtml::activeTextField($model,'versions_search'),
                     ),
	'reviewerName',
		'reviewerEmail',
	  			array(
                        'name'=>'comment',
                        'header'=>'Reviewer Comment',
                    //    'filter'=>CHtml::activeTextField($model,'versions_search'),
                     ),
		
			'create_date',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
                        'buttons'=>array(
                                'update'=>array(
                                        'label'=>'Update details',
                                        'url'=>'Yii::app()->createUrl("/applications/updateApp", array("id"=>$data->id))',
                                                        'visible'=>"Yii::app()->user->checkAccess('createApp')",
                                        ),
                                        ),


                                //              'updateButtonUrl'=>'Yii::app()->createUrl("/applications/updateApp", array("id" => $data->id))',
                                



		),
	),
)); ?>
<?php //$this->renderPartial('_form', array('model'=>$model)); ?>
