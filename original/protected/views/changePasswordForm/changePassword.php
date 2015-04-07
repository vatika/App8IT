<?php echo CHtml::errorSummary($model); ?>
<div class = "form">
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'changePasswordForm-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
        'enableAjaxValidation'=>false,
)); ?>

<br>
<br>
<form id="changePasswordForm-form"  autocomplete="off" action="/yii/new/index.php?r=changePasswordForm/changePassword" method="post">
 <input type="text" name="user" value="chose" style="display: none" />
    <div class="row">
        <?php echo CHtml::activeLabel($model,'currentPassword'); ?>
        <?php echo CHtml::activePasswordField($model,'currentPassword') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'newPassword'); ?>
        <?php echo CHtml::activePasswordField($model,'newPassword') ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'newPassword_repeat'); ?>
        <?php echo CHtml::activePasswordField($model,'newPassword_repeat') ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Change password',array('confirm'=>'Are you sure?')); ?>
	<?php echo CHtml::button('Cancel', array('submit' => array('users/view&id='.Yii::app()->user->id))); ?>



    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
