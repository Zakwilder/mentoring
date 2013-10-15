<?php
/**
 * View partial for CategoryController.
 *
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
	<br />

	<?php
		// Display titles for all languages.
		foreach (Yii::app()->params->languages as $alias => $lang) :
	?>
		<b><?php echo CHtml::encode($data->getAttributeLabel('title_' . $alias)); ?>:</b>
		<?php echo CHtml::encode($data->{'title_' . $alias}); ?>
		<br />
	<?php endforeach; ?>

	<?php
		// Display descriptions for all languages.
		foreach (Yii::app()->params->languages as $alias => $lang) :
	?>
		<b><?php echo CHtml::encode($data->getAttributeLabel('description_' . $alias)); ?>:</b>
		<?php echo CHtml::encode($data->{'description_' . $alias}); ?>
		<br />
	<?php endforeach; ?>

</div>