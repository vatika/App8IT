
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

	public function actionChangePassword()
	{
		$model = new ChangePasswordForm;

		if(isset($_POST['ChangePasswordForm']))
		{
			$model->attributes=$_POST['ChangePasswordForm'];
			$temp = Users::model()->findByPk(Yii::app()->user->id);
			if($model->currentPassword === $temp->password)
			{
				if($model->newPassword == $model->newPassword_repeat){
					$temp->password = $model->newPassword;
					$temp->reset_password_date =   date_create()->format('Y-m-d H:i:s');
					$temp->update();
					$this->redirect( Yii::app()->user->returnUrl );
				}
				else{
					$this->render('changePassword',array('model'=>$model));
					echo 'Passwords do not match';
				}
			}
			else{
				$this->render('changePassword',array('model'=>$model));
				echo 'wrong password';
			}
		}
		else{
			$this->render('changePassword',array('model'=>$model));
		}
	}
}

?>
