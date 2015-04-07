<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'users-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<br></br>
	<p class="note">Fields with <span class="required">*</span> are required.</p>
        
	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'phone_number'); ?>
		<?php echo $form->textField($model,'phone_number',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'phone_number'); ?>
	</div>


	 <div class="row">
		<?php $user = Users::model()->findbyPk(Yii::app()->user->id);if( $user->role_id == 1) { ?>
		<br>
	<div class="row">
		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Status :*
		<?php //echo $form->labelEx($model,'status'); ?><br>
		<?php //echo $form->dropDownList($model,'status',array('prompt'=> 'Select','1'=>'Activate','0'=>'Deactivate'));
		?>
				<?php echo $form->radioButtonList($model,'status',array('1'=>'Activate','0'=>'Deactivate'), array(
							'separator'=>'<br>',
							 'template'=>'<div style="padding-left:100px"><div class="row">{label}{input}</div></div>',
        					
						));
		}?>  

		
        </div>

<br>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>

	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
