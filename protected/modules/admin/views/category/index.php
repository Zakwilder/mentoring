<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this CategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs = array(
	Yii::t('admin', 'Categories'),
);
?>

<h1><?php print Yii::t('admin', 'Categories'); ?></h1>
<hr/>
<div id="buttons" style="float: right;">
<?php
	$this->widget('bootstrap.widgets.TbButton', array(
		'label' => Yii::t('admin', 'Create'),
		'url'   => Yii::app()->controller->createUrl('/admin/category/create'),

	));
?>
</div>
<div style="clear:both;"></div>

<?php

$columnsInfo = array();
// Display titles for all languages.
foreach (Yii::app()->params->languages as $alias => $lang) {
	$columnsInfo[] = array('name' => 'title_' . $alias, 'header' => Yii::t('admin', 'Title') . '(' . $alias . ')');
}
// Display descriptions for all languages.
foreach (Yii::app()->params->languages as $alias => $lang) {
	$columnsInfo[] = array('name' => 'description_' . $alias, 'header' => Yii::t('admin', 'Description') . '(' . $alias . ')');
}

$columnsOther = array(
	array('name' => 'slug', 'header' => Yii::t('admin', 'Slug')),
	array(
		'htmlOptions' => array('nowrap' => 'nowrap'),
		'class' => 'bootstrap.widgets.TbButtonColumn',
		'viewButtonUrl' => 'Yii::app()->controller->createUrl("/admin/category/view", array("id" => $data->id))',
		'updateButtonUrl' => 'Yii::app()->controller->createUrl("/admin/category/update", array("id" => $data->id))',
		'deleteButtonUrl' => 'Yii::app()->controller->createUrl("/admin/category/delete", array("id" => $data->id))',
	)
);

$this->widget('bootstrap.widgets.TbGridView', array(
	'id'            => 'category-grid',
	'dataProvider'  => $model->search(),
	'template'      => '{items}',
	'type'          => 'bordered',
	'filter'        => $model,
	'columns'       => array_merge($columnsInfo, $columnsOther),
)); ?>
