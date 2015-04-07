<?php
/* @var $this VersionsController */
/* @var $model Versions */

$this->breadcrumbs=array(
	'Versions'=>array('index'),
);

$this->menu=array(
//	array('label'=>'Delete Version', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Versions', 'url'=>array('admin')),
        array('label'=>'Previous Versions', 'url'=>array('viewall', 'id'=>$model->application_id),'visible'=>Yii::app()->user->checkAccess('Create')),
        array('label'=>'Previous Versions', 'url'=>array('viewall', 'id'=>$model->application_id),'visible'=>Yii::app()->user->checkAccess('createApp')),
	 array('label'=>'View Application', 'url'=>array('/applications/view', 'id'=>$model->application_id),'visible'=>Yii::app()->user->checkAccess('createApp')),
		 array('label'=>'View Application', 'url'=>array('/applications/view', 'id'=>$model->application_id),'visible'=>Yii::app()->user->checkAccess('Create'))
	



);
?>

<?php 
	$app = Applications::model()->findbyPk($model->application_id);
?>

<h1>
<?php
echo CHtml::image(Yii::app()->request->baseUrl.'/images/'.$app->logo,
                                                        "this is alt tag of image",
                                                        array("width"=>"50px" ,"height"=>"50px"));
echo "   ". $app->name;

?>
</h1>
<h1>
 Version <?php echo $model->version ; ?></h1>

<?php if( $model->status_id == 1 ){ ?> 
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		 array(
                        'name'=>'file_name',
                        'header'=>'File',

                         'type'=>'raw',
                         'value'=>CHtml::link($model->file_name,Yii::app()->request->baseUrl."/code/".$model->file_name ),
		 ),
		'application.description',
		'create_date',
		'versionStatus',
		'reviewerName',
//		'activity',
//		'comment',
	),
)); ?>
<?php } else {  ?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		 array(
                        'name'=>'file_name',
                        'header'=>'File',

                         'type'=>'raw',
                         'value'=>CHtml::link($model->file_name,Yii::app()->request->baseUrl."/code/".$model->file_name ),
		 ),
		'application.description',
		'create_date',
		'versionStatus',
		'reviewerName',
		'activity',
		'comment',
	),
)); }?>

<?php $config = array();
$dataProvider = new CActiveDataProvider('MediaFiles', array('data' => $model->application->mediaFiles));
$this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider'=>$dataProvider,
    'columns'=>array(
          array(
                        'name'=>'filename',
                        'header'=>'Logo',
                        'type'=>'raw',
                        'value' => 'CHtml::image(Yii::app()->baseUrl ."/data/".$data->application->name."/MediaFiles/" .$data->filename,"",array("align"=>"middle","width"=>"50px", "height"=>"50px"))',
                  
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
    $user = Users::model()->findbyPk(Yii::app()->user->id);
        if (( $user->role_id == 1 || ( $user->role_id == 3 && $user->id == $model->reviewer_id )) && $model->status_id == 1 ){
		echo CHtml::beginForm(Yii::app()->createUrl('versions/view&id='.$model->id),'post');
?>

        <?php $form=$this->beginWidget('CActiveForm', array( 
        'id'=>'users-form', 
        // Please note: When you enable ajax validation, make sure the corresponding 
        // controller action is handling ajax validation correctly. 
        // There is a call to performAjaxValidation() commented in generated controller code. 
        // See class documentation of CActiveForm for details on this. 
        'enableAjaxValidation'=>false, 
)); ?> 

<ul>
	<?php   
		echo $form->labelEx($model,'Checklist');
?>


<?php 
//$var contains all those checklists of the category that are active
$var = array();
$list = ChecklistCategoryMap::model()->findAllByAttributes(array('category_id' => $app->category_id));
$count = 0;
foreach( $list as $l):
//	$cat = Categories::model()->findbyPk($l->category_id);
	$check = Checklists::model()->findbyPk($l->checklist_id);       
	if( $check->status==1 ){//&& $cat->status == 1 ){
		$var[$count++] = $l;
	} 
endforeach;

?>
<br>
<h4>Please go through the the checklists and accordingly review the app :</h4> <br>
<?php		echo $form->checkBoxList(
                        $model,'activity',
                          CHtml::listData(
				                $var,
                                'id',
                                'checklist.concatenated'
                        ),
                         array(
			                      'name'=>'checklist',
                            'separator'=>'<br>',
                            'template'=>'<div style="padding-left:100px"><div class="row">{input}{label}</div></div>',
                            'checkAll' => 'Select All',
                        )
                 );
 ?>
</ul>

  	<div class="row">
                <?php echo $form->labelEx($model,'comment'); ?>
                <?php echo $form->textArea($model,'comment',array('name'=>'comment','rows'=>3, 'cols'=>100)); ?>
                <?php echo $form->error($model,'comment'); ?>
        </div>


<br>
<div class="row buttons">
<br/>
<?php $this->endWidget(); ?>

                <?php echo CHtml::submitButton('Approve',array('name'=>'button1')); ?>
                <?php echo CHtml::submitButton('Reject', array('name'=>'button2')); ?>

        </div>
<?php 
	echo CHtml::endForm(); 
	}
?>

