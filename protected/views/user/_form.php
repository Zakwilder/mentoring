<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'user-form',
	'enableAjaxValidation' => false,
)); ?>

	<p class="note"><?php print Yii::t('admin', 'Fields with {asterix} are required.', array('{asterix}' => '<span class="required">*</span>')); ?></p>

	<?php echo $form->errorSummary($model); ?>

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

<?php $this->endWidget(); ?>

</div><!-- form -->