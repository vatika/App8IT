<?php
/* @var $this ChecklistAnalystMappingController */
/* @var $model ChecklistAnalystMapping */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'checklist-analyst-mapping-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'analyst_id'); ?>
		<?php echo $form->textField($model,'analyst_id'); ?>
		<?php echo $form->error($model,'analyst_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'checklist_id'); ?>
		<?php echo $form->textField($model,'checklist_id'); ?>
		<?php echo $form->error($model,'checklist_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'version_id'); ?>
		<?php echo $form->textField($model,'version_id'); ?>
		<?php echo $form->error($model,'version_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
		<?php echo $form->error($model,'create_date'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->