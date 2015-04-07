<style>
    .margin{
<<<<<<< HEAD
        margin-top:3%;
        margin-bottom:3%;
=======
        margin-top:2%;
        margin-bottom:2%;
>>>>>>> de4b83df6a6df93556ff084db6caed2f81f67b62
    }   
</style>
<?php   

$this->pageTitle=Yii::app()->name . ' - Viewapp';
<<<<<<< HEAD

$connection=Yii::app()->db;
$sqlStatement="SELECT * FROM applications WHERE id=".$applicationId;
$command=$connection->createCommand($sqlStatement);
$dataReader=$command->query(); // execute a query SQL
//print_r($dataReader); 
//echo "<BR>";
=======
$connection=Yii::app()->db;
$sqlStatement="SELECT * FROM applications WHERE id=".$applicationId;
$command=$connection->createCommand($sqlStatement);
$dataReader=$command->query(); 
>>>>>>> de4b83df6a6df93556ff084db6caed2f81f67b62
foreach ($dataReader as $row) {
   // print_r($row);echo "<BR>";
}

//print_r($row);
//variables from query of application query
$id=$row["id"];
$name=$row["name"];
$user_id=$row["user_id"];
$category_id=$row["category_id"];
$description=$row["description"];
$logo=$row["logo"];
$downloads=$row["ndownloads"];
<<<<<<< HEAD
//echo "<BR>";
//variables from query of user query
//echo "<BR>  ".$id." <BR>";
//$connection=Yii::app()->db;
$sqlDeveloper="SELECT * FROM users WHERE id=".$row["user_id"]." AND role_id=2";
//echo $sqlDeveloper."<BR>";
=======
$sqlDeveloper="SELECT * FROM users WHERE id=".$row["user_id"]." AND role_id=2";
>>>>>>> de4b83df6a6df93556ff084db6caed2f81f67b62

$command=$connection->createCommand($sqlDeveloper);
$dataReader2=$command->query();
//print_r($dataReader2);
foreach($dataReader2 as $row){
<<<<<<< HEAD
    //print_r($row);
  //  echo "<BR>";
=======
>>>>>>> de4b83df6a6df93556ff084db6caed2f81f67b62
}
$download_state="Installed";
$developer_name=$row["first_name"];
//echo $developer_name;

//variables from query of category query
$sqlCategories="SELECT title FROM categories WHERE id=".$category_id;
//echo $sqlCategories."<BR>";
$command=$connection->createCommand($sqlCategories);
$dataReader2=$command->query();
//print_r($dataReader2);
foreach($dataReader2 as $row){
    //print_r($row);
   // echo "<BR>";
}
$category_title=$row["title"];
//echo $category_title;

$sqlMedia="SELECT type,filename FROM media_files WHERE application_id=".$id;
//echo $sqlDeveloper."<BR>";
$command=$connection->createCommand($sqlMedia);
$dataReader2=$command->queryAll();
//print_r($dataReader2);
$media_files=[];
$media_type=[];
$media_count=0;
foreach($dataReader2 as $row){
  //  print_r($row);
    $media_files[$media_count]=$row["filename"];
    $media_type[$media_count++]=$row["type"];
  //  echo "<BR>";
}


<<<<<<< HEAD
$sqlComments="SELECT comment ,user_id FROM comments WHERE application_id=".$id;
=======
$sqlComments="SELECT * FROM comments WHERE application_id=".$id;
>>>>>>> de4b83df6a6df93556ff084db6caed2f81f67b62
//echo $sqlComments."<BR>";
$command=$connection->createCommand($sqlComments);
$dataReader2=$command->queryAll();
//print_r($dataReader2);
$comments=[];
$users=[];
<<<<<<< HEAD
=======
$date_reviewed=[];
>>>>>>> de4b83df6a6df93556ff084db6caed2f81f67b62
$comment_count=0;
foreach($dataReader2 as $row){
//    print_r($row);
    $users[$comment_count]=$row["user_id"];
<<<<<<< HEAD
    $comments[$comment_count++]=$row["comment"];
=======
    $comments[$comment_count]=$row["comment"];
    $date_reviewed[$comment_count++]=$row["date_reviewed"];
>>>>>>> de4b83df6a6df93556ff084db6caed2f81f67b62
  //  echo "<BR>";
}

$sqlLatestVerion="SELECT id , version ,file_name FROM versions WHERE application_id=".$id." ORDER BY id DESC";
//echo $sqlComments."<BR>";
$command=$connection->createCommand($sqlLatestVerion);
$dataReader2=$command->queryAll();
<<<<<<< HEAD
print_r($dataReader2);
echo "<br>";
=======

>>>>>>> de4b83df6a6df93556ff084db6caed2f81f67b62
foreach($dataReader2 as $row){
//    print_r($row["version"]);
    $latest_version=$row["version"];
    $latest_version_id=$row["id"];
    $file_name=$row["file_name"];
    break;
}

//$category_title=$row["title"];
//echo $category_title;
if(!Yii::app()->user->isGuest){
    $current_user_id=Yii::app()->user->id;
<<<<<<< HEAD
    echo $current_user_id;
}
$sqlDownloadState="SELECT * FROM application_downloads WHERE application_id=".$id." AND user_id=".$current_user_id." ORDER BY id DESC";
echo $sqlDownloadState."<BR>";
=======
//    echo $current_user_id;
$sqlDownloadState="SELECT * FROM application_downloads WHERE application_id=".$id." AND user_id=".$current_user_id." ORDER BY id DESC";
>>>>>>> de4b83df6a6df93556ff084db6caed2f81f67b62
$command=$connection->createCommand($sqlDownloadState);
$dataReader2=$command->queryAll();
//print_r($dataReader2);
$download_state="Install"; 
foreach($dataReader2 as $row2){
<<<<<<< HEAD
  print_r($row2);
=======
  //print_r($row2);
>>>>>>> de4b83df6a6df93556ff084db6caed2f81f67b62
 //  echo "<BR>";
   $download_date=$row2["download_date"];
   if($latest_version_id ==$row2["version_id"]){
       $download_state="Installed";
       
   } 
   else{
       $download_state="Update";
   }
    //  echo "<br>".$latest_version."<br>";
  // echo $row2["version"]."<br>";
   break;
}
<<<<<<< HEAD
echo Yii::app()->basePath.'/../data/'.$name.'/'.$latest_version.'/Code/'.$file_name;
?>
<hr/>
<div class="row clearfix margin" style="background-color: #E6E6E6">
    <br/>
        <div class="col-md-12 column">
                <div class="row clearfix">
                    <div class="col-md-1">
                    </div>
                        <div class="col-md-3 column">
                            <?php $image = (Yii::app()->baseUrl.'/images/'.$logo) ; ?>
                            <img class="img-rounded" src= "<?= $image; ?>"  alt="" style="width:60%;height:40%">
                            <br/><br/>
                        </div>
                        <div class="col-md-1 column">
                                <h2 class=" text-primary">
                                        <?php  echo $name; ?>
                                        
                                </h2>
              
<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'applicationdownloads-form',
        'enableAjaxValidation'=>true,
)); ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	

                     <a href='<?php echo Yii::app()->basePath.'/../data/'.$name.'/'.$latest_version.'/Code/'.$file_name;?>' class="btn btn-primary btn-lg" type="button"><?php echo $download_state;?></a>
                     <!--- install if user has not downloaded the app else say installed--->
              <!--- doubt--->                 <h1></h1>
        </div>      
<?php $this->endWidget(); ?>
</div><!-- form -->
      
                                <h7 class="text-primary">
                                          <?php echo $downloads;?>
                                        
                                </h7>

                  
                        </div>
                    <div class="col-md-4">
                    </div>
                        <div class="col-md-3 column">
                                <h2 class=" text-primary text-left">
                                        <?php  echo $category_title; ?>
                                </h2>
                            
                        </div>
                </div>
        </div>

</div>
<hr/>
<div class="row clearfix margin">
=======
}
else{
    $current_user_id=-1;
    $download_state="Install";
}
//echo Yii::app()->basePath.'/../data/'.$name.'/'.$latest_version.'/Code/'.$file_name;
?>


<hr/>


<div class="row">

		
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

        <div class="thumbnail">
                                       <?php $image = (Yii::app()->baseUrl.'/images/'.$logo) ; ?>
            <img class="img-rounded" src='<?= $image;?>' alt="bkjwvbkv">

            <div class="caption-full">
                <p class="pull-right">
                    
                    <div class="form">
                        <?php $form=$this->beginWidget('CActiveForm', array(
                                'id'=>'applicationdownloads-form',
                                'enableAjaxValidation'=>true,
                        )); ?>
                                <div class="row">
                                <?php echo $form->hiddenField($entry,'id',array('id'=>$current_user_id)) ?>
                                </div>

                                <div class="row buttons">
                                    <?php //echo Yii::app()->basePath.'/../data/'.$name.'/'.$latest_version.'/Code/'.$file_name;?>'
                                        <?php echo CHtml::submitButton($download_state,array('class'=>'centered pull-right rightmargin margin')); ?>
                                </div>

                        <?php $this->endWidget(); ?>
                    </div>

                    
                    
                <p>
                <h2 class=" text-primary">
                   <?php  echo $name; ?>
                </h2>
                <p class="text more margin"><!--- more class is defined as for content expansion and shrinking-->
                <?php echo nl2br($description); //nl2br is php function which insert "\n" as expected in html pages?>
                </p>
            </div>
            <div class="ratings">
                <p class="pull-right rightmargin "> <?php echo $downloads."  ";?><img src='<?php echo Yii::app()->baseUrl."../images/download-icon.png";?>' height="20" width="20" /></p>
                <p>
                         <form>
    
                            <br>
                            <input id="input-21d" value="0" type="number" class="rating" min=0 max=5 step=0.5 data-size="sm">
                            <br>
    
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
    
                            </form>
               </p>
            </div>
        </div>
        
<div class=" clearfix margin">
>>>>>>> de4b83df6a6df93556ff084db6caed2f81f67b62
                <?php foreach($media_files as $media_file){
                    $path_file= (Yii::app()->baseUrl.'/data/'.$name."/MediaFiles/".$media_file);
                   echo $path_file;
                    ?>
		<div class="col-md-2 column">
                    <?php
                    $regex="/^.*\.(mp4|mp3|mpeg|mpeg4|wmv|mkv|avi)$/"; //type of media files
                    if(!preg_match($regex,$path_file)){ ;?>          <!--- check if  it is a media file or a image file and display accordingly--->   
			<img class="img-thumbnail" alt="100*100" src="<?php $path_file;?>" style="width:80%;height:50%"/>
                    <?php }else{?>
                        <video width="320" height="240" controls>  <!--- width and height are to be set --->
                            <source src="<?php echo $path_file ;?>">
                            Your browser does not support the video tag.
                        </video>
                    <?php }?>
		</div>
                <?php } ?>
</div>
<<<<<<< HEAD
<hr/>
<div class="row clearfix margin">
        <div class="col-md-12 column">
            <h3 class=" text-primary">
                <?php 
                echo "DESCRIPTION";
                ?>
            </h3>
        </div>
        <div class="col-md-8 column">
                <p class="text-left text-success more"><!--- more class is defined as for content expansion and shrinking-->
                    <?php echo nl2br($description); //nl2br is php function which insert "\n" as expected in html pages?>
                </p>
        </div>
</div>
<hr/>

<hr/>
<div class="row clearfix margin">
    <div class="col-md-12 column">
                                <h3 class=" text-primary">
                                        <?php 
                                        if($comment_count) echo "REVIEWS";
                                        else echo "NO REVIEWS YET ";
                                        ?>
                                </h3>
                        </div>
        <div class="col-md-12 column">

                    <?php 
                    $i=0; 
                    foreach($comments as $comment){;
                    ?>
                    <div class="col-md-1 column"> 
                        <h4>    
                    <?php echo $comment;?>
                    </h4>
                    <h4>
                    <?php $user_name=  Users::model()->findbyPk($users[$i]);
                    echo $user_name->first_name;
                    $i++;?>
                    </h4>
                    </div>  
                    <?php    
                    }
                    ?> 
                    

        </div>
=======
        
        <div class="well">

            <div class="text-center">
                <a class="btn btn-success toggle-initator margin">Review</a>
                    <div class="form toggle" >
                    <?php $form=$this->beginWidget('CActiveForm', array(
                            'id'=>'comments-form',
                            'enableAjaxValidation'=>true,
                    )); ?>

                            <div class="row">
                                    <?php echo $form->textArea($model,'comment',array('class'=>"span6 centered",'placeholder'=>"Write your comment",'maxlength'=>300)); ?>
                            </div><div class="row">
                                    <?php echo CHtml::submitButton('Go',array('class'=>"span1 centered")); ?>                           
                            </div>
                    <?php $this->endWidget(); ?>
                    </div><!-- form -->
                    
            </div>

            <hr/>
            <?php $i=0;  foreach($comments as $comment){;?>
            <div class="row">
                <div class="col-md-12">
                    <img src='<?php echo Yii::app()->baseUrl.'/images/reviewers.jpg';?>' alt='<?php echo Yii::app()->baseUrl.'/images/reviewers.jpg'  ;?>' height='17' width='25'/>
                    <?php $user_name=  Users::model()->findbyPk($users[$i]);echo $user_name->first_name; ?>                   
                    <span class="pull-right">
                        <?php 
                        $date1 = new DateTime("now");
                        $date2=new DateTime($date_reviewed[$i]);
                        $interval=date_diff($date2,$date1);echo $interval->format('%a days');
                        ?>
                    </span>
                    <p class="more"><?php echo $comment;?></p>
                </div>                    
            </div>
            <hr/>
            <?php $i++; } ?> 
        </div>
    </div>
>>>>>>> de4b83df6a6df93556ff084db6caed2f81f67b62
</div>



<<<<<<< HEAD
<SCRIPT>
$(document).ready(function(){
    var showChar=1000;
=======

<SCRIPT>
$('.toggle').hide();    
$(document).ready(function(){
    var showChar=500;
>>>>>>> de4b83df6a6df93556ff084db6caed2f81f67b62
    var ellipsestext="........";
    var moretext="more";
    var lesstext="less";
    $('.more').each(function(){
        var content=$(this).html();
        if(content.length>showChar){
            var c=content.substr(0,showChar);
            var h=content.substr(showChar-1,content.length-showChar);
            var html=c+'<span class="moreelipses">'+ellipsestext+'</span>&nbsp;<span class="morecontent"><span>'+h+'</span>&nbsp;&nbsp;<a href="" class="morelink">'+moretext+'</a></span>';
            $(this).html(html);
        }
    });
    $(".morelink").click(function(){
    if($(this).hasClass("less")){
        $(this).removeClass("less");
        $(this).html(moretext);
    }
    else{
        $(this).addClass("less");
        $(this).html(lesstext);
    }
$(this).parent().prev().toggle();$(this).prev().toggle();
return false;
});
});
<<<<<<< HEAD
=======
$(document).ready(function(){
    $('.toggle-initator').click(function(){
        $('.toggle').toggle();
    });
});
>>>>>>> de4b83df6a6df93556ff084db6caed2f81f67b62
</SCRIPT>
<STYLE>    
    .morecontent span{
        display:none
    }
<<<<<<< HEAD
</STYLE>


<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comments-form',
        'enableAjaxValidation'=>true,
)); ?>

	<div class="row">
		<?php echo $form->label($model,'comment'); ?>
		<?php echo $form->textField($model,'comment'); ?>
		<?php echo $form->error($model,'comment'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
=======
    .rightmargin{
        margin-right: 5%
    }
</STYLE>

>>>>>>> de4b83df6a6df93556ff084db6caed2f81f67b62
