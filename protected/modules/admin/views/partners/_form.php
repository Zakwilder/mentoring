<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this PartnersController */
/* @var $model Partners */
/* @var $form CActiveForm */
?>

<div class="form">
	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'partners-form',
		'enableAjaxValidation' => false,
	)); ?>

	<p class="note"><?php print Yii::t('admin', 'Fields with {asterix} are required.', array('{asterix}' => '<span class="required">*</span>')); ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100)); ?>
		<?php echo $form->error($model, 'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'description'); ?>
		<?php echo $form->textArea($model, 'description', array('cols' => 20, 'rows' => 10, 'class' => 'descriptionTextArea')); ?>
		<?php echo $form->error($model, 'description'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'active'); ?>
		<?php echo $form->checkBox($model, 'active', array('label' => 'Active?')) ?>
		<?php echo $form->error($model, 'active'); ?>
	</div>

	<div class="row buttons">
		<?php
		$this->widget(
			'bootstrap.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'label' => $model->isNewRecord? Yii::t('admin', 'Create'): Yii::t('admin', 'Save')
			));
		$this->widget(
			'bootstrap.widgets.TbButton',
			array(
				'label' => Yii::t('admin', 'List'),
				'url'   => Yii::app()->controller->createUrl('/admin/partners/index'),
			));
		?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->