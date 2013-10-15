<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

$formatter = Yii::app()->getDateFormatter();
?>
<ul>
	<?php foreach($this->getRecentPages() as $page): ?>
		<li><?php echo CHtml::link(CHtml::encode($page->{'title_' . Yii::app()->language}), $page->getUrl()); ?>
			<span><?php echo Yii::t('front', 'Published on') . ' ' . $formatter->formatDateTime($page->date_created, 'long', null)?></span>
		</li>
	<?php endforeach; ?>
</ul>