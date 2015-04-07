<? php
class myInitController extends Controller
{
	public function actionCheckAccess(){
		if ( Yii:app()->user->checkAccess('createUser')){
			echo 'Authorized';
		}
		else{
			echo 'Not authorized';
		}
	}
}
