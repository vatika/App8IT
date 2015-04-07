<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

//$this->pageTitle=Yii::app()->name;
?>
   <style>
   img .banner{
   	height: 50px;
   }
   </style> 
			
            <div class="col-md-3" ><div style="position:fixed;width:20%" >
                <p class="lead">Categories</p>
    
                <div class="list-group navbar">
                <ul style="list-style:none">
	            <?php $categories = Categories::model()->findAllByAttributes(array('status'=>'1')); ?>
                <?php foreach ($categories as $category): ?>
                <li>	
                    <?php   $options = array('id' => $category->id);?>
					<a href="<?php echo $this->createUrl('site/viewCategoryApps',$options); ?>" class="list-group-item"><?= $category->title;?></a>
				</li>
                <?php endforeach; ?>
                </ul> 
		 </div>
            </div></div>

<div class="col-md-9">
	 <div style='float: right;direction: rtl; color: #ffffff; margin: 5px 0 0 5px; font-size: 13px'>
		     				   <?php echo CHtml::form(Yii::app()->createUrl('applications/search'),'get') ?>
		    				   <?php echo CHtml::textField('search_key', 'Search by app name') ?>
        					   <?php echo CHtml::endForm() ?>
</div>
                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active" >
                                    <img class="slide-image" alt="" src=<?=Yii::app()->baseUrl.'/img/banner6.jpg' ?> >
                                </div>
                                <div class="item">
                                    <img class="slide-image" width="100%" height="0"alt="" src=<?=Yii::app()->baseUrl.'/img/banner2.jpg' ?> >
                                </div>
                                <div class="item">
                                    <img class="slide-image" width="100%" height="0"alt="" src=<?=Yii::app()->baseUrl.'/img/banner3.png' ?> >
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
       <?php 
				$applications = Applications::model()->findAllByAttributes(array('status'=>'1')); 
				$ratelist = [];				
				foreach( $applications as $app ):
					$ratelist[$app->id] = 0;
					$user[$app->id]=0;
				endforeach;				
				$ratings = Ratings::model()->findAll();
				foreach( $ratings as $rate):
					if( array_key_exists($rate->application_id , $ratelist) )
					{
						$user[$rate->application_id] += 1;
						$ratelist[$rate->application_id] += $rate->rating;
					}
				endforeach;
				$avglist =[];
				foreach( $ratelist as $key=>$value ):
					if( $user[$key] != 0 ){
						$avglist[$key] = $ratelist[$key]/$user[$key];
					}
					else $avglist[$key] = 0;
				endforeach;	
		
				arsort( $avglist ,$sort_flags = SORT_NUMERIC);
				$top_five = 0;
				foreach( $avglist as $key => $value ):	
					$top_five += 1; 
					if ( $top_five  > 5 )
						break;
					$app = Applications::model()->findbyPk($key); 
	//				echo $app->name. " : " .$value ."<br>";
?>
                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="thumbnail">
                        	  	<div style="float:right">
                        	<?php 
    	                 		$versions= Versions::model()->findAllByAttributes(array('application_id'=>$app->id));
    	                 		$flag = 0;
    	                 		foreach ($versions as $version):
    	                 			if ( $flag == 0 ){
    	                 				$flag = 1;
    	                 				$date = date_create($version->create_date);
    	                 				$earliestdate = $date;
    	                 		
    	                 			}
    	                 			$newdate = date_create($version->create_date);
    	                 			if ( $newdate > $date )
    	                 				$date = $newdate;
    	                 			if ($newdate < $earliestdate){
										$earliestdate = $date;
    	                		 	}
    	                 		endforeach;
    	                 		$curDate = date_create();
    	                 		$diff12 = date_diff($date, $curDate);
    	                 		if ($diff12->d < 7  ){
    	                 			if ($date == $earliestdate ){
    	                 				$image = (Yii::app()->baseUrl.'/img/newapp.png');?>
    	                 				 <img src="<?= $image; ?>" alt="" style="width:50px ;height:50px ">
    	                 	<?php	}
    	                 			else{
										$image = (Yii::app()->baseUrl.'/img/newversion.png');?>
    	                 				 <img src="<?= $image; ?>" alt="" style="width:50px ;height:50px ">
    	                 	
    	                 		<?php	}

    	                 			
    	                 		}
    	                	 ?>
    	                	</div>
                      
                            <?php $image = (Yii::app()->baseUrl.'/images/'.$app->logo) ; ?>
                            <?php	$options = array('id' => $app->id);?>
                            <img src="<?= $image; ?>" alt="" style="width:150px ;height:150px ">
                            <div class="caption">
                                <h4 class="pull-right"></h4>
                              <h4><div style="width: 100; text-overflow: ellipsis; white-space: nowrap;overflow: hidden;">
							<a href= "<?php echo $this->createUrl('site/viewapp',$options); ?>"><?= $app->name;?></a>
    	               </div></h4>
                          
                            </div>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <?php 
							$count=0; 
							$rev = Comments::model()->findAll();
							foreach ($rev as $z): 
								if( $z->application_id == $app->id && $z->status == 1){
									$count+=1;}
								endforeach; echo $count." reviews"; 
						?>	 
						</p>
    	                <p>	
							<?php $t=0; while($t < $avglist[$app->id ] ) { ?>	
    	            	    	<span class="glyphicon glyphicon-star"></span>
							<?php $t++; } ?>
    	                    <?php while($t < 5 ) { ?>	
    	            	      	<span class="glyphicon glyphicon-star-empty"></span>
							<?php $t++; } ?>
                            </div>
                        </div>
                    </div>

              
                   
<?php		
		endforeach;
?>
     
            </div>

<div class="col-md-12" style="float:right">


<?php 
	$categories = Categories::model()->findAllByAttributes(array('status'=>'1'));
	foreach ( $categories as $category ):

		//echo $category->title."<br>";

?>
<?php	$options = array('id' => $category->id);?>

<h3><?= $category->title;?></h3>
<a href=" <?php echo $this->createUrl('site/viewCategoryApps',$options); ?>" >
<br>
<button type="button" style="float:right">See more</button>
</a>
<br>
	
	<div class="row">
<?php
			$applications = Applications::model()->findAllByAttributes(array('status'=>'1', 'category_id'=> $category->id)); 
				$ratelist = [];				
				foreach( $applications as $app ):
					$ratelist[$app->id] = 0;
					$user[$app->id]=0;
				endforeach;				
				$ratings = Ratings::model()->findAll();
				foreach( $ratings as $rate):
					if( array_key_exists($rate->application_id , $ratelist) )
					{
						$user[$rate->application_id] += 1;
						$ratelist[$rate->application_id] += $rate->rating;
					}
				endforeach;
				$avglist =[];
				foreach( $ratelist as $key=>$value ):
					if( $user[$key] != 0 ){
						$avglist[$key] = $ratelist[$key]/$user[$key];
					}
					else $avglist[$key] = 0;
				endforeach;	
		
				arsort( $avglist ,$sort_flags = SORT_NUMERIC);
				$top_five = 0;
				foreach( $avglist as $key => $value ):	
					$top_five += 1; 
					if ( $top_five  > 5 )
						break;
					$app = Applications::model()->findbyPk($key); 
		//		echo $app->name. " : " .$value ."<br>";
?>
			<div class="col-sm-3 col-lg-3 col-md-3">
			<?php	$options = array('id' => $app->id);?>
		        <div class="thumbnail"><a href="<?php echo $this->createUrl('site/viewapp',$options); ?>">
					    	  	<div style="float:right">
                        	<?php 
    	                 		$versions= Versions::model()->findAllByAttributes(array('application_id'=>$app->id));
    	                 		$flag = 0;
    	                 		foreach ($versions as $version):
    	                 			if ( $flag == 0 ){
    	                 				$flag = 1;
    	                 				$date = date_create($version->create_date);
    	                 				$earliestdate = $date;
    	                 		
    	                 			}
    	                 			$newdate = date_create($version->create_date);
    	                 			if ( $newdate > $date )
    	                 				$date = $newdate;
    	                 			if ($newdate < $earliestdate){
										$earliestdate = $date;
    	                		 	}
    	                 		endforeach;
    	                 		$curDate = date_create();
    	                 		$diff12 = date_diff($date, $curDate);
    	                 		if ($diff12->d < 7  ){
    	                 			if ($date == $earliestdate ){
    	                 				$image = (Yii::app()->baseUrl.'/img/newapp.png');?>
    	                 				 <img src="<?= $image; ?>" alt="" style="width:50px ;height:50px ">
    	                 	<?php	}
    	                 			else{
										$image = (Yii::app()->baseUrl.'/img/newversion.png');?>
    	                 				 <img src="<?= $image; ?>" alt="" style="width:50px ;height:50px ">
    	                 	
    	                 		<?php	}

    	                 			
    	                 		}
    	                	 ?>
    	                	</div>
                    
					<?php $image = (Yii::app()->baseUrl.'/images/'.$app->logo) ; ?>
	
    	            <img src= "<?= $image; ?>"  alt="" style="width:80%;height:60%">
    	            <div class="caption">
    	                <h4><div style="width: 100; text-overflow: ellipsis; white-space: nowrap;overflow: hidden;">
							<?= $app->name;?>
    	               </div></h4>
						<!--div style="width: 40; text-overflow: ellipsis; white-space: nowrap;overflow: hidden;">
		                    <p><?= $app->description;?>.</p>
						</div-->
    	            
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
    	                <p>	
							<?php $t=0; while($t < $avglist[$app->id ] ) { ?>	
    	            	    	<span class="glyphicon glyphicon-star"></span>
							<?php $t++; } ?>
    	                    <?php while($t < 5 ) { ?>	
    	            	      	<span class="glyphicon glyphicon-star-empty"></span>
							<?php $t++; } ?>
							
    	            	</p>
    	            </div></a>
    	        </div>
			</div>
		</div>

<?php
		endforeach;
?>	
	</div>
<?php
	endforeach;

?>
</div>


        </div>

    <!-- /.container -->

   

    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


</div>







