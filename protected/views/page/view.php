<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

Yii::app()->clientScript->registerScript('parentComment', "
$('.reply').click(function(){
	var parent = $(this).attr('value');
	$('#comment-dialog').dialog('open').find('.parentComment').val(parent); return false;
});
");

$this->renderPartial('_view', array('model' => $model));

$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
	'id' => 'comment-dialog',
	'options' => array(
		'title' => Yii::t('front', 'Reply'),
		'autoOpen' => false,
		'width' => 'auto',
		'height' => 'auto',
	),
));

$this->renderPartial('_commentform', array('model' => $comment));

$this->endWidget('zii.widgets.jui.CJuiDialog');
?>

<div id="comments">

	<?php $this->renderPartial('_comments', array('comments' => $model->comments)); ?>
	<br/>
	<h3><?php echo Yii::t('front', 'Leave a Comment')?></h3>

	<?php if (Yii::app()->user->isGuest) {
		echo Yii::t('front', 'You are not allowed to leave comments');
	}
	else {
		$this->renderPartial('_commentform', array('model' => $comment));
	} ?>

</div><!-- comments -->
<div id="social">
	<div class="fb-like" data-href="<?php echo $model->getAbsoluteUrl()?>" data-send="false" data-width="450" data-show-faces="false" data-layout="button_count"></div>
	&nbsp;
	<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $model->getAbsoluteUrl()?>" data-lang="en">Tweet</a>
	<g:plusone></g:plusone>
</div> <!-- social -->
