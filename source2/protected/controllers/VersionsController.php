<?php

class VersionsController extends Controller
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
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','viewall'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','viewall'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{

		$model = new Versions;
		$this->performAjaxValidation($model);
		$version = Versions::model()->findbyPk($id);
		if( !empty($version ))
		$app = Applications::model()->findbyPk($version->application_id);

		
		if(isset($_POST['comment']) )
		{
			$version->comment = $_POST['comment'];
			if ( isset($_POST['checklist']))
			{	
				$version->activity = '';
				//echo 'hello';
				$var = array();
				$list = ChecklistCategoryMap::model()->findAllByAttributes(array('category_id' => $app->category_id));
				$count = 0;
				foreach( $list as $l):
					$check = Checklists::model()->findbyPk($l->checklist_id);
				if( $check->status==1 ){
					$var[$count++] = $l;
				}
				endforeach;
				$temp =  $_POST['checklist'];
				$tempCount = 0;	
				for($i=0;$i<count($temp);$i++)
				{
					if(isset($temp[$i]))
					{
						$tempData[$tempCount] = intval($temp[$i])+1;
						$get_checklist = Checklists::model()->findbyPk($temp[$i]);
						$version->activity  = $version->activity. ",".$get_checklist->title;
					}
				}
				$i = 0;
				if ( isset($temp) && count($temp) > 0 ){
					foreach( $temp as $ent => $checklistEntry ){
						$m = new ChecklistAnalystMapping;	
						$m->setIsNewRecord(true);
						$m->analyst_id = Yii::app()->user->id;
						$m->checklist_id = $temp[$i++];
						$m->version_id = $id;
						$m->create_date = date_create()->format('Y-m-d H:i:s');
						try{
							$m->save();
							unset($m);
						}
						catch(Exception $e){
							echo $e->getMessage();
						}
						$count = $count - 1;
				//		echo intval($checklistEntry)+1;
					}

				}
				if(isset($_POST['button1']) && $count == 0)
				{
					if( Yii::app()->user->id == $version->reviewer_id )
						$version->status_id = 2;
					else
						$version->status_id = 4;

					$version->update();
					$app->status=1;
					$app->update();
					$this->render('view',array(
								'model'=>$this->loadModel($id),
								));

				}
				else if(isset($_POST['button2']))
				{
					if( Yii::app()->user->id == $version->reviewer_id )
						$version->status_id = 3;
					else
						$version->status_id = 5;
					$version->update();      
					$this->render('view',array(
								'model'=>$this->loadModel($id),
								));

				}
				else{
					if( $count != 0 )
						echo "<h1>Some checklists not covered</h1>";
					$this->render('view',array(
								'model'=>$this->loadModel($id),
								));
				}

			}
		}
		else{
			$this->render('view',array(
						'model'=>$this->loadModel($id),
						));
		}
	}

	public function actionViewall($id)
	{
		$versions = Versions::model()->findAllByAttributes(array('application_id'=>$id));

		$this->render('viewall',array(
					'model'=>$this->loadModel($versions[0]->id),'versions'=>$versions
					));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$entry=new Versions;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Versions']))
		{
			$entry->attributes=$_POST['Versions'];
			if($entry->save())
				$this->redirect(array('view','id'=>$entry->id));
		}

		$this->render('create',array(
			'entry'=>$entry,
		));
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
		$this->performAjaxValidation($model);

		if(isset($_POST['Versions']))
		{
			$model->attributes=$_POST['Versions'];
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
                $app = Applications::model()->findbyPk($app->application_id);
		$app->status=2; 
		echo $app->name;
    //            $app->update(); 
                // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser 
//              if(!isset($_GET['ajax'])) 
                        $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin')); 
        } 

/*	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Versions');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Versions('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Versions']))
			$model->attributes=$_GET['Versions'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Versions the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Versions::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Versions $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='versions-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
