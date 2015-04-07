<?php
/* @var $this ChecklistCategoryMapController */
/* @var $data ChecklistCategoryMap */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('checklist_id')); ?>:</b>
	<?php echo CHtml::encode($data->checklist_id); ?>
	<br />


</div>