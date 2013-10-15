<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this PageController */
/* @var $model Page */

Yii::app()->clientScript->registerScript('re-install-date-picker', "
function reinstallDatePicker(id, data) {
    $('#datepicker-date-created, #datepicker-date-updated').datepicker(jQuery.extend(jQuery.datepicker.regional['" . $_GET['language'] . "'], {'showOn':'focus','changeMonth':true,'changeYear':true,'showOtherMonths':true,'dateFormat':'yy-mm-dd'}));
}
");
Yii::app()->clientScript->registerScript('reset', "
$('#datepicker-date-created, #datepicker-date-updated').live('focus',function(){
	$(this).datepicker('setDate', null);
});

$('#datepicker-date-created, #datepicker-date-updated').live('blur',function(){
	$(this).trigger('change');
});
");
?>

<h1><?php print Yii::t('admin', 'Pages'); ?></h1>
<hr/>
<div id="buttons" style="float: right;">
	<?php
	$this->widget('bootstrap.widgets.TbButton', array(
		'label' => Yii::t('admin', 'Create'),
		'url'   => Yii::app()->controller->createUrl('/admin/page/create'),

	));
	?>
</div>
<div style="clear:both;"></div>

<?php
$columnsTitles = array();
// Display titles for all languages.
foreach (Yii::app()->params->languages as $alias => $lang) {
	$columnsTitles[] = array('name' => 'title_' . $alias, 'header' => Yii::t('admin', 'Title') . '(' . $alias . ')');
}

$columnsOther = array(
	array('name' => 'category_id', 'header' => Yii::t('admin', 'Category'), 'value' => '$data->category->title_' . Yii::app()->language),
	array('name' => 'slug', 'header' => Yii::t('admin', 'Slug')),
	array('name' => 'tags', 'header' => Yii::t('admin', 'Tags')),
	array('name' => 'visibility', 'header' => Yii::t('admin', 'Visible?'), 'value' => '$data->visibility? "' . Yii::t('admin', 'Yes') . '": "' . Yii::t('admin', 'No') . '"'),
	array(
		'name' => 'date_created',
		'header' => Yii::t('admin', 'Date created'),
		'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'language' => $_GET['language'],
			'model' => $model,
			'attribute' => 'date_created',
			'options' => array(
				'showOn' => 'focus',
				'dateFormat' => 'yy-mm-dd',
				'showOtherMonths' => true,
				'selectOtherMonths' => true,
				'changeMonth' => true,
				'changeYear' => true,
			),
			'htmlOptions' => array(
				'id' => 'datepicker-date-created',
				'style' => 'height:20px;'
			),
		), true),
	),
	array(
		'name' => 'date_updated',
		'header' => Yii::t('admin', 'Date updated'),
		'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			'language' => $_GET['language'],
			'model' => $model,
			'attribute' => 'date_updated',
			'options' => array(
				'showOn' => 'focus',
				'dateFormat' => 'yy-mm-dd',
				'showOtherMonths' => true,
				'selectOtherMonths' => true,
				'changeMonth' => true,
				'changeYear' => true,
			),
			'htmlOptions' => array(
				'id' => 'datepicker-date-updated',
				'style' => 'height:20px;'
			),
		), true),
	),
	array('name' => 'premium', 'header' => Yii::t('admin', 'Premium'), 'value' => '$data->premium? "' . Yii::t('admin', 'Yes') . '": "' . Yii::t('admin', 'No') . '"'),
	array(
		'htmlOptions' => array('nowrap' => 'nowrap'),
		'class' => 'bootstrap.widgets.TbButtonColumn',
		'viewButtonUrl' => 'Yii::app()->controller->createUrl("/admin/page/view", array("id" => $data->id))',
		'updateButtonUrl' => 'Yii::app()->controller->createUrl("/admin/page/update", array("id" => $data->id))',
		'deleteButtonUrl' => 'Yii::app()->controller->createUrl("/admin/page/delete", array("id" => $data->id))',
	)
);


$this->widget('bootstrap.widgets.TbGridView', array(
	'id'            => 'category-grid',
	'dataProvider'  => $model->search(),
	'template'      => '{items}',
	'type'          => 'bordered',
	'filter'        => $model,
	'afterAjaxUpdate' => 'reinstallDatePicker',
	'columns'       => array_merge($columnsTitles, $columnsOther),
)); ?>
