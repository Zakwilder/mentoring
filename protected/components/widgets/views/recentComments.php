<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

$formatter = Yii::app()->getDateFormatter();
?>
<ul>
	<?php foreach($this->getRecentComments() as $comment): ?>
		<li><?php echo $comment->author->username; ?>  →
			<?php echo CHtml::link(CHtml::encode($comment->page->{'title_' . Yii::app()->language}), $comment->page->getUrl() . '#c' . $comment->id); ?>
			<span><?php echo Yii::t('front', 'Published on') . ' ' . $formatter->formatDateTime($comment->create_time, 'long', 'short')?></span>
		</li>
	<?php endforeach; ?>
</ul>