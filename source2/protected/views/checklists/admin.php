<?php
/* @var $this ChecklistsController */
/* @var $model Checklists */

$this->breadcrumbs=array(
	'Checklists'=>array('admin'),
	'Manage',
);

$this->menu=array(
//	array('label'=>'List Checklists', 'url'=>array('index')),
	array('label'=>'Create Checklists', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#checklists-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Checklists</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'checklists-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
//		'id',
		'title',
		'description',
		array(
                        'name'=>'status',
                        'header'=>'Status',
                        'value' => '($data->status==1 ? "Activated" : "Deactivated")',
			'filter'=> array('0' => 'Deactivated', '1' => 'Activated'),
                ),
		'create_date',
		'modified_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
