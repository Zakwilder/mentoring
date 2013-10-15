<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

$this->breadcrumbs = array(
	Yii::t('front', 'Pages'),
);

foreach ($model as $page) {
	$this->renderPartial('/page/_view', array('model' => $page, 'preview' => '1'));
	echo '
		<div class="nav">
		' . CHtml::link(Yii::t('admin', 'View'), $this->createUrl('page/view', array('slug' => $page['slug']))) . ' |
		' . CHtml::link(Yii::t('front', 'Comments') . '(' . $page->commentCount . ')', $page->url . '#comments') . '
		</div>
		<hr/>';
}
?>
<?php $this->widget('CLinkPager', array(
	'pages' => $pages,
	'firstPageLabel' => Yii::t('front', 'First'),
	'lastPageLabel' => Yii::t('front', 'Last'),
	'nextPageLabel' => Yii::t('front', 'Next') . ' >>',
	'prevPageLabel' => '<< ' . Yii::t('front', 'Previous'),
	'header' => Yii::t('front', 'Go to Page') . ': ',
)) ?>