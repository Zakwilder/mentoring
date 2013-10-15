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

<div id="header">
	<div id="dashboardmenu">
		<?php
		$this->widget('bootstrap.widgets.TbNavbar', array(
			'brand' => Yii::t('admin', 'Dashboard'),
			'brandUrl' => array('/admin'),
			'items' => array(
				array(
					'class' => 'bootstrap.widgets.TbMenu',
					'items' => array(
						array('label' => Yii::t('admin', 'Home'), 'url' => array('/admin/default/index')),
						array('label' => Yii::t('admin', 'Categories'), 'url' => array('/admin/category/index')),
						array('label' => Yii::t('admin', 'Pages'), 'url' => array('/admin/page/index')),
						array('label' => Yii::t('admin', 'Partners'), 'url' => array('/admin/partners/index')),
						array('label' => Yii::t('admin', 'Users'), 'url' => array('/admin/user/index'), 'visible' => Yii::app()->user->checkAccess('admin')
						),
						array('label' => Yii::t('admin', 'Settings'),
							'url' => array('/admin/settings/index'),
							'visible' => Yii::app()->user->checkAccess('admin')
						),
						array('label' => Yii::t('admin', 'Login'), 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
						array('label' => Yii::t('admin', 'Logout') . ' (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
					)
				)
			),
		));
		?>
	</div><!-- mainmenu -->

</div><!-- header -->

<div class="container" id="page">
	<div id="content">
		<div  id="language-selector" style="float:right; margin:40px 40px 0 0;">
			<?php
			// Render language switcher panel.
			$this->widget('application.components.widgets.LanguageSelector');
			?>
		</div>
		<div style="clear: both;"></div>
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