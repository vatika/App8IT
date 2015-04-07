<style>
    .margin{
        margin-top:3%;
        margin-bottom:3%;
    }
</style>
<?php   
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

//$category_title=$row["title"];
//echo $category_title;
?>



<hr/>
<div class="row clearfix margin" style="background-color: #E6E6E6">
    <br/>
        <div class="col-md-12 column" >
                <div class="row clearfix">
                    <div class="col-md-1">
                    </div>
                        <div class="col-md-3 column">
                            <?php $image = (Yii::app()->baseUrl.'/images/'.$logo) ; ?>
                            <img class="img-rounded" src= "<?= $image; ?>"  alt="" style="width:60%;height:40%">
                            <br/><br/>
                        </div>
                        <div class="col-md-5 column">
                                <h2 class=" text-primary">
                                        <?php  echo $name; ?>
                                        
                                </h2>
                               <a href="#" class="btn btn-primary btn-lg" type="button">Install</a>
                               <h1></h1>
                               <h7 class="text-primary">
                                        <?php echo $downloads;?>
                                        
                                </h7>
    
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
                  //  echo $path_file;
                    ?>
		<div class="col-md-2 column">
			<img class="img-thumbnail" alt="100*100" src="<?php $path_file;?>" style="width:80%;height:50%"/>
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
        <div class="col-md-12 column">
                <p class="text-left text-success">
                    <?php echo $description; ?>
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
                    <div class="col-md-2 column"> 
                        <h4>    
                    <?php echo $comment;?>
                    </h7>
                    <h4>
                    <?php $user_name=  Users::model()->findbyPk($users[$i]);
                    echo $user_name->first_name;
                    $i++;?>
                    </h5>
                    <?php    
                    }
                    ?> 
                    </div>

        </div>
</div>
<hr/>



