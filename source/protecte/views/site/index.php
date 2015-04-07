<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

//$this->pageTitle=Yii::app()->name;
?>


<div class="container">

	<div class="col-md-12">
		<div class="row carousel-holder">

	            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
	                <ol class="carousel-indicators">
		                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    	                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
    	            </ol>
				
                	<div class="carousel-inner">
                    	<div class="item active">
							<?php $image = (Yii::app()->baseUrl.'/images/app1.jpg') ; ?>
    	                    <img class="slide-image" src="<?= $image ?>" alt="" style="width:100%;height:40%">
    	                </div>
    	                <div class="item">
							<?php $image = (Yii::app()->baseUrl.'/images/app2.jpg') ; ?>
    	                    <img class="slide-image" src="<?= $image ?>" alt=""style="width:100%;height:40%" >
    	                </div>
    	                <div class="item">
							<?php $image = (Yii::app()->baseUrl.'/images/banner1.jpg') ; ?>
    	                    <img class="slide-image" src="<?= $image ?>" alt="" style="width:100%;height:40%">
    	                </div>
					</div>	
             	</div>
      
        </div>
    </div>
</div>

<div class="container">
	<div class="row">
			<!-- Categories side bar --> 
		<div class="col-md-3">
   			<p class="lead">Categories</p>
                <div class="list-group navbar">
	                <ul style="list-style:none">
			            <?php $categories = Categories::model()->findAllByAttributes(array('status'=>'1')); ?>
		                <?php foreach ($categories as $category): ?>
		                <li>	
							<a href="<?= '#'.$category->title;?>" class="list-group-item"><?= $category->title;?></a>
						</li>
	                    <?php endforeach; ?>
		            </ul> 
	            </div>
	        </p>
	    </div>    
	</div>

		<!-- Top 5 Apps -->	
<h2>
		<div class="column">Favourites</div>
</h2>
	  	<div class="col-md-12" >
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
			<div class="col-sm-2 col-lg-2 col-md-2">
		      	 <div class="thumbnail">
					<?php $image = (Yii::app()->baseUrl.'/images/'.$app->logo) ; ?>
	
    	            <img src= "<?= $image; ?>"  alt="" style="width:80%;height:60%">
				
    	            <div class="caption">
    	                  <!--<h4 class="pull-right">$64.99</h4>-->
		                <h4><div style="width: 100; text-overflow: ellipsis; white-space: nowrap;overflow: hidden;">
							<a href= "<?= Yii::app()->basePath.'?r=site/viewapp&id='.$app->id?>"><?= $app->name;?></a>
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
    	            </div>
    	        </div>
			</div>
		</div>



<?php		
		endforeach;
?>
    
</div>

</div>
<!-- Home page -->
<div class="container">
<?php 
	$categories = Categories::model()->findAllByAttributes(array('status'=>'1'));
	foreach ( $categories as $category ):

		//echo $category->title."<br>";

?>
<?php	$options = array('id' => $category->id);?>

<h2><a href=" <?php echo $this->createUrl('site/viewCategoryApps',$options); ?>" class="column"><?= $category->title;?></a></h2>
<a href=" <?php echo $this->createUrl('site/viewCategoryApps',$options); ?>" class="column">
<button type="button" style="float:right;">See more</button>
</a>
	
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
			<div class="col-sm-2 col-lg-2 col-md-2">
		        <div class="thumbnail"><a href="<?= Yii::app()->basePath.'?r=site/viewapp&id=,$options'.$app->id ?>">
					<?php $image = (Yii::app()->baseUrl.'/images/'.$app->logo) ; ?>
	
    	            <img src= "<?= $image; ?>"  alt="" style="width:80%;height:60%">
    	            <div class="caption">
    	                  <!--<h4 class="pull-right">$64.99</h4>-->
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


    <!-- jQuery Version 1.11.0 -->
    <script src="js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>


