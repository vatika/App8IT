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
		public function actionViewCategoryApps($id)
	{
				//$application = Applications::model()->findbyPk($id);
				//$cat_id= $application ->category_id;
				$this->render('viewCategoryApps',array('id'=>$id));
	}
	public function actionViewapp($applicationId){
        echo "hello";
        echo $applicationId;
        /*
        Yii::app()->end();
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
		{
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
                            $this->render('viewapp',array('model'=>$model,'applicationDownloads'=>$entry,"applicationId"=>$applicationId));
		}
		// collect user input data
		if(isset($_POST['ApplicationDownloads']))
		{
			$entry->attributes=$_POST['ApplicationDownloads'];
                       // $entry->application_id=$applicationId;
                        $entry->user_id=Yii::app()->user->id;
                        $entry->download_date=date_create()->format('Y-m-d H:i:s');
                        $appVersion = Yii::app()->db->createCommand("SELECT id FROM versions WHERE application_id=".$applicationId." ORDER BY id DESC")->queryAll();
            			$entry->application_id=$applicationId;            
                        $entry->version_id=$appVersion[0]["id"];
                        if($entry->save()){
                            $this->render('viewapp',array('model'=>$model,'applicationDownloads'=>$entry,"applicationId"=>$applicationId));
                        }
                        else{// will not go here in normal conditions 	
                            $this->render('viewapp',array('model'=>$model,'applicationDownloads'=>$entry,"applicationId"=>$applicationId));
                        }
                }                                   
		// display the login form
                
		$this->render('viewapp',array('model'=>$model,'entry'=>$entry,"applicationId"=>$applicationId));
                  // $this->render("viewapp",
                    //    array('applicationId'=>$applicationId,
                      //      ));/
                      */
        }

}
