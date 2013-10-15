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
	Yii::t('admin', 'Users') => array('index'),
	Yii::t('admin', 'Create'),
);

?>

<h1><?php Yii::t('admin', 'Create user'); ?></h1>

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
	'type' => 'tabs',
	'tabs' => array(
		array('label' => Yii::t('admin', 'User`s list'), 'url' => array('/admin/user')),
		array('label' => Yii::t('admin', 'Create New User'), 'url' => array('/admin/user/create')),
	),
));
?>
<br />
<?php echo $this->renderPartial('_form', array('model' => $model)); ?>