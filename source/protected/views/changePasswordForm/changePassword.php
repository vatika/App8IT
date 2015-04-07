<?php echo CHtml::errorSummary($model); ?>
<div class = "form">
<?php $form=$this->beginWidget('CActiveForm', array(
        'id'=>'changePasswordForm-form',
        // Please note: When you enable ajax validation, make sure the corresponding
        // controller action is handling ajax validation correctly.
        // There is a call to performAjaxValidation() commented in generated controller code.
        // See class documentation of CActiveForm for details on this.
    //    'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
            ),
)); ?>


<br>
<br>
<form id="changePasswordForm-form"  autocomplete="off" action="<?php Yii::app()->baseUrl.'/index.php?r=changePasswordForm/changePassword&id='.$id ?>" method="post">
 <input type="text" name="user" value="chose" style="display: none" />
    <div class="row">
	<?php //admin does not need current password to change other users' password ?>
	<?php  $user = Users::model()->findByPk(Yii::app()->user->id);?>
        <?php if($user->role_id != 1 ) echo CHtml::activeLabel($model,'currentPassword'); ?>
        <?php if($user->role_id != 1) echo CHtml::activePasswordField($model,'currentPassword') ?>
        <?php echo $form->error($model,'currentPassword'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'newPassword'); ?>
        <?php echo CHtml::activePasswordField($model,'newPassword') ?>
        <?php echo $form->error($model,'newPassword'); ?>
    </div>

    <div class="row">
        <?php echo CHtml::activeLabel($model,'newPassword_repeat'); ?>
        <?php echo CHtml::activePasswordField($model,'newPassword_repeat') ?>
        <?php echo $form->error($model,'newPassword_repeat'); ?>
    </div>

    <div class="row submit">
        <?php echo CHtml::submitButton('Change password',array('confirm'=>'Are you sure?')); ?>

    </div>

<?php $this->endWidget(); ?>

</div><!-- form -->
