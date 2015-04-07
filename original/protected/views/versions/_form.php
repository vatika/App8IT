<?php
/* @var $this VersionsController */
/* @var $entry Versions */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'versions-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($entry); ?>

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

	<div class="row">
		<?php echo $form->labelEx($entry,'activity'); ?>
		<?php echo $form->textField($entry,'activity',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($entry,'activity'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($entry,'comment'); ?>
		<?php echo $form->textArea($entry,'comment',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($entry,'comment'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($entry->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
