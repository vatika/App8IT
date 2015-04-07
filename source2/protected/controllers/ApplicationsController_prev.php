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
					'actions'=>array('index','view','create','admin','updateApp'),
					'roles'=>array('developer'),
				     ),
				array('allow',  // allow all users to perform 'index' and 'view' actions
					'actions'=>array('index','view','admin','pendingrev'),
					'roles'=>array('qa analyst'),
				     ),

				array('allow', // allow authenticated user to perform 'create' and 'update' actions
					'actions'=>array('view','delete','admin','index','update','pendingdev','pendingrev'),
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
		if ( $user->role_id == 3 && $entry_versions->status_id == 1 ){

			if(isset($_POST['button1']))
			{
				$entry_versions->status_id = 2;
				$entry_versions->update();
				$app->status=1;
				$app->update();
				$this->render('admin',array(
							'model'=>$this->loadModel($id),
							));

			}
			else if(isset($_POST['button2']))
			{
				$entry_versions->status_id = 3;
				$entry_versions->update();	
				$this->render('admin',array(
							'model'=>$this->loadModel($id),
							));

			}	
			else{
				$this->render('view',array(
							'model'=>$this->loadModel($id),
							));
			}

		}
		else if ( $user->role_id == 1){

			if(isset($_POST['button1']))
			{
				$app->status = 1;
				$entry_versions->status_id = 4;
				$entry_versions->update();
				$app->update();

				$this->render('admin',array(
							'model'=>$this->loadModel($id),
							));
			}
			if(isset($_POST['button2']))
			{
				$entry_versions->status_id = 5;
				$entry_versions->update();
				$this->render('admin',array(
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


	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		try{
			$model = new Applications;
			$entry = new Versions;
			$media = new MediaFiles;
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);
			if(isset($_POST['Applications']) && isset($_POST['Versions']) && isset($_POST['MediaFiles']))
			{
				$entry->attributes = $_POST['Versions'];

				$model->attributes = $_POST['Applications'];
				$media->attributes = $_POST['MediaFiles'];
				$model->user_id = Yii::app()->user->id;
				$model->status = 0 ;//default

				$model->ndownloads  = 0 ;//default
				$model->disabled_comments = "Not approved by reviewer";
				$entry->create_date = date_create()->format('Y-m-d H:i:s');;
				$media->create_date = date_create()->format('Y-m-d H:i:s');

				$model->logo = 	CUploadedFile::getInstance($model,'logo');
				$entry->file_name = CUploadedFile::getInstance($entry,'file_name');
				$media->filename = CUploadedFile::getInstance($media,'filename');
				$entry->reviewer_id=1;
				$entry->status_id = 1; //default
				$media->status = '0';	
				$test = 1;
				if ( $model->save()  ){
					$media->application_id = $model->id;
					$entry->application_id =$model->id;
					if ( $media->save() )
					{ 
						if( $entry->save() ) {
							$model->logo->saveAs(Yii::app()->basePath.'/../images/'.$model->logo);
							$entry->file_name->saveAs(Yii::app()->basePath.'/../code/'.$entry->file_name);
							$media->filename->saveAs(Yii::app()->basePath.'/../code/'.$media->filename);

							$cats =  CategoryReviewerMapping::model()->findAllByAttributes(array('category_id' => $model->category_id));
							$rev = [];
							$count = 0;
							foreach($cats as $x):
								$rev[$x->user_id] = 0;
							$count+=1;	
							endforeach;

							$category = Versions::model()->findAllByAttributes(array('status_id' => 1));
							foreach($category as $x):
								if( array_key_exists($x->reviewer_id , $rev)){
									$rev[$x->reviewer_id] += 1;
								}
							endforeach;
							$rev = array_keys($rev, min($rev));
							$entry->reviewer_id = $rev[0];				
							$entry->update();
							$this->redirect(Yii::app()->createUrl('/applications/view', array('id' => $model->id)));

						}  
						else {
							$model->delete();
							$media->delete();
							$this->render('create',array(
										'model'=>$model,'entry'=>$entry,'media'=>$media
										));
						}

					}
					else {
						$model->delete();
						//	$media->delete();
						//	$entry->delete();	
						$this->render('create',array(
									'model'=>$model,'entry'=>$entry,'media'=>$media
									));
					}

				}


				else {

					$this->render('create',array(
								'model'=>$model,'entry'=>$entry,'media'=>$media
								));
				}



			}
			else{
				$this->render('create',array(
							'model'=>$model,'entry'=>$entry,'media'=>$media
							));

			}

		}
		catch(Exception $e){
			echo $e->getMessage();
			?><br><h1><?php	echo "Application with name ".$model->name." already exists!" ; ?> </h1><?php
				$this->render('create',array(
							'model'=>$model,'entry'=>$entry,'media'=>$media
							));

		}
	}
	public function actionUpdateApp($id = 0)
	{	
			$model = new Applications;
			$entry = new Versions;
			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);
		try{
			if(isset($_POST['Applications']) && isset($_POST['Versions']))
			{
				$model->attributes = $_POST['Applications'];
				$entry->attributes = $_POST['Versions'];
				$entry->reviewer_id = 1; //default admin
				$entry->create_date = date_create()->format('Y-m-d H:i:s');
				$entry->file_name = CUploadedFile::getInstance($entry,'file_name');
				$entry->status_id = 1; //default
				$entry->application_id = $model->name;
				if ( $entry->save() ){
					$entry->file_name->saveAs(Yii::app()->basePath.'/../code/'.$entry->file_name);
					$this->redirect(Yii::app()->user->returnUrl);
				}
				else{
					$this->render('updateApp',array(
								'id'=>$id,'model'=>$model,'entry'=>$entry,
								));

				}

			}
			else{
				$this->render('updateApp',array(
							'id'=>$id,'model'=>$model,'entry'=>$entry,
							));

			}

		}
		  catch(Exception $e){
                  //      echo $e->getMessage();
                        ?><br><h1><?php echo "The application with same version already exists!" ; ?> </h1><?php
                                $this->render('updateApp',array(
							'id'=>$id,
                                                        'model'=>$model,'entry'=>$entry
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

		echo "HELL";
		$app = Applications::model()->findbyPk($id);
		$app->status=2;
		$app->update();

		echo "HELL";
		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
//		if(!isset($_GET['ajax']))
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
