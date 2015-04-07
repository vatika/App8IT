<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
	'Manage',
);

$this->menu=array(
	array('label'=>'Create Users', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#users-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'users-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'first_name',
		'last_name',
		
		'email',
		array(
			'name' => 'role_id',
			'header' => 'Profile',
		//	'filter'=>CHtml::activeTextField($model,'role_search'),
			'value'=>'( $data->role_id== 1 ? "Admin" : ($data->role_id == 2 ? "Developer" : ( $data->role_id == 3 ?  "QA Analyst": " User" ) ) )',
			'filter'=> array('1' => 'Admin', '2' => 'Developer' , '3' => 'QA Analyst' , '4' => 'User'),
		),
			
		'phone_number',

		 array(
                        'name'=>'status',
                        'header'=>'Status',
                        'value' => '($data->status==1 ? "Activated" : "Deactivated")',
			'filter'=> array('0' => 'Deactivated', '1' => 'Activated'),
                //        'filter'=>CHtml::activeTextField($model,'versions_search'),
                     ),


		/*
		'role_id',
		'create_date',
		'modified_date',
		'activation_key',
		'status',
		'reset_password_key',
		'reset_password_date',
		*/
			
		array(
			'class'=>'CButtonColumn',

			'template'=>'{view}{update}{delete}{changepwd}',
                        'buttons'=>array(
				'changepwd' => array (
					'label'=>'Change Password',
					'url' =>'Yii::app()->createUrl("/changePasswordForm/changePassword",array("id"=>$data->id))',
					'imageUrl'=>Yii::app()->baseUrl.'/images/changePassword.jpeg',
				),
                                'update'=>array(
                                        'label'=>'Update details',
                                        'url'=>'Yii::app()->createUrl("/users/update", array("id"=>$data->id))',
                                                        'visible'=>"Yii::app()->user->checkAccess('Create')",
                                        ),
                                'delete' => array(
                                        'label'=>'Delete',
                                        'url'=>'Yii::app()->createUrl("/users/delete", array("id"=>$data->id))',
                                                'visible'=>"Yii::app()->user->checkAccess('Create')",
                                                ),
                                        ),


		),
	),
)); ?>
