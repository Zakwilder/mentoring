<?php
/**
 * @copyright Copyright (c) Sigma Ukraine
 * @package   Yiitrn
 */

?>

<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="content">
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links' => $this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
		<br/>
		<?php echo $content; ?>
	</div><!-- content -->
	<div id="sidebar">
		<?php $this->widget('RecentComments', array(
			'maxComments' => Yii::app()->params['settings']['recentComments'],
			'title' => Yii::t('front', 'Recent comments'),
		)); ?>

		<?php $this->widget('RecentPages', array(
			'maxPages' => Yii::app()->params['settings']['recentPages'],
			'title' => Yii::t('front', 'Recent pages'),
		)); ?>
	</div><!-- sidebar -->
	<div class="clearfix"></div>
</div>
<?php $this->endContent(); ?>