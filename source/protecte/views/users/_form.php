<?php
/* @var $this UsersController */
/* @var $model Users */
/* @var $form CActiveForm */
?>
<?php  
  $baseUrl = Yii::app()->baseUrl; 
  $cs = Yii::app()->getClientScript();
  $cs->registerScriptFile($baseUrl.'/js/myscript.js');
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

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

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
	<?php
		echo $form->labelEx($model,'role_id'); 
		echo $form->dropDownList(
			$model,'role_id',
			CHtml::listData(
				Roles::model()->findAll(),
				'id',
				'role'
			),
			array(
				'class'=> 'my-drop-down',
				'prompt'=> 'Select',
				'onchange'=>'return muFun(this.value)',
			)
		);
	?>


	</div>

<div id="TLID_DIV" style="display:none">
	Please assign categories appropriately : <br>
  <div class="row">
                <?php
            //    echo $form->labelEx($model,'activation_key');
                echo $form->checkBoxList(
                        $model,'activation_key',
                        CHtml::listData(
                                Categories::model()->findAllByAttributes(array('status'=>'1')),
                                'id',
                                'concatenated'
                        ),
                         array(
							'separator'=>'<br>',
							 'template'=>'<div style="padding-left:100px"><div class="row">{label}{input}</div></div>',
        					
						)
                );
        ?>
</div>
</div>
	<div class="row">
		<br>
		Status: *

		<?php // echo $form->labelEx($model,'status'); ?><br>
		<?php //echo $form->dropDownList($model,'status',array('prompt'=> 'Select','1'=>'Activate','0'=>'Deactivate'));
		?>
				<?php echo $form->radioButtonList($model,'status',array('1'=>'Activate','0'=>'Deactivate'), array(
							'separator'=>'<br>',
							 'template'=>'<div style="padding-left:100px"><div class="row">{label}{input}</div></div>',
        					
						));
		?>  

		<?php echo $form->error($model,'status'); ?>
	</div>
	<br>
<!---
	<div class="row">
		<?php echo $form->labelEx($model,'reset_password_key'); ?>
		<?php echo $form->textField($model,'reset_password_key',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'reset_password_key'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'reset_password_date'); ?>
		<?php echo $form->textField($model,'reset_password_date'); ?>
		<?php echo $form->error($model,'reset_password_date'); ?>
	</div>
---!>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
