<?php   

$this->pageTitle=Yii::app()->name . ' - Viewapp';
$connection=Yii::app()->db;
$sqlStatement="SELECT * FROM applications WHERE id=".$applicationId;
$command=$connection->createCommand($sqlStatement);
$dataReader=$command->query(); 
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
$sqlDeveloper="SELECT * FROM users WHERE id=".$row["user_id"]." AND role_id=2";

$command=$connection->createCommand($sqlDeveloper);
$dataReader2=$command->query();
//print_r($dataReader2);
foreach($dataReader2 as $row){
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
//    echo $current_user_id;
$sqlDownloadState="SELECT * FROM application_downloads WHERE application_id=".$id." AND user_id=".$current_user_id." ORDER BY id DESC";
$command=$connection->createCommand($sqlDownloadState);
$dataReader2=$command->queryAll();
//print_r($dataReader2);
$download_state="Install"; 
foreach($dataReader2 as $row2){
  //print_r($row2);
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
}
else{
    $current_user_id=-1;
    $download_state="Install";
}
//echo Yii::app()->basePath.'/../data/'.$name.'/'.$latest_version.'/Code/'.$file_name;
?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <div class="list-group">
                    <a href="#" class="list-group-item active">Category 1</a>
                    <a href="#" class="list-group-item">Category 2</a>
                    <a href="#" class="list-group-item">Category 3</a>
                </div>
            </div>

            <div class="col-md-9">

                <div class="thumbnail">
                <?php $image = (Yii::app()->baseUrl.'/images/'.$logo) ; ?>
                    <img class="img-responsive" src="<?= $image; ?>"">
                    <div class="caption-full">
                        <h4 class="pull-right">$24.99</h4>
                        <h4><a href="#"> <?php  echo $name; ?></a>
                        </h4>
                        <p>See more snippets like these online store reviews at <a target="_blank" href="http://bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
                        <p>Want to make these reviews work? Check out
                            <strong><a href="http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/">this building a review system tutorial</a>
                            </strong>over at maxoffsky.com!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">3 reviews</p>
                        <p>
                            <form>
    
                            <br>
                            <input id="input-21d" value="0" type="number" class="rating" min=0 max=5 step=0.5 data-size="sm">
                            <br>
    
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-default">Reset</button>
    
                            </form>

                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            4.0 stars
                        </p>
                    </div>
                </div>

                <div class="well">

                    <div class="text-right">
                        <a class="btn btn-success">Leave a Review</a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">10 days ago</span>
                            <p>This product was great in terms of quality. I would definitely buy another!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">12 days ago</span>
                            <p>I've alredy ordered another one!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">15 days ago</span>
                            <p>I've seen some better than this, but not at this price. I definitely recommend this item.</p>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </div>

<script>
    jQuery(document).ready(function () {
        $("#input-21f").rating({
            starCaptions: function(val) {
                if (val < 3) {
                    return val;
                } else {
                    return 'high';
                }
            },
            starCaptionClasses: function(val) {
                if (val < 3) {
                    return 'label label-danger';
                } else {
                    return 'label label-success';
                }
            },
            hoverOnClear: false
        });
        
        $('#rating-input').rating({
              min: 0,
              max: 5,
              step: 1,
              size: 'lg'
           });
           
        $('#btn-rating-input').on('click', function() {
            var $a = self.$element.closest('.star-rating');
            var chk = !$a.hasClass('rating-disabled');
            $('#rating-input').rating('refresh', {showClear:!chk, disabled:chk});
        });
        
        $('#rating-input').on('rating.change', function() {
            alert($('#rating-input').val());
        });
        
        
        $('.rb-rating').rating({'showCaption':true, 'stars':'3', 'min':'0', 'max':'3', 'step':'1', 'size':'xs', 'starCaptions': {0:'status:nix', 1:'status:wackelt', 2:'status:geht', 3:'status:laeuft'}});
    });
</script>