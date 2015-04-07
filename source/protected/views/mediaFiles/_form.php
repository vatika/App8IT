<?php
/* @var $this MediaFilesController */
/* @var $model MediaFiles */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'media-files-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($media); ?>

	<!--div class="row">
		<?php //echo $form->labelEx($model,'type'); ?>
		<?php //echo $form->textField($model,'type',array('size'=>5,'maxlength'=>5)); ?>
		<?php //echo $form->error($model,'type'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'filename'); ?>
		<?php //echo $form->textField($model,'filename',array('size'=>60,'maxlength'=>128)); ?>
		<?php //echo $form->error($model,'filename'); ?>
	</div-->
	<br>
	<div class="row">
    	<?php echo $form->labelEx($media,'type'); ?>
            <div id="gender">
            <?php
                echo $form->radioButtonList($media, 'type',
                   array(  'Image' => 'Image',
                            'Video' => 'Video'
                            ) ,
					array('separator'=>''));
            ?>
            </div>
        <?php echo $form->error($media,'type'); ?>
    </div>
<br>
    <div class="row" id = "image">
                <?php echo $form->labelEx($media,'filename'); ?>
                <?php echo $form->fileField($media,'filename',array('size'=>60,'maxlength'=>128)); ?>
      
    </div>
<br>

	<div class="row buttons">
		<?php echo CHtml::submitButton($media->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
