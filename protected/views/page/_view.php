<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

/* @var $this PageController */
/* @var $model Page */

if ($preview != 1) {
	$this->breadcrumbs = array(
		$model->category->{'title_' . Yii::app()->language} => array('site/pages', array('slug' => $model->category->slug)),
		$model->{'title_' . Yii::app()->language},
	);
}
?>
<?php
$formatter = Yii::app()->getDateFormatter();

$format = Yii::app()->getLocale()->getDateFormat('medium');
echo '
<div class="page">
	<div class="title">
	' . $model->{'title_' . Yii::app()->language} . '
	</div>
	<div class="info">
		' . Yii::t('admin', 'created on') . ' '  . $formatter->format($format, $model->date_created) . '
		| ' . Yii::t('admin', 'last updated on') . ' ' . $formatter->format($format, $model->date_updated) . '
		| ' . Yii::t('admin', 'category:') . ' <a href="' . $this->createUrl('site/pages', array('slug' => $model->category->slug)) . '">' . $model->category->{'title_' . Yii::app()->language} . '</a>
		| ' . Yii::t('admin', 'tags:') . ' ' . $model->tags . '
	</div>
	<br/>
	<div> ';
	if ($preview == 1) {
		echo $model->{'preview_' . Yii::app()->language};
		if (!empty($model->{'preview_' . Yii::app()->language})) {
			echo '...' . CHtml::link(Yii::t('front', 'Continue'), $model->getUrl());
		}
	}
	else {
		echo $model->{'content_' . Yii::app()->language};
	}
	echo '
	</div></div>';
?>
