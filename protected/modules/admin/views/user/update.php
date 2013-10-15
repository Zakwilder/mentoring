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
	$model->id => array('view', 'id' => $model->id),
	Yii::t('admin', 'Update'),
);
?>

	<h1><?php print Yii::t('admin', 'Update User'); ?>
		<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>

<?php if (Yii::app()->user->checkAccess('changePassword', array('user' => $model))): ?>
	<?php echo $this->renderPartial('_changepasswordform', array('model' => $form)); ?>
<?php endif; ?>