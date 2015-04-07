<?php
/* @var $this ChecklistAnalystMappingController */
/* @var $model ChecklistAnalystMapping */

$this->breadcrumbs=array(
	'Checklist Analyst Mappings'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List ChecklistAnalystMapping', 'url'=>array('index')),
	array('label'=>'Create ChecklistAnalystMapping', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#checklist-analyst-mapping-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Checklist Analyst Mappings</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'checklist-analyst-mapping-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'analyst_id',
		'checklist_id',
		'version_id',
		'create_date',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
