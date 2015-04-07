
<?php
class ChangePasswordFormController extends Controller{

	public function filters()
	{
		return array(
				'accessControl',
			    );
	}

	public function accessRules()
	{
		return array(
				array(
					'allow',
					'actions'=>array('ChangePassword'),
					'roles'=>array('@'),
				     ),
			    );
	}

	public function actionChangePassword($id)
	{
		$model = new ChangePasswordForm;
             //   $this->performAjaxValidation($model);   
		if(isset($_POST['ChangePasswordForm']))
		{
			$model->attributes=$_POST['ChangePasswordForm'];
			$temp = Users::model()->findByPk($id);
			$user =	Users::model()->findByPk(Yii::app()->user->id);
			
			if($user->role_id == 1)
			{	
				$model->currentPassword = $temp->password; 
			}
			if($model->currentPassword === $temp->password)
			{
				if($model->newPassword == $model->newPassword_repeat){
					$temp->password = $model->newPassword;
					$temp->reset_password_date =   date_create()->format('Y-m-d H:i:s');
					$temp->update();
									$mailer = Yii::app()->MultiMailer->to($temp->email, $temp->first_name);
					$mailer->subject('Password Changed of app8it account');
					$mailer->body('<h1>Hello</h1><p>This is test.<br>password change test.</p>');
					if ($mailer->send()) {
						// success
					}
					else {
						// error
					}
					$this->redirect( Yii::app()->user->returnUrl );
				}
				else{?>
					<br><h1><?php echo 'New passwords do not match'; ?></h1><?php
					$this->render('changePassword',array('model'=>$model,'id'=>$id));	
				}
			}
			else{?><br><h1><?php 
				echo 'Wrong Password'; ?></h1><?php
				$this->render('changePassword',array('model'=>$model,'id'=>$id));	
			}
		}
			else{
			$this->render('changePassword',array('model'=>$model,'id'=>$id));
		}
	}
           public function loadModel($id)
	{
		$model=Checklists::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
	/**
	 * Performs the AJAX validation.
	 * @param Checklists $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='ChangePasswordForm-form')
		{
			echo CFormModel::validate($model);
			Yii::app()->end();
		}
	}
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
}

?>
