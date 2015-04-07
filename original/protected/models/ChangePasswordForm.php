<?php
class ChangePasswordForm extends CFormModel
{
  public $currentPassword;
  public $newPassword;
  public $newPassword_repeat;
  private $_user;
  
  public function rules()
  {
    return array(
   //   array(
     //   'currentPassword', 'compareCurrentPassword'
     // ),
      array(
        'currentPassword, newPassword, newPassword_repeat', 'required',
      ),
      array(
        'newPassword_repeat', 'compare',
        'compareAttribute'=>'newPassword',
      ),
      
    );
  }
  
  public function compareCurrentPassword($attribute,$params)
  {
    if( $this->currentPassword !== $this->_user->password )
    {
      $this->addError($attribute,'La contraseña actual es incorrecta');
    }
  }
  
  public function init()
  {
    $this->_user = Users::model()->findByPk( Yii::app()->user->id );
    
  }
  
  public function attributeLabels()
  {
    return array(
      'currentPassword'=>'Current Password',
      'newPassword'=>'New Password',
      'newPassword_repeat'=>'New Password Repeat',
    );
  }
  
  public function changePassword()
  {
    $this->_user->password = $this->newPassword;
    if( $this->_user->save() )
      return true;
    return false;
  }
}
?>
