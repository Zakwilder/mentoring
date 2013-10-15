<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

?>

<div class="form">

	<?php $form = $this->beginWidget('CActiveForm', array(
		'id' => 'comments-form',
		'enableAjaxValidation' => false,
	)); ?>

	<div class="row">
		<?php echo $form->error($model, 'comment'); ?>
		<?php echo $form->textArea($model, 'comment', array('rows' => 10, 'cols' => 70, 'class' => 'descriptionTextArea')); ?>
	</div>
	<div class="row">
		<?php echo $form->hiddenField($model, 'parent_id', array('value' => null, 'class' => 'parentComment')); ?>
	</div>


	<div class="row buttons">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => Yii::t('front', 'Send'))) ?>
	</div>

	<?php $this->endWidget(); ?>

</div><!-- form -->