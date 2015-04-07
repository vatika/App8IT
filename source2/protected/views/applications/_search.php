<?php
/* @var $this ApplicationsController */
/* @var $model Applications */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>128)); ?>
	</div>


	<div class="row">
		<?php echo $form->label($model,'category_id'); ?>
		<?php  echo $form->dropDownList(
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
		<?php echo $form->label($model,'description'); ?>
		<?php echo $form->textArea($model,'description',array('rows'=>6, 'cols'=>50)); ?>
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
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->
