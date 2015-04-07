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

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>


	<div class="row">
	<?php
	echo $form->labelEx($model,'category_id');
	echo $form->dropDownList(
			$model,'category_id',
			CHtml::listData(
				Categories::model()->findAll(),
				'id',
				'title'
				),
			array(
				'class'=> 'my-drop-down',
				'options'=>array(
					'1'=>array(
						'selected'=>"selected",
						)
					)
			     )
			);
	?>

	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'logo'); ?>
		<?php echo $form->fileField($model,'logo'); ?>
		<?php echo $form->error($model,'logo'); ?>
	</div>

	<div class="row">
	<?php  	
		echo $form->labelEx($model,'platform_id');
                echo $form->dropDownList(
                        $model,'platform_id',
                        CHtml::listData(
                                Platforms::model()->findAll(),
                                'id',
                                'name'
                        ),
                        array(
                                'class'=> 'my-drop-down',
                                'options'=>array(
                                        '4'=>array(
                                                'selected'=>"selected",
                                        )
                                )
                        )
                );
        ?>



	</div>

	<div class="row">
        <div class="row">
        <?php
                echo $form->labelEx($model,'device_id');
                echo $form->dropDownList(
                        $model,'device_id',
                        CHtml::listData(
                                Devices::model()->findAll(),
                                'id',
                                'type'
                        ),
                        array(
                                'class'=> 'my-drop-down',
                                'options'=>array(
                                        '4'=>array(
                                                'selected'=>"selected",
                                        )
                                )
                        )
                );
        ?>
	
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
