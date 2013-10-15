<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/**
 * Base template for user`s page.
 *
 * @package Yiitrn\views\site
 * @author  Eugene Zakursky <Eugene.Zakursky@sigmaukraine.com>
 */

$this->breadcrumbs = array(
	Yii::t('front', 'Registration'),
);
?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'registration-form',
		'enableAjaxValidation' => false,
	)); ?>

	<p class="note"><?php print Yii::t('admin', 'Fields with {asterix} are required.', array('{asterix}' => '<span class="required">*</span>')); ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'username'); ?>
		<?php echo $form->textField($model, 'username', array('size' => 60,'maxlength' => 128)); ?>
		<?php echo $form->error($model, 'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'password'); ?>
		<?php echo $form->passwordField($model, 'password', array('size' => 60,'maxlength' => 128)); ?>
		<?php echo $form->error($model, 'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, Yii::t('admin', 'verifyPassword')); ?>
		<?php echo $form->passwordField($model, 'verifyPassword', array('size' => 60, 'maxlength' => 30)); ?>
		<?php echo $form->error($model, 'verifyPassword'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'email'); ?>
		<?php echo $form->textField($model, 'email', array('size' => 60,'maxlength' => 128)); ?>
		<?php echo $form->error($model, 'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'profile'); ?>
		<?php echo $form->textArea($model, 'profile', array('rows' => 6, 'cols' => 50)); ?>
		<?php echo $form->error($model, 'profile'); ?>
	</div>

	<?php if (Yii::app()->params['settings']['captcha'] == 1) { ?>
		<div class="row">
			<?php $this->widget('CCaptcha', array('buttonLabel' => Yii::t('front', 'Generate Code'))); ?>
			<?php echo '<br>' . $form->textField($model, 'verifyCode'); ?>
			<?php echo $form->error($model, 'verifyCode'); ?>
		</div>
	<?php } ?>

	<div class="row buttons">
		<?php $this->widget(
			'bootstrap.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'label' => Yii::t('front', 'Register'),
			)); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->