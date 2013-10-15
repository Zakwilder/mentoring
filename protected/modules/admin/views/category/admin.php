<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this CategoryController */
/* @var $model Category */

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#category-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php print Yii::t('admin', 'Manage Categories'); ?></h1>

<p>
<?php print Yii::t('admin', 'You may optionally enter a comparison operator ({signs}) at the beginning of each of your search values to specify how the comparison should be done.', array('{signs}' => '<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b> or <b>=</b>')); ?>
</p>

<?php echo CHtml::link(Yii::t('admin', 'Advanced Search'), '#', array('class' => 'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->

<?php

$columnsStart = array(
	'id',
);

$columnsCenter = array();
// Display titles for all languages.
foreach (Yii::app()->params->languages as $alias => $lang) {
	$columnsCenter[] = 'title_' . $alias;
}
// Display descriptions for all languages.
foreach (Yii::app()->params->languages as $alias => $lang) {
	$columnsCenter[] = 'description_' . $alias;
}

$columnsEnd = array(
	'slug',
	array(
		'class' => 'CButtonColumn',
	),
);

$this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'category-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array_merge($columnsStart, $columnsOther, $columnsEnd),
)); ?>
