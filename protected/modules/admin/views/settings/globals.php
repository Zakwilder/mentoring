<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

$this->breadcrumbs = array(
	Yii::t('admin', 'Admin'),
);

?>

<h1><?php print Yii::t('admin', 'Settings'); ?></h1>


<?php /** @var BootActiveForm $form */
$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'horizontalForm',
	'type' => 'horizontal',
)); ?>

	<fieldset>

		<legend><?php print Yii::t('admin', 'Maintenance mode settings'); ?></legend>

		<?php
		$this->widget('bootstrap.widgets.TbAlert', array(
			'block' => true,
			'fade' => true,
			'closeText' => '×',
			'alerts' => array(
				'success' => array('block' => true, 'fade' => true, 'closeText' => '×'),
			),
		));
		?>

		<?php echo $form->radioButtonListRow($model, 'enabled', array(
			Yii::t('admin', 'No'),
			Yii::t('admin', 'Yes'),
		)); ?>

		<?php echo $form->textAreaRow($model, 'message', array('class' => 'span8', 'rows' => 5),
			array('hint' => Yii::t('admin', 'Message will be pasted on `Yii::app()->maintenanceMode->message` placeholder`s place.'))); ?>

		<?php echo $form->textAreaRow($model, 'templateContent', array('class' => 'span8', 'rows' => 20)); ?>

	</fieldset>

	<fieldset>

		<legend><?php print Yii::t('admin', 'Frontend settings'); ?></legend>

		<?php echo $form->radioButtonListRow($model, 'captcha', array(
			Yii::t('admin', 'No'),
			Yii::t('admin', 'Yes'),
		)); ?>

		<?php echo $form->textFieldRow($model, 'recentComments', array('maxlength' => 2, 'style' => 'width: 60px;')); ?>

		<?php echo $form->textFieldRow($model, 'recentPages', array('maxlength' => 2, 'style' => 'width: 60px;')); ?>

	</fieldset>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'type' => 'primary', 'label' => Yii::t('admin', 'Save'))); ?>
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'reset', 'label' => Yii::t('admin', 'Reset'))); ?>
	</div>

<?php $this->endWidget(); ?>