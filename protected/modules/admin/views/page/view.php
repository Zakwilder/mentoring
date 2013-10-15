<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this PageController */
/* @var $model Page */

?>

<h1><?php print Yii::t('admin', 'View Page'); ?>
	#<?php echo $model->id; ?></h1>
<hr/>
<div id="buttons" style="float: right;">
	<?php
	$this->widget('bootstrap.widgets.TbButtonGroup', array(
		'buttons' => array(
			array('label' => Yii::t('admin', 'Edit'), 'url' => Yii::app()->controller->createUrl('/admin/page/update', array('id' => $model->id))),
			array('label' => Yii::t('admin', 'Delete'), 'url' => Yii::app()->controller->createUrl('/admin/page/delete', array('id' => $model->id)), 'type' => 'primary'),
			array('label' => Yii::t('admin', 'List'), 'url' => Yii::app()->controller->createUrl('/admin/page/index'))
		),
	));
	?>
</div>
<?php

$columnsTitles = array();
// Display titles for all languages.
foreach (Yii::app()->params->languages as $alias=>$lang) {
	$columnsTitles[] = array('name' => 'title_' . $alias, 'header' => Yii::t('admin', 'Title(' . $alias . ')'));
}

$columnsOther = array(
	array('name' => 'slug', 'label' => Yii::t('admin', 'Slug')),
	array('name' => 'tags', 'label' => Yii::t('admin', 'Tags')),
	array('name' => 'date_created', 'label' => Yii::t('admin', 'Date Created')),
	array('name' => 'date_updated', 'label' => Yii::t('admin', 'Date Updated')),
);


$this->widget('bootstrap.widgets.TbDetailView', array(
	'data' => $model,
	'attributes' => array_merge($columnsTitles, $columnsOther),
));
?>
