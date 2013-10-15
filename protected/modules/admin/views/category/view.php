<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this CategoryController */
/* @var $model Category */

$this->breadcrumbs = array(
	Yii::t('admin', 'Categories') => array('index'),
	$model->{'title_' . Yii::app()->language},
);

?>

<h1>View Category #<?php echo $model->id; ?></h1>
<hr/>
<div id="buttons" style="float: right;">
	<?php
	$this->widget('bootstrap.widgets.TbButtonGroup', array(
		'buttons' => array(
			array('label' => Yii::t('admin', 'Edit'), 'url' => Yii::app()->controller->createUrl('/admin/category/update', array('id' => $model->id))),
			array(
				'label' => Yii::t('admin', 'Delete'),
				'buttonType' => 'link',
				'url' => array('delete', 'id' => $model->id),
				'type' => 'primary',
				'htmlOptions' => array('csrf' => true),
			),
			array('label' => Yii::t('admin', 'List'), 'url' => Yii::app()->controller->createUrl('/admin/category/index'))
		),
	));
	?>
</div>
<div style="clear:both;"></div>
<?php

$columnsInfo = array();
// Display titles for all languages.
foreach (Yii::app()->params->languages as $alias => $lang) {
	$columnsInfo[] = array('name' => 'title_' . $alias, 'label' => Yii::t('admin', 'Title(' . $alias . ')'));
}
// Display descriptions for all languages.
foreach (Yii::app()->params->languages as $alias => $lang) {
	$columnsInfo[] = array('name' => 'description_' . $alias, 'label' => Yii::t('admin', 'Description(' . $alias . ')'));
}

$columnsOther = array(
	array('name' => 'slug', 'label' => Yii::t('admin', 'Slug')),
);

$this->widget('bootstrap.widgets.TbDetailView', array(
	'data' => $model,
	'attributes' => array_merge($columnsInfo, $columnsOther),
));
?>
