<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this PartnersController */
/* @var $model Partners */
?>

	<h1><?php print Yii::t('admin', 'Update Partners'); ?>
		<?php echo $model->id; ?>
	</h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>