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
<?php if (!$passwordRecovery): ?>
	<?php $collapse = $this->beginWidget('bootstrap.widgets.TbCollapse');?>
		<div class="accordion-heading">
			<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
				<?php echo Yii::t('admin', 'Change password');?>
			</a>
		</div>
<?php endif; ?>
	<div class="form">
		<?php echo CHtml::beginForm(); ?>
		<?php echo CHtml::errorSummary($model); ?>
		<div class="accordion-body collapse <?php if ($model->hasErrors() || $passwordRecovery) echo 'in'; ?>" id="collapseOne">

			<div class="row">
				<?php echo CHtml::activeLabelEx($model, 'password'); ?>
				<?php echo CHtml::activePasswordField($model, 'password'); ?>
			</div>

			<div class="row">
				<?php echo CHtml::activeLabelEx($model, 'verifyPassword'); ?>
				<?php echo CHtml::activePasswordField($model, 'verifyPassword'); ?>
			</div>

			<div class="row submit">
				<?php $this->widget('bootstrap.widgets.TbButton', array('buttonType' => 'submit', 'label' => Yii::t('admin', 'Save'))); ?>
			</div>
		</div>
		<?php echo CHtml::endForm(); ?>
	</div><!-- form -->
<?php if (!$passwordRecovery): ?>
	<?php $this->endWidget();?>
<?php endif; ?>