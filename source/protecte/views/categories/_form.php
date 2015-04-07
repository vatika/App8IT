<?php
/* @var $this CategoriesController */
/* @var $model Categories */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'categories-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>


	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
	        <?php
                echo $form->labelEx($model,'parent_id'); 
                echo $form->dropDownList(
                        $model,'parent_id',
                        CHtml::listData(
                                Categories::model()->findAll(),
                                'id',
                                'title'
                        ),
                        array(
                                'class'=> 'my-drop-down',
                        	'prompt'=>'Select',
				        
                        )
                );
        ?>
	
		
		<?php echo $form->error($model,'parent_id'); ?>
	</div>
	 <div class="row">
                <?php echo $form->labelEx($model,'status'); ?>
                <?php echo $form->dropDownList($model,'status',array('prompt'=>'Select','1'=>'Activate','0'=>'Deactivate')); ?>
                <?php echo $form->error($model,'status'); ?>
        </div>


	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
