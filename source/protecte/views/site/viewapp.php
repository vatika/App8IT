<style>
    .margin{
        margin-top:3%;
        margin-bottom:3%;
    }   
</style>
<?php   

$this->pageTitle=Yii::app()->name . ' - Viewapp';

$connection=Yii::app()->db;
$sqlStatement="SELECT * FROM applications WHERE id=".$applicationId;
$command=$connection->createCommand($sqlStatement);
$dataReader=$command->query(); // execute a query SQL
//print_r($dataReader); 
//echo "<BR>";
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
//echo "<BR>";
//variables from query of user query
//echo "<BR>  ".$id." <BR>";
//$connection=Yii::app()->db;
$sqlDeveloper="SELECT * FROM users WHERE id=".$row["user_id"]." AND role_id=2";
//echo $sqlDeveloper."<BR>";

$command=$connection->createCommand($sqlDeveloper);
$dataReader2=$command->query();
//print_r($dataReader2);
foreach($dataReader2 as $row){
    //print_r($row);
  //  echo "<BR>";
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


$sqlComments="SELECT comment ,user_id FROM comments WHERE application_id=".$id;
//echo $sqlComments."<BR>";
$command=$connection->createCommand($sqlComments);
$dataReader2=$command->queryAll();
//print_r($dataReader2);
$comments=[];
$users=[];
$comment_count=0;
foreach($dataReader2 as $row){
//    print_r($row);
    $users[$comment_count]=$row["user_id"];
    $comments[$comment_count++]=$row["comment"];
  //  echo "<BR>";
}

$sqlLatestVerion="SELECT id , version ,file_name FROM versions WHERE application_id=".$id." ORDER BY id DESC";
//echo $sqlComments."<BR>";
$command=$connection->createCommand($sqlLatestVerion);
$dataReader2=$command->queryAll();
print_r($dataReader2);
echo "<br>";
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
    echo $current_user_id;
}
$sqlDownloadState="SELECT * FROM application_downloads WHERE application_id=".$id." AND user_id=".$current_user_id." ORDER BY id DESC";
echo $sqlDownloadState."<BR>";
$command=$connection->createCommand($sqlDownloadState);
$dataReader2=$command->queryAll();
//print_r($dataReader2);
$download_state="Install"; 
foreach($dataReader2 as $row2){
  print_r($row2);
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
</div>



<SCRIPT>
$(document).ready(function(){
    var showChar=1000;
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
</SCRIPT>
<STYLE>    
    .morecontent span{
        display:none
    }
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
