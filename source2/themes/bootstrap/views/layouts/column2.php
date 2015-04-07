<?php $this->beginContent('//layouts/main'); ?>
      <div class="row-fluid">
        <div class="span3">

	
         <?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'sidebar'),
			));
			$this->endWidget();
		?>

		 <div style='float: left;direction: rtl; color: #ffffff; margin: 5px 0 0 5px; font-size: 13px'>
		     				
		     				   <?php echo CHtml::form(Yii::app()->createUrl('applications/search'),'get') ?>
		    				   <?php echo CHtml::textField('search_key', 'Search by app name') ?>
        					   <?php echo CHtml::endForm() ?>
	</div>
		</div><!-- sidebar span3 -->

	<div class="span9">
		<div class="main" style='width:100%;height:100%'>
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
</div>
<?php $this->endContent(); ?>
