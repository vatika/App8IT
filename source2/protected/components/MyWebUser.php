<?php
class MyWebUser extends CWebUser{

    private $_profile = null;
    public $loginUrl='/';
    public $password;
    public function init(){
       parent::init();
       if(!$this->getIsGuest()){
            $this->_profile = Users::model()->findByPk($this->getId());
	    $password = $this->_profile->password;
       }
    }
    public function getProfile(){
       return $this->_profile;
   }
}
?>
