<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this PartnersController */
/* @var $model Partners */
?>

<h1><?php print Yii::t('admin', 'Partners'); ?></h1>
<hr/>
<div id="buttons" style="float: right;">
	<?php
	$this->widget('bootstrap.widgets.TbButton', array(
		'label' => Yii::t('admin', 'Create'),
		'url'   => Yii::app()->controller->createUrl('/admin/partners/create'),

	));
	?>
</div>
<div style="clear:both;"></div>

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'            => 'partners-grid',
	'dataProvider'  => $model->search(),
	'template'      => '{items}',
	'type'          => 'bordered',
	'filter'        => $model,
	'columns'       => array(
		array('name' => 'name', 'header' => Yii::t('admin', 'Name')),
		array('name' => 'description', 'header' => Yii::t('admin', 'Description')),
		array('name' => 'key', 'header' => Yii::t('admin', 'Key')),
		array('name' => 'salt', 'header' => Yii::t('admin', 'Salt')),
		array('name' => 'active', 'header' => Yii::t('admin', 'Active?'), 'value' => '$data->active? "Yes": "No"', 'filter' => array(0 => 'No', 1 => 'Yes')),
		array(
			'htmlOptions' => array('nowrap' => 'nowrap'),
			'class' => 'bootstrap.widgets.TbButtonColumn',
			'viewButtonUrl' => 'Yii::app()->controller->createUrl("/admin/partners/view", array("id" => $data->id))',
			'updateButtonUrl' => 'Yii::app()->controller->createUrl("/admin/partners/update", array("id" => $data->id))',
			'deleteButtonUrl' => 'Yii::app()->controller->createUrl("/admin/partners/delete", array("id" => $data->id))',
		)
	),
)); ?>
