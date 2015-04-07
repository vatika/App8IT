<?php
/* @var $this ApplicationsController */
/* @var $model Applications */
/* @var $form CActiveForm */
?>
 <style type="text/css">          
           div#gender {
                    margin-top:20px;
                    margin-left:200px;
           }      

           div#gender label
           {
                   font-weight: bold;
                   font-size: 0.9em;
                   float:left;
                   margin-left:2px;
                   text-align:left;
                   width:100px;
            }
div#gender input
{
    float:left;
}
</style>
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

	<?php echo $form->errorSummary(array($model,$entry)); ?>

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
			   'prompt'=> 'Select',
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

        <div class="row">
                <?php echo $form->labelEx($media,'filename'); ?>
                <?php echo $form->fileField($media,'filename',array('size'=>60,'maxlength'=>128)); ?>
                <?php echo $form->error($media,'filename'); ?>
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
             //                   'options'=>array(
               //                         '4'=>array(
                 ///                               'selected'=>"selected",
                    //                    )
                      //          )
				'prompt'=> 'Select',

                        )
                );
        ?>



	</div>

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
                       'prompt'=> 'Select',
 			)
                );
        ?>

	</div>


<?php //$this->endWidget(); ?>


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

	<div class="row buttons">
		<?php echo CHtml::submitButton($entry->isNewRecord && $model->isNewRecord ? 'Create' : 'Save'); ?>
	       <?php echo CHtml::button('Cancel', array('submit' => array('admin'))); ?>

	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
