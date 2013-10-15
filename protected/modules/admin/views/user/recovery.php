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

$this->pageTitle = Yii::t('admin', 'Password recovery');
echo '<h2>' . Yii::t('admin', 'Password recovery') . '</h2>'; ?>
<div id="flash-msgs">
	<?php if (Yii::app()->user->hasFlash('successEmailSent')):?>
		<div class="flash-success">
			<?php echo Yii::app()->user->getFlash('successEmailSent'); ?>
		</div>
	<?php endif; ?>
</div>
<div class="form">
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id' => 'verticalForm',
	'htmlOptions' => array('autocomplete' => 'off'),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
	<div class="row">
		<?php echo $form->textFieldRow($model, 'login_or_email'); ?>
		<p class="hint"><?php echo Yii::t('admin', 'Please enter your user name or email address.'); ?></p>
	</div>
	
	<div class="row submit">
		<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => Yii::t('admin', 'Send'))); ?>
	</div>

	<?php $this->endWidget(); ?>
</div><!-- form -->
