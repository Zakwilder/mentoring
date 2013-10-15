<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Base template for user`s page.
 *
 * @package Yiitrn\Protected\Modules\Admin\Views\User
 * @author  Alexander Bespalko <alexander.bespalko@sigmaukraine.com>
 */

$this->breadcrumbs = array(
	'Users' => array('index'),
	$model->id,
);
?>
	<h1><?php print Yii::t('admin', 'User Profile'); ?></h1>
<?php
$this->widget('bootstrap.widgets.TbTabs', array(
	'type' => 'tabs',
	'tabs' => array(
		array('label' => Yii::t('admin', 'User`s list'), 'url' => array('/admin/user')),
		array('label' => Yii::t('admin', 'Create New User'), 'url' => array('/admin/user/create')),
	),
));
?>

	<h1><?php print Yii::t('admin', 'View User');?>
		#<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data' => $model,
	'attributes' => array(
		array('name' => 'id', 'label' => Yii::t('admin', 'Id')),
		array('name' => 'username', 'label' => Yii::t('admin', 'Username')),
		array('name' => 'email', 'label' => Yii::t('admin', 'Email')),
		array('name' => 'profile', 'label' => Yii::t('admin', 'User Profile')),
		array('name' => 'role', 'label' => Yii::t('admin', 'Role')),
	),
));