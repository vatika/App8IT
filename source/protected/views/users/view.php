<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	$model->first_name,
);

$this->menu=array(
	array('label'=>'Create Users', 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess('Create')),
	array('label'=>'Update Profile', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Account', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users', 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess('Create')),
);
?>

<h1>View Profile : <?php echo $model->first_name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'email',
		'first_name',
		'last_name',
		'phone_number',
        	array(
                        'name' => 'role.role',
                        'header' => 'Profile',
                        'filter'=>CHtml::activeTextField($model,'role_search'),

                ),

		 array(
                        'name'=>'status',
                        'header'=>'App Status',
                        'value' => $model->status=="1" ? "Activated":"Deactivated",//CHtml::image(Yii::app()->baseUrl ."/images/active.png" ): CHtml::image(Yii::app()->baseUrl ."/images/inactive.jpg"),
                //        'filter'=>CHtml::activeTextField($model,'versions_search'),
                     ),

		'create_date',
		'modified_date',
		'reset_password_date',
	),
)); ?>
