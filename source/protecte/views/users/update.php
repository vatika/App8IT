<?php
/* @var $this UsersController */
/* @var $model Users */

$this->breadcrumbs=array(
	'Users'=>array('admin'),
);

$this->menu=array(
	array('label'=>'Create Users', 'url'=>array('create'),'visible'=>Yii::app()->user->checkAccess('Create')),
	array('label'=>'View Profile', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Delete Account', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Users', 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess('Create')),
//	array('label'=>'Manage Applications', 'url'=>array('admin'),'visible'=>Yii::app()->user->checkAccess('createApp')),
  //      array('label'=>'Update Application', 'url'=>array('updateApp'),'visible'=>Yii::app()->user->checkAccess('createApp')),

);
?>

<h1>Update User :  <?php echo $model->first_name; ?></h1>

<b><?php echo "Email : ".$model->email ?></b>

<?php $this->renderPartial('_update', array('model'=>$model)); ?>
