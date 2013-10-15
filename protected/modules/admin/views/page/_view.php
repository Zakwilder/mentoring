<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this PageController */
/* @var $data Page */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('category_id')); ?>:</b>
	<?php echo CHtml::encode($data->category_id); ?>
	<br />

	<?php
		// Display titles for all languages.
		foreach (Yii::app()->params->languages as $alias => $lang) :
	?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('title_' . $alias)); ?>:</b>
	<?php echo CHtml::encode($data->{'title_' . $alias}); ?>
	<br />
	<?php endforeach; ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('slug')); ?>:</b>
	<?php echo CHtml::encode($data->slug); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tags')); ?>:</b>
	<?php echo CHtml::encode($data->tags); ?>
	<br />

	<?php
		// Display contents for all languages.
		foreach (Yii::app()->params->languages as $alias => $lang) :
	?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('content_' . $alias)); ?>:</b>
	<?php echo CHtml::encode($data->{'content_' . $alias}); ?>
	<br />
	<?php endforeach; ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('visibility')); ?>:</b>
	<?php echo CHtml::encode($data->visibility); ?>
	<br />

</div>