<?php
/* @var $this ApplicationsController */
/* @var $model Applications */

$this->breadcrumbs=array(
		'Applications'=>array('admin'),
		$model->name,
		);

$this->menu=array(
		array('label'=>'Create Applications', 'url'=>array('create'), 'visible'=>Yii::app()->user->checkAccess('createApp')),
		array('label'=>'Update Applications', 'url'=>array('updateApp', 'id'=>$model->id), 'visible'=>Yii::app()->user->checkAccess('createApp')),
		array('label'=>'Manage Applications', 'url'=>array('admin')),
		);
?>

<div style="float:right"> 
<?php 
	$temp = Users::model()->findbyPk(Yii::app()->user->id);
	if( $model->status == 1  )
	{
		$image = CHtml::image(Yii::app()->request->baseUrl.'/images/active.png');
	}
	else
	{
		$image = CHtml::image(Yii::app()->request->baseUrl.'/images/inactive.jpg');
	}
	if ( $temp->role_id == 1)
		echo CHtml::link($image, array('/applications/updateApp','id'=>$model->id));
	else
		echo $image;

?>

</div>
<h1>
<?php echo CHtml::image(Yii::app()->request->baseUrl.'/images/'.$model->logo,
							"this is alt tag of image",
							array("width"=>"50px" ,"height"=>"50px"));

echo "   ".$model->name;				 ?>


<style>
 .button1 {
  background:url('echo Yii::app()->request->baseUrl."/images/activejpg"; ');
  }

</style>


</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
//				'name',
				'description',
//				'logo',
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
//				array(
//						'name'=>'logo',
//						'header'=>'Logo',
//						'type'=>'raw',
//
///						'value'=>CHtml::image(Yii::app()->request->baseUrl.'/images/'.$model->logo,
///							"this is alt tag of image",
//							array("width"=>"50px" ,"height"=>"50px")),
//				     ),

				'ndownloads',
				'disabled_comments',
				//		array('name'=>'Checklist', 'header'=>'Checklist',
		//			 'value'=>  $b),



			),
	)); ?>

	
	<br>
<h4> <?php $current_user = Users::model()->findbyPk(Yii::app()->user->id); 
	if( $current_user->role_id == 3 )
		
		echo "Checklists : ";?></h4>


<?php  $checklists =  ChecklistCategoryMap::model()->findAllByAttributes(array('category_id'=>$model->category_id));

?>

<?php //echo $b;

?>

<?php $config = array();
$dataProvider = new CActiveDataProvider('MediaFiles', array('data' => $model->mediaFiles));
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
          array(
                        'name'=>'filename',
                        'header'=>'Image',
                        'type'=>'raw',
                         'value' => 'CHtml::image(Yii::app()->baseUrl ."/data/".$data->application->name."/MediaFiles/" .$data->filename,"",array("width"=>"50px", "height"=>"50px"))',
                  
                     ),
            'type',
       /*     array(
            'class'=>'CButtonColumn',
                'template'=>'',
        
             'viewButtonUrl'=>'Yii::app()->createUrl("/mediaFiles/view", array("id"=>$data["id"]))'
       //     , 'updateButtonUrl'=>'Yii::app()->createUrl("/mediaFiles/update", array("id"=>$data["id"]))'
      //      , 'deleteButtonUrl'=>'Yii::app()->createUrl("/mediaFiles/delete", array("id"=>$data["id"]))'
            )*/
    )
)); ?>





<?php
	$temp = Users::model()->findbyPk(Yii::app()->user->id);
	$versions = Versions::model()->findAllByAttributes(array('application_id'=>$model->id));
	$flag = 0;
	foreach($versions as $version ):
		if($version->status_id == 2 || $version->status_id == 4){
			$flag = 1;

			break;
		}
	endforeach;
        if ( $temp->role_id == 1 && $flag ){
	echo CHtml::beginForm(Yii::app()->createUrl('applications/view&id='.$model->id),'post');
?>
        <div class="row buttons" style="float:right">
               <?php if( $model->status == 0) echo CHtml::submitButton('Activate',array('name'=>'button1','class' => 'button1')); ?>
               <?php if( $model->status == 1) echo CHtml::submitButton('Deactivate', array('name'=>'button2')); ?>

        </div>
<?php   
	echo CHtml::endForm(); 
	}
?>



