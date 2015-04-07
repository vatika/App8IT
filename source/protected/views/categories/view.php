<?php
/* @var $this CategoriesController */
/* @var $model Categories */

$this->breadcrumbs=array(
	'Categories'=>array('admin'),
	$model->title,
);

$this->menu=array(
//	array('label'=>'List Categories', 'url'=>array('index')),
	array('label'=>'Create Categories', 'url'=>array('create')),
	array('label'=>'Update Categories', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Categories', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Categories', 'url'=>array('admin')),
);
?>

<h1>View Category : <?php echo $model->title; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'description',
		
		array(
                                        'name'=>'status',
                                        'header'=>'Status',
                                        'value' => ($model->status==1  ? "Activated" : "Deactivated"),
                                     ),
'create_date',
		'modified_date',
	),
)); ?>




<?php
//        $temp = Users::model()->findbyPk(Yii::app()->user->id);
  //      if ( $temp->role_id == 1){
    //    echo CHtml::beginForm(Yii::app()->createUrl('applications/view&id='.$model->id),'post');
?>
	<br> 
       <div class="row buttons" style="float:left">
            <?php //if( $model->status == 0) echo CHtml::submitButton('Activate',array('name'=>'button1','class' => 'button1')); ?>
            <?php //if( $model->status == 1) echo CHtml::submitButton('Deactivate', array('name'=>'button2')); ?>

        </div>
<?php
       // echo// CHtml::endForm();
       // }
?>

