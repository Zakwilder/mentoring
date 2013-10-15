<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this PageController */
/* @var $model Page */


$this->menu = array(
	array('label' => Yii::t('admin', 'List Page'), 'url' => array('index')),
	array('label' => Yii::t('admin', 'Create Page'), 'url' => array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#page-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php print Yii::t('admin', 'Manage Pages'); ?></h1>

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
	'category_id',
);

$columnsCenter = array();
// Display titles for all languages.
foreach (Yii::app()->params->languages as $alias => $lang) {
	$columnsCenter[] = 'title_' . $alias;
}
// Display contents for all languages.
foreach (Yii::app()->params->languages as $alias => $lang) {
	$columnsCenter[] = 'content_' . $alias;
}

$columnsEnd = array(
	'slug',
	'tags',
	array(
		'class' => 'CButtonColumn',
	),
);

$this->widget('zii.widgets.grid.CGridView', array(
	'id' => 'page-grid',
	'dataProvider' => $model->search(),
	'filter' => $model,
	'columns' => array_merge($columnsStart, $columnsCenter, $columnsEnd),
)); ?>
