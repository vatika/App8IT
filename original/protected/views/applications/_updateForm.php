<?php
/* @var $this ApplicationsController */
/* @var $model Applications */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'applications-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=> array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary(array($entry)); ?>

	<div class="row">
	<?php 
	echo $form->labelEx($model,'name');
	echo $form->dropDownList(
			$model,'name',
			CHtml::listData(
				Applications::model()->findAll(array('condition'=> 'user_id ='.Yii::app()->user->id)),
				'id',
				'name'
				),
			array(
				'class'=> 'my-drop-down',
				'options'=>array(
					$id=>array(
						'selected'=>"selected",
						)
					)
			     )
			);

	?>
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
		<?php echo $form->fileField($entry,'file_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($entry,'file_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($entry,'version'); ?>
		<?php echo $form->textField($entry,'version',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($entry,'version'); ?>
	</div>

</br>
	<div class="row buttons">
		<?php echo CHtml::submitButton($entry->isNewRecord ? 'Update' : 'Save'); ?>
	        <?php echo CHtml::button('Cancel', array('submit' => array('admin'))); ?>



	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
