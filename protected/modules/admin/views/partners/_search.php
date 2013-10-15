<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this PartnersController */
/* @var $model Partners */
/* @var $form CActiveForm */
?>

<div class="wide form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'action' => Yii::app()->createUrl($this->route),
		'method' => 'get',
	)); ?>

	<div class="row">
		<?php echo $form->label($model, 'name'); ?>
		<?php echo $form->textField($model, 'name', array('size' => 60, 'maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'description'); ?>
		<?php echo $form->textArea($model, 'description', array('cols' => 20, 'rows' => 10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'active'); ?>
		<?php echo $form->dropDownList($model, 'active', array('0' => Yii::t('admin', 'No'), '1' => Yii::t('admin', 'Yes')), array('empty' => Yii::t('admin', 'select'))) ?>
	</div>

	<div class="row buttons">
		<?php
		$this->widget(
			'bootstrap.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'label' => 'Search'
			));
		?>
		<?php
		$this->widget(
			'bootstrap.widgets.TbButton',
			array(
				'buttonType' => 'reset',
				'label' => 'Clear'
			));
		?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- search-form -->