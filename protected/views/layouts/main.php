<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<div id="fb-root"></div>
<script>
	(function(d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s); js.id = id;
		js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=157603201079066";
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js">
</script>
<script>
	!function(d,s,id) {
		var js,fjs=d.getElementsByTagName(s)[0];
		if(!d.getElementById(id)) {
			js=d.createElement(s);
			js.id=id;
			js.src="https://platform.twitter.com/widgets.js";
			fjs.parentNode.insertBefore(js,fjs);
		}
	}(document,"script","twitter-wjs");
</script>

<div id="header">
	<div id="mainmenu">
		<?php $this->widget('bootstrap.widgets.TbNavbar', array(
			'brand' => 'Yii',
			'brandOptions' => array('style' => 'display: none;'),
			'type' => 'inverse',
			'htmlOptions' => array('style' => 'position: absolute;'),
			'items' => array(
				array(
					'class' => 'bootstrap.widgets.TbMenu',
					'htmlOptions' => array('class' => 'custom-ul'),
					'items' => array(
						array('label' => Yii::t('front', 'Home'), 'url' => array('/site/index')),
						array('label' => Yii::t('front', 'Pages'), 'url' => array('/site/pages')),
						array('label' => Yii::t('front', 'Profile'), 'url' => array('/user/profile'), 'visible' => !Yii::app()->user->isGuest),
						array('label' => Yii::t('front', 'Admin page'), 'url' => array('/admin'),
							'visible' => Yii::app()->user->checkAccess('admin')),
						array('label' => Yii::t('front', 'Login'), 'url' => array('/site/login'),
							'visible' => Yii::app()->user->isGuest),
						array('label' => Yii::t('front', 'Logout') . ' (' . Yii::app()->user->name . ')',
							'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest),
						array('label' => Yii::t('front', 'Password Recovery'), 'url' => array('/admin/user/recovery'),
							'visible' => Yii::app()->user->isGuest)
					),
				),
			)
		));
		?>
	</div><!-- mainmenu -->

	<div  id="language-selector" style="float:right; margin:40px 40px 0 0;">
		<?php
		// Render language switcher panel.
		$this->widget('application.components.widgets.LanguageSelector');
		?>
	</div>
</div><!-- header -->

<div class="container" id="page">
	<div style="clear: both;"></div>
	<div id="content">
		<?php echo $content; ?>
	</div>
	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		<?php print Yii::t('admin', 'All Rights Reserved'); ?>.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>