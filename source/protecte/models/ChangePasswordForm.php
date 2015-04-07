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
      array(
        'currentPassword', 'compareCurrentPassword'
      ),
      array(
        'currentPassword, newPassword, newPassword_repeat', 'required',
      ),
      array(
        'newPassword_repeat', 'compare',
        'compareAttribute'=>'newPassword',
      ),
      array(
        'currentPassword', 'compare','compareAttribute'=>'newPassword','operator'=>'!=','message'=>'Old and New password are same',  
      ),
      array('newPassword','length','min'=>8),
      array('newPassword','validatePasswordStrength','message'=>'password '),
    );
  }
  
  public function validatePasswordStrength($attribute,$params){
      $pattern1 ='/*[0-9]*/';
      $pattern2 ='/*[a-z]*/';
      $pattern3 ='/*[A-Z]*/';
      $pattern4 ='/*!\w*/';
      if(!preg_match($pattern1,$this->currentPassword)){
              $this->addError($this->currentPassword,"Password should have at least one digit");
              return;
      }
      if(!preg_match($pattern2,$this->currentPassword)){
              $this->addError($this->currentPassword,"Password should have at least one small letter ");
              return;
      }
      if(!preg_match($pattern3,$this->currentPassword)){
              $this->addError($this->currentPassword,"Password should have at least one capital letter");
              return;
      }
      if(!preg_match($pattern4,$this->currentPassword)){
              $this->addError($this->currentPassword,"Password should have at least one special character");
              return;
      }
              
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
