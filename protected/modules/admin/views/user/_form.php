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
?>

<div class="form">

	<?php
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id' => 'verticalForm',
		'htmlOptions' => array('class' => ''),
	)); ?>

	<p class="note"><?php print Yii::t('admin', 'Fields with {asterix} are required.', array('{asterix}' => '<span class="required">*</span>')); ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, Yii::t('admin', 'Username')); ?>
		<?php echo $form->textField($model, 'username', array('size' => 60, 'maxlength' => 30)); ?>
		<?php echo $form->error($model, 'username'); ?>
	</div>
	<?php if ($model->isNewRecord): ?>
	<div class="row">
		<?php echo $form->labelEx($model, Yii::t('admin', 'password')); ?>
		<?php echo $form->passwordField($model, 'password', array('value' => '', 'size' => 60)); ?>
		<?php echo $form->error($model, 'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, Yii::t('admin', 'verifyPassword')); ?>
		<?php echo $form->passwordField($model, 'verifyPassword', array('size' => 60, 'maxlength' => 30)); ?>
		<?php echo $form->error($model, 'verifyPassword'); ?>
	</div>
	<?php endif; ?>
	<div class="row">
		<?php echo $form->labelEx($model, 'email'); ?>
		<?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 60)); ?>
		<?php echo $form->error($model, 'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, Yii::t('admin', 'profile')); ?>
		<?php echo $form->textArea($model, 'profile', array('rows' => 6, 'cols' => 50)); ?>
		<?php echo $form->error($model, 'profile'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, Yii::t('admin', 'role')); ?>
		<?php echo $form->dropDownList($model, 'role', User::getUserRoleOptions()); ?>
		<?php echo $form->error($model, 'role'); ?>
	</div>

	<div class="row buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => $model->isNewRecord ? Yii::t('admin', 'Create') : Yii::t('admin', 'Save'))); ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->
