<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
        public function actionViewapp($id){
       $applicationId=$id;
          //try{
               // echo '<br><br>Hello';
                //echo "<BR>".Yii::app()->homeUrl."?r=applications/viewapp.php";
             
                //Yii::app()->end();
            //}
            //catch(CDbException  $e){
              //$this->redirect(Yii::app()->homeUrl);   
            //}		$model=new ApplicationDownloads;

		// Uncomment the following line if AJAX validation is needed
                //$this->performAjaxValidation($model);
                $entry=new ApplicationDownloads;
                //$ratings=new Ratings;
                $model=new Comments;
                //$this->performAjaxValidation($model);
		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='comments-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		// collect user input data
		if(isset($_POST['Comments']))
		{//echo "here3";
                  //  print_r($model->attributes);
                    //echo "<br>sdjjvnsj<br>";
			$model->attributes=$_POST['Comments'];
                        $model->application_id=$applicationId;
                        $model->status=1;
                        $model->user_id=Yii::app()->user->id;
                        $model->date_reviewed=date_create()->format('Y-m-d H:i:s');
                        //echo "here";
                        // print_r($model->attributes);
			// validate user input and redirect to the previous page if valid
			if($model->save())
                            $this->render('viewapp',array('model'=>$model,'entry'=>$entry,"applicationId"=>$applicationId));
                        else{
                            $this->redirect("?r=site/login");
                        }
                        Yii::app()->end();
		}
		// collect user input data
		if(isset($_POST['ApplicationDownloads']))
		{
                    $connection=Yii::app()->db;
                    $sqlLatestVerion="SELECT id , version ,file_name FROM versions WHERE application_id=".$applicationId." ORDER BY id DESC";
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
                    
                    $connection=Yii::app()->db;
                    $sqlStatement="SELECT * FROM applications WHERE id=".$applicationId;
                    $command=$connection->createCommand($sqlStatement);
                    $dataReader=$command->query(); 
                    foreach ($dataReader as $row) {
                       // print_r($row);echo "<BR>";
                    }
                    $name=$row["name"];
                    
                    $filePath= Yii::app()->baseUrl.'/data/'.$name.'/'.$latest_version.'/Code/'.$file_name;
                    if(!Yii::app()->user->isGuest){
			$entry->attributes=$_POST['ApplicationDownloads'];
                        $entry->application_id=$applicationId;
                        $entry->user_id=Yii::app()->user->id;
                        $entry->download_date=date_create()->format('Y-m-d H:i:s');
                        $appVersion = Yii::app()->db->createCommand("SELECT id FROM versions WHERE application_id=".$applicationId." ORDER BY id DESC")->queryAll();
                        $entry->version_id=$appVersion[0]["id"];
                        //$applications=Yii::app()->db->createCommand("SELECT * FROM applications WHERE id=".$applicationId)->queryAll();
                        //print_r($applications);
                        $applications=Applications::model()->findByPk($applicationId);
                        //print_r($applications);
                        //Yii::app()->end();
                        $applications["ndownloads"]=$applications["ndownloads"]+1;
                        try{
                       ///     echo "here";
                          //  Yii::app()->end();
                            if($entry->save() && $applications->update()) {
                              //  $this->redirect(Yii::app()->user->returnUrl);
                               header('Content-Disposition: attachment; filename="' . $name . '"');
                              
                    header('Content-Transfer-Encoding: binary');
                //    header('Content-Length: ' . filesize($tempFile)); // not required
                    header('Accept-Ranges: bytes'); 
                    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
                    header('Pragma: public');
                    //echo $filePath;
                    //Yii::app()->end();
                    //readfile($filePath);
                      //          Yii::app()->end();
                                
                                $this->render('viewapp',array('model'=>$model,'entry'=>$entry,"applicationId"=>$applicationId));
                            }
                            else{
                  //              Yii:app()->end();
                                $this->render('login',array('model'=>$model,'entry'=>$entry,"applicationId"=>$applicationId));
                            }
                        }
                        catch (Exception  $e){
                 //           echo "here";
                   //         Yii::app()->end();
                     //       $this->redirect(Yii::app()->user->returnUrl);
                               
                                $this->render('viewapp',array('model'=>$model,'entry'=>$entry,"applicationId"=>$applicationId));
                        }
                    }
                    else {
                            $this->redirect("?r=site/login");
                    }
                    Yii::app()->end();
                }                                   
		// display the login form
                //echo "yyvhjbhjb";
		$this->render('viewapp',array('model'=>$model,'entry'=>$entry,"applicationId"=>$applicationId));
                  // $this->render("viewapp",
                    //    array('applicationId'=>$applicationId,
                      //      ));
        }
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
			{
				$this->redirect(Yii::app()->user->returnUrl);	
			}
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}
	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
