<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form = $this->beginWidget('CActiveForm', array(
	'action' => Yii::app()->createUrl($this->route),
	'method' => 'get',
)); ?>

	<?php
		// Display titles for all languages.
		foreach (Yii::app()->params->languages as $alias => $lang) :
	?>
		<div class="row">
			<?php echo $form->labelEx($model, 'title_' . $alias); ?>
			<?php echo $form->textField($model, 'title_' . $alias, array('size' => 60, 'maxlength' => 255)); ?>
		</div>
	<?php endforeach; ?>

	<?php
		// Display descriptions for all languages.
		foreach (Yii::app()->params->languages as $alias => $lang) :
	?>
		<div class="row">
			<?php echo $form->labelEx($model, 'description_' . $alias); ?>
			<?php echo $form->textField($model, 'description_' . $alias, array('size' => 60, 'maxlength' => 255)); ?>
		</div>
	<?php endforeach; ?>

	<div class="row buttons">
		<?php
		$this->widget(
			'bootstrap.widgets.TbButton',
			array(
				'buttonType' => 'submit',
				'label' => Yii::t('admin', 'Search')
		));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->