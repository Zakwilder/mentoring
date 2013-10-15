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
	Yii::t('admin', 'Admin'),
);

?>
<h1><?php print Yii::t('admin', 'User`s List'); ?></h1>

<?php
$this->widget('bootstrap.widgets.TbTabs', array(
	'type' => 'tabs',
	'tabs' => array(
		array('label' => Yii::t('admin', 'User`s list'), 'url' => array('/admin/user'), 'active' => true),
		array('label' => Yii::t('admin', 'Create New User'), 'url' => array('/admin/user/create')),
	),
)); ?>

<div id="flash-msgs">
	<?php if (Yii::app()->user->hasFlash('USER_SELF_DELETE_ERROR') ||
			  Yii::app()->user->hasFlash('USER_DELETE_NO_PERMISSIONS') ): ?>
		<div class="flash-error">
			<?php  echo Yii::app()->user->getFlash('USER_SELF_DELETE_ERROR'); ?>
			<?php  echo Yii::app()->user->getFlash('USER_DELETE_NO_PERMISSIONS'); ?>
		</div>
	<?php endif; ?>
</div>

<?php
$this->widget('bootstrap.widgets.TbGridView', array(
	'id' => 'user-grid',
	'dataProvider' => $model->search(),
	'ajaxUpdate' => 'flash-msgs',
	'columns' => array(
		array(
			'name' => 'id',
			'header' => Yii::t('admin', 'Id'),
			'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode($data->id), $data->url)',
		),
		array(
			'name' => 'username',
			'header' => Yii::t('admin', 'Username'),
			'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode($data->username), $data->url)',
		),
		array(
			'name' => 'email',
			'header' => Yii::t('admin', 'Email'),
			'type' => 'raw',
			'value' => 'CHtml::link(CHtml::encode($data->email), $data->url)',
		),
		array(
			'name' => 'active',
			'header' => Yii::t('admin', 'Activation'),
			'visible' => Yii::app()->user->checkAccess('superadmin'),
			'type' => 'raw',
			'value' => '$data->active? " ": CHtml::link("' . Yii::t('admin', 'Activate') .  '", "#", array("submit"=>array("activate", "id"=>$data->id), "confirm" => "' . Yii::t('admin', 'Are you sure?') . '", "csrf"=>true))',
		),
		array(
			'htmlOptions' => array('nowrap' => 'nowrap'),
			'class' => 'bootstrap.widgets.TbButtonColumn',
			'viewButtonUrl' => 'Yii::app()->createUrl("/admin/user/view", array("id"=>$data["id"]))',
			'updateButtonUrl' => 'Yii::app()->createUrl("/admin/user/update", array("id"=>$data["id"]))',
			'deleteButtonUrl' => 'Yii::app()->createUrl("/admin/user/delete", array("id"=>$data["id"]))',
		),
	),
));
?>
