<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this PartnersController */
/* @var $model Partners */

?>

<h1><?php print Yii::t('admin', 'View Partners'); ?>
	#<?php echo $model->id; ?></h1>
<hr/>
<div id="buttons" style="float: right;">
	<?php
	$this->widget('bootstrap.widgets.TbButtonGroup', array(
		'buttons' => array(
			array('label' => Yii::t('admin', 'Edit'), 'url' => Yii::app()->controller->createUrl('/admin/partners/update', array('id' => $model->id))),
			array('label' => Yii::t('admin', 'Delete'), 'url' => Yii::app()->controller->createUrl('/admin/partners/delete', array('id' => $model->id)), 'type' => 'primary'),
			array('label' => Yii::t('admin', 'List'), 'url' => Yii::app()->controller->createUrl('/admin/partners/index'))
		),
	));
	?>
</div>
<div style="clear:both;"></div>
<?php $this->widget('bootstrap.widgets.TbDetailView', array(
	'data' => $model,
	'attributes' => array(
		array('name' => 'name', 'label' => Yii::t('admin', 'Name')),
		array('name' => 'description', 'label' => Yii::t('admin', 'Description')),
		array('name' => 'active', 'label' => Yii::t('admin', 'Active?'), 'value' => $model->active? 'Yes': 'No'),
	),
));
?>
