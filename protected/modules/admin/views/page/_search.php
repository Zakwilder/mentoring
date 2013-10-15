<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this PageController */
/* @var $model Page */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'category_id'); ?>
		<?php echo $form->dropDownList($model, 'category_id', CHtml::listData(Category::model()->findAll(), 'id', 'title_' . Yii::app()->language), array('empty' => Yii::t('admin', 'Select Category'))); ?>
		<?php echo $form->error($model, 'category_id'); ?>
	</div>

	<?php
		// Display titles for all languages.
		foreach (Yii::app()->params->languages as $alias => $lang) :
	?>
	<div class="row">
		<?php echo $form->label($model, 'title_' . $alias); ?>
		<?php echo $form->textField($model, 'title_' . $alias, array('size' => 60, 'maxlength' => 100)); ?>
	</div>
	<?php endforeach; ?>

	<div class="row">
		<?php echo $form->label($model, 'slug'); ?>
		<?php echo $form->textField($model, 'slug', array('size' => 60, 'maxlength' => 100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'tags'); ?>
		<?php echo $form->textField($model, 'tags', array('size' => 60, 'maxlength' => 255)); ?>
	</div>

	<?php
		// Display titles for all languages.
		foreach (Yii::app()->params->languages as $alias => $lang) :
	?>
	<div class="row">
		<?php echo $form->label($model, 'content_' . $alias); ?>
		<?php echo $form->textField($model, 'content_' . $alias, array('size' => 60, 'maxlength' => 255)); ?>
	</div>
	<?php endforeach; ?>

	<div class="row">
		<?php echo $form->label($model, 'visibility'); ?>
		<?php echo $form->dropDownList($model, 'visibility', array('0' => Yii::t('admin', 'No'), '1' => Yii::t('admin', 'Yes')), array('empty' => Yii::t('admin', 'select'))) ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'date_created'); ?>
		<?php echo $form->dateField($model, 'date_created') ?>
	</div>

	<div class="row">
		<?php echo $form->label($model, 'date_updated'); ?>
		<?php echo $form->dateField($model, 'date_updated') ?>
	</div>

	<div class="row buttons">
		<?php
		$this->widget(
			'bootstrap.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'label' => Yii::t('admin', 'Search')
			));
		?>
		<?php
		$this->widget(
			'bootstrap.widgets.TbButton',
			array(
				'buttonType' => 'reset',
				'label' => Yii::t('admin', 'Clear')
			));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->