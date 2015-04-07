<?php
/* @var $this VersionsController */
/* @var $model Versions */

$this->breadcrumbs=array(
	'Versions'=>array('index'),
);
$app = Applications::model()->findbyPk($versions[0]->application_id);

$this->menu=array(
	array('label'=>'Add new Version', 'url'=>array('applications/updateApp'),'visible'=>Yii::app()->user->checkAccess('createApp') ),
	array('label'=>'View '.$app->name, 'url'=>array('applications/view&id='.$app->id) ),
	array('label'=>'Manage Versions', 'url'=>array('applications/admin')),
);
?>

<div style="float:right">
 <?php 

$app = Applications::model()->findbyPk($versions[0]->application_id);
if( $app->status == 1 )
{
echo CHtml::image(Yii::app()->request->baseUrl.'/images/active.png');
}

else
{
echo CHtml::image(Yii::app()->request->baseUrl.'/images/inactive.jpg');
}

?><br/>
</div>

<h2>

<?php
echo CHtml::image(Yii::app()->request->baseUrl.'/images/'.$app->logo,
                                                        "this is alt tag of image",
                                                        array("width"=>"50px" ,"height"=>"50px"));
echo "   ". $app->name;


 
?></h2>



<?php foreach( $versions as $version ): ?>

		<h1>Version : <?php echo $version->version ?></h1>


<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$version,
	'attributes'=>array(
		array(
			'name'=>'file_name',
			'header'=>'File',

			 'type'=>'raw',
		         'value'=>CHtml::link($version->file_name,Yii::app()->request->baseUrl."/code/".$version->file_name ),
//			'value' => ,//Yii::app()->getRequest()->sendFile( $version->file_name , file_get_contents( Yii::app()->request->baseUrl."/code/".$version->file_name ) ),

),

		'versionStatus',
		'create_date',
		'reviewerName',
//		'activity',
		'comment',
	),
)); ?>

<br/>
<br/>

<?php endforeach;?>
