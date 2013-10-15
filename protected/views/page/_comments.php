<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

$formatter = Yii::app()->getDateFormatter();
if (!isset($childClass)) {
	$childClass = '';
}
foreach ($comments as $comment) {
	echo '
		<div class="comment ' . $childClass . '" id="c' . $comment->id . '">
			<div class="author">
				' . $comment->author->username . '
			</div>
			<div class="time">
				' . $formatter->formatDateTime($comment->create_time, 'long', 'short') . '
			</div>
			<div class="text">
				' . $comment->comment . '
			</div> ';
	if (is_null($comment->parent_id) && !Yii::app()->user->isGuest && Yii::app()->user->id != $comment->author->id && Yii::app()->user->name != $comment->author->username) {
		echo '
				<div class="nav">
				' . CHtml::link(Yii::t('front', 'Reply'), '#Comments_comment', array('class' => 'reply', 'value' => $comment->id)) . '
				</div>';
	}
	if (!empty($comment->children)) {
		$this->renderPartial('_comments', array('comments' => $comment->children, 'childClass' => 'child'));
	}
	echo '</div>';
}
?>