<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

$this->pageTitle = Yii::app()->name . ' - ' . Yii::t('front', 'Error');
$this->breadcrumbs = array(
	Yii::t('front', 'Error'),
);
?>

<h2><?php print Yii::t('front', 'Error'); ?>
	<?php echo $code; ?></h2>

<div class="error">
	<?php echo CHtml::encode($message); ?>
</div>