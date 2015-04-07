<?php
/* @var $this ChecklistAnalystMappingController */
/* @var $data ChecklistAnalystMapping */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('analyst_id')); ?>:</b>
	<?php echo CHtml::encode($data->analyst_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('checklist_id')); ?>:</b>
	<?php echo CHtml::encode($data->checklist_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('version_id')); ?>:</b>
	<?php echo CHtml::encode($data->version_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('create_date')); ?>:</b>
	<?php echo CHtml::encode($data->create_date); ?>
	<br />


</div>