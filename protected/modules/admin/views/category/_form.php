<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this CategoryController */
/* @var $model Category */
/* @var $form CActiveForm */
?>

<div class="form">
<?php
Yii::app()->clientScript->registerScript('slug', "
function convertToSlug(text)
{
    return text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        ;
}

$('.categoryTitle').keyup(function(){
	var text = $(this).val();
	$('.categorySlug').val(convertToSlug(text));
});
");
?>

<?php $form = $this->beginWidget('CActiveForm', array(
	'id' => 'category-form',
	'enableAjaxValidation' => false,
)); ?>

	<p class="note"><?php print Yii::t('admin', 'Fields with {asterix} are required.', array('{asterix}' => '<span class="required">*</span>')); ?></p>

	<?php echo $form->errorSummary($model); ?>

	<?php
	// Display titles for all languages.
	foreach (Yii::app()->params->languages as $alias => $lang) :
		$class = '';
		if ($alias == 'en') {
			$class = 'categoryTitle';
		}
		?>
		<div class="row">
			<?php echo $form->labelEx($model, 'title_' . $alias); ?>
			<?php echo $form->textField($model, 'title_' . $alias, array('size' => 60, 'maxlength' => 100, 'class' => $class)); ?>
			<?php echo $form->error($model, 'title_' . $alias); ?>
		</div>
	<?php endforeach; ?>

	<?php
		// Display descriptions for all languages.
		foreach (Yii::app()->params->languages as $alias => $lang) :
	?>
		<div class="row">
			<?php echo $form->labelEx($model, 'description_' . $alias); ?>
			<?php echo $form->textField($model, 'description_' . $alias, array('size' => 60, 'maxlength' => 255)); ?>
			<?php echo $form->error($model, 'description_' . $alias); ?>
		</div>
	<?php endforeach; ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'slug'); ?>
		<?php echo $form->textField($model, 'slug', array('size' => 60, 'maxlength' => 100, 'class' => 'categorySlug')); ?>
		<?php echo $form->error($model, 'slug'); ?>
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
				'url'   => Yii::app()->controller->createUrl('/admin/category/index'),
		));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->