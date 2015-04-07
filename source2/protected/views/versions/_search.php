<?php
/* @var $this VersionsController */
/* @var $model Versions */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'application_id'); ?>
		<?php echo $form->textField($model,'application_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'file_name'); ?>
		<?php echo $form->textField($model,'file_name',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'version'); ?>
		<?php echo $form->textField($model,'version',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'create_date'); ?>
		<?php echo $form->textField($model,'create_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status_id'); ?>
		<?php echo $form->textField($model,'status_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'reviewer_id'); ?>
		<?php echo $form->textField($model,'reviewer_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activity'); ?>
		<?php echo $form->textField($model,'activity',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'comment'); ?>
		<?php echo $form->textArea($model,'comment',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->