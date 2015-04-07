<?php
/* @var $this ApplicationsController */
/* @var $model Applications */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(

//'action' => Yii::app()->createUrl("updateApp",array('id'=> $id)),
    'method' => 'post',


	'id'=>'applications-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
	'htmlOptions'=> array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row" type="hidden" style="display:none;">
	<?php 
	echo  $form->labelEx($model,'name');
	echo  $form->dropDownList(
			$model,'name',
			CHtml::listData(
				Applications::model()->findAll(array('condition'=> 'user_id ='.Yii::app()->user->id)),
				'id',
				'name'
				),
			array(
	//			'type'=>'hidden',
				'class'=> 'my-drop-down',
				'options'=>array(
					$id=>array(
						'selected'=>"selected",
						)
					)
			     )
			);



   $form->textField($model,'name'); ?>

	</div>

<?php //$form=$this->beginWidget('CActiveForm', array(
	//'id'=>'versions-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
//	'enableAjaxValidation'=>false,
//)); ?>

	<?php //echo $form->errorSummary($entry); ?>

	<div class="row">
		<?php echo $form->labelEx($entry,'file_name'); ?>
		<?php echo $form->fileField($entry,'file_name',array('size'=>60,'maxlength'=>128, 'accept'=>'txt')); ?>
                <?php echo $form->error($entry,'file_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($entry,'version'); ?>
		<?php echo $form->textField($entry,'version',array('size'=>60,'maxlength'=>128)); ?>
                <?php echo $form->error($entry,'version'); ?>
	</div>

<br>

<?php		$media = MediaFiles::model()->findAllByAttributes(array('application_id'=>$id , 'status'=>array(0,1)) );
		$var = 5 - count($media);
	if( $var > 0 ){ ?>
      Please upload necessary media files : <br>
        <?php 
	
		$this->widget('CMultiFileUpload', array(
              //  'name' => 'images',
                'accept' => 'jpeg|jpg|gif|png', // useful for verifying files
                'duplicate' => 'Duplicate file!', // useful, i think
                'denied' => 'Invalid file type', // useful, i think
                'max' => $var,
            //    'maxSize' => 10*(1024*1024),
                'name'=>'photos',


            ));
  }     else echo "Can not add more media files"; ?>
  
</br>
	<div class="row buttons">
		<?php echo CHtml::submitButton($entry->isNewRecord ? 'Update' : 'Save'); ?>
	


	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
