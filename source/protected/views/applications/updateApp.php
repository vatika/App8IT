<?php
/* @var $this ApplicationsController */
/* @var $model Applications */

$this->breadcrumbs=array(
	'Applications'=>array('admin'),
);

$this->menu=array(
//	array('label'=>'Add new Version', 'url'=>array('create')),
	array('label'=>'Manage Applications', 'url'=>array('admin')),
);
?>
<?php $app = Applications::model()->findbyPk($id);?>
<h1> New Version : <?php echo $app->name ?> </h1>
<?php $this->renderPartial('_updateForm', array('id'=>$id,'model'=>$model,'entry'=>$entry)); ?>
<h4>Existing media files : </h4>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'media-files-grid',
	'dataProvider'=>$mfile->search($id),
//	'filter'=>$mfile,
	'columns'=>array(
	//	'id',
			array(
			'name'=>'logo',
			'header'=>'File',
			'type'=>'raw',

		    'value' => 'CHtml::image(Yii::app()->baseUrl."/data/".$data->application->name."/MediaFiles/".$data->filename,"",array(\'width\'=>\'100\', \'height\'=>\'100\'))',                     
     ), 
	
		'application.name',
		'type',
//		'filename',
//		'status',
		'create_date',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{update}{delete}',
			'buttons'=>array(
	   	         'update'=>array(
	                    'label'=>'Update details',
	                    'url'=>'Yii::app()->createUrl("/mediaFiles/update", array("id"=>$data->id))',
	                                  
	                    ),
			 'delete' => array(
                                        'label'=>'Delete',
                       	    'url'=>'Yii::app()->createUrl("/mediaFiles/delete", array("id"=>$data->id))',
                                                'visible'=>"Yii::app()->user->checkAccess('createApp')",
                                                ),


	          ),

		),
	),
)); 

?>        	
