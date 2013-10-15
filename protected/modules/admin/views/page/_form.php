<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this PageController */
/* @var $model Page */
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

$('.pageTitle').keyup(function(){
	var text = $(this).val();
	$('.pageSlug').val(convertToSlug(text));
});
");
?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'page-form',
	'enableAjaxValidation' => false,
)); ?>

	<p class="note"><?php print Yii::t('admin', 'Fields with {asterix} are required.', array('{asterix}' => '<span class="required">*</span>')); ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'category_id'); ?>
		<?php echo $form->dropDownList($model, 'category_id', CHtml::listData(Category::model()->findAll(), 'id', 'title_' . Yii::app()->language), array('empty' => Yii::t('admin', 'select Category'))); ?>
		<?php echo $form->error($model, 'category_id'); ?>
	</div>

	<?php
		// Display titles for all languages.
		foreach (Yii::app()->params->languages as $alias => $lang) :
			$class = '';
			if ($alias == 'en') {
				$class = 'pageTitle';
			}
	?>
	<div class="row">
		<?php echo $form->labelEx($model, 'title_' . $alias); ?>
		<?php echo $form->textField($model, 'title_' . $alias, array('size' => 60, 'maxlength' => 100, 'class' => $class)); ?>
		<?php echo $form->error($model, 'title_' . $alias); ?>
	</div>
	<?php endforeach; ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'slug'); ?>
		<?php echo $form->textField($model, 'slug', array('size' => 60, 'maxlength' => 100, 'class' => 'pageSlug')); ?>
		<?php echo $form->error($model, 'slug'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'tags'); ?>
		<?php echo $form->textField($model, 'tags', array('size' => 60, 'maxlength' => 255)); ?>
		<?php echo $form->error($model, 'tags'); ?>
	</div>

	<?php
	// Display preview for all languages.
	foreach (Yii::app()->params->languages as $alias => $lang) :
		?>
		<div class="row">
			<?php echo $form->textAreaRow($model, 'preview_' . $alias, array('class' => 'span8', 'rows' => 5, 'maxlength' => 500)); ?>
			<?php echo $form->error($model, 'preview_' . $alias); ?>
		</div>
	<?php endforeach; ?>

	<?php
		// Display content for all languages.
		foreach (Yii::app()->params->languages as $alias => $lang) :
	?>
	<div class="row">
		<?php echo $form->redactorRow($model, 'content_' . $alias, array('class' => 'redactor_box')); ?>
		<?php echo $form->error($model, 'content_' . $alias); ?>
	</div>
	<?php endforeach; ?>

	<div class="row">
		<?php echo $form->labelEx($model, 'visibility'); ?>
		<?php echo $form->checkBox($model, 'visibility', array('label' => Yii::t('admin', 'Visible?'))) ?>
		<?php echo $form->error($model, 'visibility'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model, 'premium'); ?>
		<?php echo $form->checkBox($model, 'premium', array('label' => Yii::t('admin', 'Premium'))) ?>
		<?php echo $form->error($model, 'premium'); ?>
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
				'url'   => Yii::app()->controller->createUrl('/admin/page/index'),
			));
		?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->