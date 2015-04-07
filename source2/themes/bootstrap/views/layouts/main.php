<?php
	Yii::app()->clientscript
		// use it when you need it!
		/*
		->registerCssFile( Yii::app()->baseUrl . '/css/bootstrap.css' )
		->registerCssFile( Yii::app()->baseUrl . '/css/bootstrap-responsive.css' )
	//	->registerCssFile( Yii::app()->baseUrl . '/css/shop-homepage.css' )
		->registerCoreScript( 'jquery' )
		->registerScriptFile( Yii::app()->baseUrl . '/js/bootstrap-transition.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->baseUrl . '/js/bootstrap-alert.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->baseUrl . '/js/bootstrap-modal.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->baseUrl . '/js/bootstrap-dropdown.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->baseUrl . '/js/bootstrap-scrollspy.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->baseUrl . '/js/bootstrap-tab.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->baseUrl . '/js/bootstrap-tooltip.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->baseUrl . '/js/bootstrap-popover.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->baseUrl . '/js/bootstrap-button.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->baseUrl . '/js/bootstrap.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->baseUrl . '/js/bootstrap.min.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->baseUrl . '/js/jquery-1.11.0.js', CClientScript::POS_END )
		//>registerScriptFile( Yii::app()->baseUrl . '/js/shop-homepage.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->baseUrl . '/js/bootstrap-collapse.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->baseUrl . '/js/bootstrap-carousel.js', CClientScript::POS_END )
		->registerScriptFile( Yii::app()->baseUrl . '/js/bootstrap-typeahead.js', CClientScript::POS_END )
		*/
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo CHtml::encode($this->pageTitle); ?></title>
<meta name="language" content="en" />
<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
<!-- Le styles -->
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/bootstrap1/css/bootstrap.min.css" media="screen, projection" >	
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/bootstrap-responsive.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->baseUrl; ?>/css/style.css" />

    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    
<!-- Le fav and touch icons -->



    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">


    <!-- Custom styles for this template -->
    <!--link href="justified-nav.css" rel="stylesheet"-->

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!--script src="ie-emulation-modes-warning.js"></script-->
  </head>




<body>

<div class="navbar navbar-inverse navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<div class="nav-collapse">
					


      <div class="masthead">
        
       


<?php $this->widget('zii.widgets.CMenu',array(
						'htmlOptions' => array( 'class' => 'nav' ),
						'activeCssClass'	=> 'active',
						'items'=>array(
							array('label'=>'Home', 'url'=>array('/site/index')),
							//array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
							//array('label'=>'Contact', 'url'=>array('/site/contact')),
							array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
							
							array('label'=>'Edit Profile', 'url'=>Yii::app()->createUrl('users/update',array('id'=>Yii::app()->user->id)),'visible'=>!Yii::app()->user->isGuest),
							array('label'=>'Pending Apps', 'url'=>array('/versions/admin '), 'visible'=>Yii::app()->user->checkAccess('reviewApp')),
						
							array('label'=>'Manage Users', 'url'=>array('/users/admin'), 'visible'=>Yii::app()->user->checkAccess('Create')),
                                array('label'=>'Manage Categories', 'url'=>array('/categories/admin'), 'visible'=>Yii::app()->user->checkAccess('Create')),
                                array('label'=>'Manage Checklists', 'url'=>array('/checklists/admin'), 'visible'=>Yii::app()->user->checkAccess('Create')),
                                array('label'=>'Upload App', 'url'=>array('/applications/create'), 'visible'=>Yii::app()->user->checkAccess('createApp')),
                                array('label'=>'Manage Versions', 'url'=>array('/versions/admin'), 'visible'=>Yii::app()->user->checkAccess('Create')),
                       array('label'=>'Manage Apps', 'url'=>array('applications/admin'), 'visible'=>Yii::app()->user->checkAccess('Create')),


                                array('label'=>'Change Password', 'url'=>Yii::app()->createUrl('/changePasswordForm/changePassword', array('id'=>Yii::app()->user->id)),  'visible'=>!Yii::app()->user->isGuest),



						array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
						),
					)); ?>

					


</div>





		
				</div><!--/.nav-collapse -->
			</div>
		</div>
	</div>
	

	

	<div class="cont">



	<div class="container-fluid">
	  <?php if(isset($this->breadcrumbs)):?>
			<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
				'homeLink'=>false,
				'tagName'=>'ul',
				'separator'=>'',
				'activeLinkTemplate'=>'<li><a href="{url}">{label}</a> <span class="divider">/</span></li>',
				'inactiveLinkTemplate'=>'<li><span>{label}</span></li>',
				'htmlOptions'=>array ('class'=>'breadcrumb')
			)); ?>
		<!-- breadcrumbs -->
	  <?php endif?>
	
	<?php echo $content ?>
	
	</div><!--/.fluid-container-->

	</div>


	<div class="footer">
	  <div class="container">
		<div class="row">
			<div id="footer-copyright" class="col-md-6">
				About us | Contact us | Terms & Conditions
			</div> <!-- /span6 -->
			<div id="footer-terms" class="col-md-6">
				copyright©App8IT. .
			</div> <!-- /.span6 -->
		 </div> <!-- /row -->
	  </div> <!-- /container -->
	</div>


</body>
</html>















