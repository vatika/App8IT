<?php

class ApplicationsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete', // we only allow deletion via POST request
			    );
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
				array('allow',  // allow all users to perform 'index' and 'view' actions
					'actions'=>array('index','view','create','admin','updateApp','update','viewCategoryApps'),
					'roles'=>array('developer'),
				     ),
				array('allow',  // allow all users to perform 'index' and 'view' actions
					'actions'=>array('index','view','admin','pendingrev','viewCategoryApps'),
					'roles'=>array('qa analyst'),
				     ),

				array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('view','delete','admin','index','update','pendingdev','pendingrev','viewCategoryApps'),
					'roles'=>array('admin'),
				     ),
				     
				array('deny',
					'users'=>array('*'),
				     )
			    );
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$user = Users::model()->findbyPk(Yii::app()->user->id);
		$entry_versions =  Versions::model()->findAllByAttributes(array('application_id' => $id));
		$t = 0;
		foreach( $entry_versions as $temp ):
			if ( $temp->id > $t )// && ($temp->status_id != 2))
			$t = $temp->id;
		endforeach;
		$entry_versions =  Versions::model()->findbyPk($t);	
		$app = Applications::model()->findByAttributes(array('id' => $id));	
		if ( $user->role_id == 1){

			if(isset($_POST['button1']))
			{
				$app->status = 1;
				$app->update();

				$this->render('view',array(
							'model'=>$this->loadModel($id),
							));
			}
			else if(isset($_POST['button2']))
			{
				$app->status = 0;
				$app->update();

				$this->render('view',array(
							'model'=>$this->loadModel($id),
							));

			}	
			else{
				$this->render('view',array(
							'model'=>$this->loadModel($id),
							));
			}

		}
		else{
			$this->render('view',array(
						'model'=>$this->loadModel($id),
						));
		}
	}

	public function actionViewCategoryApps($id)
	{
				//$application = Applications::model()->findbyPk($id);
				//$cat_id= $application ->category_id;
				$this->render('viewCategoryApps',array('id'=>$id));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		try{
			$model = new Applications;
			$entry = new Versions;
			// Uncomment the following line if AJAX validation is needed
			$this->performAjaxValidation($model);
                        $this->performAjaxValidation($entry);
                        
                        $img_add = new MediaFiles;
                   
			if(isset($_POST['Applications']) && isset($_POST['Versions']) )
			{
				$entry->attributes = $_POST['Versions'];
				$model->attributes = $_POST['Applications'];
				$model->user_id = Yii::app()->user->id;
				$model->status = 0 ;//default
				$model->ndownloads  = 0 ;//default
				$model->disabled_comments = "Not approved by reviewer";
				$entry->create_date = date_create()->format('Y-m-d H:i:s');;
				$model->logo = 	CUploadedFile::getInstance($model,'logo');
				$entry->file_name = CUploadedFile::getInstance($entry,'file_name');
				$entry->reviewer_id=1;
				$entry->status_id = 1; //default
				$test = 1;

				if ( $model->save()  ){
					$entry->application_id =$model->id;
					$photos = CUploadedFile::getInstancesByName('photos');
				
						if( $entry->save() ) {
							if (!is_dir(Yii::app()->basePath.'/../data')) {
           						mkdir(Yii::app()->basePath.'/../data');
           					}
							if (!is_dir(Yii::app()->basePath.'/../data/'.$model->name)) {
           					    mkdir(Yii::app()->basePath.'/../data/'.$model->name);
           					    mkdir(Yii::app()->basePath.'/../data/'.$model->name.'/Logo');
           					    mkdir(Yii::app()->basePath.'/../data/'.$model->name.'/MediaFiles');
       					    
       					    }
							if (!is_dir(Yii::app()->basePath.'/../data/'.$model->name.'/'.$entry->version)) {
           					    mkdir(Yii::app()->basePath.'/../data/'.$model->name.'/'.$entry->version);
           					     mkdir(Yii::app()->basePath.'/../data/'.$model->name.'/'.$entry->version.'/Code');
       					    
       					    }
            
							$model->logo->saveAs(Yii::app()->basePath.'/../data/'.$model->name.'/Logo/'.$model->logo);
							$entry->file_name->saveAs(Yii::app()->basePath.'/../data/'.$model->name.'/'.$entry->version.'/Code/'.$entry->file_name);
							if (isset($photos) && count($photos) > 0) {
		 		                foreach ($photos as $image => $pic) {
		        		     	    if($pic->saveAs(Yii::app()->basePath.'/../data/'.$model->name.'/MediaFiles/'.$pic->name)){
			                       		$img_add = new MediaFiles;
		                        		$img_add->filename = $pic->name; //it might be $img_add->name for you, filename is just what I chose to call it in my model
		                        		$img_add->application_id = $model->id; 
		                        		$img_add->type = 'image';
		                        		$img_add->status = '0';
		                        		$img_add->create_date = date_create()->format('Y-m-d H:i:s');// this links your picture model to the main model (like your user, or profile model)
		                        	//	echo $pic->name;
		                        		try { $img_add->save(); unset($img_add);}
		                        		catch(Exception $e){

		                        			echo $e->getMessage();
		                        		}
		        	            	}
		                		}
	                		}

						$cats =  CategoryReviewerMapping::model()->findAllByAttributes(array('category_id' => $model->category_id));
						$rev = [];
						$count = 0;
						foreach($cats as $x):
							$u = Users::model()->findbyPk($x->user_id);
							if($u->status == 1){			
								$rev[$x->user_id] = 0;
								$count+=1;	
							}
						endforeach;
						$category = Versions::model()->findAllByAttributes(array('status_id' => 1));
						if( $count != 0){
							foreach($category as $x):
								if( array_key_exists($x->reviewer_id , $rev)){
									$rev[$x->reviewer_id] += 1;
								}
							endforeach;
							$rev = array_keys($rev, min($rev));
							$entry->reviewer_id = $rev[0];
						}
						else
							$entry->reviewer_id = 1; //assuming single admin
						$entry->update();
						$this->redirect(Yii::app()->createUrl('/applications/view', array('id' => $model->id)));

				
					}
					else {
						$model->delete();
						$entry->delete();
						//	$media->delete();
						//	$entry->delete();	
						$this->render('create',array(
									'model'=>$model,'entry'=>$entry
									));
					}

				}
				else {
				//	$model->delete();
					
					$this->render('create',array(
								'model'=>$model,'entry'=>$entry
								));
				}
			}
			else{
				$this->render('create',array(
							'model'=>$model,'entry'=>$entry
							));

			}
		}
		catch(Exception $e){
			echo $e->getMessage();
			?><br><h1><?php	echo "Application with name ".$model->name." already exists!" ; ?> </h1><?php
				$this->render('create',array(
							'model'=>$model,'entry'=>$entry
							));

		}
	}
	public function actionUpdateApp($id = 0)
	{	
			$model = new Applications;
			$entry = new Versions;
			$mfile=new MediaFiles('search');
			$photos = CUploadedFile::getInstancesByName('photos');
			$app = Applications::model()->findbyPk($id);
			$this->performAjaxValidation($entry);
		try{
			if(isset($_POST['Applications']) && isset($_POST['Versions']))
			{
				if (isset($photos) && count($photos) > 0) {
							if (!is_dir(Yii::app()->basePath.'/../data')) {
           						mkdir(Yii::app()->basePath.'/../data');
           					}
							if (!is_dir(Yii::app()->basePath.'/../data/'.$app->name)) {
           					    mkdir(Yii::app()->basePath.'/../data/'.$app->name);
           					    mkdir(Yii::app()->basePath.'/../data/'.$app->name.'/MediaFiles');
       					    
       					    }
				//	echo 'Shikha';
		 		                foreach ($photos as $image => $pic) {
		        		     	    if($pic->saveAs(Yii::app()->basePath.'/../data/'.$app->name.'/MediaFiles/'.$pic->name)){
			                       		$img_add = new MediaFiles;

		                        		$img_add->filename = $pic->name; //it might be $img_add->name for you, filename is just what I chose to call it in my model
		                        		$img_add->application_id = $app->id; 
		          //              		echo $img_add->application_id;
		                        		$img_add->type = 'image';
		                        		$img_add->status = '0';
		                        		$img_add->create_date = date_create()->format('Y-m-d H:i:s');// this links your picture model to the main model (like your user, or profile model)
		                        	//	echo $pic->name;
		                        		try { $img_add->save(); unset($img_add);}
		                        		catch(Exception $e){

		                        			echo $e->getMessage();
		                        		}
		        	            	}
		                		}
	                		}

				$model->attributes = $_POST['Applications'];
				$entry->attributes = $_POST['Versions'];
				$entry->reviewer_id = 1;
				$entry->create_date = date_create()->format('Y-m-d H:i:s');
				$entry->file_name = CUploadedFile::getInstance($entry,'file_name');
				$entry->status_id = 1; 
				$entry->application_id = $model->name;
				if ( $entry->save() ){
					$entry->file_name->saveAs(Yii::app()->basePath.'/../code/'.$entry->file_name);
					$this->redirect(Yii::app()->user->returnUrl);
				}
				else{
					$this->render('updateApp',array(
								'id'=>$id,'model'=>$model,'entry'=>$entry,'mfile'=>$mfile,
								));
					}
			}
			else{
				$mfile->unsetAttributes();  // clear any default values
				if(isset($_GET['MediaFiles']))
					$mfile->attributes=$_GET['MediaFiles'];

				$this->render('updateApp',array(
							'id'=>$id,'model'=>$model,'entry'=>$entry,'mfile'=>$mfile,
							));
			}

		}
	  	catch(Exception $e){
              //      echo $e->getMessage();
                    ?><br><h1><?php echo "The application with same version already exists!" ; ?> </h1><?php
                            $this->render('updateApp',array(
						'id'=>$id,
                                                    'model'=>$model,'entry'=>$entry,'mfile'=>$mfile,
                                                    ));
            }
	}

	 	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
		 */




	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Applications']))
		{
			$model->attributes=$_POST['Applications'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
					'model'=>$model,
					));
	}
	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
        {
                $app = $this->loadModel($id);
                $app->status=2;
                $app->update();
                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser 
//              if(!isset($_GET['ajax'])) 
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }



	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Applications');
		$this->render('index',array(
					'dataProvider'=>$dataProvider,
					));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Applications('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Applications']))
			$model->attributes=$_GET['Applications'];

		$this->render('admin',array(
					'model'=>$model,
					));
	}
	public function actionPendingdev()
	{
		$model=new Applications('searchpendingdev');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Applications']))
			$model->attributes=$_GET['Applications'];

		$this->render('pendingdev',array(
					'model'=>$model,
					));
	}
	public function actionPendingrev()
	{
		$model=new Applications('searchpendingrev');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Applications']))
			$model->attributes=$_GET['Applications'];

		$this->render('pendingrev',array(
					'model'=>$model,
					));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Applications the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Applications::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Applications $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='applications-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
		}
