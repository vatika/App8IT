
<?php $dataProvider = $model->search();
//echo $dataProvider;
$temp = $dataProvider->getData();
foreach ($temp as $t){ 
			$app = Applications::model()->findbyPk($t['id']); ?>
	
	<div class="col-md-3">
        <div class="thumbnail">
			<?php $image = (Yii::app()->baseUrl.'/images/'.$app->logo) ; ?>
            <img src= "<?= $image; ?>"  alt="" style="width:80%;height:60%">
            <div class="caption">
                <h4>
                <div style="width: 100; text-overflow: ellipsis; white-space: nowrap;overflow: hidden;">
					<a href="#"><?= $app->name;?></a>
               </div>
           	   </h4>     
	            <div class="ratings">
	            	<p class="pull-right">
					<?php 
							$count=0; 
							$rev = Comments::model()->findAll();
							foreach ($rev as $z): 
								if( $z->application_id == $app->id && $z->status == 1){
									$count+=1;}
								endforeach; echo $count." reviews"; 
					?>	 
					</p>
    	       
    	 	   </div>
			</div>
		</div>
	</div>
	
<?php } ?>

